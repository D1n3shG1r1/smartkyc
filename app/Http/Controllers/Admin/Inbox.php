<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Models\customerInbox_model;

class Inbox extends Controller
{   
    
    var $ADMINID = 0;
    
    function __construct(){   
        parent::__construct();
        $this->ADMINID = $this->getSession('adminId');
    }

    function notifications(Request $request){
        if($this->ADMINID > 0){
            $adminId = $this->ADMINID;
            $portalId = sha1($this->ADMINID);

            $notificationsData = customerInbox_model::where("receiver", $adminId)->orderBy('dateTime', 'desc')->paginate(10);

            $notifications = array();
            if($notificationsData){
                $notifications = $notificationsData->toArray();
            }

            $data = array();
            $data["pageTitle"] = "Inbox";
            $data["notifications"] = $notifications;

            //echo "data:<pre>"; print_r($data); die;

            return View("admin.inbox",$data);

        }else{
            //redirect to login
            return Redirect::to(url('login'));   
        }
    }

}
