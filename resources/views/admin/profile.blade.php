@extends("app")
@section("contentbox")
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
        <div class="col-md-12">
            <div class="page_title">
                <h2>Profile</h2>
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
                    <h2>User profile</h2>
                    </div>
                </div>
                <div class="full price_table padding_infor_info">
                    <div class="row">
                    <!-- user profile section --> 
                    <!-- profile image -->
                    <div class="col-lg-12">
                        <div class="full dis_flex center_text">
                        <form class="profile_contant">
                            <div class="form-group row">
                                <div class="col">
                                    <input type="text" class="form-input" name="fname" id="fname" placeholder="First Name" value="{{$user['fname']}}">
                                </div>
                                <div class="col">
                                <input type="text" class="form-input" name="lname" id="lname" placeholder="Last Name" value="{{$user['lname']}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col">
                                    <input type="text" class="form-input" name="address_1" id="address_1" placeholder="Address 1" value="{{$user['address_1']}}">
                                </div>
                                <div class="col">
                                <input type="text" class="form-input" name="address_2" id="address_2" placeholder="Address 2" value="{{$user['address_2']}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col">
                                    <input type="text" class="form-input" name="city" id="city" placeholder="City" value="{{$user['city']}}">
                                </div>
                                <div class="col">
                                <input type="text" class="form-input" name="state" id="state" placeholder="Province/State" value="{{$user['state']}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col">
                                    <input type="text" class="form-input" name="country" id="country" placeholder="Country" value="{{$user['country']}}">
                                </div>
                                <div class="col">
                                <input type="text" class="form-input" name="zipcode" id="zipcode" placeholder="Zipcode" value="{{$user['zipcode']}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col">
                                    <input type="text" class="form-input" name="company" id="company" placeholder="Company" value="{{$user['company']}}">
                                </div>
                                <div class="col">
                                <input type="text" class="form-input" name="website" id="website" placeholder="Website" value="{{$user['website']}}">
                                </div>
                                
                            </div>
                            <div class="form-group row">
                                <div class="col">
                                    <input type="email" class="form-input" name="email" id="email" placeholder="Email" value="{{$user['email']}}" readonly>
                                </div>
                                <div class="col">
                                <input type="text" class="form-input" name="phone" id="phone" placeholder="Phone" value="{{$user['phone']}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col profile-btn-box">
                                    <button type="button" class="btn cur-p btn-outline-primary">Cancel</button>
                                    <button type="button" class="btn cur-p btn-primary" data-txt="Save" data-loadingtxt="Saving..." onclick="validateForm();">Save</button>
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
        </div>
        
    </div>
</div>
@endsection
@push("js")
<script>

function validateForm() {
    const errors = {};

    // Helper functions for validation
    const isRequired = (value) => value && value.trim() !== "";
    const isValidZipCode = (value) => /^[0-9]{5}(-[0-9]{4})?$/.test(value);
    const isValidPhone = (value) => /^\+?[0-9]{7,15}$/.test(value);
    const isValidWebsite = (value) => /^(https?:\/\/)?([\w.-]+)\.([a-z\.]{2,6})([\/\w .-]*)*\/?$/.test(value);

    // Validate each field
    var fname = $("#fname").val();
    var lname = $("#lname").val();
    var address_1 = $("#address_1").val();
    var address_2 = $("#address_2").val();
    var city = $("#city").val();
    var state = $("#state").val();
    var country = $("#country").val();
    var zipcode = $("#zipcode").val();
    var company = $("#company").val();
    var website = $("#website").val();
    var phone = $("#phone").val();
    
    var fnameObj = validateName(fname);
    var lnameObj = validateName(lname);
  
    const validCharacters = /^[A-Za-z0-9\s]+$/; // Only letters, numbers and spaces
    //!validCharacters.test(name)
  
    
    Last name is required.
    Address line 1 is required.
    Address line 2 is required.
    Website must be a valid URL.
    Company name is required.
    Phone number must be valid (e.g., +123456789).
    if (!isRealValue(fname)) {
        $(".errorMessage").html("First name is required.");
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
        $(".errorMessage").html("Last name is required.");
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
    }else if(!isRealValue(address_1)){
        $(".errorMessage").html("Address line 1 is required.");
        $("#address_1").on("keyup", function () {
        $(".errorMessage").html("");
        });
        return false;
    }else if(!isRealValue(address_2)){
        $(".errorMessage").html("Address line 2 is required.");
        $("#address_2").on("keyup", function () {
        $(".errorMessage").html("");
        });
        return false;
    }else if(!isRealValue(city)){
        $(".errorMessage").html("City is required.");
        $("#city").on("keyup", function () {
        $(".errorMessage").html("");
        });
        return false;
    }else if(!isRealValue(state)){
        $(".errorMessage").html("State is required.");
        $("#state").on("keyup", function () {
        $(".errorMessage").html("");
        });
        return false;
    }else if(!isRealValue(country)){
        $(".errorMessage").html("Country i required.");
        $("#country").on("keyup", function () {
        $(".errorMessage").html("");
        });
        return false;
    }else if(!isRealValue(zipcode)){
        $(".errorMessage").html("Zipcode is required.");
        $("#zipcode").on("keyup", function () {
        $(".errorMessage").html("");
        });
        return false;
    }else if(isRealValue(zipcode) && !isValidZipCode(zipcode)){
        $(".errorMessage").html("Zip code must be valid (e.g., 12345 or 12345-6789).");
        $("#zipcode").on("keyup", function () {
        $(".errorMessage").html("");
        });
        return false;
    }else if(!isRealValue(company)){
        $(".errorMessage").html("Company name is required.");
        $("#company").on("keyup", function () {
        $(".errorMessage").html("");
        });
        return false;
    }else if(!isRealValue(website)){
        $(".errorMessage").html("Website must be a valid URL.");
        $("#website").on("keyup", function () {
        $(".errorMessage").html("");
        });
        return false;
    }else if(isRealValue(website) && !isValidWebsite(website)){
        $(".errorMessage").html("Website must be a valid URL.");
        $("#website").on("keyup", function () {
        $(".errorMessage").html("");
        });
        return false;
    }else if(!isRealValue(phone)){
        $(".errorMessage").html("Enter phone");
        $("#phone").on("keyup", function () {
        $(".errorMessage").html("");
        });
        return false;
    }else{

    }

    return false;
    if (!isRequired(fields.firstname)) {
        errors.firstname = "First name is required.";
    }

    if (!isRequired(fields.lastname)) {
        errors.lastname = "Last name is required.";
    }

    if (!isRequired(fields.address1)) {
        errors.address1 = "Address line 1 is required.";
    }

    // Address2 is optional, so no validation

    if (!isRequired(fields.city)) {
        errors.city = "City is required.";
    }
    City is required. State is required. Country is required.
    if (!isRequired(fields.state)) {
        errors.state = "State is required.";
    }

    if (!isRequired(fields.country)) {
        errors.country = "Country is required.";
    }

    if (!isValidZipCode(fields.zipcode)) {
        errors.zipcode = "Zip code must be valid (e.g., 12345 or 12345-6789).";
    }
    
    if (fields.website && !isValidWebsite(fields.website)) {
        errors.website = "Website must be a valid URL.";
    }
    
    if (!isRequired(fields.companyName)) {
        errors.companyName = "Company name is required.";
    }

    if (!isValidPhone(fields.phone)) {
        errors.phone = "Phone number must be valid (e.g., +123456789).";
    }

    return errors;
}


</script>
@endpush