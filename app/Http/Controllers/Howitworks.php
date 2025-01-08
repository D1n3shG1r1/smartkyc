<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class Howitworks extends Controller
{
    
    function __construct(){   
        parent::__construct();
    }
    
    function howitworks(Request $request){
        $data = array();
        $data["pageTitle"] = "How It Works";
        return View("howitworks",$data);
    }
}
