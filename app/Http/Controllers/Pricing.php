<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class Pricing extends Controller
{
    function __construct(){   
        parent::__construct();
    }
    
    function pricing(Request $request){
        $data = array();
        $data["pageTitle"] = "Pricing";
        return View("pricing",$data);
    }
}
