<html lang="en-us" class=" lang-en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <title>SmartVerify | System Administrator</title>
    <link rel="shortcut icon" href="{{url('assets/img/cropped-walls-black-fav-270x270.jpg'); }}">

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

    <style>
        .fa.fa-eye, .fa.fa-eye-slash{
            float: right;
            margin-left: -20px;
            font-size: 20px;
            padding: 10px 0px;
            position: relative;
            z-index: 1;
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
                        <img width="210" id="company-logo" src="{{ url('assets/img/walls-logo-web2.png'); }}" alt="Smart Verify" />
                    </div>
                </div>
                <div class="login_form">
                    <form>
                    <fieldset>
                        <div class="field">
                            <label class="label_field">Email Address</label>
                            <input id="email" type="email" name="email" placeholder="System Administartor Email"/>
                        </div>
                        
                        <div id="optInputBox" class="field">
                            <label class="label_field">Password</label>
                            <i toggle="#password" class="fa fa-eye-slash toggle-password"></i>
                            <input type="password" id="password" placeholder="Enter your password">
                        </div>

                        <div id="verifyBttnBox" class="field margin_0">
                            <label class="label_field hidden">hidden label</label>
                            <button type="button" id="loginBtn" class="btn cur-p btn-primary verifyEmailBtn" onclick="verifyEmail(this);" data-txt="Login" data-loadingtxt="Logging In...">Log In</button>
                        </div>
                    </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="toastMessage" class="alert alert-danger" role="alert">This is a danger alert—check it out!</div>

<script>

    $(function(){
        $(".toggle-password").click(function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    });

    function verifyEmail(elm) {
        
        var email = $("#email").val();
        var password = $("#password").val();
        
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
        } else if (!isRealValue(password)) {
            var err = 1;
            var msg = "Please enter your password.";
            showToast(err, msg);
            return false;
        } else {
            
            var elmId = $(elm).attr("id");
    
            $(elm).attr("disabled",true);
            var orgTxt = $(elm).attr("data-txt");
            var loadingTxt = $(elm).attr("data-loadingtxt");
            showLoader(elmId,loadingTxt); 

            const requrl = "admin/sysadmlogin";
            const postdata = {
                "email": email,
                "password":password
            };

            callajax(requrl, postdata, function (resp) {
                
                $(elm).removeAttr("disabled");
                hideLoader(elmId,orgTxt);

                if (resp.C == 100) {
                    var err = 0;
                    var msg = "You have logged in successfully.";
                    
                    showToast(err, msg);
                    window.location.href = "admin-dashboard";
                    
                } else {
                    var err = 1;
                    var msg = "You have entered an invalid email or password.";
                    showToast(err, msg);
                }
            });
        }
    }
    
</script>
</body>
</html>