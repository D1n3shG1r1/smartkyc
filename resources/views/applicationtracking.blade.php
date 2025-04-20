@extends("app")
@section("contentbox")
<link >
<style>

    *, body{
        font-family: var(--bs-body-font-family);
    }

    .form-container{
        padding: 15%;
        margin: auto;
    }

    .formTitle{
        color: #002E5B !important;
        font-family: var(--bs-body-font-family);
    }

    .input_applicationid, .input_applicationid:focus{
        color: #002E5B !important;
        background: #fff !important;
        border-color: #ffd61f !important;
    }
    .trackButton, .trackButton:hover{
        color: #002E5B !important;
        background: #fff !important;
        border-color: #ffd61f !important;
    }

    .resultForm {
        border-top: 1px solid #bbb;
        padding-top: 15px;
    }
</style>

<main class="body-container-wrapper">
    <div class="container-fluid body-container">
        <div class="row-fluid-wrapper">
            <div class="form-container col-md-9">
                <div class="row">
                    <form>
                        <div class="row">    
                            <div class="col-md-12">
                                <h2 class="formTitle">Know your apllication status</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="input_applicationid" class="form-label">Application ID</label>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" id="input_applicationid" class="input_applicationid form-control" placeholder="Enter your Application-Id" aria-label="Enter your Application-Id" aria-describedby="button-addon2">
                            <button class="btn btn-outline-secondary trackButton" type="button" id="trackingButton" data-txt='<i class="fa fa-paper-plane-o"></i>&nbsp;Track' data-loadingtxt='<i class="fa fa-paper-plane-o"></i>&nbsp;Tracking...' onclick="trackApplication(this);"><i class="fa fa-paper-plane-o"></i>&nbsp;Track</button>
                        </div>
                    </form>
                </div>

                <div class="row">
                    <form class="resultForm">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="formTitle">Status Outcome</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label">Application ID:</label>
                                </div>
                                <div class="col-md-6">
                                    <label id="applicationId" class="form-label">Loading...</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label">Applicant Details:</label>
                                </div>
                                <div class="col-md-6">
                                    <label id="applicantDetails" class="form-label">Loading...</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label">Status:</label>
                                </div>
                                <div class="col-md-6">
                                    <label id="applicationStatus" class="form-label">Loading...</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label">Disrepancy:</label>
                                </div>
                                <div class="col-md-6">
                                    <label id="applicationDisrepancy" class="form-label">Loading...</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label">Note:</label>
                                </div>
                                <div class="col-md-6">
                                    <label id="note" class="form-label">Loading...</label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
@push("js")
<script>
    function trackApplication(elm){

        $("#applicationId, #applicantDetails, #applicationStatus, #applicationDisrepancy, #note").html("Loading...");

        const applicationId = $("#input_applicationid").val();
    
        if(!isRealValue(applicationId)){
            var err = 1;
            var msg = "Please enter your valid Application-Id for tracking."
            showToast(err,msg);
            return false;
        }else{
        
            var elmId = $(elm).attr("id");
            $(elm).attr("disabled",true);
            var orgTxt = $(elm).attr("data-txt");
            var loadingTxt = $(elm).attr("data-loadingtxt");
            showLoader(elmId,loadingTxt); 
            

            var requrl = "processTracking"
            var jsondata = {"applicationId":applicationId};
            
            callajax(requrl, jsondata, function(resp){
                
                $(elm).removeAttr("disabled");
                hideLoader(elmId,orgTxt);
        
                if(resp.C == 100){
                    var app = resp.R
                    var fname = app.fname;
                    var lname = app.lname;
                    var fullName = fname+' '+lname;
                    fullName = fullName.trim();
                    fullName = capatilizeWordsInPhrase(fullName);

                    var email = app.email;
                    var documentTypeVal = app.documentTypeVal;
                    var verificationStatus = app.verificationStatus;
                    var verificationOutcomeTxt = app.verificationOutcomeTxt;
                    var discrepanciesTxt = app.discrepanciesTxt;
                    var note = app.specifyDiscrepancy;

                    $("#applicationId").html(applicationId);
                    $("#applicantDetails").html(fullName+' ('+email+')');
                    $("#applicationStatus").html(verificationStatus+' ('+verificationOutcomeTxt+')');
                    $("#applicationDisrepancy").html(discrepanciesTxt);
                    $("#note").html(note);
                }else{
                    var err = 1;
                    var msg = "The entered Application ID is invalid."
                    showToast(err,msg);
                    return false;
                }
                /*[customerId] => 1744989418580713
                    [requestSubmitted] => 0
                    [documentType] => Company_registration_certificates,Tax_clearance_certificates,Bank_statements
                    [documentNo] => 
                    [verificationOutcome] => 1
                    [discrepancies] => 0
                    [specifyDiscrepancy] => 
                    [verificationStatus] => Pending
                    [createDateTime] => 2025-04-18 16:08:43
                    [updateDateTime] => 2025-04-18 16:08:43
                    [fname] => gemini
                    [lname] => 
                    [email] => gemini@example.com
                    [documentTypeVal] => Array
                        (
                            [0] => Company registration certificates
                            [1] => Tax clearance certificates
                            [2] => Bank statements
                        )

                    [discrepanciesTxt] => 
                    [verificationOutcomeTxt] => Verification in Progress*/
            });
        }
    }  
</script>
@endpush