<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Customerportal extends Controller
{
    function index(Request $request){

        //adminId
        //Company Name
        //website
        $adminId = 123546;
        $data = array();
        $data["pageTitle"] = "Sign In";
        $data["adminId"] = $adminId;
        return View("portal.customerlogin",$data);
        
    }

    function login(Request $request){

    }

    function application(Request $request){
        $adminId = 123546;
        $data = array();
        $data["pageTitle"] = "Sign In";
        $data["adminId"] = $adminId;
        return View("portal.applicationform",$data);
        
    }
    
    function submitapplication(Request $request){

    }
}
