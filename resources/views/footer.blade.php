<!-- Footer Start -->
<div class="footer">

<div class="container">
        <div class="row">
            <div class="col-lg-12">
                
                <a href="{{url('/')}}" class="navbar-brand float-left"><img style="max-width:100%; height:50px;" src="{{url('assets/img/smartkyc-logo-header.png')}}"></a>
                <a href="javascript:void(0);" class="navbar-brand float-right" onclick="openAdmLoginModal();"><img src="{{url('assets/img/NDPC.png')}}" style="/* max-width: 100%; *//* height: auto; */width: 275px;margin-left: 0px;margin-top: -27px;"></a>
            </div>
        </div>

<div class="row">
  <div class="col-md-12">
    <div class="footer-link">
      <h2>Quick Links</h2>
          
          <a href="{{url('/track-your-application')}}">Track Application</a>
          <a href="{{url('/pricing')}}">Pricing</a>
          <a href="{{url('/how-it-works')}}">How It Works</a>
          <a href="{{url('/faq')}}">FAQs</a>
      </div>
    </div>
  </div>
</div>

    <div class="container copyright">
        <div class="row">
            <div class="col-md-6">
                <p>&copy; <a href="#">{{date("Y")}} Smart Technology Services Ltd,</a> All Right Reserved.</p>
            </div>
            <div class="col-md-6">
                <p>Contact <a mailto="mailto:{{ config('custom.support_email') }}">{{ config('custom.support_email') }}</a></p>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->



<!-- Register Modal Start-->
<style>

  .hide{
    display: none;
  }

  .modal .row {
    margin-top: unset;
  }
  
  .modal-open .modal {
    overflow-x: hidden;
    overflow-y: auto;
  }

  .fade.show {
    opacity: 1;
    display: block;
  }

  .modal {
    position: fixed;
    top: 3rem;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 1050;
    display: none;
    overflow-x: hidden;
    overflow-y: auto;
    outline: 0;
 }

  .fade {
    opacity: 0;
    transition: opacity .15s linear;
  }

  

  .modal.fade .modal-dialog {
    transition: -webkit-transform .3s ease-out;
    transition: transform .3s ease-out;
    transition: transform .3s ease-out,-webkit-transform .3s ease-out;
    -webkit-transform: translate(0,-25%);
    transform: translate(0,-25%);
  }
  
  .modal.show .modal-dialog {
    -webkit-transform: translate(0,0);
    transform: translate(0,0);
  }

  .modal-dialog {
    max-width: 625px;
    max-height: calc(100vh - 4rem);
    margin: 1.75rem auto;
    position: relative;
    width: auto;
    pointer-events: none;
  }

  .modal-content {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    width: 100%;
    height: 100%;
    pointer-events: auto;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid rgba(0,0,0,.2);
    border-radius: .3rem;
    outline: 0;
  }

  .modal-header {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: start;
    -ms-flex-align: start;
    align-items: flex-start;
    -webkit-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between;
    padding: 1rem;
  }

  .modal-header h4.modal-title {
    font-family: "Open Sans", sans-serif;
    font-weight: 300;
    color: #3d63dd;
    font-size: 1.25rem;
    margin-bottom: 0;
    line-height: 1.5;
  }

.modal-header .btn-close {
    margin: -1rem -1rem -1rem auto;
    font-size: 1.5rem;
}

  button.close {
    padding: 0;
    background-color: transparent;
    border: 0;
    -webkit-appearance: none;
  }

  .modal-body {
    position: relative;
    /*-webkit-box-flex: 1;
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;*/
    padding: 1rem;
    padding-bottom: 2rem;
    text-align: center;

    overflow-y: auto;
    flex-grow: 1;
  }

  .modal-footer {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: end;
    -ms-flex-pack: end;
    justify-content: flex-end;
    padding: 1rem;
    border-top: 1px solid #e9ecef;
  }

  .modal-backdrop.show {
    opacity: .5;
    display: block;
  }

  .modal-backdrop.fade {
    opacity: 0;
    display: none;
  }

  .fade.show {
    opacity: 1;
    display: block;
  }

  .modal-backdrop {
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 1040;
    background-color: #000;
    display: none;
  }

  .fade {
    opacity: 0;
    transition: opacity .15s linear;
  }
