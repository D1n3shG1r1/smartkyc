<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use App\Models\Admin_model;
use App\Models\Package_model;
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
            /*
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
            */
            return Redirect::to(url('/admin/admin-customers'));
        }else{
            //redirect to login
            return Redirect::to(url('login'));
        }
    }

    function profile(Request $request){

    }

    function customers(Request $request){
        if($this->ADMINID > 0){
            $adminId = $this->ADMINID;
            
            $email = $request->input("email");

            $customersObj = Admin_model::select("id","fname","lname","email","phone","address_1","address_2","city","state","country","zipcode","company","website")->paginate(10);
            
            // Add dynamic filters based on your conditions (like email or fname)
            if (!empty($email)) {
                $customersObj->where('email', $email);
            }

            $customers = array();
            if($customersObj){
                $customers = $customersObj->toArray();
            }
            
            $data = array();
            $data["pageTitle"] = "My Customers";
            $data["customers"] = $customers;
            
            return View("admin.admin-customers",$data);

        }else{
            //redirect to login
            return Redirect::to(url('login'));
        }
    }

    function customer($id){
        if($this->ADMINID > 0){
            $adminId = $this->ADMINID;
            if (!$id) {
                // Return a 404 response if no portalId is provided
                abort(404, 'Page not found');
            }

            $customerObj = Admin_model::where("id", $id)->get()->first();
            if(!$customerObj){
                abort(404, 'Page not found');
            }
            
            $customer = $customerObj->toArray();
            
            $packageObj = Package_model::where("adminId", $customer["id"])->get()->first();
            if($packageObj){
                $package =$packageObj->toArray();
            }else{
                $package["package"] = "";
                $package["starton"] = "";
                $package["expireon"] = "";
            }

            $data = array();
            $data["pageTitle"] = "Customer";
            $data["customer"] = $customer;
            $data["package"] = $package;
            return View("admin.admin-customerDetail",$data);

        }else{
            //redirect to login
            return Redirect::to(url('login'));
        }
    }

    function updatepackage(Request $request){
        if($this->ADMINID > 0){
            $adminId = $request->input("adminId");
            $package = $request->input("package");
            $startOn = $request->input("starton");
            $expireOn = $request->input("expire");
            
            $createDateTime = date("Y-m-d H:i:s");
            $updateDateTime = date("Y-m-d H:i:s");
            
            $packageLimitArr = config('custom.packageLimit');
            $documentLimit = $packageLimitArr[$package];
            $documentVerified = 0;
            Package_model::upsert(
                [
                    [
                        'adminId' => $adminId,
                        'package' => $package,
                        'active' => 1,
                        'starton' => $startOn,
                        'expireon' => $expireOn,
                        'expired' => 0,
                        'documentsVerifyLimit' => $documentLimit,
                        'documentsVerified' => $documentVerified,
                        'createDateTime' =>  $createDateTime, 
                        'updateDateTime' => $updateDateTime
                    ],
                ],
                ['adminId'], // Unique column
                ['package','active', 'starton', 'expireon', 'expired', 'documentsVerifyLimit', 'documentsVerified', 'updateDateTime'] // Columns to update if duplicate email exists
            );
        

            $postBackData["success"] = 1;
            $response = array(
                "C" => 100,
                "R" => $postBackData,
                "M" => "Package details have been updated successfully!"
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

    function settings(Request $request){
        if($this->ADMINID > 0){
            
            $adminId = $this->ADMINID;
            $settings = SuperAdmin_model::select("paystack", "smtp")->where("id",$adminId)->first()->toArray();
            
            //echo "settings:<pre>"; print_r($settings); die;

            $data = array();
            $data["pageTitle"] = "Settings";
            $data["paystack"] = json_decode($settings["paystack"], true);
            $data["smtp"] = json_decode($settings["smtp"], true);
            
            //echo "settings:<pre>"; print_r($data); die;
            return View("admin.admin-settings",$data);

        }else{
            //redirect to login
            return Redirect::to(url('login'));
        }
    }

    function savepaymentsettings(Request $request){
        if($this->ADMINID > 0){
            
            $secretkey = $request->input("secretkey");
            $publickey = $request->input("publickey");
            
            $adminId = $this->ADMINID;
           
            $postBackData = array();
            
            //test api keys
            $method = 'GET';
            
            $headers = [
                "Authorization: Bearer $secretkey",
                "Content-Type: application/json"
            ];
            
            $bodyContent = null;
            $returnAsArray = false;
            
            $endpoint = config('custom.paystack.paySessTime');
            $result = makeCurlRequest($endpoint, $method, $headers, $bodyContent, $returnAsArray);
            $result = json_decode($result, true); 
            
            if($result["status"] == true){
                $updateData = array();
                $updateData["paystack"] = json_encode(array("secretkey" => $secretkey, "publickey" => $publickey));
                $update = SuperAdmin_model::where("id", $adminId)->update($updateData);    
                
                $postBackData["success"] = 1;
                $postBackData["apiresponse"] = $result;
                $response = array(
                    "C" => 100,
                    "R" => $postBackData,
                    "M" => "Your keys have been passed."
                );

            }else{
                //invalid keys
                
                $postBackData["success"] = 0;
                $postBackData["apiresponse"] = $result;
                $response = array(
                    "C" => 101,
                    "R" => $postBackData,
                    "M" => "Ensure that you provide the correct authorization key for the request."
                );
            }
            
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

    function saveemailsettings(Request $request){
        if($this->ADMINID > 0){
            
            $host = $request->input("host");
            $port = $request->input("port");
            $username = $request->input("username");
            $password = $request->input("password");
            $encryption = $request->input("encryption");
            $from_email = $request->input("from_email");
            $from_name = $request->input("from_name");
            $replyTo_email = $request->input("replyTo_email");
            $replyTo_name = $request->input("replyTo_name");            
            
            $adminId = $this->ADMINID;
            
            $postBackData = array();

            $updateData = array();
            $updateData["smtp"] = json_encode(
                                        array(
                                            "host" => $host,
                                            "port" => $port,
                                            "username" => $username,
                                            "password" => $password,
                                            "encryption" => $encryption,
                                            "from_email" => $from_email,
                                            "from_name" => $from_name,   
                                            "replyTo_email" => $replyTo_email,
                                            "replyTo_name" => $replyTo_name
                                        )
                                    );

            $update = SuperAdmin_model::where("id", $adminId)->update($updateData);    
            
            $postBackData["success"] = 1;
            $response = array(
                "C" => 100,
                "R" => $postBackData,
                "M" => "Your SMTP settings have been saved successfully."
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

}