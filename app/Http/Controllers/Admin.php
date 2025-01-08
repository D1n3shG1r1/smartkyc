<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Admin extends Controller
{
    //login
    //registeration
    //id, name, email, password, createdatetime, updatedatetime
    //profile- company, phone, email, address,
    //buy plan
    //upload verify document
    //reports

    function __construct(){   
        parent::__construct();
    }
    
    function register(Request $request){
        $data = array();
        $data["pageTitle"] = "Create Account";
        return View("register",$data);
    }

}