/* Responsive Adjustments */
@media (max-width: 576px) {
  .modal-dialog {
    margin: 1rem auto;
  }

  .text-right, .text-left {
    text-align: center !important;
  }
}

.alert-success {
    color: #155724;
    background-color: #d4edda;
    border-color: #c3e6cb;
}

.alert-danger {
    color: #721c24;
    background-color: #f8d7da;
    border-color: #f5c6cb;
}

.alert {
    position: relative;
    padding: .75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: .25rem;
}

.toastMessage {
    display:none;
    position: fixed;
    width: fit-content;
    right: 10px;
    bottom: 10px;
    z-index: 1100;
}

/*Loading spinners*/
@keyframes spinner-border {
  to { transform: rotate(360deg); }
}

.spinner-border {
  display: inline-block;
  width: 1.5rem;
  height: 1.5rem;
  vertical-align: text-bottom;
  border: 0.20em solid #fff;
  border-right-color: transparent;
  border-radius: 50%;
  animation: spinner-border .75s linear infinite;
}

.spinner-border-sm {
    width: 1.5rem;
    height: 1.5rem;
    border-width: 0.20em;
}


@keyframes spinner-grow {
  0% {
    transform: scale(0);
  }
  50% {
    opacity: 1;
  }
}

.spinner-grow {
  display: inline-block;
  width: 1.5rem;
  height: 1.5rem;
  vertical-align: text-bottom;
  background-color: currentColor;
  border-radius: 50%;
  opacity: 0;
  animation: spinner-grow .75s linear infinite;
}

.spinner-grow-sm {
    width: 1.5rem;
    height: 1.5rem;
}

.passwordIcon {
    right: 27px;
    margin-top: 13px;
    font-size: 1.1rem;
    cursor: pointer;
    position: absolute;
    color: #092a49;
}
</style>

