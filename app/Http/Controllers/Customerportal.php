<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\Customerportal_model;
use App\Models\Customers_model;
use App\Models\Applications_model;

class Customerportal extends Controller
{

    var $CUSTOMERID = 0;
    
    function __construct(){   
        parent::__construct();
        $this->CUSTOMERID = $this->getSession('customerId');
    }

    function index($portalId){
        if (!$portalId) {
            // Return a 404 response if no portalId is provided
            abort(404, 'Portal ID not provided');
        }
    
        // Retrieve the portal information from the database
        $portalObj = Customerportal_model::where("portalId", $portalId)->first()->toArray();
        
        // Check if portal object exists
        if (!$portalObj) {
            // Return a 404 response if portal does not exist
            abort(404, 'Portal not found');
        }
    
        // If portal exists, proceed with additional data
        $adminId = $portalObj["adminId"];
        
        // Prepare data to send to the view
        $data = [
            'pageTitle' => 'Portal LogIn',
            'adminId' => $adminId,
            'portalId' => $portalId
        ];
    
        return View('portal.customerlogin', $data);
    }
    
    function checkEmail(Request $request){ 
        $portalId = $request->input('portalId');
        $adminId = $request->input('adminId');
        $email = $request->input('email');
    
        // Fetch the customer object based on the provided parameters
        $custmoerObj = Customers_model::select("email", "fname", "lname")
            ->where("adminId", $adminId)
            ->where("portalid", $portalId)
            ->where("email", $email)
            ->first();
    
        // Check if a customer object was found
        if ($custmoerObj) {
            // If customer found, convert to array and add success flag
            $custmoerObj = $custmoerObj->toArray();
            $custmoerObj["success"] = 1;
            $response = array(
                "C" => 100,
                "R" => $custmoerObj,
                "M" => "Entered email is already associated with us."
            );
        } else {
            // If no customer found, return an empty object with success flag set to 0
            $custmoerObj = ["success" => 0];
            $response = array(
                "C" => 102,
                "R" => $custmoerObj,
                "M" => "Entered email is not associated with us."
            );
        }
    
        // Return response as JSON
        return response()->json($response);
    }
    
    function sendloginotp(Request $request){
        $portalId = $request->input('portalId');
        $adminId = $request->input('adminId');
        $email = $request->input('email');
        $fname = $request->input('fname');
        $lname = $request->input('lname');
        $otp = genOtp();
        $otpSentDateTime = date("Y-m-d H:i:s");
        $createDateTime = date("Y-m-d H:i:s");
        $updateDateTime = date("Y-m-d H:i:s");
    
        // Fetch the customer object based on the portalId and email
        $custmoerObj = Customers_model::where("portalid", $portalId)->where("email", $email)->first();
    
        if ($custmoerObj) {
            // If customer found, convert to array
            $custmoerObj = $custmoerObj->toArray();
    
            // Update OTP
            $updateArr = array(
                "otp" => $otp,
                "otpSentDateTime" => $otpSentDateTime,
                "updateDateTime" => $updateDateTime
            );
    
            $saved = Customers_model::where("portalid", $portalId)->where("email", $email)->update($updateArr);
        } else {
            // If customer not found, register and send OTP
            $custmoerObj = new Customers_model();
            $custmoerObj->id = db_randnumber();
            $custmoerObj->portalId = $portalId;
            $custmoerObj->adminId = $adminId;
            $custmoerObj->email = $email;
            $custmoerObj->fname = $fname;
            $custmoerObj->lname = $lname;
            $custmoerObj->otp = $otp;
            $custmoerObj->otpSentDateTime = $otpSentDateTime;
            $custmoerObj->createDateTime = $createDateTime;
            $custmoerObj->updateDateTime = $updateDateTime;
    
            $saved = $custmoerObj->save();
        }
    
        // Prepare data to return to the user
        $postBackData = array(
            "fname" => $fname,
            "lname" => $lname,
            "email" => $email
        );
    
        if ($saved) {
            // Send OTP email
            $otpData = array(
                "fname" => $fname,
                "lname" => $lname,
                "email" => $email,
                "otp" => $otp
            );
            $this->sendOtpEmail($otpData);
    
            // Success response
            $postBackData["success"] = 1;
            $response = array(
                "C" => 100,
                "R" => $postBackData,
                "M" => "OTP is sent to your email."
            );
        } else {
            // Failure response
            $postBackData["success"] = 0;
            $response = array(
                "C" => 102,
                "R" => $postBackData,
                "M" => "Something went wrong, please try again."
            );
        }
    
        return response()->json($response);
    }

