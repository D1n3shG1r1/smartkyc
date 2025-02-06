<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use App\Models\Admin_model;


class Package extends Controller
{
    var $ADMINID = 0;
    
    function __construct(){   
        parent::__construct();
        $this->ADMINID = $this->getSession('adminId');
    }

    function plans(Request $request){
        if($this->ADMINID > 0){
            $adminId = $this->ADMINID;
            $adminObj = Admin_model::where('id', $adminId)->first()->toArray();
            
            unset($adminObj["password"]);
            unset($adminObj["createDateTime"]);
            unset($adminObj["updateDateTime"]);
            
            //echo '<pre>'; print_r($adminObj); die;
            $data = array();
            $data["pageTitle"] = "My Package";
            
            return View("admin.pricing",$data);
        }else{
            //redirect to login
            return Redirect::to(url('login'));
        }
    }
}