<div class="modal fade" id="registerModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 id="staticBackdropLabel" class="mb-0">Get Started</h4>
        <button type="button" class="btn-close btn btn-link" onclick="closeGetStartedModal();" aria-label="Close">&times;</button>
      </div>
      <div class="modal-body pt-0">
        <div class="row"> 
          <div id="registerLoginSection" class="loginSection text-body-dark-1 sm:col-12 mt-unset px-3 py-3">
            <div class="text-center max-w-[550px] mx-auto">
                  <h5>LogIn</h5>
            </div>
            <form class="flex flex-col gap-6">
                <div class="row">
                  <div class="col-12 md:col-12 mb-3">
                    <input id="loginemail" type="email" name="loginemail" class="w-full px-2 py-2 border border-solid border-alpha-light" placeholder="Email" required="">
                  </div>
                  
                  <div class="col-12 md:col-12 mb-3">
                    <input id="loginpassword" type="password" name="loginpassword" class="w-full px-2 py-2 border border-solid border-alpha-light" placeholder="Password" required="">
                    <i toggle="loginpassword" class="passwordIcon fa fa-eye-slash"></i>
                    <a href="javascript:void(0);" class="forgotPasswordBtn float-right" onclick="openforgotpasswordModal()">Forgot password?</a>
                    
                  </div>
                
                  <div class="col-6 md:col-6 mb-3">
                  New to SmartKYC? <a href="javascript:void(0);" onclick="notHaveAccountregister();">Join Now</a>
                  </div>
                  <div class="col-6 md:col-6 text-right mb-3">
                    <button id="registerLoginBtn" type="button" class="btn btn-primary" data-txt="Login" data-loadingtxt="Logging In..." onclick="login(this)">
                      Login
                    </button>
                  </div>
                </div>
            </form>
          </div>
          

          <div id="forgotPasswordSection" class="forgotPasswordSection text-body-dark-1 sm:col-12 mt-unset px-3 py-3 hide">
            <div class="text-center max-w-[550px] mx-auto">
                  <h5>Forgot Password ?</h5>
            </div>
            <form class="flex flex-col gap-6">
                <div class="row">
                  <div class="col-12 md:col-12 mb-3">
                    <input id="fpemail" type="email" name="fpemail" class="w-full px-2 py-2 border border-solid border-alpha-light" placeholder="Email" required="">
                  </div>
                
                  <div class="col-6 md:col-6 mb-3">
                  New to SmartKYC? <a href="javascript:void(0);" onclick="notHaveAccountregister();">Join Now</a>
                  </div>
                  <div class="col-6 md:col-6 text-right mb-3">
                    <button id="resetPsswdBtn" type="button" class="btn btn-primary" data-txt="Reset Password" data-loadingtxt="Reset Password..." onclick="resetPassword(this)">
                      Reset Password
                    </button>
                  </div>
                </div>
            </form>
          </div>

          <div id="registerRegisterSection" class="registerSection text-body-dark-1 sm:col-12 mt-unset px-3 py-3 hide">
            <div class="text-center max-w-[550px] mx-auto">
              <h5>Register</h5>
            </div>
            <form class="flex flex-col gap-6">
              <div class="row">
                <div class="col-12 md:col-6 mb-3">
                  <input id="fname" type="text" name="fname" class="w-full px-2 py-2 border border-solid border-alpha-light" placeholder="First name" required="">
                </div>
                
                <div class="col-12 md:col-6 mb-3">
                  <input id="lname" type="text" name="lname" class="w-full px-2 py-2 border border-solid border-alpha-light" placeholder="Last name" required="">
                </div>

                <div class="col-12 md:col-12 mb-3">
                  <input id="email" type="email" name="email" class="w-full px-2 py-2 border border-solid border-alpha-light" placeholder="Email" required="">
                </div>
                
                <div class="col-12 md:col-12 mb-3">
                  <input id="password" type="password" name="password" class="w-full px-2 py-2 border border-solid border-alpha-light" placeholder="Password" required="">
                  <i toggle="password" class="passwordIcon fa fa-eye-slash"></i>
                </div>

                <div class="col-12 md:col-12 mb-3">
                  <input id="re_password" type="password" name="re_password" class="w-full px-2 py-2 border border-solid border-alpha-light" placeholder="Confirm password" required="">
                  <i toggle="re_password" class="passwordIcon fa fa-eye-slash"></i>
                </div>
                
                <div class="col-12 md:col-12 mb-3">
                  <input type="checkbox" name="agree_term" id="agree_term" class="agree-term" />
                  <label for="agree_term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="{{url('termsofservice')}}" target="_blank" class="term-service">Terms & Conditions</a> and <a href="{{url('privacypolicy')}}" target="_blank" class="term-service">Privacy Policy</a></label>
                </div> 

                  <div class="col-6 md:col-6 mb-3"> Already have an account? <a href="javascript:void(0);" onclick="haveAnAccountregister();">Login here</a>
                  </div>
                  <div class="col-6 md:col-6 text-right  mb-3">
                    <button id="registerRegBtn" type="button" class="btn btn-primary" data-txt="Register" data-loadingtxt="Registering..." onclick="register(this)">
                      Register
                    </button>
                  </div>
              </div>
            </form>
          </div>
        </div>
      </div>

      <!--
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
      -->
    </div>
  </div>
</div>
<!-- Register Modal End -->

