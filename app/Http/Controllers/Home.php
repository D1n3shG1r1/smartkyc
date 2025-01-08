<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class Home extends Controller
{
    
    function __construct(){   
        parent::__construct();
    }
    
    function homepage(Request $request){
        $data = array();
        $data["pageTitle"] = "About us";
        return View("home",$data);
    }
}
