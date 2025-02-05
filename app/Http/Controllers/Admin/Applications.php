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
            $applicationsObj = Applications_model::where("portalId",$portalId)->where("adminId",$adminId)->get();
            
            if($applicationsObj){
                $applications = $applicationsObj->toArray();
            
                foreach($applications as &$row){
                    $row["statusTxt"] = verificationStatusTxt($row["status"]);
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
}