@extends("app")
@section("contentbox")
<!-- https://colorlib.com/etc/regform/colorlib-regform-8/ -->
<link rel="stylesheet" href="{{ url('assets/css/module_51600883929_slider.min.css'); }}"></link>
<link rel="stylesheet" href="{{ url('assets/_hcms/fonts/material-icon/css/material-design-iconic-font.min.css'); }}">
<style>
/* @extend display-flex; */
display-flex, .display-flex, .display-flex-center {
  display: flex;
  display: -webkit-flex; }

/* @extend list-type-ulli; */
list-type-ulli {
  list-style-type: none;
  margin: 0;
  padding: 0; }


a:focus, a:active {
  text-decoration: none;
  outline: none;
  transition: all 300ms ease 0s;
  -moz-transition: all 300ms ease 0s;
  -webkit-transition: all 300ms ease 0s;
  -o-transition: all 300ms ease 0s;
  -ms-transition: all 300ms ease 0s; }
input, select, textarea {
  outline: none;
  appearance: unset !important;
  -moz-appearance: unset !important;
  -webkit-appearance: unset !important;
  -o-appearance: unset !important;
  -ms-appearance: unset !important; }

input::-webkit-outer-spin-button, input::-webkit-inner-spin-button {
  appearance: none !important;
  -moz-appearance: none !important;
  -webkit-appearance: none !important;
  -o-appearance: none !important;
  -ms-appearance: none !important;
  margin: 0; }

input:focus, select:focus, textarea:focus {
  outline: none;
  box-shadow: none !important;
  -moz-box-shadow: none !important;
  -webkit-box-shadow: none !important;
  -o-box-shadow: none !important;
  -ms-box-shadow: none !important; }

input[type=checkbox] {
  appearance: checkbox !important;
  -moz-appearance: checkbox !important;
  -webkit-appearance: checkbox !important;
  -o-appearance: checkbox !important;
  -ms-appearance: checkbox !important; }

input[type=radio] {
  appearance: radio !important;
  -moz-appearance: radio !important;
  -webkit-appearance: radio !important;
  -o-appearance: radio !important;
  -ms-appearance: radio !important; }

img {
  max-width: 100%;
  height: auto; }

figure {
  margin: 0; }

p {
  margin-bottom: 0px;
  font-size: 15px;
  color: #777; }

h2 {
  line-height: 1.66;
  margin: 0;
  padding: 0;
  font-weight: 900;
  color: #222;
  font-family: 'Montserrat';
  font-size: 24px;
  text-transform: uppercase;
  text-align: center;
  margin-bottom: 40px; }

.clear {
  clear: both; }

body {
  font-size: 14px;
  line-height: 1.8;
  color: #222;
  font-weight: 400;
  font-family: 'Montserrat';
  background-image: url("<?php echo url('assets/img/people-2.jpg'); ?>");
  background-repeat: no-repeat;
  background-size: cover;
  -moz-background-size: cover;
  -webkit-background-size: cover;
  -o-background-size: cover;
  -ms-background-size: cover;
  background-position: center center;
  padding: 115px 0; }

.container {
  width: 660px;
  position: relative;
  margin: 0 auto; }

.display-flex {
  justify-content: space-between;
  -moz-justify-content: space-between;
  -webkit-justify-content: space-between;
  -o-justify-content: space-between;
  -ms-justify-content: space-between;
  align-items: center;
  -moz-align-items: center;
  -webkit-align-items: center;
  -o-align-items: center;
  -ms-align-items: center; }

.display-flex-center {
  justify-content: center;
  -moz-justify-content: center;
  -webkit-justify-content: center;
  -o-justify-content: center;
  -ms-justify-content: center;
  align-items: center;
  -moz-align-items: center;
  -webkit-align-items: center;
  -o-align-items: center;
  -ms-align-items: center; }

.position-center {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -moz-transform: translate(-50%, -50%);
  -webkit-transform: translate(-50%, -50%);
  -o-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%); }

.signup-content {
  background: #fff;
  border-radius: 10px;
  -moz-border-radius: 10px;
  -webkit-border-radius: 10px;
  -o-border-radius: 10px;
  -ms-border-radius: 10px;
  padding: 50px 85px; }

