<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin_model;

class Admin extends Controller
{
    //login
    //registeration
    //id, name, email, password, createdatetime, updatedatetime
    //profile- company, phone, email, address,
    //buy plan
    //upload verify document
    //reports

    function __construct(){   
        parent::__construct();
    }
    
    function register(Request $request){
        if($request->isMethod('post')) {
            
            $fname = $request->input("fname");
            $lname = $request->input("lname");
            $email = $request->input("email");
            $password = $request->input("password");
            $repassword = $request->input("re_password");
            $agreeterm = $request->input("agree-term");
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
                    "M" => "error: The entered email is already associated with us."
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

                $postBackData = array();

                $postBackData["fname"] = $fname;
                $postBackData["lname"] = $lname;
                $postBackData["email"] = $email;
                $postBackData["success"] = 1;

                $response = array(
                    "C" => $saved ? 100 : 101,
                    "R" => $postBackData,
                    "M" => $saved ? "success" : "error"
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

}
