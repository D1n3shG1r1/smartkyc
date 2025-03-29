@extends("app")
@section("contentbox")
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>My Settings</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="white_shd full margin_bottom_30">
                    <div class="full graph_head">
                        <div class="heading1 margin_0">
                        <div class="tab-content" id="v-pills-tabContent">
                        <h2 id="form-title-payment" class="form-title">Paystack Settings</h2>
                        <h2 id="form-title-email" class="form-title hideMe">Email SMTP Settings</h2>
                        </div>
                        </div>
                    </div>
                    <div class="full inner_elements">
                        <div class="row">
                        <div class="col-md-12">
                            <div class="tab_style3">
                                <div class="tabbar padding_infor_info">
                                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link active show" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true" data-title="form-title-payment" onclick="toggleTitle(this)">Payment</a>
                                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false" data-title="form-title-email" onclick="toggleTitle(this)">Email</a>
                                    </div>
                                    <div class="tab-content" id="v-pills-tabContent">
                                    <div class="tab-pane fade active show" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                    <form class="full graph_head" id="documentForm">  
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <div class="row mb-3">
                                                        <div class="col-md-12">
                                                            <label for="title" class="form-label">Secret Key</label>
                                                            <input type="text" class="form-control" id="secretkey" name="secretkey" placeholder="Secret Key" value="{{$paystack['secretkey']}}">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-md-12">
                                                            <label for="title" class="form-label">Public Key</label>
                                                            <input type="text" class="form-control" id="publickey" name="publickey" placeholder="Public Key" value="{{$paystack['publickey']}}">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-md-12 align-right">
                                                            <label class="label_field hidden">hidden label</label>
                                                            <button type="button" id="savePayBtn" class="btn cur-p btn-primary verifyEmailBtn" onclick="savePayment(this);" data-txt="Save" data-loadingtxt="Saving...">Save</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                    <form class="full graph_head" id="documentForm">  
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <label for="title" class="form-label">Host</label>
                                                            <input type="text" class="form-control" id="host" name="host" placeholder="Host" value="{{$smtp['host']}}">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="title" class="form-label">Port</label>
                                                            <input type="text" class="form-control" id="port" name="port" placeholder="Port" value="{{$smtp['port']}}">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <label for="title" class="form-label">Username</label>
                                                            <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="{{$smtp['username']}}">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="title" class="form-label">Password</label>
                                                            <input type="text" class="form-control" id="password" name="password" placeholder="Password" value="{{$smtp['password']}}">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <label for="title" class="form-label">Encryption</label>
                                                            <input type="text" class="form-control" id="encryption" name="encryption" placeholder="Encryption" value="{{$smtp['encryption']}}">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="title" class="form-label">From Email</label>
                                                            <input type="text" class="form-control" id="from_email" name="from_email" placeholder="From Email" value="{{$smtp['from_email']}}">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row mb-3">
                                                        
                                                        <div class="col-md-6">
                                                            <label for="title" class="form-label">From Name</label>
                                                            <input type="text" class="form-control" id="from_name" name="from_name" placeholder="From Name" value="{{$smtp['from_name']}}">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="title" class="form-label">Reply To Email</label>
                                                            <input type="text" class="form-control" id="replyTo_email" name="replyTo_email" placeholder="Reply To Email" value="{{$smtp['replyTo_email']}}">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <label for="title" class="form-label">Reply To Name</label>
                                                            <input type="text" class="form-control" id="replyTo_name" name="replyTo_name" placeholder="Reply To Name" value="{{$smtp['replyTo_name']}}">
                                                        </div>
                                                        <div class="col-md-6 align-right">
                                                            <label class="form-label label_field hidden">hidden label</label>
                                                            <button type="button" id="saveSmtpBtn" class="btn cur-p btn-primary verifyEmailBtn marginTop28" onclick="saveSmtp(this);" data-txt="Save" data-loadingtxt="Saving...">Save</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push("js")
