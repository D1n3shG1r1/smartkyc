<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use App\Models\Admin_model;
use App\Models\Packagepayments_model;
use App\Models\SuperAdmin_model;
use App\Traits\SmtpConfigTrait;

class Admin extends Controller
{
    use SmtpConfigTrait;
    var $ADMINID = 0;
    
    function __construct(){   
        parent::__construct();
        $this->ADMINID = $this->getSession('adminId');
    }

    function login(Request $request){
        $data = array();
        $data["pageTitle"] = "System Administrator";
        return View("admin.systemAdminLogin",$data);
    }

    function loginprocess(Request $request){

        $email = $request->input("email");
        $password = $request->input("password");
        $email = strtolower($email);
        $password = sha1($password);
        $rowObj = SuperAdmin_model::where("email", $email)->where("password", $password)->first();

        if($rowObj){
            $adminObj = $rowObj->toArray();
            $adminId = $adminObj["id"];
            $adminFName = $adminObj["fname"];
            $adminLName = $adminObj["lname"];
            $adminEmail = $adminObj["email"];
            
            $this->setSession('adminFName', $adminFName);
            $this->setSession('adminLName', $adminLName);
            $this->setSession('adminEmail', $adminEmail);
            $this->setSession('adminId', $adminId);
            $this->setSession('systemAdmin', $adminId);
        
            //echo $this->getSession('adminFName').", ".$this->getSession('adminLName').", ".$this->getSession('adminEmail').", ".$this->getSession('adminId').", ".$this->getSession('systemAdmin'); die;

            $response = array("C" => 100, "R" => array("adminId" => $adminId), "M" => "Login successful! Redirecting...");
        
        }else{
            $response = array("C" => 101, "R" => array(), "M" => "You have entered an invalid email or password.");
        }

        return response()->json($response); die;
    }

    function signout(Request $request){
        
        $this->removeSession('adminFName');
        $this->removeSession('adminLName');
        $this->removeSession('adminEmail');
        $this->removeSession('adminId');
        $this->removeSession('systemAdmin');

        //redirect to login
        return Redirect::to(url('login'));
    }

    function dashboard(Request $request){
        if($this->ADMINID > 0){
            $adminId = $this->ADMINID;

            $totalcustomers = Admin_model::count();
            $amountTotal = Packagepayments_model::where('payment','y')->where('status','success')->sum('amount');
            
            $revenue = 0;
            if($amountTotal > 0){
                $revenue = $amountTotal/100; //Kobo to Naira (100Kobo == 1Naira)
            }

            //echo $totalcustomers.", ".$amountTotal; die;

            $data = array();
            $data["pageTitle"] = "Dashboard";
            $data["totalcustomers"] = $totalcustomers;
            $data["totalrevenue"] = $revenue;
            
            return View("admin.admin-dashboard",$data);

        }else{
            //redirect to login
            return Redirect::to(url('login'));
        }
    }

    function profile(Request $request){

    }

    function customers(Request $request){

    }

    function settings(Request $request){

    }


}