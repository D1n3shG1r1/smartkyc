<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use App\Models\Customerportal_model;
use App\Models\Customers_model;
use App\Models\Admin_model;
use App\Models\SuperAdmin_model;
use App\Models\Applications_model;
use App\Models\ApplicationDocuments_model;
use App\Models\Notifications_model;
use App\Models\customerInbox_model;
use App\Traits\SmtpConfigTrait;
use Illuminate\Validation\ValidationException;
use Hamcrest\Arrays\IsArray;
use Carbon\Carbon;

class Customerportal extends Controller
{
    use SmtpConfigTrait;
    var $CUSTOMERID = 0;
    
    function __construct(){   
        parent::__construct();
        $this->CUSTOMERID = $this->getSession('customerId');
    }

    function index($portalId, Request $request){
        if (!$portalId) {
            // Return a 404 response if no portalId is provided
            //abort(404, 'Portal ID not provided');

            if($this->CUSTOMERID > 0){
                $isLogin = 1;
            }else{
                $isLogin = 0;
            }
            $data = [
                'pageTitle' => '404 Page Not Found',
                'isLogin' => $isLogin,
            ];
            return View('portal.page404', $data);
        }
    
        $customerDetails = array("fname" => "", "lname" => "", "email" => "");
        $applicationId = $request->input('applicationtoken');
        if($applicationId){

            $applicationObj = Applications_model::where("portalId",$portalId)->where("id",$applicationId)->first();

            if($applicationObj){
                $token = $applicationId;

                //get applicant name and email
                //dd($applicationObj);
                $customerId = $applicationObj["customerId"];
                $customerDetails = Customers_model::select("fname", "lname", "email")->where('id', $customerId)->first();


            }else{
                //abort(404, 'Invalid application token');
                if($this->CUSTOMERID > 0){
                    $isLogin = 1;
                }else{
                    $isLogin = 0;
                }
                $data = [
                    'pageTitle' => '404 Page Not Found',
                    'isLogin' => $isLogin,
                ];
                return View('portal.page404', $data);
            }

        }else{
            $token = 0;
        }

        // Retrieve the portal information from the database
        $portalObj = Customerportal_model::where("portalId", $portalId)->first()->toArray();
        
        // Check if portal object exists
        if (!$portalObj) {
            // Return a 404 response if portal does not exist
            //abort(404, 'Portal not found');
            if($this->CUSTOMERID > 0){
                $isLogin = 1;
            }else{
                $isLogin = 0;
            }
            $data = [
                'pageTitle' => '404 Page Not Found',
                'isLogin' => $isLogin,
            ];
            return View('portal.page404', $data);
        }
    
        // If portal exists, proceed with additional data
        $this->setSession('portalId', $portalId);
        $adminId = $portalObj["adminId"];
        
        // Prepare data to send to the view
        $data = [
            'pageTitle' => 'Portal LogIn',
            'adminId' => $adminId,
            'portalId' => $portalId,
            'requestToken' => $token,
            'customerDetails' => $customerDetails
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
            $custmoerObj->address_1 = '';
            $custmoerObj->address_2 = '';
            $custmoerObj->city = '';
            $custmoerObj->state = '';
            $custmoerObj->country = '';
            $custmoerObj->zipcode = '';
            $custmoerObj->phone = '';
            $custmoerObj->company = '';
            $custmoerObj->website = '';
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

        if($request->isMethod('post')) {
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

                $otpCreatedAt = Carbon::parse($custmoerObj["otpSentDateTime"]);
                $now = Carbon::now();

                if ($now->diffInHours($otpCreatedAt) > 12) {
                    
                    $postBackData["success"] = 0;
                    $postBackData["timeDiff"] = $now->diffInHours($otpCreatedAt);
                    $postBackData["time"] = $now .'--'. $otpCreatedAt;
                    $response = array(
                        "C" => 103,
                        "R" => $postBackData,
                        "M" => "The OTP is expired."
                    );

                }else{

                    if($custmoerObj["otp"] == $otp){

                        //set portal session
                        $customerId = $custmoerObj["id"];
                        $customerEmail = $custmoerObj["email"];
                        $customerFname = $custmoerObj["fname"];
                        $customerLname = $custmoerObj["lname"];
                        
                        //update otp for security reason
                        //$otp = genOtp();
                        //$otpSentDateTime = date("Y-m-d H:i:s");
                        $updateDateTime = date("Y-m-d H:i:s");
                    
                        $updateArr = array(
                            //"otp" => $otp,
                            //"otpSentDateTime" => $otpSentDateTime,
                            "updateDateTime" => $updateDateTime
                        );
                
                        $saved = Customers_model::where("portalid", $portalId)->where("email", $email)->update($updateArr);
                        
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
                            "M" => "You have entered an invalid OTP."
                        );
                    }

                }
                
            }else{
                //invalid email
                $postBackData["success"] = 0;
                $response = array(
                    "C" => 102,
                    "R" => $postBackData,
                    "M" => "The email is invalid or it is not associated with our records."
                );
            }

            return response()->json($response);
        }else{
            $data = [
                'pageTitle' => 'Session Expired',
            ];
        
            return View('portal.loginsessionoutpage', $data);
        }

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
                    //$row["verificationOutcomeTxt"] = $row["verificationOutcome"];
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
            return Redirect::to(url('/portal/login'));
        }

    }
    
    function newapplication(Request $request){

        if($this->CUSTOMERID > 0){
            
            return Redirect::to(url('/portal/dashboard'));

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
            return Redirect::to(url('/portal/login'));
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
            $applicationObj->specifyDiscrepancy = '';
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
            $applicationsObj = Applications_model::where("portalId",$portalId)->where("customerId",$customerId)->orderBy('createDateTime', 'desc')->paginate(10);
            
            if($applicationsObj){
                $applications = $applicationsObj->toArray();
            
                foreach($applications["data"] as &$row){
                    $row["verificationOutcomeTxt"] = verificationStatusTxt($row["verificationOutcome"]);
                    //$row["verificationOutcomeTxt"] = $row["verificationOutcome"];
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
            return Redirect::to(url('/portal/login'));
        }
    }

    function application($Id){
        if($this->CUSTOMERID > 0 && $Id){
            
            $applicationId = $Id;
            $portalId = $this->getSession('portalId');
            $customerId = $this->getSession('customerId');

            //get customer data
            $customerObj = Customers_model::select("fname","lname","email","phone")
            ->where("portalId",$portalId)
            ->where("id",$customerId)
            ->first()->toArray();

            $customer = array();
            
            //$data["adminId"] = $adminId;
            $customer["portalId"] = $portalId;
            $customer["customerId"] = $customerId;
            $customer["fname"] = $customerObj["fname"]; 
            $customer["lname"] = $customerObj["lname"];
            $customer["email"] = $customerObj["email"];
            $customer["phone"] = $customerObj["phone"];

            if($customer["fname"] == '' || $customer["fname"] == null || $customer["lname"] == '' || $customer["lname"] == null || $customer["email"] == '' || $customer["email"] == null || $customer["phone"] == '' || $customer["phone"] == null){
                $customer["incompleteProfile"] = 1;
            }else{
                $customer["incompleteProfile"] = 0;
            }
            
            $applicationObj = Applications_model::where("portalId",$portalId)->where("customerId",$customerId)->where("id",$Id)->first();

            if($applicationObj){
                $application = $applicationObj->toArray();     
                $application["verificationOutcomeTxt"] = verificationStatusTxt($application["verificationOutcome"]);

                //$application["verificationOutcomeTxt"] = $application["verificationOutcome"];
                
                //get application documents
                $documentsObj = ApplicationDocuments_model::where("portalId",$portalId)->where("applicationId",$Id)->get();

                if($documentsObj){
                    $documents = $documentsObj->toArray();
                
                    foreach($documents as &$document){
                        
                        $adminId = $document['adminId'];
                        $fileName = $document['fileName'];
                        $adminDirPath = customerDocumentsPath($adminId,$customerId,$applicationId);
                        $filePath = $adminDirPath.$fileName;
                        $filePath = asset('storage/' . $filePath);
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
                'customer' => $customer,
                'application' => $application,
                'verificationOutcomeOptions' => verificationStatusOptions(),
                'DiscrepanciesOptions' => DiscrepanciesOptions()
            ];
            
            //echo "<pre>"; print_r($data); die;

            //$filePath = "users/1736615183114993/assets/customers/1744308570659527/applications/174439278683943/documents/1744703972686941.jpg";
            //echo asset('storage/' . $filePath); die;

            return View('portal.applicationdetails', $data);
        }else{
            //redirect to login
            $portalId = $this->getSession('portalId');    
            return Redirect::to(url('/portal/login'));
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
            $portalId = $this->getSession('portalId');    
            return Redirect::to(url('/portal/login'));
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
           
            if(!$state){$state = "";}
            if(!$zipcode){$zipcode = "";}
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
        return Redirect::to(url("portal/login"));
    }


    function notifications(Request $request){
        $portalId = $this->getSession('portalId');
        
        if($this->CUSTOMERID > 0){
            $customerId = $this->CUSTOMERID; 
            
            Notifications_model::where("receiver", $customerId)->where("isRead", 0)->update(["isRead" => 1]);


            $notificationsData = Notifications_model::where("receiver", $customerId)->orderBy('dateTime', 'desc')->paginate(10);

            $notifications = array();
            if($notificationsData){
                $notifications = $notificationsData->toArray();
            }

            $data = array();
            $data["pageTitle"] = "My Notifications";
            $data["notifications"] = $notifications;

            //echo "data:<pre>"; print_r($data); die;

            return View("portal.notifications",$data);

        }else{
            //redirect to login
            $portalId = $this->getSession('portalId');    
            return Redirect::to(url('/portal/login'));
        }
    }

    function documentrequest($token, Request $request){
        $portalId = $this->getSession('portalId');
        
        if($this->CUSTOMERID > 0){
            if($token){

                $customerId = $this->CUSTOMERID; 
                $applicationId = $token;
                
                //get customer data
                $customerObj = Customers_model::select("fname","lname","email","phone")
                ->where("portalId",$portalId)
                ->where("id",$customerId)
                ->first()->toArray();

                $customer = array();
                
                //$data["adminId"] = $adminId;
                $customer["portalId"] = $portalId;
                $customer["customerId"] = $customerId;
                $customer["fname"] = $customerObj["fname"]; 
                $customer["lname"] = $customerObj["lname"];
                $customer["email"] = $customerObj["email"];
                $customer["phone"] = $customerObj["phone"];

                if($customer["fname"] == '' || $customer["fname"] == null || $customer["lname"] == '' || $customer["lname"] == null || $customer["email"] == '' || $customer["email"] == null || $customer["phone"] == '' || $customer["phone"] == null){
                    $customer["incompleteProfile"] = 1;
                }else{
                    $customer["incompleteProfile"] = 0;
                }

                //get application data
                $applicationObj = Applications_model::where("portalId",$portalId)->where("customerId",$customerId)->where("id",$applicationId)->where("requestSubmitted",0)->first();

                if($applicationObj){
                    //load view for upload
                    
                    $application = $applicationObj->toArray();     
                    $application["verificationOutcomeTxt"] = verificationStatusTxt($application["verificationOutcome"]);
                    //$application["verificationOutcomeTxt"] = $application["verificationOutcome"];
                    
                    //get application documents
                    $documentsObj = ApplicationDocuments_model::where("portalId",$portalId)->where("applicationId",$applicationId)->get();
    
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
                        
                    
                    $application["documents"] = $documents;
                    $data = [
                        'pageTitle' => 'Application',
                        'customer' => $customer,
                        'application' => $application,
                        'verificationOutcomeOptions' => verificationStatusOptions(),
                        'DiscrepanciesOptions' => DiscrepanciesOptions()
                    ];
                    
                    //echo "<pre>"; print_r($data); die;
                    return View('portal.applicationRequestform', $data);

                }else{
                    // invalid token
                    if($this->CUSTOMERID > 0){
                        $isLogin = 1;
                    }else{
                        $isLogin = 0;
                    }
                    $data = [
                        'pageTitle' => '404 Page Not Found',
                        'isLogin' => $isLogin,
                    ];
                    return View('portal.page404', $data);
                    
                }

            }else{
                //invalid token
                //die("token missing");
                if($this->CUSTOMERID > 0){
                    $isLogin = 1;
                }else{
                    $isLogin = 0;
                }
                $data = [
                    'pageTitle' => '404 Page Not Found',
                    'isLogin' => $isLogin,
                ];
                return View('portal.page404', $data);
            }
            
        }else{
            //redirect to login
            $portalId = $this->getSession('portalId');    
            return Redirect::to(url('/portal/login'));
        }   
    }

    function submitapplicationrequest(Request $request){
        //dd($request); die;
        if($this->CUSTOMERID > 0){
            
            $documentId = db_randnumber();
            $createDateTime = date("Y-m-d H:i:s");
            $updateDateTime = date("Y-m-d H:i:s");
            
            $portalId = $request->input("portalId");
            $customerId = $request->input("customerId");
            $applicationId = $request->input("applicationId");

            //get adminId by portalId
            $portalObj = Customerportal_model::where("portalId", $portalId)->first()->toArray();
            $adminId = $portalObj["adminId"];            
            
            $firstName = $request->input("firstName");
            $lastName = $request->input("lastName");
            $email = $request->input("email");
            $phone = $request->input("phone");
            //$title = $request->input("title");
            $documentType = $request->input("documentType");
            $documentNumber = $request->input("documentNumber");
            //$description = $request->input("description");
            $comments = $request->input("comments");
            //$base64Image = $request->input("base64Input");
            
            if(!$comments){$comments = '';}
            
            if ($request->hasFile('uploadDocument')) {

                try {
                    $request->validate([
                        'uploadDocument' => 'required|array',
                        'uploadDocument.*' => 'file|max:20480'
                    ], [
                        'uploadDocument.*.max' => 'Each file must not exceed 500MB.'
                    ]);
                } catch (ValidationException $e) {
                    return response()->json([
                        "C" => 422,
                        "R" => [],
                        "M" => $e->validator->errors()->first()
                    ]);
                }
            }


            $updateData = array(
                //"title" => $title,
                //"description" => $description,
                "documentNo" => implode(",",$documentNumber),
                "comment" => $comments,
                "requestSubmitted" => 1,
                "updateDateTime" => $updateDateTime
            );
            
            $updated = Applications_model::where("id", $applicationId)->update($updateData);
            
            if($updated){

                //$documentObj = new ApplicationDocuments_model();

                if ($request->hasFile('uploadDocument')) {

                    $documentsBatch = array();
                    foreach ($request->file('uploadDocument') as $file) {

                        
                        $documentId = db_randnumber();
                        $fileName = $documentId . '.' . $file->getClientOriginalExtension();

                        // Define the dynamic path for storing the image
                        $adminDirPath = customerDocumentsPath($adminId,$customerId,$applicationId);
                        

                        // Laravel will create any missing directories
                        Storage::disk('local')->makeDirectory($adminDirPath);
                        
                        $file->storeAs($adminDirPath, $fileName, 'public');

                        $documentsBatch[] = [
                            "id" => $documentId,
                            "adminId" => $adminId,
                            "portalId" =>  $portalId,
                            "applicationId" => $applicationId,
                            "fileName" => $fileName
                        ];
                        
                    }

                    if(!empty($documentsBatch)){
                        $tagsSaved = ApplicationDocuments_model::insert($documentsBatch);
                    }
                }

                //send notification and email to Admin & Super-Admin
                $docTxtArr = array();
                
                if (is_array($documentType)) {
                    foreach($documentType as $docTyp){
                        $docTxtArr[] = documentsTypes($docTyp);
                    }
                }else{
                    $docTxtArr[] = documentsTypes($documentType);   
                }
                
                
                $documentTypeTxt = implode(",", $docTxtArr);
                $notifyMsg = "Applicant has uploaded the required documents for application $applicationId. Please review the $documentTypeTxt for verification.";

                //send to admin
                $notifyObj = new Notifications_model();
                $notifyObj->id = db_randnumber();
                $notifyObj->message = $notifyMsg;
                $notifyObj->receiver = $adminId;
                $notifyObj->sender = $customerId;
                $notifyObj->dateTime = $createDateTime;
                $notifyObj->isRead = 0;
                $notifyObj->type = "document uploaded";
                $notifyObj->reference = $applicationId;
                $notifyObj->save();

                //send to sysyetm admin
                $notifyObj = new Notifications_model();
                $notifyObj->id = db_randnumber();
                $notifyObj->message = $notifyMsg;
                $notifyObj->receiver = 1; //systemAdmin
                $notifyObj->sender = $customerId;
                $notifyObj->dateTime = $createDateTime;
                $notifyObj->isRead = 0;
                $notifyObj->type = "document uploaded";
                $notifyObj->reference = $applicationId;
                $notifyObj->save();

                // get smtp
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
                
                //send aknoledge mail to applicant
                $subject = "Acknowledgement of Document Upload Request for Application #$applicationId";
                $templateBlade = "emails.documentAknowledgement";
                $toName = ucwords($firstName . " " . $lastName);
                $toEmail = $email;
                $recipient = ['name' => $toName, 'email' => $toEmail];
                
                $bladeData = [
                    'customerName' => $toName,
                    'customerEmail' => $toEmail,
                    'applicationId' => $applicationId,
                    'documentType' => $documentTypeTxt
                ];
                
                $result = $this->MYSMTP($smtpDetails, $recipient, $subject, $templateBlade, $bladeData);


                //Send emails to admin and system-admin
                $admObj = Admin_model::select('fname', 'lname', 'email')->where('id', $adminId)->first();
                
                $adminName = ucwords($admObj["fname"] . " " . $admObj["lname"]);
                $adminEmail = $admObj["email"];
                
                $subject = "Document Upload Completed for Application #$applicationId";
                $templateBlade = "emails.documentUploadCompleted";
                
                $toName = ucwords($adminName);
                $toEmail = $adminEmail;
                $recipient = ['name' => $toName, 'email' => $toEmail];
                
                $bladeData = [
                    'adminName' => $toName,
                    'applicationId' => $applicationId,
                    'documentType' => $documentTypeTxt
                ];
                
                $result = $this->MYSMTP($smtpDetails, $recipient, $subject, $templateBlade, $bladeData);

                //save email to inbox database
                $emailHtml = View::make($templateBlade, $bladeData)->render();
                $inbox = new customerInbox_model();
                $inbox->id = db_randnumber();
                $inbox->customerId = $this->CUSTOMERID;
                $inbox->customerEmail = $email;
                $inbox->customerName = ucwords($firstName . " " . $lastName);
                $inbox->adminId = $adminId;
                $inbox->receiver = $adminId;
                $inbox->isRead = 0;
                $inbox->inbound = 1;
                $inbox->content = $emailHtml;
                $inbox->createDateTime = $createDateTime;
                $inbox->save();

                //send email to sysadmin
                $sysadmObj = SuperAdmin_model::select('id', 'fname', 'lname', 'email')->first();
                
                $sysAdminName = ucwords($sysadmObj["fname"] . " " . $sysadmObj["lname"]);
                $sysAdminEmail = $sysadmObj["email"];
                $toName = ucwords($sysAdminName);
                $toEmail = $sysAdminEmail;
                $recipient = ['name' => $toName, 'email' => $toEmail];
                
                $bladeData = [
                    'adminName' => $toName,
                    'applicationId' => $applicationId,
                    'documentType' => $documentTypeTxt
                ];
                
                $result = $this->MYSMTP($smtpDetails, $recipient, $subject, $templateBlade, $bladeData);

                //save email to inbox database
                $emailHtml = View::make($templateBlade, $bladeData)->render();
                $inbox = new customerInbox_model();
                $inbox->id = db_randnumber();
                $inbox->customerId = $this->CUSTOMERID;
                $inbox->customerEmail = $email;
                $inbox->customerName = ucwords($firstName . " " . $lastName);
                $inbox->adminId = $adminId;
                $inbox->receiver = $adminId;
                $inbox->isRead = 0;
                $inbox->inbound = 1;
                $inbox->content = $emailHtml;
                $inbox->createDateTime = $createDateTime;
                $inbox->save();


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

    function documentrequests(Request $request){
        
        $portalId = $this->getSession('portalId');
        
        if($this->CUSTOMERID > 0){
            //list applications
            $portalId = $this->getSession('portalId');
            $customerId = $this->getSession('customerId');
            //$customerEmail= $this->getSession('customerEmail');
            //$customerFname = $this->getSession('customerFname');
            //$customerLname = $this->getSession('customerLname');

            $applications = array();
            $applicationsObj = Applications_model::where("portalId",$portalId)->where("customerId",$customerId)->where("requestSubmitted",0)->orderBy('createDateTime', 'desc')->paginate(10);
            
            if($applicationsObj){
                $applications = $applicationsObj->toArray();
            
                foreach($applications["data"] as &$row){
                    $row["verificationOutcomeTxt"] = verificationStatusTxt($row["verificationOutcome"]);
                    //$row["verificationOutcomeTxt"] = $row["verificationOutcome"];
                }
                
            }
            
            $data = [
                'pageTitle' => 'My Applications',
                'applications' => $applications
            ];
            
            return View('portal.documentsrequest', $data);

        }else{
            //redirect to login
            $portalId = $this->getSession('portalId');    
            return Redirect::to(url('/portal/login'));
        }
    }
    
}