<script>
    function toggleTitle(elm){
        var elmId = $(elm).attr("data-title");
        $(".form-title").addClass("hideMe");
        $("#"+elmId).removeClass("hideMe");
    }

    function savePayment(elm){
        
        const secretkey = $("#secretkey").val();
        const publickey = $("#publickey").val();
    
        if(!isRealValue(secretkey)){
            var err = 1;
            var msg = "Please enter your secret key.";
            showToast(err,msg);
            return false;
        }

        if(!isRealValue(publickey)){
            var err = 1;
            var msg = "Please enter your public key.";
            showToast(err,msg);
            return false;
        }

        var elmId = $(elm).attr("id");
        $(elm).attr("disabled",true);
        var orgTxt = $(elm).attr("data-txt");
        var loadingTxt = $(elm).attr("data-loadingtxt");
        showLoader(elmId,loadingTxt); 

        var requrl = "admin/savepaymentsettings";
        var postdata = {
            "secretkey":secretkey,
            "publickey":publickey
        };
        
        callajax(requrl, postdata, function(resp){
            $(elm).removeAttr("disabled");
            hideLoader(elmId,orgTxt);
            if(resp.C == 100){
                var err = 0;
                var msg = resp.M;
                showToast(err,msg);
            }else if(resp.C == 101){
                var err = 1;
                var msg = resp.M;
                showToast(err,msg);
            }else{
                var err = 1;
                var msg = resp.M;
                showToast(err,msg);
            }
        });
    }
    
    function saveSmtp(elm){
        
        const host = $("#host").val();
        const port = $("#port").val();
        const username = $("#username").val();
        const password = $("#password").val();
        const encryption = $("#encryption").val();
        const from_email = $("#from_email").val();
        const from_name = $("#from_name").val();
        const replyTo_email = $("#replyTo_email").val();
        const replyTo_name = $("#replyTo_name").val();
        
        if(!isRealValue(host)){
            var err = 1;
            var msg = "Please enter the SMTP host.";
            showToast(err, msg);
            return false;
        }

        if(!isRealValue(port)){
            var err = 1;
            var msg = "Please enter the SMTP port.";
            showToast(err, msg);
            return false;
        }

        if(!isRealValue(username)){
            var err = 1;
            var msg = "Please enter the SMTP username.";
            showToast(err, msg);
            return false;
        }

        if(!isRealValue(password)){
            var err = 1;
            var msg = "Please enter the SMTP password.";
            showToast(err, msg);
            return false;
        }

        if(!isRealValue(from_email)){
            var err = 1;
            var msg = "Please enter the 'from' email address.";
            showToast(err, msg);
            return false;
        }

        if(!isRealValue(from_name)){
            var err = 1;
            var msg = "Please enter the 'from' name.";
            showToast(err, msg);
            return false;
        }

        if(!isRealValue(replyTo_email)){
            var err = 1;
            var msg = "Please enter the reply-to email address.";
            showToast(err, msg);
            return false;
        }

        if(!isRealValue(replyTo_name)){
            var err = 1;
            var msg = "Please enter the reply-to name.";
            showToast(err, msg);
            return false;
        }

        var elmId = $(elm).attr("id");
        $(elm).attr("disabled",true);
        var orgTxt = $(elm).attr("data-txt");
        var loadingTxt = $(elm).attr("data-loadingtxt");
        showLoader(elmId,loadingTxt); 

        var requrl = "admin/saveemailsettings";
        var postdata = {
            "host":host,
            "port":port,
            "username":username,
            "password":password,
            "encryption":encryption,
            "from_email":from_email,
            "from_name":from_name,
            "replyTo_email":replyTo_email,
            "replyTo_name":replyTo_name
        };
        
        callajax(requrl, postdata, function(resp){
            $(elm).removeAttr("disabled");
            hideLoader(elmId,orgTxt);
            if(resp.C == 100){
                var err = 0;
                var msg = resp.M;
                showToast(err,msg);
            }else{
                var err = 1;
                var msg = resp.M;
                showToast(err,msg);
            }            
        });
            
    }

</script>
@endpush
