<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Terms extends Controller
{
    function __construct(){   
        parent::__construct();
    }

    function termsofservice(Request $request){
        $data = array();
        $data["pageTitle"] = "Terms and Conditions";
        return View("termsofservice",$data);
    }

    function privacypolicy(Request $request){
        $data = array();
        $data["pageTitle"] = "Privacy Policy";
        return View("privacypolicy",$data);
    }
    
}