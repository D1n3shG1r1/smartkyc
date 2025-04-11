<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use App\Models\Admin_model;
use App\Models\Customers_model;
use App\Models\Applications_model;
use App\Models\ApplicationDocuments_model;
use App\Models\Package_model;
use App\Models\Notifications_model;
use App\Models\customerInbox_model;
use App\Models\SuperAdmin_model;
use App\Traits\SmtpConfigTrait;

class Notifications extends Controller
{   
    use SmtpConfigTrait;
    var $ADMINID = 0;
    var $SYSTEMADMIN = 0;
    function __construct(){   
        parent::__construct();
        $this->ADMINID = $this->getSession('adminId');
        $this->SYSTEMADMIN = $this->getSession('systemAdmin');
    }

    function notifications(Request $request){
        if($this->ADMINID > 0){
            $adminId = $this->ADMINID;
            $portalId = sha1($this->ADMINID);

            Notifications_model::where("receiver", $adminId)->where("isRead", 0)->update(["isRead" => 1]);


            $notificationsData = Notifications_model::where("receiver", $adminId)->orderBy('dateTime', 'desc')->paginate(10);

            $notifications = array();
            if($notificationsData){
                $notifications = $notificationsData->toArray();
            }

            $data = array();
            $data["pageTitle"] = "My Notifications";
            $data["notifications"] = $notifications;

            //echo "data:<pre>"; print_r($data); die;

            return View("admin.notifications",$data);

        }else{
            //redirect to login
            return Redirect::to(url('login'));   
        }
    }