<!-- Create New Password Modal -->
@if (request()->has('token'))
<div class="modal fade" id="changePasswordModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 id="staticBackdropLabel" class="mb-0">Reset Password</h4>
        <button type="button" class="btn-close btn btn-link" onclick="closeChangePasswordModal();" aria-label="Close">&times;</button>
      </div>
      <div class="modal-body pt-0">
        <div class="row"> 
          <div id="changePasswordSection" class="changePasswordSection text-body-dark-1 sm:col-12 mt-unset px-3 py-3">
            <div class="text-center max-w-[550px] mx-auto">
                  <h5>Create New Password</h5>
            </div>
            <form class="flex flex-col gap-6">
                <div class="row">
                  <div class="col-12 md:col-12 mb-3">
                  
                    <input type="hidden" id="linktoken" name="linktoken" value="{{ request()->get('token') }}">

                    <input id="newpassword" type="password" name="newpassword" class="w-full px-2 py-2 border border-solid border-alpha-light" placeholder="Password" required="">
                    <i toggle="newpassword" class="passwordIcon fa fa-eye-slash"></i>
                  </div>

                  <div class="col-12 md:col-12 mb-3">
                    <input id="newre_password" type="password" name="newre_password" class="w-full px-2 py-2 border border-solid border-alpha-light" placeholder="Confirm password" required="">
                    <i toggle="newre_password" class="passwordIcon fa fa-eye-slash"></i>
                  </div>
                
                  <div class="col-12 md:col-12 text-right mb-3">
                    <button id="setPasswdBtn" type="button" class="btn btn-primary" data-txt="Set Password" data-loadingtxt="Setting Password..." onclick="setPassword(this)">
                      Set Password
                    </button>
                  </div>
                </div>
            </form>
          </div>
          </div>
      </div>

      <!--
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
      -->
    </div>
  </div>
</div>
@endif
<!-- Create New Password Modal End -->


<!--- System Admin Modal --->
<div class="modal fade" id="admLoginModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 id="staticBackdropLabel" class="mb-0">System Administrator</h4>
        <button type="button" class="btn-close btn btn-link" onclick="closeAdmLoginModal();" aria-label="Close">&times;</button>
      </div>
      <div class="modal-body pt-0">
        <div class="row"> 
          <div id="admLoginSection" class="admLoginSection text-body-dark-1 sm:col-12 mt-unset px-3 py-3">
            <div class="text-center max-w-[550px] mx-auto">
                  <h5>LogIn</h5>
            </div>
            <form class="flex flex-col gap-6">
                <div class="row">
                  <div class="col-12 md:col-12 mb-3">
                    <input id="admemail" type="email" name="admemail" class="w-full px-2 py-2 border border-solid border-alpha-light" placeholder="Email" required="">
                  </div>
                  
                  <div class="col-12 md:col-12 mb-3">
                    <input id="admpassword" type="password" name="admpassword" class="w-full px-2 py-2 border border-solid border-alpha-light" placeholder="Password" required="">
                    <i toggle="admpassword" class="passwordIcon fa fa-eye-slash"></i>
                  </div>
                  
                  <div class="col-6 md:col-6 text-right mb-3">
                    <button id="registerLoginBtn" type="button" class="btn btn-primary" data-txt="Login" data-loadingtxt="Logging In..." onclick="admLogin(this)">
                      Login
                    </button>
                  </div>
                </div>
            </form>
          </div>
          </div>
      </div>
      <!--
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
      -->
    </div>
  </div>
</div>
<!--- System Admin Modal End --->
<div class="modal-backdrop"></div>

<!-- JavaScript Libraries -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="{{ url('/assets/lib/easing/easing.min.js')}}"></script>
<script src="{{ url('/assets/lib/owlcarousel/owl.carousel.min.js')}}"></script>
<script src="{{ url('/assets/lib/waypoints/waypoints.min.js')}}"></script>
<script src="{{ url('/assets/lib/counterup/counterup.min.js')}}"></script>

<!-- Contact Javascript File -->
<!--<script src="mail/jqBootstrapValidation.min.js"></script>
<script src="mail/contact.js"></script>-->

<!-- Template Javascript -->
<script src="{{ url('/assets/js/main.js')}}"></script>

<!-- Zoho SalesIQ Live Chat Script -->
<style>
   .chat-iframe-wrap.zsiq-medium-size.chat-iframe-open{
      bottom:115px !important;
      height: 480px !important;
   }
   .zsiq-float{
      bottom:60px !important;
   }
