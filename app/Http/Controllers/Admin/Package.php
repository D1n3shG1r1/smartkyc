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
                $SECRET_KEY = "sk_test_6f5c37e50bc827af2a06a0916288ac127c7c88d5";
                $SECRET_KEY = "sk_test_48f9c1d23041e406b620438391c682afbe66cfbb";
                $url = "https://api.paystack.co/transaction/initialize";
                
                //$fields = [
                //    'email' => "customer@email.com",
                //    'amount' => "20000",
                //    'callback_url' => "https://hello.pstk.xyz/callback",
                //    'metadata' => ["cancel_action" => "https://your-cancel-url.com"]
                //];
                
                
                $fields = [
                  'email' => "customer@email.com",
                  'amount' => "20000",
                  'callback_url' => url("/paymentsuccess"),
                  'metadata' => ["cancel_action" => url("/paymentcancel")]
                ];
              
                $fields_string = http_build_query($fields);
                //echo $fields_string; die;

                //Test Secret Key
                //sk_test_6f5c37e50bc827af2a06a0916288ac127c7c88d5


                //Test Public Key
                //pk_test_9c9f2bbcba370e2ecd8abbe9a19a5beb74777833
                
                /*
                //open connection
                $ch = curl_init();
                
                //set the url, number of POST vars, POST data
                curl_setopt($ch,CURLOPT_URL, $url);
                curl_setopt($ch,CURLOPT_POST, true);
                curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                  "Authorization: Bearer $SECRET_KEY",
                  "Cache-Control: no-cache",
                ));
                
                //So that curl_exec returns the contents of the cURL; rather than echoing it
                curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
                
                //execute post
                //dd($ch); die;
                $result = curl_exec($ch);
                */
                //phpinfo(); die;
                $curlCmd = "curl --location 'https://api.paystack.co/transaction/initialize' \
                --header 'Authorization: Bearer sk_test_48f9c1d23041e406b620438391c682afbe66cfbb' \
                --header 'Content-Type: application/json' \
                --data-raw '{\"email\": \"customer@email.com\", \"amount\": 500000}' 2>&1";
                exec($curlCmd, $result);



                echo $curlCmd;
                echo "<br>";
                // Debug output
                var_dump($result);
                //echo 'result:<pre>'; print_r($result);
                
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
}
