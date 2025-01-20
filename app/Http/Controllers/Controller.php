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
        
        //$tmpAdminName = $this->getSession('adminName');
        //$tmpAdminEmail = $this->getSession('adminEmail');

        //view()->share('LOGINUSER',array("name" => $tmpAdminName, "email" => $tmpAdminEmail));
        
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
