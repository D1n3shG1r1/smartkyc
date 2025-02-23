<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Admin_model;
use App\Models\Customerportal_model;

class Register extends Controller
{
    //login
    //registeration
    //id, name, email, password, createdatetime, updatedatetime
    //profile- company, phone, email, address,
    //buy plan
    //upload verify document
    //reports
    
    var $ADMINID = 0;
    
    function __construct(){   
        parent::__construct();
        $this->ADMINID = $this->getSession('adminId');
    }
    
    function login(Request $request){
        if($request->isMethod('post')) {
            $email = $request->input("email");
            $password = $request->input("password");
            $token = $request->input("_token");

            $password = md5($password);

            $adminObj = Admin_model::where('email', $email)->where('password', $password)->first()->toArray();
				
            if (!empty($adminObj)){
                $adminId = $adminObj["id"];
                if ($adminId > 0) {
                    
                    $adminFName = $adminObj["fname"];
                    $adminLName = $adminObj["lname"];
                    $adminEmail = $adminObj["email"];
                    
                    $this->setSession('adminFName', $adminFName);
                    $this->setSession('adminLName', $adminLName);
                    $this->setSession('adminEmail', $adminEmail);
                    $this->setSession('adminId', $adminId);
                    $this->setSession('systemAdmin', 0);
                    
                    $response = array("C" => 100, "R" => array("adminId" => $adminId), "M" => "Login successful! Redirecting...");
                }else{
                    $response = array("C" => 101, "R" => array(), "M" => "Invalid email or password. Please try again.");
                }   
            
            }else{
                $response = array("C" => 101, "R" => array(), "M" => "Invalid email or password. Please try again.");
            }
            
            return response()->json($response); die;

        }else{
            //echo $this->ADMINID; die;
            if ($this->ADMINID > 0) {
                //redirect to dashboard
                return Redirect::to(url('admin/dashboard'));
            }else{
                $data = array();
                $data["pageTitle"] = "Login";
                return View("login",$data);
            }

        }
        
    }
    

    function register(Request $request){
        if($request->isMethod('post')) {
            
            $fname = $request->input("fname");
            $lname = $request->input("lname");
            $email = $request->input("email");
            $password = $request->input("password");
            $repassword = $request->input("re_password");
            $agreeterm = $request->input("agree_term");
            $token = $request->input("_token");

            $password = md5($password);
            
            //check for email existance
            $isEmailExist = $this->emailExist($email);

            if($isEmailExist > 0){
                //email exists
                $postBackData = array();

                $postBackData["fname"] = $fname;
                $postBackData["lname"] = $lname;
                $postBackData["email"] = $email;
                $postBackData["success"] = 0;
                
                $response = array(
                    "C" => 102,
                    "R" => $postBackData,
                    "M" => "The entered email is already associated with us."
                );
        
                return response()->json($response); die;

            }else{
                //save to db
                $currentDateTime = date("Y-m-d H:m:i");
                $updateDateTime = date("Y-m-d H:m:i");

                $adminObj = new Admin_model();
                $adminObj->id = db_randnumber();
                $adminObj->fname = $fname;
                $adminObj->lname = $lname;
                $adminObj->email = $email;
                $adminObj->password = $password;
                $adminObj->createDateTime = $currentDateTime;
                $adminObj->updateDateTime = $updateDateTime;
                
                $saved = $adminObj->save();

                if($saved){
                    //create customer portal
                    $portalObj = new Customerportal_model();
                    $portalObj->adminId = $adminObj->id;
                    $portalObj->portalEnable = 1; //
                    $portalObj->portalId = sha1($adminObj->id); 
                    $portalsaved = $portalObj->save();
                }

                

                $postBackData = array();

                $postBackData["fname"] = $fname;
                $postBackData["lname"] = $lname;
                $postBackData["email"] = $email;
                $postBackData["success"] = 1;

                $response = array(
                    "C" => $saved ? 100 : 101,
                    "R" => $postBackData,
                    "M" => $saved ? "Your account has been successfully registered." : "Something went wrong. Please try again."
                );
        
                return response()->json($response); die;

            }

        }else{
            $data = array();
            $data["pageTitle"] = "Create Account";
            return View("register",$data);
        }
        
    }

    function emailExist($email){
        $adminObj = Admin_model::where('email', $email)->first();
        if($adminObj && $adminObj != '' && $adminObj != null){
            return 1;
        }else{
            return 0;
        }
    }

    function logout(Request $request){

    }
}