</style>
<script>window.$zoho=window.$zoho || {};$zoho.salesiq=$zoho.salesiq||{ready:function(){}}</script><script id="zsiqscript" src="https://salesiq.zohopublic.com/widget?wc=siq2f563662f6b8f6926b0f7eb892d700d5169cedcfcc2bdf839cdedb97f5c3c4e4" defer></script>

@if (request()->has('token'))
    <script>
        // Call your JS function when the token is present
        window.onload = function() {
            handleToken("{{ request()->get('token') }}");
        };

        function handleToken(token) {
            // Add your logic here
            openChangePasswordModal();
        }
    </script>
@endif

<script>
document.addEventListener("DOMContentLoaded", function () {

    document.querySelectorAll(".passwordIcon").forEach(function (toggle) {
        toggle.addEventListener("click", function () {
            this.classList.toggle("fa-eye");
            this.classList.toggle("fa-eye-slash");

            const selector = this.getAttribute("toggle");
            const input = document.getElementById(selector);
            if (input) {
                if (input.type === "password") {
                    input.type = "text";
                } else {
                    input.type = "password";
                }
            }
        });
    });

    
});

function getStarted() {
    // Show the Get Started modal
    document.getElementById("registerModal").classList.add("show");
    document.querySelector(".modal-backdrop").classList.add("show");
}

function closeGetStartedModal() {
    // Close the Get Started modal
    document.getElementById("registerModal").classList.remove("show");
    document.querySelector(".modal-backdrop").classList.remove("show");

    //reset to login
    haveAnAccountregister();
}

function notHaveAccountregister(){
  document.getElementById("registerLoginSection").classList.add("hide");
  document.getElementById("forgotPasswordSection").classList.add("hide");
  document.getElementById("registerRegisterSection").classList.remove("hide");
} 

function haveAnAccountregister(){
  document.getElementById("registerLoginSection").classList.remove("hide");
  document.getElementById("forgotPasswordSection").classList.add("hide");
  document.getElementById("registerRegisterSection").classList.add("hide");
}

function openforgotpasswordModal(){
  document.getElementById("forgotPasswordSection").classList.remove("hide");
  document.getElementById("registerLoginSection").classList.add("hide");
  document.getElementById("registerRegisterSection").classList.add("hide");
} 

function login(elm){
     
    var type = $(elm).attr("data-type");
    var txt = $(elm).attr("data-txt");
    var loadingtxt = $(elm).attr("data-loadingtxt");

    var email = $("#loginemail").val();
    var password = $("#loginpassword").val();
    var requrl = 'login';
  
    if (!isRealValue(email)) {
        var err = 1;
        var msg = 'Please enter your email.';
        showToast(err,msg);
        return false;
    } else if (isRealValue(email) && !validateEmail(email)) {
        var err = 1;
        var msg = 'Please enter a valid email.';
        showToast(err,msg);
        return false;
    } else if (!isRealValue(password)) {
        var err = 1;
        var msg = 'Please enter the password.';
        showToast(err,msg);
        return false;
    }else{

        var elmId = $(elm).attr("id");
        $(elm).attr("disabled",true);
        var orgTxt = $(elm).attr("data-txt");
        var loadingTxt = $(elm).attr("data-loadingtxt");
        showLoader(elmId,loadingTxt); 

        var postData = {
            "_token":CSRFTOKEN,
            "email":email,
            "password":password
        };

        callajax(requrl, postData, function(resp){
            
            var err = 0;
            var msg = resp.M;
            
            $(elm).removeAttr("disabled");
            hideLoader(elmId,orgTxt);
            
            if(resp.C == 100){
                err = 0;
                window.location.href="admin/dashboard";
            }else{
                err = 1;
            }

            showToast(err,msg);

        });

    }

}
                
