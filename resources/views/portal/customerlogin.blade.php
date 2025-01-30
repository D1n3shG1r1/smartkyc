@extends("app")
@section("contentbox")
<div class="full_container">
    <div class="container">
        <div class="center verticle_center full_height">
            <div class="login_section">
                <div class="logo_login">
                    <div class="center">
                        <img width="210" id="company-logo" src="{{ url('aassets/portal/images/login_image.jpg'); }}" alt="Company Logo" onError="showCompanyName()"/>
                        <div id="company-name" class="company-name lobster-regular">Company Name</div>
                    </div>
                </div>
                <div class="login_form">
                    <form>
                    <input type="hidden" id="adminId" value="{{$adminId}}">   
                    <input type="hidden" id="portalId" value="{{$portalId}}">   
                    <fieldset>
                        <div class="field">
                            <label class="label_field">Email Address</label>
                            <input id="email" type="email" name="email" placeholder="E-mail" onblur="checkEmail();" />
                        </div>
                        
                        <div class="field">
                            <label class="label_field">First Name</label>
                            <input id="fname" type="text" name="fname" placeholder="First Name" />
                        </div>

                        <div class="field">
                            <label class="label_field">Last Name</label>
                            <input id="lname" type="text" name="lname" placeholder="Last Name" />
                        </div>
                        
                        <div id="optInputBox" class="field hideMe">
                            <label class="label_field">OTP</label>
                            <input type="text" id="otp" placeholder="Enter OTP" maxlength="6">
                        </div>

                        <div id="sendOtpButtonBox" class="field margin_0">
                            <label class="label_field hidden">hidden label</label>
                            <button type="button" class="btn cur-p btn-primary sendotpBtn" onclick="sendOtp();">Send OTP</button>
                        </div>
                        
                        <div id="resendotpBox" class="field hideMe">
                              <label class="label_field hidden">hidden label</label>
                              <label class="form-check-label"><a class="forgot" href="javascript:void(0);" onclick="changeEmail();">Change Email</a></label>
                              <a class="forgot" href="javascript:void(0);" onclick="resendOtp();">Resend OTP?</a>
                        </div>
                        
                        <div id="verifyBttnBox" class="field margin_0 hideMe">
                            <label class="label_field hidden">hidden label</label>
                            <button type="button" class="btn cur-p btn-primary verifyEmailBtn" onclick="verifyEmail();">Verify</button>
                        </div>
                    </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push("js")
<!-- Include jQuery first -->
<!--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>-->

<!-- Include the Inputmask plugin -->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6-beta.29/inputmask.min.js"></script>-->

<script>

    function showCompanyName() {
      // Hide the image and show the company name if the image fails to load
      document.getElementById('company-logo').style.display = 'none';
      document.getElementById('company-name').style.display = 'block';
    }
    
    function checkEmail() {
        const adminId = $("#adminId").val();
        const portalId = $("#portalId").val();
        const email = $("#email").val();

        if (!isRealValue(email)) {
            return false;
        } else if (!validateEmail(email)) {
            return false;
        } else {
            const requrl = "portal/checkemail";
            const postdata = {
                "adminId": adminId,
                "portalId": portalId,
                "email": email
            };

            callajax(requrl, postdata, function (resp) {
                if (resp.C == 100) {
                    const tmpFname = resp.R.fname;
                    const tmpLname = resp.R.lname;
                    if (isRealValue(tmpFname) && isRealValue(tmpLname)) {
                        $("#fname").val(tmpFname);
                        $("#lname").val(tmpLname);  // Corrected: set #lname instead of #fname
                    }
                } else {
                    $("#fname").val("");
                    $("#lname").val("");  // Corrected: set #lname to empty
                }
            });
        }
    }

    function sendOtp() {
        
        var adminId = $("#adminId").val();
        var portalId = $("#portalId").val();

        var email = $("#email").val();
        var fname = $("#fname").val();
        var lname = $("#lname").val();
        var fnameObj = validateName(fname);
        var lnameObj = validateName(lname);

        var fnameerr = fnameObj.err;
        var fnamemsg = fnameObj.msg;
        var lnameerr = lnameObj.err;
        var lnamemsg = lnameObj.msg;

        if (!isRealValue(email)) {
            var err = 1;
            var msg = "Please enter your email.";
            showToast(err, msg);
            return false;
        } else if (!validateEmail(email)) {
            var err = 1;
            var msg = "Please enter valid email.";
            showToast(err, msg);
            return false;
        } else if (!isRealValue(fname)) {
            var err = 1;
            var msg = "Please enter your first name.";
            showToast(err, msg);
            return false;
        } else if (fnameerr == 1) {
            var err = 1;
            var msg = fnamemsg;
            showToast(err, msg);
            return false;
        } else if (lnameerr == 1) {
            var err = 1;
            var msg = lnamemsg;
            showToast(err, msg);
            return false;
        } else {
            $("#email").attr("readonly", true);
            const requrl = "portal/sendotp";
            const postdata = {
                "adminId": adminId,
                "portalId": portalId,
                "email": email,
                "fname": fname,
                "lname": lname
            };

            callajax(requrl, postdata, function (resp) {
                if (resp.C == 100) {
                    var err = 0;
                    var msg = "OTP is sent to your email.";
                    showToast(err, msg);

                    $("#sendOtpButtonBox").addClass("hideMe");
                    $("#optInputBox").removeClass("hideMe");
                    $("#resendotpBox").removeClass("hideMe");
                    $("#verifyBttnBox").removeClass("hideMe");
                } else {
                    $("#email").removeAttr("readonly");

                    var err = 1;
                    var msg = "Something went wrong please try again.";
                    showToast(err, msg);
                }
            });
        }
    }
    
    function changeEmail(){
        $("#sendOtpButtonBox").removeClass("hideMe");
        $("#optInputBox").addClass("hideMe");
        $("#otp").val("");
        $("#resendotpBox").addClass("hideMe");
        $("#verifyBttnBox").addClass("hideMe");
        
        $("#email").removeAttr("readonly");
    }
    
    function resendOtp(){
        sendOtp();
    }    
    
    function verifyEmail(){
        
        var adminId = $("#adminId").val();
        var portalId = $("#portalId").val();
        var email = $("#email").val();
        var otp = $("#otp").val();
        
        if (!isRealValue(email)) {
            var err = 1;
            var msg = "Please enter your email.";
            showToast(err, msg);
            return false;
        }else if (!validateEmail(email)) {
            var err = 1;
            var msg = "Please enter valid email.";
            showToast(err, msg);
            return false;
        }else if (!isRealValue(otp)) {
            var err = 1;
            var msg = "Please enter an otp.";
            showToast(err, msg);
            return false;
        }else if (otp.length < 6 || otp.length > 6) {
            var err = 1;
            var msg = "Please enter the valid otp.";
            showToast(err, msg);
            return false;
        }else{
            
            const requrl = "portal/login";
            const postdata = {
                "adminId": adminId,
                "portalId": portalId,
                "email": email,
                "otp": otp
            };

            callajax(requrl, postdata, function (resp) {
                if (resp.C == 100) {
                    var err = 0;
                    var msg = "Your account is verified successfully";
                    showToast(err, msg);

                    window.location.href = "{{url('portal/dashboard')}}";
                
                } else {
                    $("#email").removeAttr("readonly");
                    var err = 1;
                    var msg = resp.R;
                    showToast(err, msg);
                }
            });
        }
    }

</script>
@endpush