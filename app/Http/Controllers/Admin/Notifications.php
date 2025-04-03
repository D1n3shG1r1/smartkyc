<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use App\Models\Admin_model;
use App\Models\Customers_model;
use App\Models\Applications_model;
use App\Models\ApplicationDocuments_model;
use App\Models\Package_model;
use App\Models\Notifications_model;
use App\Traits\SmtpConfigTrait;

class Notifications extends Controller
{   
    use SmtpConfigTrait;
    var $ADMINID = 0;
    
    function __construct(){   
        parent::__construct();
        $this->ADMINID = $this->getSession('adminId');
    }

    function sendDocumentRequest(Request $request){
        if($this->ADMINID > 0){
            $adminId = $this->ADMINID;
            $portalId = sha1($this->ADMINID);
            
            $applicantId = $request->input("applicantId");
            $inputApplication = $request->input("inputApplication");
            $inputDocumentType = $request->input("inputDocumentType");
            $inputComment = $request->input("inputComment");
            
            $customer = Customers_model::select("fname", "lname", "email")->where("id", $applicantId)->first();

            $documentType = $inputDocumentType;  
            $documentType = str_replace("_"," ",$documentType);
            $documentType = ucwords($documentType);
            $applicationRef = $inputApplication;
            
            $toName = $customer["fname"] . " " . $customer["lname"];
            $toEmail = $customer["email"];


            //Email
            $subject = "SmartKYC Document request.";
            $templateBlade = "emails.applicantDocumentRequest";
            
            $smtpDetails = array();
            $smtpDetails['host'] = "sandbox.smtp.mailtrap.io"; //$smtpData["host"];
            $smtpDetails['port'] = 587; //$smtpData["port"];;
            $smtpDetails['username'] = "60986f24c10f85";//$smtpData["username"];
            $smtpDetails['password'] = "d3c808d42dee70";//$smtpData["password"];
            $smtpDetails['encryption'] = "";
            $smtpDetails['from_email'] = "support@smartkyc.ng"; //$smtpData["fromemail"];
            $smtpDetails['from_name'] = "SmartKYC"; //$smtpData["fromname"];
            $smtpDetails['replyTo_email'] = "support@smartkyc.ng";//$smtpData["replytoemail"];
            $smtpDetails['replyTo_name'] = "SmartKYC";//$smtpData["replytoname"];
        
            $recipient = ['name' => $toName, 'email' => $toEmail];
            
            $bladeData = [
                'customerName' => $toName,
                'customerEmail' => $toEmail,
                'applicationRef' => $applicationRef,
                'documentType' => $documentType,
                'additionalMessage' => $inputComment
            ];
            
            $result = $this->MYSMTP($smtpDetails, $recipient, $subject, $templateBlade, $bladeData);

            if($applicationRef > 0){
                $notifyMsg = "You are requested to upload the following documents for the verification process of application #$applicationRef. Required Documents: $documentType";
            }else{
                $notifyMsg = "Please upload your documents to begin the verification process.";
            }

            //save notifications
            $notifyObj = new Notifications_model();
            $notifyObj->id = db_randnumber();
            $notifyObj->message = $notifyMsg;
            $notifyObj->receiver = $applicantId;
            $notifyObj->sender = $adminId;
            $notifyObj->dateTime = date("Y-m-d H:i:s");
            $notifyObj->isRead = 0;
            $notifyObj->type = "document required";
            $notifyObj->reference = $applicationRef;
            $notifyObj->save();


            $postBackData["success"] = 1;

            $response = array(
                "C" => 100,
                "R" => $postBackData,
                "M" => "Your document request has been submitted successfully."
            );

        }else{
            $postBackData = array();
            $postBackData["success"] = 0;
            $response = array(
                "C" => 1004,
                "R" => $postBackData,
                "M" => "session expired."
            );
        }

        return response()->json($response); die;
    }
}