function register(elm){

    var type = $(elm).attr("data-type");
    var txt = $(elm).attr("data-txt");
    var loadingtxt = $(elm).attr("data-loadingtxt");

    //fname lname email password re_password
  
    var fname = $("#fname").val();
    var lname = $("#lname").val();
    var email = $("#email").val();
    var password = $("#password").val();
    var confirmPassword = $("#re_password").val();
    var agreeTerm = $("#agree_term").is(":checked");
    var requrl = 'register';
  

    var fnameObj = validateName(fname);
    var lnameObj = validateName(lname);
    var psswdValidObj = validatePassword(password);
    var cpsswdValidObj =validatePassword(confirmPassword);

    var psswdErr = psswdValidObj.err;
    var psswdMsg = psswdValidObj.msg;
    var cpsswdErr = cpsswdValidObj.err;
    var cpsswdMsg = cpsswdValidObj.msg;

    if (!isRealValue(fname)) {
        var err = 1;
        var msg = 'Please enter your first name.';
        showToast(err,msg);
        return false;
    } else if (isRealValue(fname) && fnameObj.err == 1) {
        var err = 1;
        var msg = fnameObj.msg;
        showToast(err,msg);
        return false;
    } else if (!isRealValue(lname)) {
        var err = 1;
        var msg = 'Please enter your last name.';
        showToast(err,msg);
        return false;
    } else if (isRealValue(lname) && lnameObj.err == 1) {
        var err = 1;
        var msg = lnameObj.msg;
        showToast(err,msg);
        return false;
    } else if (!isRealValue(email)) {
        var err = 1;
        var msg = 'Please enter your email.';
        showToast(err,msg);
        return false;
    } else if (isRealValue(email) && !validateEmail(email)) {
        var err = 1;
        var msg = 'Please enter a valid email.';
        showToast(err,msg);
        return false;
    } else if (!isRealValue(password)) {
        var err = 1;
        var msg = 'Please enter the password.';
        showToast(err,msg);
        return false;
    } else if (isRealValue(password) && psswdErr == 1) {
        var err = 1;
        var msg = psswdMsg;
        showToast(err,msg);
        return false;
    } else if (!isRealValue(confirmPassword)) {
        var err = 1;
        var msg = 'Please enter the confirm password.';
        showToast(err,msg);
        return false;
    } else if (isRealValue(confirmPassword) && cpsswdErr == 1) {
        var err = 1;
        var msg = cpsswdMsg;
        showToast(err,msg);
        return false;
    } else if (isRealValue(password) && isRealValue(confirmPassword) && password !== confirmPassword) {
        var err = 1;
        var msg = 'Confirm password does not match.';
        showToast(err,msg);
        return false;
    } else if (!agreeTerm) {
        // Validate Terms of Service Checkbox
        var err = 1;
        var msg = 'You must agree to the Terms of Service.';
        showToast(err,msg);
        return false;
    }else {

        var elmId = $(elm).attr("id");
        $(elm).attr("disabled",true);
        var orgTxt = $(elm).attr("data-txt");
        var loadingTxt = $(elm).attr("data-loadingtxt");
        showLoader(elmId,loadingTxt); 

        var postData = {
            "_token":CSRFTOKEN,
            "fname":fname,
            "lname":lname,
            "email":email,
            "password":password,
            "re_password":confirmPassword,
            "agree_term":agreeTerm
        };

        callajax(requrl, postData, function(resp){
            
            $(elm).removeAttr("disabled");
            hideLoader(elmId,orgTxt);
            var err = 0;
            var msg = resp.M;
            if(resp.C == 100){
                err = 0;
                
                setTimeout(function(){
                    haveAnAccountregister();
                }, 1000);

            }else{
                err = 1;
            }
            showToast(err,msg);
        });

    }

}

