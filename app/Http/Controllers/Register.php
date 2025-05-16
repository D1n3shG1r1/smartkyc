<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Admin_model;
use App\Models\Customerportal_model;
use App\Models\SuperAdmin_model;
use App\Traits\CryptoTrait;
use App\Traits\SmtpConfigTrait;
use Carbon\Carbon;

class Register extends Controller
{
    //login
    //registeration
    //id, name, email, password, createdatetime, updatedatetime
    //profile- company, phone, email, address,
    //buy plan
    //upload verify document
    //reports
    use SmtpConfigTrait;
    use CryptoTrait;
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

            $adminObj = Admin_model::where('email', $email)->where('password', $password)->first();
				
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
                $adminObj->address_1 = '';
                $adminObj->address_2 = '';
                $adminObj->city = '';
                $adminObj->state = '';
                $adminObj->country = '';
                $adminObj->zipcode = '';
                $adminObj->phone = '';
                $adminObj->company = '';
                $adminObj->website = '';
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

    function forgotpassword(Request $request){
        if($request->isMethod('post')) {
            //process post data
            $email = $request->input("email");
            //check for email existance
            $isEmailExist = $this->emailExist($email);

            if($isEmailExist > 0){
                //email exists
                $adminObj = Admin_model::where('email', $email)->first();
                $adminId = $adminObj->id;
                $adminName = $adminObj->fname.' '.$adminObj->lname;
                $adminEmail = $adminObj->email;
                $currentDateTime = date("Y-m-d H:i:s");
                $updateData = array(
                    "updateDateTime" => $currentDateTime,
                    "resetPasswordLinkdateTime" => $currentDateTime,
                    "linkExpired" => 0
                );
                
                $adminObj = Admin_model::where('id', $adminId)->where('email', $email)->update($updateData);
                
                //generate and send link to admin
                $textString = $adminId.'#dkg#'.$currentDateTime.'#dkg#'.$email;

                $enckey = env('MY_ENCRYPTION_KEY');
                $encryptedStr = $this->encrypt($textString, $enckey);
                $resetPasswordLink = url('resetpassword?token='.$encryptedStr);
                
                $subject = "SmartKYC Reset Password.";
                $templateBlade = "emails.forgotpassword";
                
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
            
                $recipient = ['name' => $adminName, 'email' => $adminEmail];
                
                $bladeData = [
                    'name' => ucwords($adminName),
                    'customerEmail' => $adminEmail,
                    'passwordLink' => $resetPasswordLink
                ];
                
                $result = $this->MYSMTP($smtpDetails, $recipient, $subject, $templateBlade, $bladeData);


                $postBackData = array();
                $postBackData["email"] = $email;
                $postBackData["link"] = $resetPasswordLink;
                $postBackData["success"] = 1;
                
                $response = array(
                    "C" => 100,
                    "R" => $postBackData,
                    "M" => "A password reset link has been sent to your email."
                );

            }else{
                $postBackData = array();
                $postBackData["email"] = $email;
                $postBackData["success"] = 0;
                
                $response = array(
                    "C" => 102,
                    "R" => $postBackData,
                    "M" => "The entered email is not associated with us."
                );
        
            }
            
            return response()->json($response); die;

        }else{
            
            $data = array();
            $data["pageTitle"] = "Forgot Password";
            return View("forgotpassword",$data);
        }
    }

    function resetpassword(Request $request){
        if($request->isMethod('post')) {
            
            //process post data
            $token = $request->input("linktoken");
            $password = $request->input("password");
            $re_password = $request->input("re_password");
            $password = md5($password);

            $encryptedString = $token;
            $enckey = env('MY_ENCRYPTION_KEY');
            $decStr = $this->decrypt($encryptedString, $enckey);
            
            $delimiter = '#dkg#';

            // Exploding the string with the custom delimiter
            $parts = explode($delimiter, $decStr);
            //echo '<pre>'; print_r($parts); die;

            $currentDateTime = date("Y-m-d H:i:s");
            $adminId = $parts[0];
            $sentDateTime = $parts[1];
            $email = $parts[2];

            $date1 = Carbon::parse($sentDateTime); // First datetime
            $date2 = Carbon::parse($currentDateTime); // Second datetime

            // Get the difference in minutes
            $diffInMinutes = $date1->diffInMinutes($date2);

            if($diffInMinutes < 15){
                
                $updateData = array(
                    "updateDateTime" => $currentDateTime,
                    "password" => $password,
                    "linkExpired" => 1
                );

                Admin_model::where('id', $adminId)->where('email', $email)->update($updateData);
                $postBackData = array();
                $postBackData["success"] = 1;
                
                $response = array(
                    "C" => 100,
                    "R" => $postBackData,
                    "M" => "Your password has been successfully updated."
                );

            }else{
                $postBackData = array();
                $postBackData["success"] = 0;
                
                $response = array(
                    "C" => 102,
                    "R" => $postBackData,
                    "M" => "Something went wrong. Please try again."
                );

            }
            
            return response()->json($response); die;

        }else{
            
            $token = $request->input('token');
            if($token){
                
                $encryptedString = $token;
                $enckey = env('MY_ENCRYPTION_KEY');
                $decStr = $this->decrypt($encryptedString, $enckey);
                
                $delimiter = '#dkg#';

                // Exploding the string with the custom delimiter
                $parts = explode($delimiter, $decStr);
                //echo '<pre>'; print_r($parts); die;

                $currentDateTime = date("Y-m-d H:i:s");
                $adminId = $parts[0];
                $sentDateTime = $parts[1];
                $email = $parts[2];

                $date1 = Carbon::parse($sentDateTime); // First datetime
                $date2 = Carbon::parse($currentDateTime); // Second datetime

                // Get the difference in minutes
                $diffInMinutes = $date1->diffInMinutes($date2);
                
                if($diffInMinutes >= 15){
                    // link expired
                    return View("page404", array("url" => url()));
                }else{

                    $adminObj = Admin_model::where('id', $adminId)->where('email', $email)->first();
                    $linkExpired = $adminObj->linkExpired;

                    if($linkExpired > 0){
                        return View("page404", array("url" => url()));
                    }else{
                        $data = array();
                        $data["pageTitle"] = "New Password";
                        $data["token"] = $token;
                        return View("resetpassword",$data);
                    }
                
                }

            }else{
                
                return View("page404", array("url" => url()));
            }
            
        }
    }

    function logout(Request $request){

    }
}
