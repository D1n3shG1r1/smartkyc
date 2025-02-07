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
            $packageNames = array("package-basic", "package-business", "package-enterprise", "package-payasyougo");
            
            //echo "<pre>"; print_r($packageNames); die;

            if(in_array($package, $packageNames)){

                //get package amount

                //get admin name, email

                $bodyContent = array();
                $bodyContent["amount"] = 1000; //in kobo (100-kobo = 1-Naira)
                $bodyContent["email"] = "dinesh@example.com";
                $bodyContent["currency"] = "NGN";
                $bodyContent["reference"] = db_randnumber();
                $bodyContent["callback_url"] = url("admin/payment/callback");
                $bodyContent["channels"] = ["card"];

                $bodyContentJson = json_encode($bodyContent);


                $SECRET_KEY = "sk_test_6f5c37e50bc827af2a06a0916288ac127c7c88d5";
                $SECRET_KEY = "sk_test_48f9c1d23041e406b620438391c682afbe66cfbb";
                
                //initiate transaction
                $endpoint = "https://api.paystack.co/transaction/initialize";
                
                $debug = 0;
                if($debug == 1){
                    $debugStrFlag = "2>&1";    
                }else{
                    $debugStrFlag = "";
                }
                
                /* 
                $curlCmd = "curl --location '$endpoint' \
                --header 'Authorization: Bearer $SECRET_KEY' \
                --header 'Content-Type: application/json' \
                --data-raw '{\"email\": \"customer@email.com\", \"amount\": 500000}' $debugStrFlag";
                */
                
                $curlCmd = "curl --location '$endpoint' \
                --header 'Authorization: Bearer $SECRET_KEY' \
                --header 'Content-Type: application/json' \
                --data-raw '$bodyContentJson' $debugStrFlag";
                

                exec($curlCmd, $result);
                
                echo $curlCmd;
                echo "<br>";
                // Debug output
                //var_dump($result);
                echo 'result:<pre>'; print_r($result);
                //http://local.smartkyc.com/payment/callback?trxref=1738946263646175&reference=1738946263646175
            }else{
                //invalid package
                echo "invalid package"; die;
            }
            //package-basic
            //package-business
            //package-enterprise
            //package-payasyougo
        }else{
            //redirect to login
            return Redirect::to(url('login'));
        }
    }

    function payment(Request $request){
        dd($request);
    }
}