function resetPassword(elm) {

  var email = $("#fpemail").val();
  
  if (!isRealValue(email)) {
    
    var err = 1;
    var msg = 'Please enter your email.';
    showToast(err,msg);
    return false;
    
  }else if (isRealValue(email) && !validateEmail(email)) {
    
    var err = 1;
    var msg = 'Please enter a valid email.';
    showToast(err,msg);
    return false;
    
  }else {
    var elmId = $(elm).attr("id");
    
    $(elm).attr("disabled",true);
    var orgTxt = $(elm).attr("data-txt");
    var loadingTxt = $(elm).attr("data-loadingtxt");
    showLoader(elmId,loadingTxt); 

    var requrl = 'forgotpassword';
    var postData = {
      "_token":CSRFTOKEN,
      "email":email
    };
    
    callajax(requrl, postData, function(resp){
      
      $(".errorMessage").html(resp.M);
      $(elm).removeAttr("disabled");
      hideLoader(elmId,orgTxt);
      
      var err = 0;
      var msg = resp.M;
      if(resp.C == 100){
        err = 0;
        
      }else{
        err = 1;
      }
      showToast(err,msg);
    });
    
  }
}

function openChangePasswordModal(){
  document.getElementById("changePasswordModal").classList.add("show");
  document.querySelector(".modal-backdrop").classList.add("show");
}

function closeChangePasswordModal(){
  document.getElementById("changePasswordModal").classList.remove("show");
  document.querySelector(".modal-backdrop").classList.remove("show");

  window.location.href = "{{url('/')}}";

}

function openAdmLoginModal(){
  document.getElementById("admLoginModal").classList.add("show");
  document.querySelector(".modal-backdrop").classList.add("show");
}

function closeAdmLoginModal(){
  document.getElementById("admLoginModal").classList.remove("show");
  document.querySelector(".modal-backdrop").classList.remove("show");

  window.location.href = "{{url('/')}}";

}

function setPassword(elm){
  
  var linktoken = $("#linktoken").val();
  var password = $("#newpassword").val();
  var re_password = $("#newre_password").val();

  var psswdValidObj = validatePassword(password);
  var cpsswdValidObj = validatePassword(re_password);
  var psswdErr = psswdValidObj.err;
  var psswdMsg = psswdValidObj.msg;
  var cpsswdErr = cpsswdValidObj.err;
  var cpsswdMsg = cpsswdValidObj.msg;
   
  
  if (!isRealValue(password)) {
    var err = 1;
    var msg = 'Please enter the password.';
    showToast(err,msg);
    return false;
  } else if (isRealValue(password) && psswdErr == 1) {
    var err = 1;
    var msg = psswdMsg;
    showToast(err,msg);
    return false;
  } else if (!isRealValue(re_password)) {
    var err = 1;
    var msg = "Please enter the confirm password.";
    showToast(err,msg);
    return false;
  } else if (isRealValue(re_password) && cpsswdErr == 1) {
    var err = 1;
    var msg = cpsswdMsg;
    showToast(err,msg);
    return false;
  } else if (isRealValue(password) && isRealValue(re_password) && password !== re_password) {
    var err = 1;
    var msg = "Confirm password does not match.";
    showToast(err,msg);
    return false;
  }else {
    var elmId = $(elm).attr("id");
    
    $(elm).attr("disabled",true);
    var orgTxt = $(elm).attr("data-txt");
    var loadingTxt = $(elm).attr("data-loadingtxt");
    showLoader(elmId,loadingTxt); 

    var requrl = 'resetpassword';
    var postData = {
      "_token":CSRFTOKEN,
      "linktoken":linktoken,
      "password":password,
      "re_password":re_password,
    };
    
    callajax(requrl, postData, function(resp){

      var err = 0;    
      var msg = resp.M;
      $(elm).removeAttr("disabled");
      hideLoader(elmId,orgTxt);
      
      if(resp.C == 100){
        err = 0;
        setTimeout(function(){
          window.location.href= "{{url('/')}}";
        }, 3000);
        
      }else{
        err = 1;
      }
  
      showToast(err,msg);
    });
    
  }

}

function admLogin(elm) {
   
    var email = $("#admemail").val();
    var password = $("#admpassword").val();
    
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