@extends("app")
@section("contentbox")
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>My Profile</h2>
                </div>
            </div>
        </div>
        <!-- row -->
        <div class="row column1">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="white_shd full margin_bottom_30">
                    <div class="full graph_head">
                        <div class="heading1 margin_0">
                            <h2>Basic Info</h2>
                        </div>
                    </div>
                    <div class="full price_table padding_infor_info">
                        <div class="row">
                            <!-- user profile section --> 
                            <!-- profile image -->
                            <div class="col-lg-12">
                                <div class="full dis_flex center_text">
                                <form class="profile_contant">
                                    <div class="form-group row mb-3">
                                        <div class="col-md-6">
                                            
                                        <label for="fname" class="form-label">First Name<span class="required">*</span></label>
                                        <input type="text" class="form-input" name="fname" id="fname" placeholder="First Name" value="{{ucfirst($user['fname'])}}">
                                        </div>
                                        <div class="col-md-6">
                                        <label for="lname" class="form-label">Last Name<span class="required">*</span></label>
                                        <input type="text" class="form-input" name="lname" id="lname" placeholder="Last Name" value="{{ucfirst($user['lname'])}}">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row mb-3">
                                        <div class="col-md-6">
                                            <label for="email" class="form-label">Email<span class="required">*</span></label>
                                            <input type="email" class="form-input" name="email" id="email" placeholder="Email" value="{{$user['email']}}">
                                        </div>
                                        <div class="col-md-6 profile-btn-box">
                                            <label class="form-label hidden">hidden label</label>
                                            <button type="button" id="saveBtn" class="marginTop-51 btn cur-p btn-primary" data-txt="Save" data-loadingtxt="Saving..." onclick="updateInfo(this);">Save</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            <!-- end row -->
            
            <div class="white_shd full margin_bottom_30">
                <div class="full graph_head">
                    <div class="heading1 margin_0">
                        <h2>Change Password</h2>
                    </div>
                </div>
                <div class="full price_table padding_infor_info">
                    <div class="row">
                        <!-- user profile section --> 
                        <!-- profile image -->
                        <div class="col-lg-12">
                            <div class="full dis_flex center_text">
                                <form>
                                    <div class="form-group row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Old Password<span class="required">*</span></label>
                                            <input type="password" class="form-input" name="oldpassword" id="oldpassword" placeholder="Old Password" value="">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">New Password<span class="required">*</span></label>
                                            <input type="password" class="form-input" name="newpassword" id="newpassword" placeholder="New Password" value="">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">    
                                        <div class="col-md-6">
                                            <label class="form-label">Confirm Password<span class="required">*</span></label>
                                            <input type="password" class="form-input" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password" value="">
                                        </div>
                                        <div class="col-md-6 profile-btn-box">
                                            <label class="form-label hidden">hidden label</label>
                                            <button type="button" id="saveBtn" class="marginTop-51 btn cur-p btn-primary" data-txt="Save" data-loadingtxt="Saving..." onclick="updatePassword(this);">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            </div>
        </div>
    </div>
</div>
@endsection
@push("js")
<script>

function updateInfo(elm){
    const isRequired = (value) => value && value.trim() !== "";
    var currentemail = "{{$currentemail}}";
    var fname = $("#fname").val();
    var lname = $("#lname").val();
    var email = $("#email").val();

    var fnameObj = validateName(fname);
    var lnameObj = validateName(lname);

    // Check for first name
    if (!isRequired(fname)) {
        showToast(1, "First name is required.");
        return false;
    }
    if (fnameObj.err === 1) {
        showToast(1, fnameObj.msg);
        return false;
    }

    // Check for last name
    if (!isRequired(lname)) {
        showToast(1, "Last name is required.");
        return false;
    }
    if (lnameObj.err === 1) {
        showToast(1, lnameObj.msg);
        return false;
    }

    // Check for email
    if (!isRequired(email)) {
        showToast(1, "Please enter your email.");
        return false;
    }
    if (!validateEmail(email)) {
        showToast(1, "Please enter a valid email.");
        return false;
    }

    // Proceed if email has changed or if it's the same
    var elmId = $(elm).attr("id");
    var orgTxt = $(elm).attr("data-txt");
    var loadingTxt = $(elm).attr("data-loadingtxt");
    $(elm).attr("disabled", true);
    showLoader(elmId, loadingTxt); 

    var requrl = "admin/updatemyprofile";
    var postdata = {
        "fname": fname,
        "lname": lname,
        "email": email
    };

    if (email !== currentemail) {
        var userConfirmation = confirm("Do you want to change your email?");
        if (!userConfirmation) {
            $(elm).removeAttr("disabled");
            hideLoader(elmId, orgTxt);
            return false; // Abort if user doesn't confirm the email change
        }
    }

    // Call the AJAX request to update the profile
    callajax(requrl, postdata, function(resp) {
        $(elm).removeAttr("disabled");
        hideLoader(elmId, orgTxt);

        $(".errorMessage").html(resp.M);
        var err = (resp.C === 100) ? 0 : 1; // Set err based on the response code
        showToast(err, resp.M);

        setTimeout(function(){
            location.reload();
        }, 1000)
        
    });
}

function updatePassword(elm) {
    var oldpassword = $("#oldpassword").val();
    var newpassword = $("#newpassword").val();
    var confirmpassword = $("#confirmpassword").val();

    var psswdValidObj = validatePassword(newpassword);
    var cpsswdValidObj = validatePassword(confirmpassword);
    var psswdErr = psswdValidObj.err;
    var psswdMsg = psswdValidObj.msg;
    var cpsswdErr = cpsswdValidObj.err;
    var cpsswdMsg = cpsswdValidObj.msg;

    // Check if old password is entered
    if (!isRealValue(oldpassword)) {
        showToast(1, "Please enter your current password.");
        return false;
    }

    // Check if new password is entered and valid
    if (!isRealValue(newpassword)) {
        showToast(1, "Please enter a new password.");
        return false;
    } else if (psswdErr == 1) {
        showToast(1, psswdMsg);
        return false;
    }

    // Check if confirm password is entered and valid
    if (!isRealValue(confirmpassword)) {
        showToast(1, "Please enter the confirm password.");
        return false;
    } else if (cpsswdErr == 1) {
        showToast(1, cpsswdMsg);
        return false;
    }

    // Check if new password matches confirm password
    if (newpassword !== confirmpassword) {
        showToast(1, "Confirm password does not match.");
        return false;
    }

    var elmId = $(elm).attr("id");
    var orgTxt = $(elm).attr("data-txt");
    var loadingTxt = $(elm).attr("data-loadingtxt");
    $(elm).attr("disabled", true);
    showLoader(elmId, loadingTxt); 

    var requrl = "admin/updatepassword";
    var postdata = {
        "oldpassword": oldpassword,
        "newpassword": newpassword,
        "confirmpassword": confirmpassword
    };

    callajax(requrl, postdata, function(resp) {
        $(elm).removeAttr("disabled");
        hideLoader(elmId, orgTxt);

        var err = (resp.C === 100) ? 0 : 1; // Set err based on the response code
        showToast(err, resp.M);

        setTimeout(function(){
            location.reload();
        }, 1000)
        
    });
}


</script>
@endpush