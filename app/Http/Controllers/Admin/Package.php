<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use App\Models\Admin_model;


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
                    "cart_id" => $refrence,
                    "cancel_action" => url("admin/payment/cancel"),
                    "custom_fields" => [
                        [
                            "display_name" => "adminId",
                            "variable_name" => "adminId",
                            "value" => $adminId
                        ],
                        [
                            "display_name" => "transactionId",
                            "variable_name" => "transactionId",
                            "value" => $refrence
                        ],
                        [
                            "display_name" => "package",
                            "variable_name" => "package",
                            "value" => $package
                        ]
                    ]
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
        $trxref = $request->input("trxref");
        $reference = $request->input("reference");
        
        $SECRET_KEY = "sk_test_48f9c1d23041e406b620438391c682afbe66cfbb";
        $endpoint = config('custom.paystack.transVerify') . $reference;
        echo 'endpoint:'.$endpoint; die;
        //paystack transVerify
        //verify transaction
        /*
        $result = makeCurlRequest($endpoint, $method, $headers, $bodyContent, false);
        $initiateResult = json_decode($result, true);        
    
        //=====
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
            "cart_id" => $refrence,
            "cancel_action" => url("admin/payment/cancel"),
            "custom_fields" => [
                [
                    "display_name" => "adminId",
                    "variable_name" => "adminId",
                    "value" => $adminId
                ],
                [
                    "display_name" => "transactionId",
                    "variable_name" => "transactionId",
                    "value" => $refrence
                ],
                [
                    "display_name" => "package",
                    "variable_name" => "package",
                    "value" => $package
                ]
            ]
        ];

        $bodyContentJson = json_encode($bodyContent);

        $headers = [
            "Authorization: Bearer $SECRET_KEY",
            "Content-Type: application/json"
        ];
        */
    
    }

    function cancel(Request $request){
        dd($request);
    }
}