.form-group {
  overflow: hidden;
  margin-bottom: 20px; }

.form-input {
  width: 100%;
  border: 1px solid #ebebeb;
  border-radius: 5px;
  -moz-border-radius: 5px;
  -webkit-border-radius: 5px;
  -o-border-radius: 5px;
  -ms-border-radius: 5px;
  padding: 17px 20px;
  box-sizing: border-box;
  font-size: 14px;
  font-weight: 500;
  color: #222; }
  .form-input::-webkit-input-placeholder {
    color: #999; }
  .form-input::-moz-placeholder {
    color: #999; }
  .form-input:-ms-input-placeholder {
    color: #999; }
  .form-input:-moz-placeholder {
    color: #999; }
  .form-input::-webkit-input-placeholder {
    font-weight: 500; }
  .form-input::-moz-placeholder {
    font-weight: 500; }
  .form-input:-ms-input-placeholder {
    font-weight: 500; }
  .form-input:-moz-placeholder {
    font-weight: 500; }
  .form-input:focus {
    border: 1px solid transparent;
    -webkit-border-image-source: -webkit-linear-gradient(to right, #9face6, #74ebd5);
    -moz-border-image-source: -moz-linear-gradient(to right, #9face6, #74ebd5);
    -o-border-image-source: -o-linear-gradient(to right, #9face6, #74ebd5);
    border-image-source: linear-gradient(to right, #9face6, #74ebd5);
    -webkit-border-image-slice: 1;
    border-image-slice: 1;
    border-radius: 5px;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    -o-border-radius: 5px;
    -ms-border-radius: 5px;
    background-origin: border-box;
    background-clip: content-box, border-box; }
    .form-input:focus::-webkit-input-placeholder {
      color: #222; }
    .form-input:focus::-moz-placeholder {
      color: #222; }
    .form-input:focus:-ms-input-placeholder {
      color: #222; }
    .form-input:focus:-moz-placeholder {
      color: #222; }

.form-submit {
  width: 100%;
  border-radius: 5px;
  -moz-border-radius: 5px;
  -webkit-border-radius: 5px;
  -o-border-radius: 5px;
  -ms-border-radius: 5px;
  padding: 17px 20px;
  box-sizing: border-box;
  font-size: 14px;
  font-weight: 700;
  color: #fff;
  text-transform: uppercase;
  border: none;
  background-image: -moz-linear-gradient(to left, #74ebd5, #9face6);
  background-image: -ms-linear-gradient(to left, #74ebd5, #9face6);
  background-image: -o-linear-gradient(to left, #74ebd5, #9face6);
  background-image: -webkit-linear-gradient(to left, #74ebd5, #9face6);
  background-image: linear-gradient(to left, #74ebd5, #9face6); }

input[type=checkbox]:not(old) {
  width: 2em;
  margin: 0;
  padding: 0;
  font-size: 1em;
  display: none; }

input[type=checkbox]:not(old) + label {
  display: inline-block;
  margin-top: 7px;
  margin-bottom: 25px; }

input[type=checkbox]:not(old) + label > span {
  display: inline-block;
  width: 13px;
  height: 13px;
  margin-right: 15px;
  margin-bottom: 3px;
  border: 1px solid #ebebeb;
  border-radius: 2px;
  -moz-border-radius: 2px;
  -webkit-border-radius: 2px;
  -o-border-radius: 2px;
  -ms-border-radius: 2px;
  background: white;
  background-image: -moz-linear-gradient(white, white);
  background-image: -ms-linear-gradient(white, white);
  background-image: -o-linear-gradient(white, white);
  background-image: -webkit-linear-gradient(white, white);
  background-image: linear-gradient(white, white);
  vertical-align: bottom; }

input[type=checkbox]:not(old):checked + label > span {
  background-image: -moz-linear-gradient(white, white);
  background-image: -ms-linear-gradient(white, white);
  background-image: -o-linear-gradient(white, white);
  background-image: -webkit-linear-gradient(white, white);
  background-image: linear-gradient(white, white); }

input[type=checkbox]:not(old):checked + label > span:before {
  content: '\f26b';
  display: block;
  color: #222;
  font-size: 11px;
  line-height: 1.2;
  text-align: center;
  font-family: 'Material-Design-Iconic-Font';
  font-weight: bold; }

.label-agree-term {
  font-size: 12px;
  font-weight: 600;
  color: #555; }

.term-service {
  color: #555; }

.loginhere {
  color: #555;
  font-weight: 500;
  text-align: center;
  margin-top: 91px;
  margin-bottom: 5px; }

.loginhere-link {
  font-weight: 700;
  color: #222; }

.field-icon {
  float: right;
  margin-right: 17px;
  margin-top: -32px;
  position: relative;
  z-index: 2;
  color: #555; }

@media screen and (max-width: 768px) {
  .container {
    width: calc(100% - 40px);
    max-width: 100%; } }
@media screen and (max-width: 480px) {
  .signup-content {
    padding: 50px 25px; } }

    .errorMessage{
      color:red;
      margin-left:10px;
    }
</style>

<main class="body-container-wrapper">
    <div class="container-fluid body-container">
        <div class="row-fluid-wrapper">
            <div class="row-fluid">
                <div class="span12 widget-span widget-type-cell " style="" data-widget-type="cell" data-x="0" data-w="12">

                    <!--- form --->    
                    <div class="main">

                        <section class="signup">
                            <div class="container">
                                <div class="signup-content">
                                    <form id="signup-form" class="signup-form" method="POST" action="register" onsubmit="return validateMe()">
                                        <h2 class="form-title">Create account</h2>
                                        
                                        <div class="form-group row">
                                          <div class="col">
                                            <input type="text" class="form-input" name="fname" id="fname" placeholder="First Name"/>
                                          </div>
                                          <div class="col">
                                            <input type="text" class="form-input" name="lname" id="lname" placeholder="Last Name"/>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-input" name="email" id="email" placeholder="Your Email"/>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-input" name="password" id="password" placeholder="Password"/>
                                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-input" name="re_password" id="re_password" placeholder="Confirm password"/>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                                        </div>
                                        <div class="form-group">
                                        <input type="hidden" class="form-input" name="_token" id="_token" value="{{ csrf_token() }}"/>    
                                        <input type="submit" name="submit" id="submit" class="form-submit" value="Sign up"/>
                                            <span class="errorMessage"></span>
                                        </div>
                                    </form>
                                    <p class="loginhere">
                                        Have already an account ? <a href="{{ url('login') }}" class="loginhere-link">Login here</a>
                                    </p>
                                </div>
                            </div>
                        </section>

                    </div>
                    <!--- form --->

                </div>
            </div>
        </div>
    </div>
</main>
@endsection
@push("js")
<script>
$(function(){
  $(".toggle-password").click(function() {
    $(this).toggleClass("zmdi-eye zmdi-eye-off");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }
  });
});

function validateMedd() {
    var fname = $("#fname").val();
    var lname = $("#lname").val();
    var email = $("#email").val();
    var password = $("#password").val();
    var re_password = $("#re_password").val();
    var agreeTerm = $("#agree-term").is(":checked");

    // Clear previous error messages
    $(".errorMessage").html("");

    // Validate First Name
    if (!isRealValue(fname)) {
        $(".errorMessage").html("Please enter your first name.");
        $("#fname").keyup(function() {
            $(".errorMessage").html("");
        });
        return false;
    }

    // Validate Last Name
    if (!isRealValue(lname)) {
        $(".errorMessage").html("Please enter your last name.");
        $("#lname").keyup(function() {
            $(".errorMessage").html("");
        });
        return false;
    }

    // Validate Email
    if (!isRealValue(email)) {
        $(".errorMessage").html("Please enter your email.");
        $("#email").keyup(function() {
            $(".errorMessage").html("");
        });
        return false;
    } else if (!validateEmail(email)) {
        $(".errorMessage").html("Please enter a valid email.");
        $("#email").keyup(function() {
            $(".errorMessage").html("");
        });
        return false;
    }

    // Validate Password
    if (!isRealValue(password)) {
        $(".errorMessage").html("Please enter the password.");
        $("#password").keyup(function() {
            $(".errorMessage").html("");
        });
        return false;
    }

    // Validate Confirm Password
    if (!isRealValue(re_password)) {
        $(".errorMessage").html("Please enter the confirm password.");
        $("#re_password").keyup(function() {
            $(".errorMessage").html("");
        });
        return false;
    } else if (password !== re_password) {
        $(".errorMessage").html("Confirm password does not match.");
        $("#re_password").keyup(function() {
            $(".errorMessage").html("");
        });
        return false;
    }

    // Validate Terms of Service Checkbox
    if (!agreeTerm) {
        $(".errorMessage").html("You must agree to the Terms of Service.");
        $("#agree-term").change(function() {
            if ($(this).is(":checked")) {
                $(".errorMessage").html("");
            }
        });
        return false;
    }

    return true;
}

function validateMe() {
  var fname = $("#fname").val();
  var lname = $("#lname").val();
  var fnameObj = validateName(fname);
  var lnameObj = validateName(lname);

  var email = $("#email").val();
  var password = $("#password").val();
  var re_password = $("#re_password").val();
  var psswdValidObj = validatePassword(password);
  var cpsswdValidObj = validatePassword(re_password);
  var psswdErr = psswdValidObj.err;
  var psswdMsg = psswdValidObj.msg;
  var cpsswdErr = cpsswdValidObj.err;
  var cpsswdMsg = cpsswdValidObj.msg;

  var agreeTerm = $("#agree-term").is(":checked");

  // Clear previous error messages
  $(".errorMessage").html("");

  if (!isRealValue(fname)) {
    $(".errorMessage").html("Please enter your first name.");
    $("#fname").on("keyup", function () {
      $(".errorMessage").html("");
    });
    return false;
  } else if (isRealValue(fname) && fnameObj.err == 1) {
    $(".errorMessage").html(fnameObj.msg);
    $("#fname").on("keyup", function () {
      $(".errorMessage").html("");
    });
    return false;
  } else if (!isRealValue(lname)) {
    $(".errorMessage").html("Please enter your last name.");
    $("#lname").on("keyup", function () {
      $(".errorMessage").html("");
    });
    return false;
  } else if (isRealValue(lname) && lnameObj.err == 1) {
    $(".errorMessage").html(lnameObj.msg);
    $("#lname").on("keyup", function () {
      $(".errorMessage").html("");
    });
    return false;
  } else if (!isRealValue(email)) {
    $(".errorMessage").html("Please enter your email.");
    $("#email").on("keyup", function () {
      $(".errorMessage").html("");
    });
    return false;
  } else if (isRealValue(email) && !validateEmail(email)) {
    $(".errorMessage").html("Please enter a valid email.");
    $("#email").on("keyup", function () {
      $(".errorMessage").html("");
    });
    return false;
  } else if (!isRealValue(password)) {
    $(".errorMessage").html("Please enter the password.");
    $("#password").on("keyup", function () {
      $(".errorMessage").html("");
    });
    return false;
  } else if (isRealValue(password) && psswdErr == 1) {
    $(".errorMessage").html(psswdMsg);
    $("#password").on("keyup", function () {
      $(".errorMessage").html("");
    });
    return false;
  } else if (!isRealValue(re_password)) {
    $(".errorMessage").html("Please enter the confirm password.");
    $("#re_password").on("keyup", function () {
      $(".errorMessage").html("");
    });
    return false;
  } else if (isRealValue(re_password) && cpsswdErr == 1) {
    $(".errorMessage").html(cpsswdMsg);
    $("#re_password").on("keyup", function () {
      $(".errorMessage").html("");
    });
    return false;
  } else if (isRealValue(password) && isRealValue(re_password) && password !== re_password) {
    $(".errorMessage").html("Confirm password does not match.");
    $("#re_password").on("keyup", function () {
      $(".errorMessage").html("");
    });
    return false;
  } else if (!agreeTerm) {
      // Validate Terms of Service Checkbox
      $(".errorMessage").html("You must agree to the Terms of Service.");
      $("#agree-term").change(function() {
          if ($(this).is(":checked")) {
              $(".errorMessage").html("");
          }
      });
      return false;
  }else {
    //CSRFTOKEN
    //callajax(requrl, jsondata, cb)
    return true; // Allow form submission if all validations pass.
  }
}


</script>
@endpush