    function sendOtpEmail($otpData){

    }
    
    function login(Request $request){
        $portalId = $request->input('portalId');
        $adminId = $request->input('adminId');
        $email = $request->input('email');
        $otp = $request->input('otp');
        
        $custmoerObj = Customers_model::where("adminId", $adminId)->where("portalid", $portalId)->where("email", $email)->first();

        if($custmoerObj){
            $custmoerObj = $custmoerObj->toArray();
            
            $postBackData = array();
            $postBackData["email"] = $email;
            
            if($custmoerObj["otp"] == $otp){
                //set portal session
                $customerId = $custmoerObj["id"];
                $customerEmail = $custmoerObj["email"];
                $customerFname = $custmoerObj["fname"];
                $customerLname = $custmoerObj["lname"];
                
                $this->setSession('adminId', $adminId);
                $this->setSession('portalId', $portalId);
                $this->setSession('customerId', $customerId);
                $this->setSession('customerEmail', $customerEmail);
                $this->setSession('customerFname', $customerFname);
                $this->setSession('customerLname', $customerLname);
                
                $postBackData["success"] = 1;
                $response = array(
                    "C" => 100,
                    "R" => $postBackData,
                    "M" => "Email verified successfully."
                );
            }else{
                //invalid otp
                $postBackData["success"] = 0;
                $response = array(
                    "C" => 101,
                    "R" => $postBackData,
                    "M" => "Invalid OTP."
                );
            }

        }else{
            //invalid email
            $postBackData["success"] = 0;
            $response = array(
                "C" => 102,
                "R" => $postBackData,
                "M" => "Invalid email or entered email is not associated with us."
            );
        }

        return response()->json($response);
        
    }

    
    function dashboard(){
        
        if($this->CUSTOMERID > 0){
            //list applications
            $adminId = $this->getSession('adminId');
            $portalId = $this->getSession('portalId');
            $customerId = $this->getSession('customerId');
            $customerEmail= $this->getSession('customerEmail');
            $customerFname = $this->getSession('customerFname');
            $customerLname = $this->getSession('customerLname');

            $applcations = array();

            $applicationsObj = Applications_model::where("adminId",$adminId)->where("portalId",$portalId)->where("customerId",$customerId)->first();
            
            if($applicationsObj){
                $applcations = $applicationsObj->toArray();
            }
            

            $data = [
                'pageTitle' => 'Dashboard',
                'applcations' => $applcations
                //'adminId' => $adminId,
                //'portalId' => $portalId
            ];
        
            return View('portal.dashboard', $data);
        }else{
            //redirect to login
            $portalId = $this->getSession('portalId');    
            return Redirect::to(url('/portallogin/'.$portalId));
        }

    }
    
    function newapplication(Request $request){
        if($this->CUSTOMERID > 0){
            $adminId = $this->getSession('adminId');
            $portalId = $this->getSession('portalId');
            $customerId = $this->getSession('customerId');
            
            $customerObj = Customers_model::select("fname","lname","email","phone")
            ->where("adminId",$adminId)
            ->where("portalId",$portalId)
            ->where("id",$customerId)
            ->first()->toArray();

            $data = array();
            $data["pageTitle"] = "New Application";
            $data["adminId"] = $adminId;
            $data["portalId"] = $portalId;
            $data["customerId"] = $customerId;
            $data["fname"] = $customerObj["fname"]; 
            $data["lname"] = $customerObj["lname"];
            $data["email"] = $customerObj["email"];
            $data["phone"] = $customerObj["phone"];

            if($customerObj["fname"] == '' || $customerObj["fname"] == null || $customerObj["lname"] == '' || $customerObj["lname"] == null || $customerObj["email"] == '' || $customerObj["email"] == null || $customerObj["phone"] == '' || $customerObj["phone"] == null){
                $data["incompleteProfile"] = 1;
            }else{
                $data["incompleteProfile"] = 0;
            }

            return View("portal.applicationform",$data);

        }else{
            //redirect to login
            $portalId = $this->getSession('portalId');    
            return Redirect::to(url('/portallogin/'.$portalId));
        }
    }
    
    function submitapplication(Request $request){

    }
}
