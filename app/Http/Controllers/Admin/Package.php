<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use App\Models\Admin_model;
use App\Models\Packagepayments_model;
use App\Models\Package_model;
use Carbon\Carbon;

class Package extends Controller
{
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
            
            //echo '<pre>'; print_r($adminObj); die;
            $data = array();
            $data["pageTitle"] = "My Package";
            
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
                //Package_model::
                Package_model::upsert(
                    [
                        [
                            'adminId' => $adminId,
                            'package' => $package,
                            'active' => 0,
                            'starton' => null,
                            'expireon' => null,
                            'expired' => 1,
                            'createDateTime' =>  $createDateTime, 
                            'updateDateTime' => $updateDateTime
                        ],
                    ],
                    ['adminId'], // Unique column
                    ['package'] // Columns to update if duplicate email exists
                );
                //initiate transaction
                //get package amount from config
                $packageAmount = config('custom.packagePricing.'.$package);
                
                //$endpoint = "https://api.paystack.co/transaction/initialize";
                $endpoint = config('custom.paystack.transInitialize');

                //get paystack credentials
                $SECRET_KEY = "sk_test_6f5c37e50bc827af2a06a0916288ac127c7c88d5";
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
                echo "<pre>"; print_r($initiateResult); die;
                if($initiateResult["status"] == 1){
                    //redirect to payment page
                   // $initiateResult["data"];
                    
                    
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
                echo "invalid package"; die;
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
        
        $trxref = $request->input("trxref");
        $reference = $request->input("reference");
        
        //$trxref = "1739081877345892";
        //$reference = "1739081877345892";
        
        $SECRET_KEY = "sk_test_48f9c1d23041e406b620438391c682afbe66cfbb";
        $endpoint = config('custom.paystack.transVerify') . $reference;
    
        $endpoint = "https://api.paystack.co/transaction/verify/1739081877345892";
        $endpoint = "https://api.paystack.co/transaction/verify/1739086270975738";
        
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
            /*
            $date = new DateTime('2025-02-09T07:31:58.000Z'); // Create DateTime object
            $date->setTimezone(new DateTimeZone('Asia/Kolkata')); // Set your desired timezone

            // Format the date as needed
            $formattedDate = $date->format('Y-m-d H:i:s'); // Example format
            echo "formattedDate:".$formattedDate; die;
            */
            

            $paidAt = Carbon::parse($paid_at)
                ->setTimezone('Asia/Kolkata')
                ->format('Y-m-d H:i:s');

            //echo "formattedDate:".$paidAt; die;
            
            //packagepayments//
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
            $paymentObj->save();



        }else{

        }
    }

    function cancel(Request $request){
        dd($request);
    
        //insert into `packagepayments` (`id`, `gatewayTransId`, `transactionId`, `adminId`, `package`, `amount`, `currency`, `status`, `payment`, `paid_at`, `gatewayResponse`, `createDateTime`, `updateDateTime`) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
    }
}
