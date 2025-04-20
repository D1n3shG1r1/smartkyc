<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Admin_model;
use App\Models\Packagepayments_model;
use App\Models\Package_model;
use App\Models\SuperAdmin_model;
use Carbon\Carbon;
use App\Traits\SmtpConfigTrait;

class Package extends Controller
{
    use SmtpConfigTrait;
    var $ADMINID = 0;
    
    function __construct(){   
        parent::__construct();
        $this->ADMINID = $this->getSession('adminId');
    }

    function plans(Request $request){
        if($this->ADMINID > 0){
            
            $adminId = $this->ADMINID;
            $adminObj = Admin_model::where('id', $adminId)->first()->toArray();
            
            unset($adminObj["password"]);
            unset($adminObj["createDateTime"]);
            unset($adminObj["updateDateTime"]);
            
            $packageRow = Package_model::where("adminId", $adminId)->first();
            if($packageRow){
                $packageRow = $packageRow->toArray();
                $packageName = config('custom.packageName.'.$packageRow['package']);
                $packageRow["packageName"] = $packageName;
            }else{
                $packageRow = array();   
            }

            $data = array();
            $data["pageTitle"] = "My Package";
            $data["currentPackage"] = $packageRow;
            return View("admin.pricing",$data);
        }else{
            //redirect to login
            return Redirect::to(url('login'));
        }
    }

    function buy($package){
        if($this->ADMINID > 0){
            $adminId = $this->ADMINID;
            $packageNames = array("package-basic", "package-business", "package-enterprise", "package-payasyougo");
            
            //echo "<pre>"; print_r($packageNames); die;

            if(in_array($package, $packageNames)){
                
                $createDateTime = date("Y-m-d H:i:s");
                $updateDateTime = date("Y-m-d H:i:s"); 
                
                //initiate transaction
                //get package amount from config
                $packageAmount = config('custom.packagePricing.'.$package);
                
                //$endpoint = "https://api.paystack.co/transaction/initialize";
                $endpoint = config('custom.paystack.transInitialize');

                //get paystack credentials
                $SECRET_KEY = config('custom.paystack.secretkey');
                $SECRET_KEY = "sk_test_48f9c1d23041e406b620438391c682afbe66cfbb";
                $FName = $this->getSession('adminFName');
                $LName = $this->getSession('adminLName');
                $email = $this->getSession('adminEmail');
                $currency = "NGN";
                $refrence = db_randnumber();
                //get admin name, email
                $method = 'POST';
                $bodyContent = array();
                $bodyContent["amount"] = $packageAmount * 100; //in kobo (100-kobo = 1-Naira)
                $bodyContent["email"] = $email;
                $bodyContent["currency"] = $currency;
                $bodyContent["reference"] = $refrence;
                $bodyContent["callback_url"] = url("admin/payment/callback");
                $bodyContent["channels"] = ["card"];



                //$cartId = db_randnumber();
                
                $bodyContent["metadata"] = [
                    "adminId" => $adminId,
                    "transactionId" => $refrence,
                    "package" => $package,
                    "cancel_action" => url("admin/payment/cancel")
                ];

                $bodyContentJson = json_encode($bodyContent);

                $headers = [
                    "Authorization: Bearer $SECRET_KEY",
                    "Content-Type: application/json"
                ];
                
                /*
                $debug = 0;
                if($debug == 1){
                    $debugStrFlag = "2>&1";    
                }else{
                    $debugStrFlag = "";
                }
                
                $curlCmd = "curl --location '$endpoint' \
                --header 'Authorization: Bearer $SECRET_KEY' \
                --header 'Content-Type: application/json' \
                --data-raw '$bodyContentJson' $debugStrFlag";
                exec($curlCmd, $result);
                
                echo $curlCmd;
                echo "<br>";
                print_r($result);
                */
                
                $result = makeCurlRequest($endpoint, $method, $headers, $bodyContent, false);
                $initiateResult = json_decode($result, true);
                //echo "<pre>"; print_r($initiateResult); die;
                if($initiateResult["status"] == 1){
                    //redirect to payment page
                   // $initiateResult["data"];
                   $referenceTransId = $initiateResult["data"]["reference"];
                   $this->setSession('transactionRef',$referenceTransId);
                   $authorization_url = $initiateResult["data"]["authorization_url"];
                   return Redirect::to($authorization_url);
                   /*
                    [status] => 1
                    [message] => Authorization URL created
                    [data] => Array
                        (
                            [authorization_url] => https://checkout.paystack.com/ap0oune24i2c67b
                            [access_code] => ap0oune24i2c67b
                            [reference] => 1736615183114993-package-basic-1739009192333157
                        )
                    */
                }else{
                    //redirect to cancel page
                    return Redirect::to(url("admin/payment/cancel"));
                    /*
                    [status] => 
                    [message] => Invalid key
                    [meta] => Array
                        (
                            [nextStep] => Ensure that you provide the correct authorization key for the request
                        )
                
                    [type] => validation_error
                    [code] => invalid_Key
                    */
                }

                //http://local.smartkyc.com/payment/callback?trxref=1738946263646175&reference=1738946263646175
                /*
                $postBackData = array();
                $postBackData["success"] = 1;
                
                $response = array(
                    "C" => 100,
                    "R" => $postBackData,
                    "M" => "success"
                );*/
            }else{
                //invalid package
                return Redirect::to(url("admin/payment/cancel"));
                /*$postBackData = array();
                $postBackData["success"] = 1;
                
                $response = array(
                    "C" => 101,
                    "R" => $postBackData,
                    "M" => "invalid package"
                );*/
            }
            
        }else{
            //redirect to login
            return Redirect::to(url('login'));

            /*$postBackData = array();
            $response = array(
                "C" => 1004,
                "R" => $postBackData,
                "M" => "session expired."
            );
            */
        }


    }

