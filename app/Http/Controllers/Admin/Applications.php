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
use App\Models\SuperAdmin_model;
use App\Traits\SmtpConfigTrait;

class Applications extends Controller
{   
    use SmtpConfigTrait;
    var $ADMINID = 0;
    var $SYSTEMADMIN = 0;
    function __construct(){   
        parent::__construct();
        $this->ADMINID = $this->getSession('adminId');
        $this->SYSTEMADMIN = $this->getSession('systemAdmin');
    }

    function myApplications(Request $request){
        
        if($this->ADMINID > 0){
            $adminId = $this->ADMINID;
            $portalId = sha1($this->ADMINID);
            $applications = array();
            $applicationsObj = Applications_model::where("portalId",$portalId)->where("adminId",$adminId)->orderBy('createDateTime', 'desc')->paginate(10);
            
            if($applicationsObj){
                $applications = $applicationsObj->toArray();
               
                foreach($applications["data"] as &$row){
                    $row["verificationOutcomeTxt"] = verificationStatusTxt($row["verificationOutcome"]);

                    $customer = Customers_model::select("fname", "lname")->where("id", $row["customerId"])->first();
                    $row["customerName"] = ucwords($customer["fname"] . " " . $customer["lname"]);
                }
            }

            //echo "<pre>"; print_r($applications); die;
             
            $data = [
                'pageTitle' => 'My Applications',
                'applications' => $applications
            ];
            
            return View('admin.myapplications', $data);

        }else{
            //redirect to login
            return Redirect::to(url('login'));
        }
        
    }

    function application($Id){
        
        if($this->ADMINID > 0 && $Id){
            $adminId = $this->ADMINID;
            $portalId = sha1($this->ADMINID);
            $applicationId = $Id;
            
            if($this->SYSTEMADMIN == 0){

                //get current package and profile details
                $adminObj = Admin_model::select("fname", "lname", "address_1", "address_2", "city", "state", "country", "zipcode", "phone", "email", "company", "website")->where("id", $adminId)->first();            
                $adminData = $adminObj->toArray();
                
                if (
                    empty($adminData["fname"]) ||
                    empty($adminData["lname"]) ||
                    empty($adminData["email"]) ||
                    empty($adminData["phone"]) ||
                    empty($adminData["address_1"]) ||
                    empty($adminData["address_2"]) ||
                    empty($adminData["city"]) ||
                    empty($adminData["country"]) ||
                    empty($adminData["company"]) ||
                    empty($adminData["website"])
                ) {
                    $incompleteProfile = 1;
                } else {
                    $incompleteProfile = 0;
                }
                
                //echo "incompleteProfile:".$incompleteProfile; die;
                //get current package
                $packageRow = Package_model::where("adminId", $adminId)->first();
                $hasPackage = 0;
                if($packageRow){
                    
                    $packageRow = $packageRow->toArray();
                    
                    if($packageRow["active"] == 0 || $packageRow["expired"] == 1){
                        $hasPackage = 0;
                    }else{
                        $hasPackage = 1;
                    }
                
                }else{
                    $hasPackage = 0;
                }
                
            }else{
                //bypass if system-admin
                $incompleteProfile = 0;
                $hasPackage = 1;
            }

            if($this->SYSTEMADMIN > 0){
                $applicationObj = Applications_model::where("id",$Id)->first();
            }else{
                $applicationObj = Applications_model::where("portalId",$portalId)->where("adminId",$adminId)->where("id",$Id)->first();
            }

            if($applicationObj){
                $application = $applicationObj->toArray();     
                $customerId = $application["customerId"];
                $application["verificationOutcomeTxt"] = verificationStatusTxt($application["verificationOutcome"]);
                
                
                if($this->SYSTEMADMIN > 0){
                    //get applicant details
                    $customerObj = Customers_model::select("id","fname","lname","email")->where("id",$customerId)->first();
                }else{
                    //get applicant details
                    $customerObj = Customers_model::select("id","fname","lname","email")->where("adminId",$adminId)->where("id",$customerId)->first();
                }

                $customerDetails = array();
                if($customerObj){
                    $customerDetails = $customerObj->toArray();
                }

                
                if($this->SYSTEMADMIN > 0){
                    //get application documents
                    $documentsObj = ApplicationDocuments_model::where("applicationId",$Id)->get();
                }else{
                    //get application documents
                    $documentsObj = ApplicationDocuments_model::where("portalId",$portalId)->where("applicationId",$Id)->get();
                }
                
                if($documentsObj){
                    $documents = $documentsObj->toArray();
                
                    foreach($documents as &$document){
                        
                        $adminId = $document['adminId'];
                        $fileName = $document['fileName'];
                        $adminDirPath = customerDocumentsPath($adminId,$customerId,$applicationId);
                        $filePath = $adminDirPath.$fileName;
                        $document['filePath'] = $filePath;
                        $document['mimeType'] = getFileMimeType($filePath);
                        
                        unset($document['id']);
                        unset($document['adminId']);
                        unset($document['portalId']);
                        unset($document['applicationId']);
                        unset($document['fileName']);
                    }
                
                }else{
                    $documents = array();
                }
                
            }else{
                $application = array();
            }

            $application["documents"] = $documents;
            $application["customerDetails"] = $customerDetails;
            
            $data = [
                'pageTitle' => 'Application',
                'application' => $application,
                'verificationOutcomeOptions' => verificationStatusOptions(),
                'DiscrepanciesOptions' => DiscrepanciesOptions(),
                'incompleteProfile' => $incompleteProfile,
                'hasPackage' => $hasPackage,
                'isSystemAdmin' => $this->SYSTEMADMIN
            ];


            //echo "<pre>"; print_r($data); die;

            return View('admin.applicationdetails', $data);
        }else{
            //redirect to login
            $portalId = $this->getSession('portalId');    
            return Redirect::to(url('/portal/login/'.$portalId));
        }
    }

