<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class Services extends Controller
{
    function __construct(){   
        parent::__construct();
    }
    
    function services(Request $request){
        $data = array();
        $data["pageTitle"] = "Services";
        return View("services",$data);
    }
}
