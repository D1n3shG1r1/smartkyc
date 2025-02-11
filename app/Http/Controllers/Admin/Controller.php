<?php

namespace App\Http\Controllers\Admin;

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
        
        $tmpAdminId = $this->getSession('adminId');
        $tmpAdminFName = $this->getSession('adminFName');
        $tmpAdminLName = $this->getSession('adminLName');
        $tmpAdminEmail = $this->getSession('adminEmail');
        
        view()->share('LOGINUSER',array("adminId" => $tmpAdminId, "fname" => $tmpAdminFName, "lname" => $tmpAdminLName,"email" => $tmpAdminEmail));
        
    }

    function setSession($key, $value){
        $session = new Session_N();
        $session->set($key, $value);
    }
    
    function getSession($key){
        $session = new Session_N();
        return $session->get($key);
    }

    function removeSession(){
        $session = new Session_N();
        $session->remove('adminId');
    }
}