    function payment(Request $request){
        //http://local.smartkyc.com/admin/payment/callback?trxref=1739081877345892&reference=1739081877345892
        //http://local.smartkyc.com/admin/payment/callback?trxref=1739376484319659&reference=1739376484319659
        
        $trxref = $request->input("trxref");
        $reference = $request->input("reference");
        $transactionRef = $this->getSession('transactionRef');
        
        if($transactionRef == $reference){
            
            $this->removeSession('transactionRef');
            
            //$SECRET_KEY = config('custom.paystack.secretkey');
            $SECRET_KEY = "sk_test_48f9c1d23041e406b620438391c682afbe66cfbb";
            $endpoint = config('custom.paystack.transVerify') . $reference;
        
            //$endpoint = "https://api.paystack.co/transaction/verify/1739081877345892";
            
            //verify transaction
            $method = 'GET';
            
            $headers = [
                "Authorization: Bearer $SECRET_KEY",
                "Content-Type: application/json"
            ];
            
            $bodyContent = null;
            $returnAsArray = false;

            $result = makeCurlRequest($endpoint, $method, $headers, $bodyContent, $returnAsArray);
            $verifyResult = json_decode($result, true);        
            //echo "<pre>"; print_r($verifyResult); die;
            if($verifyResult["status"] == 1){
                $verifyData = $verifyResult["data"];
                $status = $verifyData["status"]; //success
                
                if($status == "success"){
                    //payment success
                    $gatewayTransId = $verifyData["id"];
                    $referenceId = $verifyData["reference"];
                    $amount = $verifyData["amount"];
                    $currency = $verifyData["currency"];
                    $paid_at = $verifyData["paid_at"];
                    $metadata = $verifyData["metadata"];
                    $adminId = $metadata["adminId"];
                    $transactionId = $metadata["transactionId"];
                    $package = $metadata["package"];
                    $cancel_action = $metadata["cancel_action"];
                    
                    $createDateTime = date("Y-m-d H:i:s");
                    $updateDateTime = date("Y-m-d H:i:s");

                    //save transaction
                    $timezone = Carbon::now()->timezoneName;
                    $paidAt = Carbon::parse($paid_at)
                        ->setTimezone($timezone)
                        ->format('Y-m-d H:i:s');

                    //packagepayments//
                    $row = Packagepayments_model::where("id", $transactionId)->where("adminId", $adminId)->first();
                    if($row){
                        $row = $row->toArray();
                        //invalid link or link is expired
                        //payment failed
                        return Redirect::to(url("admin/payment/cancel"));
                    }else{
                        //save transaction
                        $paymentObj = new Packagepayments_model();
                        $paymentObj->id = $transactionId;
                        $paymentObj->gatewayTransId = $gatewayTransId;
                        $paymentObj->transactionId = $transactionId;
                        $paymentObj->adminId = $adminId;
                        $paymentObj->package = $package;
                        $paymentObj->amount = $amount;
                        $paymentObj->currency = $currency;
                        $paymentObj->status = $status;
                        $paymentObj->payment = 'y';
                        $paymentObj->paid_at = $paidAt;
                        $paymentObj->gatewayResponse =  json_encode($verifyResult);
                        $paymentObj->createDateTime = $createDateTime;
                        $paymentObj->updateDateTime = $updateDateTime;
                        $paymentSave = $paymentObj->save();    
                    
                        if($paymentSave){
                            
                            //update package
                            $newDateTime = Carbon::now()->addMonth();
                            $startOn = date("Y-m-d");
                            $expireOn = date("Y-m-d", strtotime($newDateTime));
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
                            
                        }

                        $data = array();
                        $data["pageTitle"] = "Payment Success";
                        return View("admin.paymentsuccess",$data);
                    
                    }
                }else{
                    //payment abandoned or failed
                    $gatewayTransId = $verifyData["id"];
                    $referenceId = $verifyData["reference"];
                    $amount = $verifyData["amount"];
                    $currency = $verifyData["currency"];
                    $paid_at = null;
                    $metadata = $verifyData["metadata"];
                    $adminId = $metadata["adminId"];
                    $transactionId = $metadata["transactionId"];
                    $package = $metadata["package"];
                    $cancel_action = $metadata["cancel_action"];
                    
                    $createDateTime = date("Y-m-d H:i:s");
                    $updateDateTime = date("Y-m-d H:i:s");

                    //save transaction
                    $timezone = Carbon::now()->timezoneName;
                    $paidAt = Carbon::parse($paid_at)
                        ->setTimezone($timezone)
                        ->format('Y-m-d H:i:s');

                    //save transaction
                    $paymentObj = new Packagepayments_model();
                    $paymentObj->id = $transactionId;
                    $paymentObj->gatewayTransId = $gatewayTransId;
                    $paymentObj->transactionId = $transactionId;
                    $paymentObj->adminId = $adminId;
                    $paymentObj->package = $package;
                    $paymentObj->amount = $amount;
                    $paymentObj->currency = $currency;
                    $paymentObj->status = $status;
                    $paymentObj->payment = 'n';
                    $paymentObj->paid_at = $paidAt;
                    $paymentObj->gatewayResponse =  json_encode($verifyResult);
                    $paymentObj->createDateTime = $createDateTime;
                    $paymentObj->updateDateTime = $updateDateTime;
                    $paymentSave = $paymentObj->save();    
                
                    return Redirect::to(url("admin/payment/cancel"));
                }
                
            }else{
                //payment failed
                return Redirect::to(url("admin/payment/cancel"));
            }
        }else{
            //payment failed
            return Redirect::to(url("admin/payment/cancel"));
        }
        
    }

