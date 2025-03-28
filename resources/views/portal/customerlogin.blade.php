<html lang="en-us" class=" lang-en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <title>SmartKYC | Portal LogIn</title>
    <link rel="shortcut icon" href="{{ url('assets/img/SmartKYC-32x32.png'); }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('assets/portal/css/bootstrap.min.css'); }}">
    <link rel="stylesheet" href="{{ url('assets/portal/css/style.css'); }}">
    <link rel="stylesheet" href="{{ url('assets/portal/css/responsive.css'); }}">

    <link rel="stylesheet" href="{{ url('assets/portal/css/color_2.css'); }}">
    <link rel="stylesheet" href="{{ url('assets/portal/css/bootstrap-select.css'); }}">

    <link rel="stylesheet" href="{{ url('assets/portal/css/perfect-scrollbar.css'); }}">
    <link rel="stylesheet" href="{{ url('assets/portal/css/custom.css'); }}">

    <!-- Bootstrap CSS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        .agree-term{
            float: left !important;
            width: auto !important;
            margin-top: 5px;
            margin-right: 10px;
        }

        .label_field.label-agree-term{
            width: auto;
        }

        .term-service,.term-service:hover,.term-service:focus{
            color:#0056b3
        }
    </style>

    <script>
        var CSRFTOKEN = "{{ csrf_token() }}";
        var SERVICEURL = "{{ url('') }}";
    </script>
    <script src="{{ url('assets/js/jquery-3.6.0.min.js'); }}"></script>   
    <script src="{{ url('/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('/assets/js/script.js') }}"></script>

</head>
<body class="inner_page login">
<div class="full_container">
    <div class="container">
        <div class="center verticle_center full_height">
            <div class="login_section">
                <div class="logo_login">
                    <div class="center">
                        <img style="display:block" width="290" id="company-logo" src="{{ url('assets/img/portallogo.png'); }}" alt="NDPC - Nigeria Data Protection Commission" onError="showCompanyName()"/>
                        <!--<div id="company-name" class="company-name lobster-regular">Smart Verification</div>-->
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

                        <div class="field">
                            <input type="checkbox" name="agree_term" id="agree_term" class="agree-term" />
                            <label for="agree_term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="javascript:void(0);"  class="term-service" data-toggle="modal" data-target="#exampleModal">Privacy & Data Security Policy</a></label>
                        </div>

                        <div id="sendOtpButtonBox" class="field margin_0">
                            <label class="label_field hidden">hidden label</label>
                            <button type="button" class="btn cur-p btn-primary sendotpBtn" onclick="sendOtp();">Login</button>
                        </div>
                        
                        <div id="resendotpBox" class="field hideMe">
                              <label class="label_field hidden">hidden label</label>
                              <label class="form-check-label"><a class="forgot" href="javascript:void(0);" onclick="changeEmail();">Change Email?</a></label>
                              <!--<a class="forgot" href="javascript:void(0);" onclick="resendOtp();">Resend OTP?</a>-->
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Privacy & Data Security</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Your Privacy and Data Security Are Our Top Priorities
        <br>
        <br>
        we understand the importance of your personal information and documents. We are committed to protecting your privacy and ensuring that all data submitted through our verification portal remains secure, confidential, and strictly protected.
        <br>
        <br>
        No Third-Party Sharing: We do not share, sell, or disclose your information to any third party. Your data is used solely for the purpose of verification by the authorized organization requesting it.
        <br>
        <br>
        Secure Storage & Encryption: All documents and personal details are stored using industry-standard encryption and security protocols, preventing unauthorized access.
        <br>
        <br>
        Compliance with Data Protection Laws: We adhere to all relevant data protection regulations to ensure your information is handled responsibly and securely.
        <br>
        <br>
        Restricted Access: Only authorized personnel from the requesting organization can access your details for verification purposes.
        <br>
        <br>
        Your trust is our priority, and we are dedicated to maintaining the highest security standards to protect your data.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<div id="toastMessage" class="alert alert-danger" role="alert">This is a danger alert—check it out!</div>

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

        var agreeTerm = $("#agree_term").is(":checked");

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
        } else if (!agreeTerm) {
            // Validate Terms of Service Checkbox
            var err = 1;
            var msg = "You must agree to the Privacy & Data Security Policy.";
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
                    //var msg = "OTP is sent to your email.";
                    var msg = "Contact your administrator to get the OTP.";
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
</body>
</html>