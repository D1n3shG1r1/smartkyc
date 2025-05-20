@extends("app")
@section("contentbox")
<style>
.keyContainer{
    display:none;    
}

.keyoutput{
    width: 100%;
    position: relative;
    padding: .75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: .25rem;
}
</style>
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
                            <h2 id="form-title-accesskey" class="form-title">Special Access Key</h2>
                            <h2 id="form-title-payment" class="form-title hideMe">Paystack Settings</h2>
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
                                    <a class="nav-link active show" id="v-pills-accesskey-tab" data-toggle="pill" href="#v-pills-accesskey" role="tab" aria-controls="v-pills-accesskey" aria-selected="true" data-title="form-title-accesskey" onclick="toggleTitle(this)">Special Access Key</a>
                                    <a class="nav-link" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true" data-title="form-title-payment" onclick="toggleTitle(this)">Payment</a>
                                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false" data-title="form-title-email" onclick="toggleTitle(this)">Email</a>
                                    </div>
                                    <div class="tab-content" id="v-pills-tabContent">
                                    
                                    
                                    <div class="tab-pane fade active show" id="v-pills-accesskey" role="tabpanel" aria-labelledby="v-pills-accesskey-tab">
                                        <form class="full graph_head" id="documentForm">  
                                               <div class="row mb-3">
                                                    <div class="col-md-12">
                                                        <div class="row mb-3">
                                                            <div class="col-md-12">
                                                            <h5 style="font-weight: normal;" class="form-titled">Description:</h5>
                                                            <span>
                                                            The Special Access Key is a secure key required to perform sensitive actions in your system, such as deleting records or updating payment and email credentials. This key can be used multiple times. Whenever the key is regenerated, the previous key will be overwritten for security purposes.    
                                                            </span>
                                                            </div>
                                                        </div>
                                                            <div class="row mb-3">
                                                            <div class="col-md-12">

                                                            <h5 style="font-weight: normal;" class="form-titled">How to Use:</h5>

                                                            <ul>
                                                                <li>
                                                                <strong>Delete Records:</strong> Enter the Special Access Key to authorize the deletion of records.
                                                                </li>
                                                                <li>
                                                                <strong>Update Credentials:</strong> The key is needed to make changes to payment or email credentials.
                                                                </li>
                                                            </ul>
                                                            
                                                            </div>
                                                            </div>

                                                            <div class="row mb-3">
                                                            <div class="col-md-12">
                                                            
                                                            
                                                            <span>Please note: The key is sensitive—copy and store it in a secure place. Use it only for authorized operations.</span>

                                                            </div>
                                                        </div>

                                                        <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <div id="keyContainer" class="keyContainer">
                                                            <input type="text" id="keyoutput" class="keyoutput alert-primary" />
                                                            
                                                            <button style="float: right;" type="button" class="btn btn-outline-primary" onclick="copyKey();">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-copy" viewBox="0 0 16 16">
                                                                    <path fill-rule="evenodd" d="M4 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 5a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1h1v1a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h1v1z"></path>
                                                                </svg>
                                                                Copy
                                                            </button>
                                                            </div>

                                                        </div>
                                                        <div class="col-md-6 align-right">
                                                            <label class="label_field hidden">hidden label</label>
                                                            <button type="button" id="accessKeyBtn" class="btn cur-p btn-primary verifyEmailBtn" onclick="generateKey(this);" data-txt="Generate" data-loadingtxt="Generating...">Generate</button>
                                                        </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                
                                        </form>
                                    </div>



                                    
                                    <div class="tab-pane fade" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
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
                                                            
                                                            <button type="button" id="testSmtpBtn" class="btn cur-p btn-primary verifyEmailBtn marginTop28" onclick="testSmtp(this);" data-txt="Send Test Email" data-loadingtxt="Sending...">Send Test Email</button>
                                                        
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

        $(".keyContainer").hide();
        $("#keyoutput").val("");
    }

    function generateKey(elm){
        //accessKeyBtn
        var elmId = $(elm).attr("id");
        $(elm).attr("disabled",true);
        var orgTxt = $(elm).attr("data-txt");
        var loadingTxt = $(elm).attr("data-loadingtxt");
        showLoader(elmId,loadingTxt); 

        var requrl = "admin/generateaccesskey";
        var postdata = {};
        
        callajax(requrl, postdata, function(resp){
            $(elm).removeAttr("disabled");
            hideLoader(elmId,orgTxt);
            if(resp.C == 100){
                $("#keyoutput").val(resp.R.specialAccessKey);
                $(".keyContainer").show();
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

    function copyKey(){
        // Get the text field containing the link
        var key = document.getElementById("keyoutput");

        // Select the text field
        key.select();
        key.setSelectionRange(0, 99999); // For mobile devices

        // Copy the text inside the text field
        document.execCommand("copy");

        var err = 0;
        var msg = "Special Access Key copied to clipboard: " + key.text;
        showToast(err,msg);
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

    // Show the modal
    var myModal = new bootstrap.Modal(document.getElementById('SAKeyModal'));
    myModal.show();

    var title = 'Paystack Settings';
    var message = 'Please enter your special access key to perform this action';
    var confirmText = 'Ok';
    var cancelText = 'Cancel';
    
    // Update modal content dynamically
    document.getElementById('SAKeyModalLabel').textContent = title;
    document.getElementById('SAKeyMessage').textContent = message;
    document.getElementById('SAKeyConfirmBtn').textContent = confirmText;
    document.getElementById('SAKeyCancelBtn').textContent = cancelText;

    // Reset event listeners
    const confirmButton = document.getElementById('SAKeyConfirmBtn');
    const cancelButton = document.getElementById('SAKeyCancelBtn');

    // Add event listener for confirmation action
    confirmButton.onclick = function() {
        // Place your confirmation action here
        
        var SAKeyInput = document.getElementById('SAKeyInput').value;
        if(!isRealValue(SAKeyInput)){
            var err = 1;
            var msg = "Please enter your Special Access Key.";
            showToast(err,msg);
            return false;
        }else{

            myModal.hide();
            document.getElementById('SAKeyInput').value = '';

            var elmId = $(elm).attr("id");
            $(elm).attr("disabled",true);
            var orgTxt = $(elm).attr("data-txt");
            var loadingTxt = $(elm).attr("data-loadingtxt");
            showLoader(elmId,loadingTxt); 

            var requrl = "admin/savepaymentsettings";
            var postdata = {
                "sakey":SAKeyInput,
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
                }else if(resp.C == 102){
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
        
    };

    // Add event listener for cancel action
    cancelButton.onclick = function() {
        //var myModal = new bootstrap.Modal(document.getElementById('SAKeyModal'));
        myModal.hide();
    };

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

        // Show the modal
        var myModal = new bootstrap.Modal(document.getElementById('SAKeyModal'));
        myModal.show();

        var title = 'Email SMTP Settings';
        var message = 'Please enter your special access key to perform this action';
        var confirmText = 'Ok';
        var cancelText = 'Cancel';
        
        // Update modal content dynamically
        document.getElementById('SAKeyModalLabel').textContent = title;
        document.getElementById('SAKeyMessage').textContent = message;
        document.getElementById('SAKeyConfirmBtn').textContent = confirmText;
        document.getElementById('SAKeyCancelBtn').textContent = cancelText;

        // Reset event listeners
        const confirmButton = document.getElementById('SAKeyConfirmBtn');
        const cancelButton = document.getElementById('SAKeyCancelBtn');

        // Add event listener for confirmation action
        confirmButton.onclick = function() {
            // Place your confirmation action here
            
            var SAKeyInput = document.getElementById('SAKeyInput').value;
            if(!isRealValue(SAKeyInput)){
                var err = 1;
                var msg = "Please enter your Special Access Key.";
                showToast(err,msg);
                return false;
            }else{

                myModal.hide();
                document.getElementById('SAKeyInput').value = '';

                var elmId = $(elm).attr("id");
                $(elm).attr("disabled",true);
                var orgTxt = $(elm).attr("data-txt");
                var loadingTxt = $(elm).attr("data-loadingtxt");
                showLoader(elmId,loadingTxt); 

                var requrl = "admin/saveemailsettings";
                var postdata = {
                    "sakey":SAKeyInput,
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
        };

        // Add event listener for cancel action
        cancelButton.onclick = function() {
            //var myModal = new bootstrap.Modal(document.getElementById('SAKeyModal'));
            myModal.hide();
        };
            
    }

    function testSmtp(elm){

        var elmId = $(elm).attr("id");
        $(elm).attr("disabled",true);
        var orgTxt = $(elm).attr("data-txt");
        var loadingTxt = $(elm).attr("data-loadingtxt");
        showLoader(elmId,loadingTxt); 
        
        var requrl = "admin/sendTestEmail";
        var postdata = {};
        
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
