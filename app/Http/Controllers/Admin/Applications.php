<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use App\Models\Admin_model;
use App\Models\Customers_model;
use App\Models\Applications_model;
use App\Models\ApplicationDocuments_model;

class Applications extends Controller
{
    var $ADMINID = 0;
    
    function __construct(){   
        parent::__construct();
        $this->ADMINID = $this->getSession('adminId');
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
            
            $applicationObj = Applications_model::where("portalId",$portalId)->where("adminId",$adminId)->where("id",$Id)->first();

            if($applicationObj){
                $application = $applicationObj->toArray();     
                $customerId = $application["customerId"];
                $application["verificationOutcomeTxt"] = verificationStatusTxt($application["verificationOutcome"]);
                
                
                //get applicant details
                $customerObj = Customers_model::select("id","fname","lname","email")->where("adminId",$adminId)->where("id",$customerId)->first();
                $customerDetails = array();
                if($customerObj){
                    $customerDetails = $customerObj->toArray();
                }

                //get application documents
                $documentsObj = ApplicationDocuments_model::where("portalId",$portalId)->where("applicationId",$Id)->get();

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
                'DiscrepanciesOptions' => DiscrepanciesOptions()
            ];

            
            //echo "<pre>"; print_r($data); die;

            return View('admin.applicationdetails', $data);
        }else{
            //redirect to login
            $portalId = $this->getSession('portalId');    
            return Redirect::to(url('/portallogin/'.$portalId));
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

            $applicationObj = Applications_model::where("portalId",$portalId)->where("adminId",$adminId)->where("id",$applicationId)->update($updateArr);
            
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
}