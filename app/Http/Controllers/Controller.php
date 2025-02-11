<?php

namespace App\Http\Controllers;

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

        $adminId = $this->getSession('adminId');
        $portalId = $this->getSession('portalId');
        $customerId = $this->getSession('customerId');
        $customerEmail= $this->getSession('customerEmail');
        $customerFname = $this->getSession('customerFname');
        $customerLname = $this->getSession('customerLname');

        view()->share('LOGINUSER',array(
            "adminId" => $adminId,
            "portalId" => $portalId,
            "customerId" => $customerId,
            "customerEmail" => $customerEmail,
            "customerFname" => $customerFname,
            "customerLname" => $customerLname
        ));
        
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
