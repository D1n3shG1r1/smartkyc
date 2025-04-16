<?php

namespace App\Http\Controllers\Admin;
use App\Models\Customers_model;
use App\Models\Applications_model;
use App\Models\ApplicationDocuments_model;
use App\Models\Package_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class Dashboard extends Controller
{
    
    var $ADMINID = 0;
    
    function __construct(){   
        parent::__construct();
        $this->ADMINID = $this->getSession('adminId');
    }

    function dashboard(Request $request){
        
        if($this->ADMINID > 0){
            $adminId = $this->ADMINID;
            $portalId = sha1($this->ADMINID);
            
            //get count of total applications
            $totalApplications = Applications_model::where("adminId",$adminId)->count();
            
            //get count of verified applications
            $verifiedApplications = Applications_model::where("adminId",$adminId)->where("verificationStatus","verified")->count();
            
            //get count of unverified applications
            $notVerifiedApplications = Applications_model::where("adminId",$adminId)->where("verificationStatus","not verified")->count();

            //get count of pending applications 
            $pendingApplications = Applications_model::where("adminId",$adminId)->where("verificationStatus","pending")->count();

            //get count of applicants
            $totalApplicants = Customers_model::where("adminId",$adminId)->count();
            
            //get current package details
            $packageDetails = Package_model::where("adminId",$adminId)->first();
            if($packageDetails){
                $packageDetails->toArray();
                $packageName = config('custom.packageName.'.$packageDetails['package']);
                $packageDetails["packageName"] = $packageName;
            }else{
                $packageDetails = array();
                $packageDetails["packageName"] = "-";
                $packageDetails["documentsVerifyLimit"] = 0;
                $packageDetails["documentsVerified"] = 0;
            }
            
            //$applicationsData
            $applications = array();

            $applicationsObj = Applications_model::where("adminId",$adminId)->orderBy('createDateTime', 'desc')->limit(5)->get();
            
            //echo "<pre>"; print_r($applicationsObj); die;

            if($applicationsObj){
                $applications = $applicationsObj->toArray();

                foreach($applications as &$row){
                    //$row["verificationOutcomeTxt"] = verificationStatusTxt($row["verificationOutcome"]);
                    $row["verificationOutcomeTxt"] = $row["verificationOutcome"];

                    $customer = Customers_model::select("fname", "lname")->where("id", $row["customerId"])->first();
                    $row["customerName"] = ucwords($customer["fname"] . " " . $customer["lname"]);
                }
            }

            $data = array();
            $data["pageTitle"] = "Dashboard";
            $data["applicantPortalLink"] = url("portal/login/".$portalId);
            
            $data["totalApplicants"] = $totalApplicants;
            $data["totalApplications"] = $totalApplications;
            $data["verifiedApplications"] = $verifiedApplications;
            $data["notVerifiedApplications"] = $notVerifiedApplications;
            $data["pendingApplications"] = $pendingApplications;
            $data["packageDetails"] = $packageDetails;    
            $data["applications"] = $applications;

            //echo "<pre>"; print_r($data); die;
            
            return View("admin.dashboard",$data);

        }else{
            //redirect to login
            return Redirect::to(url('login'));
        }
    }

}
