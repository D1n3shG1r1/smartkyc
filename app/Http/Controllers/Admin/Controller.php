<?php

namespace App\Http\Controllers\Admin;
use App\Models\Package_model;
use App\Models\Admin_model;
use App\Models\Notifications_model;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Session\Session as Session_N;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    function __construct(){

        getSetClientTimezone(get_client_ip());
        
        $tmpSystemAdmin = $this->getSession('systemAdmin');
        $tmpAdminId = $this->getSession('adminId');
        $tmpAdminFName = $this->getSession('adminFName');
        $tmpAdminLName = $this->getSession('adminLName');
        $tmpAdminEmail = $this->getSession('adminEmail');

        if($tmpSystemAdmin > 0){
            //system admin
            $hasPackage = 1;
            $incompleteProfile = 0;

            // Get applicant new notifications
            $notificationCount = Notifications_model::where("receiver", $tmpSystemAdmin)->where("isRead", 0)->count();

        }else{
            //admin
            // Get applicant new notifications
            $notificationCount = Notifications_model::where("receiver", $tmpAdminId)->where("isRead", 0)->count();

            //get current package and profile details
            $adminObj = Admin_model::select("fname", "lname", "address_1", "address_2", "city", "state", "country", "zipcode", "phone", "email", "company", "website")->where("id", $tmpAdminId)->first();            
            
            if($adminObj){
                $adminData = $adminObj->toArray();
                if (
                    empty($adminData["fname"]) ||
                    empty($adminData["lname"]) ||
                    empty($adminData["email"]) ||
                    empty($adminData["phone"]) ||
                    empty($adminData["address_1"]) ||
                    empty($adminData["address_2"]) ||
                    empty($adminData["city"]) ||
                    empty($adminData["country"])
                    
                ) {
                    $incompleteProfile = 1;
                } else {
                    $incompleteProfile = 0;
                }
                
        
                $packageRow = Package_model::where("adminId", $tmpAdminId)->first();
                $hasPackage = 0;
                if($packageRow){
                    
                    $packageRow = $packageRow->toArray();
                    
                    if($packageRow["active"] == 0 || $packageRow["expired"] == 1){
                        $hasPackage = 0;
                    }else{
                        $hasPackage = 1;
                    }
                
                }else{
                    $hasPackage = 0;
                }
            }else{

                $tmpAdminId = 0;
                $tmpAdminFName = "";
                $tmpAdminLName = "";
                $tmpAdminEmail = "";
                $hasPackage = 0;
                $incompleteProfile = 0;
                $notificationCount = 0;
            
            }
        }


        view()->share('LOGINUSER',array("systemAdmin" => $tmpSystemAdmin, "adminId" => $tmpAdminId, "fname" => $tmpAdminFName, "lname" => $tmpAdminLName,"email" => $tmpAdminEmail,"hasPackage" => $hasPackage, "incompleteProfile" => $incompleteProfile,"notifiationCount" => $notificationCount));
        
    }

    function setSession($key, $value){
        $session = new Session_N();
        $session->set($key, $value);
    }
    
    function getSession($key){
        $session = new Session_N();
        return $session->get($key);
    }

    function removeSession($key){
        $session = new Session_N();
        $session->remove($key);
    }
}
