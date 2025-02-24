@extends("app")
@section("contentbox")
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>Details</h2>
                </div>
            </div>
        </div>
        <!-- row -->
        <div class="row column1">
            <div class="col-md-3">
                <div class="white_shd full margin_bottom_30">
                    <div class="drow mb-3">
                        <span class="photoSpan white_shd-dk">
                            <img class="profilephotoimg img-responsive rounded-circle" src="<?php echo url(userImagesDisplayPath($customer['id'],"pp-".$customer['id'].".jpg"))?>" onerror="this.onerror=null; this.src='{{url('assets/admin/img/user.png')}}';" alt="{{$customer['fname'].' '.$customer['lname']}}" />
                        </span>
                    </div>
                </div>
                <div class="white_shd full margin_bottom_30">
                    <div class="full graph_head">
                        <div class="heading1 margin_0">
                            <h2>Package Details</h2>
                        </div>
                    </div>
                    <div class="full price_table padding_infor_info">
                        <div class="row mb-3">
                            <div class="col-md-12 pdl-5 pdr-5">
                                <label class="form-label">Pakage:</label>
                                <select class="form-input">
                                    <option value="" {{ empty($package["package"]) ? 'selected' : '' }}>Please select a package</option>
                                    <option value="package-payasyougo" {{ $package["package"] == 'package-payasyougo' ? 'selected' : '' }}>Pay-As-You-Go</option>
                                    <option value="package-basic" {{ $package["package"] == 'package-basic' ? 'selected' : '' }}>Basic</option>
                                    <option value="package-business" {{ $package["package"] == 'package-business' ? 'selected' : '' }}>Business</option>
                                    <option value="package-enterprise" {{ $package["package"] == 'package-enterprise' ? 'selected' : '' }}>Enterprise</option>
                                </select>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12 pdl-5 pdr-5">
                                <label class="form-label">Active on:</label>
                                <input class="form-input" type="date" value="{{ $package['starton'] }}" min="{{ $package['starton'] }}"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12 pdl-5 pdr-5">
                                <label class="form-label">Expires on:</label>
                                <input class="form-input" type="date" value="{{ $package['expireon'] }}" min="{{ date('Y-m-d') }}"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <button type="button" class="btn cur-p btn-outline-primary">Cancel</button>
                            </div>
                            <div class="col-md-6">  
                                <button type="button" id="saveBtn" class="btn cur-p btn-primary" data-txt="Save" data-loadingtxt="Saving..." onclick="validateForm(this);">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-9">
                <div class="white_shd full margin_bottom_30">
                    <div class="full graph_head">
                        <div class="heading1 margin_0">
                            <h2>Customer Profile</h2>
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
                                            
                                        <input type="hidden" class="form-input" name="adminId" id="adminId" value="{{$customer['id']}}">
                                        <label for="fname" class="form-label">First Name<span class="required">*</span></label>
                                        <input type="text" class="form-input" name="fname" id="fname" placeholder="First Name" value="{{$customer['fname']}}">
                                        </div>
                                        <div class="col-md-6">
                                        <label for="lname" class="form-label">Last Name<span class="required">*</span></label>
                                        <input type="text" class="form-input" name="lname" id="lname" placeholder="Last Name" value="{{$customer['lname']}}">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <div class="col-md-6">
                                            <label for="address_1" class="form-label">Address 1<span class="required">*</span></label>
                                            <input type="text" class="form-input" name="address_1" id="address_1" placeholder="Address 1" value="{{$customer['address_1']}}">
                                        </div>
                                        <div class="col-md-6">
                                        <label for="address_2" class="form-label">Address 2<span class="required">*</span></label>
                                        <input type="text" class="form-input" name="address_2" id="address_2" placeholder="Address 2" value="{{$customer['address_2']}}">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <div class="col-md-6">
                                            <label for="city" class="form-label">City<span class="required">*</span></label>    
                                            <input type="text" class="form-input" name="city" id="city" placeholder="City" value="{{$customer['city']}}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="state" class="form-label">State<span class="required">*</span></label>
                                            <input type="text" class="form-input" name="state" id="state" placeholder="Province/State" value="{{$customer['state']}}">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <div class="col-md-6">
                                            <label for="country" class="form-label">Country<span class="required">*</span></label>
                                            <input type="text" class="form-input" name="country" id="country" placeholder="Country" value="{{$customer['country']}}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="zipcode" class="form-label">Zipcode<span class="required">*</span></label>
                                            <input type="text" class="form-input" name="zipcode" id="zipcode" placeholder="Zipcode" value="{{$customer['zipcode']}}">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <div class="col-md-6">
                                            <label for="company" class="form-label">Company<span class="required">*</span></label>
                                            <input type="text" class="form-input" name="company" id="company" placeholder="Company" value="{{$customer['company']}}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="website" class="form-label">Website<span class="required">*</span></label>
                                            <input type="text" class="form-input" name="website" id="website" placeholder="Website" value="{{$customer['website']}}">
                                        </div>
                                        
                                    </div>
                                    <div class="form-group row mb-3">
                                        <div class="col-md-6">
                                            <label for="email" class="form-label">Email<span class="required">*</span></label>
                                            <input type="email" class="form-input" name="email" id="email" placeholder="Email" value="{{$customer['email']}}" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="phone" class="form-label">Phone<span class="required">*</span></label>
                                            <input type="text" class="form-input" name="phone" id="phone" placeholder="Phone" value="{{$customer['phone']}}">
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
</div>
@endsection
@push("js")
<script>