    function sendDocumentRequest(Request $request){
        if($this->ADMINID > 0){
            $adminId = $this->ADMINID;
            

            if($this->SYSTEMADMIN > 0){
                // system admin
                if($request->input("applicantAdminId")){
                    $adminId = $request->input("applicantAdminId");
                    $portalId = sha1($adminId);    
                }
            }else{
               //user admin 
               $portalId = sha1($this->ADMINID);
            }

            $applicantId = $request->input("applicantId");
            $inputApplication = $request->input("inputApplication");
            $inputDocumentType = $request->input("inputDocumentType");
            $inputComment = $request->input("inputComment");
            $lastDate = $request->input("lastDate");

            $createDateTime = date("Y-m-d H:i:s");
            $updateDateTime = date("Y-m-d H:i:s");

            $customer = Customers_model::select("fname", "lname", "email")->where("id", $applicantId)->first();

            $documentType = implode(",",$inputDocumentType);
            $documentTypeTxtArr = array();
            foreach($inputDocumentType as $tmpDocTyp){
                $documentTypeTxtArr[] = documentsTypes($tmpDocTyp);
            }

            $applicationRef = $inputApplication;
            
            $toName = $customer["fname"] . " " . $customer["lname"];
            $toEmail = $customer["email"];


            if($applicationRef > 0){
                //existing application
                $token = $applicationRef;
                $newApplication = 0;
            }else{
                //new application
                $newApplication = 1;
                $applicationId = db_randnumber();
                $applicationObj = new Applications_model();
                $applicationObj->id = $applicationId;
                $applicationObj->adminId = $adminId;
                $applicationObj->portalId = $portalId;
                $applicationObj->customerId = $applicantId;
                $applicationObj->requestSubmitted = 0;
                $applicationObj->title = '';
                $applicationObj->description = '';
                $applicationObj->documentType = $documentType;
                $applicationObj->documentNo = '';
                $applicationObj->comment = '';
                $applicationObj->verificationOutcome = 1;
                $applicationObj->discrepancies = 0;
                $applicationObj->specifyDiscrepancy = '';
                $applicationObj->verificationStatus = "pending";
                $applicationObj->lastDate = $lastDate;
                $applicationObj->createDateTime = $createDateTime;
                $applicationObj->updateDateTime = $updateDateTime;
                
                //dd($applicationObj);
                $appSaved = $applicationObj->save();


                $token = $applicationId;
            }

            // one time use upload link
            $uploadLink = url("portal/login/$portalId?applicationtoken=$token") ;
            
            //Send Email
            $subject = "SmartKYC Document request.";
            $templateBlade = "emails.applicantDocumentRequest";
            
            $sysAdmId = 1;
            $sysAdm = SuperAdmin_model::where("id", $sysAdmId)->first();

            $smtp = json_decode($sysAdm["smtp"], true);
            
            $host = $smtp["host"];
            $port = $smtp["port"];
            $username = $smtp["username"];
            $password = $smtp["password"];
            $encryption = $smtp["encryption"];
            $from_email = $smtp["from_email"];
            $from_name = $smtp["from_name"];
            $replyTo_email = $smtp["replyTo_email"];
            $replyTo_name = $smtp["replyTo_name"];

            $smtpDetails = array();
            $smtpDetails['host'] = $host;
            $smtpDetails['port'] = $port;
            $smtpDetails['username'] = $username;
            $smtpDetails['password'] = $password;
            $smtpDetails['encryption'] = $encryption;
            $smtpDetails['from_email'] = $from_email;
            $smtpDetails['from_name'] = $from_name;
            $smtpDetails['replyTo_email'] = $replyTo_email;
            $smtpDetails['replyTo_name'] = $replyTo_name;
        
            $recipient = ['name' => $toName, 'email' => $toEmail];
            
            $bladeData = [
                'customerName' => $toName,
                'customerEmail' => $toEmail,
                'newApplication' => $newApplication,
                'applicationRef' => $token,
                'documentType' => $documentTypeTxtArr,
                'additionalMessage' => $inputComment,
                'lastDate' => $lastDate,
                'uploadLink' => $uploadLink
            ];
            
            $result = $this->MYSMTP($smtpDetails, $recipient, $subject, $templateBlade, $bladeData);

            /*if($applicationRef > 0){
                $notifyMsg = "You are requested to upload the following documents for the verification process of application #$applicationRef. Required Documents: $documentType";
            }else{
                $notifyMsg = "Please upload your documents to begin the verification process.";
            }*/
            
            $notifyMsg = 'You are requested to upload the following documents for the verification process of application #'.$token.'. Required Documents: '. implode(',', $documentTypeTxtArr);
            
            //save notifications
            $notifyObj = new Notifications_model();
            $notifyObj->id = db_randnumber();
            $notifyObj->message = $notifyMsg;
            $notifyObj->receiver = $applicantId;
            $notifyObj->sender = $adminId;
            $notifyObj->dateTime = $createDateTime;
            $notifyObj->isRead = 0;
            $notifyObj->type = "document required";
            $notifyObj->reference = $token; //$applicationRef;
            $notifyObj->save();


            //save email to inbox database
            $emailHtml = View::make($templateBlade, $bladeData)->render();
            $inbox = new customerInbox_model();
            $inbox->id = db_randnumber();
            $inbox->customerId = $applicantId;
            $inbox->customerEmail = $toEmail;
            $inbox->customerName = $toName;
            $inbox->adminId = $adminId;
            $inbox->receiver = $applicantId;
            $inbox->isRead = 0;
            $inbox->inbound = 1;
            $inbox->content = $emailHtml;
            $inbox->createDateTime = $createDateTime;
            $inbox->save();

            $postBackData["success"] = 1;
            $postBackData["uploadLink"] = $uploadLink;

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

    function addNewApplicant(Request $request){
        //dd($request); die;

        if($this->ADMINID > 0){
            $adminId = $this->ADMINID;
          
            if($this->SYSTEMADMIN > 0){
                // system admin
                if($request->input("applicantAdminId")){
                    $adminId = $request->input("applicantAdminId");
                    $portalId = sha1($adminId);    
                }
            }else{
               //user admin 
               $portalId = sha1($this->ADMINID);
            }

            $applicantId = $request->input("applicantId");
            $inputApplication = $request->input("inputApplication");
            $applicantName = $request->input("applicantName");
            $applicantEmail = $request->input("applicantEmail");
            $inputDocumentType = $request->input("inputDocumentType");
            $inputComment = $request->input("inputComment");
            $lastDate = $request->input("lastDate");

            $otpSentDateTime = date("Y-m-d H:i:s");
            $createDateTime = date("Y-m-d H:i:s");
            $updateDateTime = date("Y-m-d H:i:s");

            
            $applicantId = db_randnumber();
            $customer = new Customers_model();
            $customer->id = $applicantId;
            $customer->portalId = $portalId;
            $customer->adminId = $adminId;
            $customer->fname = $applicantName;
            $customer->lname = '';
            $customer->email = $applicantEmail;
            $customer->address_1 = '';
            $customer->address_2 = '';
            $customer->city = '';
            $customer->state = '';
            $customer->country = '';
            $customer->zipcode = '';
            $customer->phone = '';
            $customer->company = '';
            $customer->website = '';
            $customer->otp = genOtp();
            $customer->otpSentDateTime = $otpSentDateTime;
            $customer->createDateTime = $createDateTime;
            $customer->updateDateTime = $updateDateTime;
            $customer->save();
            
            $customer = Customers_model::select("fname", "lname", "email")->where("id", $applicantId)->first();
            
            $documentType = implode(",",$inputDocumentType);
            $documentTypeTxtArr = array();
            foreach($inputDocumentType as $tmpDocTyp){
                $documentTypeTxtArr[] = documentsTypes($tmpDocTyp);
            }

            $applicationRef = $inputApplication;
            
            $toName = $customer["fname"] . " " . $customer["lname"];
            $toEmail = $customer["email"];


            /*if($applicationRef > 0){
                //existing application
                $token = $applicationRef;
                $newApplication = 0;
            }else{*/
                //new application
                $newApplication = 1;
                $applicationId = db_randnumber();
                $applicationObj = new Applications_model();
                $applicationObj->id = $applicationId;
                $applicationObj->adminId = $adminId;
                $applicationObj->portalId = $portalId;
                $applicationObj->customerId = $applicantId;
                $applicationObj->requestSubmitted = 0;
                $applicationObj->title = '';
                $applicationObj->description = '';
                $applicationObj->documentType = $documentType;
                $applicationObj->documentNo = '';
                $applicationObj->comment = '';
                $applicationObj->verificationOutcome = 1;
                $applicationObj->discrepancies = 0;
                $applicationObj->specifyDiscrepancy = '';
                $applicationObj->verificationStatus = "pending";
                $applicationObj->lastDate = $lastDate;
                $applicationObj->createDateTime = $createDateTime;
                $applicationObj->updateDateTime = $updateDateTime;
                
                //dd($applicationObj);
                $appSaved = $applicationObj->save();


                $token = $applicationId;
            /*}*/

            // one time use upload link
            $uploadLink = url("portal/login/$portalId?applicationtoken=$token") ;
            
            //Send Email
            $subject = "SmartKYC Document request.";
            $templateBlade = "emails.applicantDocumentRequest";
            
            $sysAdmId = 1;
            $sysAdm = SuperAdmin_model::where("id", $sysAdmId)->first();

            $smtp = json_decode($sysAdm["smtp"], true);
            
            $host = $smtp["host"];
            $port = $smtp["port"];
            $username = $smtp["username"];
            $password = $smtp["password"];
            $encryption = $smtp["encryption"];
            $from_email = $smtp["from_email"];
            $from_name = $smtp["from_name"];
            $replyTo_email = $smtp["replyTo_email"];
            $replyTo_name = $smtp["replyTo_name"];

            $smtpDetails = array();
            $smtpDetails['host'] = $host;
            $smtpDetails['port'] = $port;
            $smtpDetails['username'] = $username;
            $smtpDetails['password'] = $password;
            $smtpDetails['encryption'] = $encryption;
            $smtpDetails['from_email'] = $from_email;
            $smtpDetails['from_name'] = $from_name;
            $smtpDetails['replyTo_email'] = $replyTo_email;
            $smtpDetails['replyTo_name'] = $replyTo_name;
        
            $recipient = ['name' => $toName, 'email' => $toEmail];
            
            $bladeData = [
                'customerName' => $toName,
                'customerEmail' => $toEmail,
                'newApplication' => $newApplication,
                'applicationRef' => $token,
                'documentType' => $documentTypeTxtArr,
                'additionalMessage' => $inputComment,
                'lastDate' => $lastDate,
                'uploadLink' => $uploadLink
            ];
            
            $result = $this->MYSMTP($smtpDetails, $recipient, $subject, $templateBlade, $bladeData);

            /*if($applicationRef > 0){
                $notifyMsg = "You are requested to upload the following documents for the verification process of application #$applicationRef. Required Documents: $documentType";
            }else{
                $notifyMsg = "Please upload your documents to begin the verification process.";
            }*/
            $notifyMsg = 'You are requested to upload the following documents for the verification process of application #'.$token.'. Required Documents: '. implode(',', $documentTypeTxtArr);

            //save notifications
            $notifyObj = new Notifications_model();
            $notifyObj->id = db_randnumber();
            $notifyObj->message = $notifyMsg;
            $notifyObj->receiver = $applicantId;
            $notifyObj->sender = $adminId;
            $notifyObj->dateTime = $createDateTime;
            $notifyObj->isRead = 0;
            $notifyObj->type = "document required";
            $notifyObj->reference = $token; //$applicationRef;
            $notifyObj->save();


            //save email to inbox database
            $emailHtml = View::make($templateBlade, $bladeData)->render();
            $inbox = new customerInbox_model();
            $inbox->id = db_randnumber();
            $inbox->customerId = $applicantId;
            $inbox->customerEmail = $toEmail;
            $inbox->customerName = $toName;
            $inbox->adminId = $adminId;
            $inbox->receiver = $applicantId;
            $inbox->isRead = 0;
            $inbox->inbound = 1;
            $inbox->content = $emailHtml;
            $inbox->createDateTime = $createDateTime;
            $inbox->save();

            $postBackData["success"] = 1;
            $postBackData["uploadLink"] = $uploadLink;

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