    function updateApplicationStatus(Request $request){
        
        if($this->ADMINID > 0){
            
            $adminId = $this->ADMINID;
            $portalId = sha1($adminId);

            $applicationId = $request->input("applicationId");
            $verificationStatus = $request->input("verificationStatus");
            $verificationMethod = $request->input("verificationMethod");
            $verificationOutcome = $request->input("verificationOutcome");
            $discrepancies = $request->input("discrepancies");
            $specifyDiscrepancy = $request->input("specifyDiscrepancy");
            if(!$specifyDiscrepancy || $specifyDiscrepancy == null){
                $specifyDiscrepancy = "";
            }
            $updateDateTime = date("Y-m-d H:i:s");
            $updateArr = array(
                "verificationOutcome" => $verificationOutcome,
                "discrepancies" => $discrepancies,
                "specifyDiscrepancy" => $specifyDiscrepancy,
                "verificationStatus" => $verificationStatus,
                "verificationMethod" => $verificationMethod,
                "updateDateTime" => $updateDateTime
            );

            if($this->SYSTEMADMIN > 0){
                $applicationObj = Applications_model::where("id",$applicationId)->update($updateArr);
                
            }else{
                $applicationObj = Applications_model::where("portalId",$portalId)->where("adminId",$adminId)->where("id",$applicationId)->update($updateArr);
            }


            //user and applicant details by application
            
            $appInfo = Applications_model::where("id",$applicationId)->first();
            $userId = $appInfo["adminId"];
            $applicantId = $appInfo["customerId"];
            
            $applicantInfo = Customers_model::where("id", $applicantId)->first();
            $toName = ucwords($applicantInfo["fname"] ." ". $applicantInfo["lname"]);
            $toEmail = $applicantInfo["email"];
            $status = ucwords($verificationStatus);
            
            $createDateTime = date("Y-m-d H:i:s");
            //send status notification and email
            //save notifications
            $notifyMsg = 'Your application #' . $applicationId . ' is ' . $status . '.';
            $notifyObj = new Notifications_model();
            $notifyObj->id = db_randnumber();
            $notifyObj->message = $notifyMsg;
            $notifyObj->receiver = $applicantId;
            $notifyObj->sender = $userId; // $adminId;
            $notifyObj->dateTime = $createDateTime;
            $notifyObj->isRead = 0;
            $notifyObj->type = "application status";
            $notifyObj->reference = $applicationId; //$applicationRef;
            $notifyObj->save();


            //send status email
            //get sysadm smtp

            $subject = "Update on Your Application #$applicationId Status";
            $templateBlade = "emails.applicationStatus";
            
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
                'applicationId' => $applicationId,
                'status' => $status
            ];
            
            $result = $this->MYSMTP($smtpDetails, $recipient, $subject, $templateBlade, $bladeData);


            $postBackData["success"] = 1;

            $response = array(
                "C" => 100,
                "R" => $postBackData,
                "M" => "Application status has been updated successfully."
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

    function myApplicants(Request $request){
        
        if($this->ADMINID > 0){
            $adminId = $this->ADMINID;
            $portalId = sha1($this->ADMINID);
            
            $email = $request->input("email"); 

            $customers = array();
            $customersQuery = Customers_model::select("id", "email", "otp", "fname", "lname", "phone")->where("adminId", $adminId);

            // Add dynamic filters based on your conditions (like email or fname)
            if (!empty($email)) {
                $customersQuery->where('email', $email);
            }
            
            $customersQuery->orderBy('createDateTime', 'desc');
            
            $customersObj = $customersQuery->paginate(10);

            if($customersObj){
                $customers = $customersObj->toArray();
            }

            //echo "<pre>"; print_r($customers); die;
            $data = [
                'pageTitle' => 'My Applicants',
                'customers' => $customers
            ];
            
            return View('admin.myapplicants', $data);

        }else{
            //redirect to login
            return Redirect::to(url('login'));
        }
    }

    function generateotp(Request $request){
        
        if($this->ADMINID > 0){
            
            $adminId = $this->ADMINID;
            $portalId = sha1($adminId);
            $Id = $request->input("id");
            $updateDateTime = date("Y-m-d H:i:s");
            $otp = genOtp();
            
            $updateArr = array("otp" => $otp, "otpSentDateTime" => $updateDateTime, "updateDateTime" => $updateDateTime);
            
            $updated = Customers_model::where("adminId",$adminId)->where("id",$Id)->update($updateArr);

            $postBackData = array();
            if($updated){
                $postBackData["success"] = 1;
                $postBackData["id"] = $Id;
                $postBackData["otp"] = $otp;

                $response = array(
                    "C" => 100,
                    "R" => $postBackData,
                    "M" => "OTP has been updated successfully."
                );
            }else{
                $postBackData["success"] = 0;
                
                $response = array(
                    "C" => 101,
                    "R" => $postBackData,
                    "M" => "Please try again."
                );
            }
            
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

    function getApplicantProfile(Request $request){

        if($this->ADMINID > 0){
            
            $userId = $this->ADMINID;
            $applicantId = $request->input('applicantId');

            $applicantData = Customers_model::where("id", $applicantId)->where("adminId", $userId)->first();

            $postBackData["success"] = 1;
            $postBackData["applicant"] = $applicantData;
            
            $response = array(
                "C" => 100,
                "R" => $postBackData,
                "M" => "success"
            );
        }else{
                
            $postBackData = array();
            $postBackData["success"] = 0;
            $response = array(
                "C" => 1004,
                "R" => $postBackData,
                "M" => "Your session has expired. Please log in again to continue."
            );
        }
    
        return response()->json($response); die;     

    }

    function getApplicantData(Request $request){
        
        if($this->ADMINID > 0){
            
            $adminId = $this->ADMINID;
            $portalId = sha1($adminId);
            $applicantId = $request->input("applicantId");
            
            if($request->input("userId")){
                $adminId = $request->input("userId");
                $portalId = sha1($adminId);
            }

            //applicant name, email
            $customer = Customers_model::select("fname", "lname", "email")->where("id", $applicantId)->first();
            
            //applicant previous applications 
            $applications = Applications_model::select("id")->where("portalId",$portalId)->where("adminId",$adminId)->where("customerId",$applicantId)->get();
            
            $postBackData = array();
            $postBackData["success"] = 1;
            $postBackData["customer"] = $customer;
            $postBackData["applications"] = $applications;

            $response = array(
                "C" => 100,
                "R" => $postBackData,
                "M" => "success"
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