function validateForm(elm) {
    // Get the dropdown and date input values
    var adminId = "{{$customer['id']}}";
    var packageSelect = document.querySelector('select.form-input');
    var activeDate = document.querySelector('input[type="date"][value="{{ $package['starton'] }}"]');
    var expireDate = document.querySelector('input[type="date"][value="{{ $package['expireon'] }}"]');

    // Validate package selection
    if (packageSelect.value === "") {
        var err = 1;
        var msg = "Please select a package.";
        showToast(err,msg);
        return false;    
    }
    
    // Validate "Active on" date
    var currentDate = new Date().toISOString().split('T')[0]; // Get today's date in Y-m-d format
    if (activeDate.value === "" || activeDate.value < currentDate) {
        var err = 1;
        var msg = "Please select a valid active date (it cannot be in the past).";
        showToast(err,msg);
        return false;
    }

    // Validate "Expires on" date
    if (expireDate.value === "") {
        var err = 1;
        var msg = "Please select an expiration date.";
        showToast(err,msg);
        return false;
    }

    if (expireDate.value < activeDate.value) {
        var err = 1;
        var msg = "The expiration date cannot be earlier than the active date.";
        showToast(err,msg);
        return false;
    }

    // If all validations pass, show the confirmation dialog
    var userConfirmation = confirm("Do you want to save or update the package details?");
    if (userConfirmation) {

        var elmId = $(elm).attr("id");
        $(elm).attr("disabled",true);
        var orgTxt = $(elm).attr("data-txt");
        var loadingTxt = $(elm).attr("data-loadingtxt");
        showLoader(elmId,loadingTxt); 

        var requrl = "admin/admin-updatepackage";
        var postdata = {
            "adminId":adminId,
            "package":packageSelect.value,
            "starton":activeDate.value,
            "expire":expireDate.value
        };
        callajax(requrl, postdata, function(resp){

            $(elm).removeAttr("disabled");
            hideLoader(elmId,orgTxt);

            $(".errorMessage").html(resp.M);
            var err = 1;
            if(resp.C == 100){
                err = 0;
            }
            
            var msg = resp.M;
            showToast(err,msg);
            
        });
        return true;
    } else {
        return false; // Prevent form submission if the user clicks "Cancel"
    }
}
</script>
@endpush