    function cancel(Request $request){
        $data = array();
        $data["pageTitle"] = "Payment Failed";
        return View("admin.paymentfail",$data);
    }

    function savequote(Request $request){
        
        if($this->ADMINID > 0){
            
            $message = $request->input("message");
            
            $adminId = $this->ADMINID;
            $adminEmail = $this->getSession('adminEmail');
            $adminFName = $this->getSession('adminFName');
            $adminLName = $this->getSession('adminLName');
            $fullName = $adminFName.' '.$adminLName;
            
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
            $smtpDetails['encryption'] = "";
            $smtpDetails['from_email'] = $from_email;
            $smtpDetails['from_name'] = $from_name;
            $smtpDetails['replyTo_email'] = $replyTo_email;
            $smtpDetails['replyTo_name'] = $replyTo_name;
        
            //Email
            $toEmail = $sysAdm["email"]; //"support@smartverify.com.ng";
            $toName = ucwords($sysAdm["fname"] ." ". $sysAdm["lname"]);//"Can Namho"; //;
            $subject = "Enterprise Plan - Quotation Request";
            $templateBlade = "emails.enterpriseplanrequest";

            $recipient = ['name' => $toName, 'email' => $toEmail];
            
            $bladeData = [
                'name' => $toName,
                'customerName' => $fullName,
                'customerEmail' => $adminEmail,
                'packageName' => 'Enterprise Plan',
                'additionalMessage' => $message 
            ];
            
            $result = $this->MYSMTP($smtpDetails, $recipient, $subject, $templateBlade, $bladeData);

            //dd($result);
            
            $postBackData = array();
            $postBackData["success"] = 1;
            
            $response = array(
                "C" => 100,
                "R" => $postBackData,
                "M" => "Your request has been submitted. We will contact you shortly."
            );
            
        }else{
            $postBackData = array();
            $postBackData["success"] = 0;
            $response = array(
                "C" => 1004,
                "R" => $postBackData,
                "M" => "session expired."
            );
        }

        return response()->json($response); die;       
        
    }
}
