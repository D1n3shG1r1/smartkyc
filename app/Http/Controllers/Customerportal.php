<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\Customerportal_model;
use App\Models\Customers_model;
use App\Models\Applications_model;
use App\Models\ApplicationDocuments_model;

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
        $this->setSession('portalId', $portalId);
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
        //$adminId = $request->input('adminId');
        $email = $request->input('email');
    
        $portalObj = Customerportal_model::where("portalId", $portalId)->first()->toArray();
        $adminId = $portalObj['adminId'];
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
        //$adminId = $request->input('adminId');
        $email = $request->input('email');
        $fname = $request->input('fname');
        $lname = $request->input('lname');
        $otp = genOtp();
        $otpSentDateTime = date("Y-m-d H:i:s");
        $createDateTime = date("Y-m-d H:i:s");
        $updateDateTime = date("Y-m-d H:i:s");
    
        $portalObj = Customerportal_model::where("portalId", $portalId)->first()->toArray();
        $adminId = $portalObj['adminId'];

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
        //send email functionality
    }
    
    function login(Request $request){
        $portalId = $request->input('portalId');
        //$adminId = $request->input('adminId');
        $email = $request->input('email');
        $otp = $request->input('otp');
        
        $portalObj = Customerportal_model::where("portalId", $portalId)->first()->toArray();
        $adminId = $portalObj['adminId'];

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
                
                //$this->setSession('adminId', $adminId);
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
            //$adminId = $this->getSession('adminId');
            $portalId = $this->getSession('portalId');
            $customerId = $this->getSession('customerId');
            $customerEmail= $this->getSession('customerEmail');
            $customerFname = $this->getSession('customerFname');
            $customerLname = $this->getSession('customerLname');

            $applications = array();

            $applicationsObj = Applications_model::where("portalId",$portalId)->where("customerId",$customerId)->orderBy('createDateTime', 'desc')->paginate(10);
            
            if($applicationsObj){
                $applications = $applicationsObj->toArray();
                foreach($applications["data"] as &$row){
                    $row["verificationOutcomeTxt"] = verificationStatusTxt($row["verificationOutcome"]);
                }
            }
        
            $data = [
                'pageTitle' => 'Dashboard',
                'applications' => $applications
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
            //$adminId = $this->getSession('adminId');
            $portalId = $this->getSession('portalId');
            $customerId = $this->getSession('customerId');
            
            $customerObj = Customers_model::select("fname","lname","email","phone")
            ->where("portalId",$portalId)
            ->where("id",$customerId)
            ->first()->toArray();

            $data = array();
            $data["pageTitle"] = "New Application";
            //$data["adminId"] = $adminId;
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
        
        if($this->CUSTOMERID > 0){
        
            $applicationId = db_randnumber(); 
            $documentId = db_randnumber();
            $createDateTime = date("Y-m-d H:i:s");
            $updateDateTime = date("Y-m-d H:i:s");
            
            //$adminId = $request->input("adminId");
            $portalId = $request->input("portalId");
            $customerId = $request->input("customerId");
            $firstName = $request->input("firstName");
            $lastName = $request->input("lastName");
            $email = $request->input("email");
            $phone = $request->input("phone");
            $title = $request->input("title");
            $documentType = $request->input("documentType");
            $documentNumber = $request->input("documentNumber");
            $description = $request->input("description");
            $comments = $request->input("comments");
            $base64Image = $request->input("base64Input");
            
            if(!$comments){$comments = '';}
            $applicationObj = new Applications_model();
            $documentObj = new ApplicationDocuments_model();

            //get adminId by portalId
            $portalObj = Customerportal_model::where("portalId", $portalId)->first()->toArray();
            $adminId = $portalObj["adminId"];

            $applicationObj->id = $applicationId;
            $applicationObj->adminId = $adminId;
            $applicationObj->portalId = $portalId;
            $applicationObj->customerId = $customerId;
            $applicationObj->title = $title;
            $applicationObj->description = $description;
            $applicationObj->documentType = $documentType;
            $applicationObj->documentNo = $documentNumber;
            $applicationObj->comment = $comments;
            $applicationObj->verificationOutcome = 1;
            $applicationObj->discrepancies = 0;
            $applicationObj->verificationStatus = "pending";
            $applicationObj->createDateTime = $createDateTime;
            $applicationObj->updateDateTime = $updateDateTime;
            $appSaved = $applicationObj->save();

            if($appSaved){
                

                // Strip off the base64 prefix
                $imageData = explode(';base64,', $base64Image);
                $imageDataPart1 = $imageData[0];
                $imageDataPart1Arr = explode('/', $imageDataPart1);
                $fileExt = $imageDataPart1Arr[1];
                $imageData = $imageData[1];
                $imageName = $documentId.'.'.$fileExt; 
                // Decode the base64 string into an image
                $decodedImage = base64_decode($imageData);

                // Define the dynamic path for storing the image
                //$adminDirPath = customerDocumentsPath($adminId);
                $adminDirPath = customerDocumentsPath($adminId,$customerId,$applicationId);
                // Ensure the directory structure exists

                // Laravel will create any missing directories
                Storage::disk('local')->makeDirectory($adminDirPath);
                
                // Store the image in the appropriate folder
                Storage::disk('local')->put($adminDirPath . $imageName, $decodedImage);  // Save the image
                
                // Return the relative path of the image for further processing
                //$path = $adminDirPath . $imageName;
                //$path = userImagesDisplayPath($adminId,$imageName);

                
                $documentObj->id = $documentId;
                $documentObj->adminId = $adminId;
                $documentObj->portalId =  $portalId;
                $documentObj->applicationId = $applicationId;
                $documentObj->fileName = $imageName;
                $documentSaved = $documentObj->save();
                
                $postBackData = array();
                $postBackData["success"] = 1;

                $response = array(
                    "C" => 100,
                    "R" => $postBackData,
                    "M" => "Your application is submitted successfully."
                );
            
            }else{
                $postBackData = array();
                $postBackData["success"] = 0;

                $response = array(
                    "C" => 101,
                    "R" => $postBackData,
                    "M" => "Something went wrong. please try again."
                );
            }
            
        }else{
            $postBackData = array();
            $response = array(
                "C" => 1004,
                "R" => $postBackData,
                "M" => "session expired."
            );
        }

        return response()->json($response); die;
    
    }

    function myapplications(Request $request){
        
        if($this->CUSTOMERID > 0){
            //list applications
            $portalId = $this->getSession('portalId');
            $customerId = $this->getSession('customerId');
            //$customerEmail= $this->getSession('customerEmail');
            //$customerFname = $this->getSession('customerFname');
            //$customerLname = $this->getSession('customerLname');

            $applications = array();
            $applicationsObj = Applications_model::where("portalId",$portalId)->where("customerId",$customerId)->paginate(1);
            
            if($applicationsObj){
                $applications = $applicationsObj->toArray();
            
                foreach($applications["data"] as &$row){
                    $row["verificationOutcomeTxt"] = verificationStatusTxt($row["verificationOutcome"]);
                }
                
            }
            
            $data = [
                'pageTitle' => 'My Applications',
                'applications' => $applications
            ];
            
            return View('portal.myapplications', $data);
        }else{
            //redirect to login
            $portalId = $this->getSession('portalId');    
            return Redirect::to(url('/portallogin/'.$portalId));
        }
    }

    function application($Id){
        if($this->CUSTOMERID > 0 && $Id){
            
            ///$Id
            $applicationId = $Id;
            $portalId = $this->getSession('portalId');
            $customerId = $this->getSession('customerId');
            
            $applicationObj = Applications_model::where("portalId",$portalId)->where("customerId",$customerId)->where("id",$Id)->first();

            if($applicationObj){
                $application = $applicationObj->toArray();     
                $application["verificationOutcomeTxt"] = verificationStatusTxt($application["verificationOutcome"]);
                
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
            $data = [
                'pageTitle' => 'Application',
                'application' => $application,
                'verificationOutcomeOptions' => verificationStatusOptions(),
                'DiscrepanciesOptions' => DiscrepanciesOptions()
            ];
            
            //echo "<pre>"; print_r($data); die;

            return View('portal.applicationdetails', $data);
        }else{
            //redirect to login
            $portalId = $this->getSession('portalId');    
            return Redirect::to(url('/portallogin/'.$portalId));
        }
    }

    function myprofile(Request $request){
        
        if($this->CUSTOMERID > 0){
            $customerId = $this->CUSTOMERID; 
            $custmoerObj = Customers_model::select("id", "email", "fname", "lname", "phone", "city", "state", "country", "zipcode", "address_1", "address_2", "company", "website")
            ->where("id", $customerId)
            ->first();
            
            $customerArr = array();
            if($custmoerObj){
                $customerArr = $custmoerObj->toArray();
            }

            $data = array();
            $data["pageTitle"] = "My Profile";
            $data["user"] = $customerArr;
            return View("portal.profile",$data);
        }else{
            //redirect to login
            return Redirect::to(url('login'));
        }
    }

    function saveprofile(Request $request){
        if($this->CUSTOMERID > 0){
            $customerId = $this->CUSTOMERID; 
        
            $fname = $request->input("fname");
            $lname = $request->input("lname");
            $address_1 = $request->input("address_1");
            $address_2 = $request->input("address_2");
            $city = $request->input("city");
            $state = $request->input("state");
            $country = $request->input("country");
            $zipcode = $request->input("zipcode");
            $company = $request->input("company");
            $website = $request->input("website");
            $phone = $request->input("phone");
           
            if(!$company){$company = "";}
            if(!$website){$website = "";}

            $updateArr = array(
                "fname" => $fname,
                "lname" => $lname,
                "phone" => $phone,
                "city" => $city,
                "state" => $state,
                "country" => $country,
                "zipcode" => $zipcode,
                "address_1" => $address_1,
                "address_2" => $address_2,
                "company" => $company,
                "website" => $website
            );
            
            $custmoerObj = Customers_model::where("id", $customerId)->update($updateArr);
            $postBackData = $updateArr;
            $postBackData["success"] = 1;

            $response = array(
                "C" => 100,
                "R" => $postBackData,
                "M" => "Your profile is updated successfully."
            );
        }else{
            $postBackData = array();
            $response = array(
                "C" => 1004,
                "R" => $postBackData,
                "M" => "session expired."
            );
        }

        return response()->json($response); die;
    }

    function logout(Request $request){
        $portalId = $this->getSession('portalId');
        $this->removeSession('adminId');
        $this->removeSession('customerId');
        $this->removeSession('customerEmail');
        $this->removeSession('customerFname');
        $this->removeSession('customerLname');
        
        //redirect to login
        return Redirect::to(url("portal/login/$portalId"));
    }

}
