<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class Faq extends Controller
{
    function __construct(){   
        parent::__construct();
    }
    
    function faq(Request $request){
        $data = array();
        $data["pageTitle"] = "Faq";
        return View("faq",$data);
    }
}
