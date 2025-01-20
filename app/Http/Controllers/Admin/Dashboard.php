<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class Dashboard extends Controller
{
 
    
    var $ADMINID = 0;
    
    function __construct(){   
        parent::__construct();
        $this->ADMINID = $this->getSession('adminId');
    }

    function dashboard(Request $request){
        
        if($this->ADMINID > 0){
            $data = array();
            $data["pageTitle"] = "Dashboard";
            return View("admin.dashboard",$data);
        }else{
            //redirect to login
            return Redirect::to(url('login'));
        }
    }

    function profile(Request $request){
        if($this->ADMINID > 0){

        }else{
            //redirect to login
            return Redirect::to(url('login'));
        }
    }

}
