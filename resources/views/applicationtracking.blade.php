@extends("app")
@section("contentbox")
<link >
<style>

.trackForm {
    position: relative;
    width: 100%;
}

.trackForm input {
    height: 60px;
    border: 2px solid #1d2434;
    border-radius: 0;
}

.trackForm .btn {
    position: absolute;
    top: 8px;
    right: 8px;
    height: 44px;
    padding: 8px 20px;
    font-size: 14px;
    font-weight: 600;
    color: #092a49;
    background: none;
    border-radius: 0;
    border: 2px solid #092a49;
    transition: .3s;
}

.app-label {
    position: relative;
    display: inline-block;
    color: #0796fe;
    font-size: 1rem;
    font-weight: 300;
    font-family: 'Oswald', sans-serif;
}

.app-value{
    color: #092a49;
    font-size:1rem;
    margin: 0;
}



.feature .counters h2 {
    font-size: 1.2rem !important;
}

.feature .counters p {
    font-size: 1.2rem !important;
}
</style>

<!-- Feature Start -->
<div class="feature mt-3">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-md-6">
                <div class="feature-img">
                    <img src="{{url('assets/img/business-man.png')}}" alt="Image">
                </div>
            </div>
            <div class="col-md-6">
                <div class="section-header">
                    <p>Track Application</p> 
                    <h2>Find Out Where Your Application Stands</h2>
                </div>
                <p>
                Enter your Application ID to view the status.
                </p>
                <div class="row counters">
                    <div class="col-12">
                        <div class="trackForm">
                            <input type="text" id="input_applicationid" class="form-control"  onkeyup="idKeyup()" placeholder="Enter your Application-Id">
                            <button id="trackingButton" class="btn" data-txt='<i class="fa fa-paper-plane-o"></i>&nbsp;Track' data-loadingtxt='<i class="fa fa-paper-plane-o"></i>&nbsp;Tracking...' onclick="trackApplication(this);"><i class="fa fa-paper-plane-o"></i>&nbsp;Track</button></button>
                        </div>
                        
                    </div>
                </div>
                
                <div class="resultForm">
                    <div class="section-header mt-4 mb-2">
                        <h4>Status Outcome</h4> 
                    </div>
                    <p></p>
                    
                    <div class="row counters">
                        <div class="col-12">
                            <div class="counters-text">
                                <h2 class="counters-text-h2" data-toggle="counter-upd">Application ID</h2>
                                <p id="applicationId" class="counters-text-p"></p>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="counters-text">
                                <h2 class="counters-text-h2" data-toggle="counter-upd">Applicant Details</h2>
                                <p id="applicantDetails" class="counters-text-p"></p>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="counters-text">
                                <h2 class="counters-text-h2" data-toggle="counter-upd">Status</h2>
                                <p id="applicationStatus" class="counters-text-p"></p>
                            </div> 
                        </div>

                        <div class="col-12">
                            <div class="counters-text">
                                <h2 class="counters-text-h2" data-toggle="counter-upd">Disrepancy</h2>
                                <p id="applicationDisrepancy" class="counters-text-p"></p>
                            </div> 
                        </div>

                        <div class="col-12">
                            <div class="counters-text">
                                <h2 class="counters-text-h2" data-toggle="counter-upd">Note</h2>
                                <p id="note" class="counters-text-p"></p>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Feature End -->

@endsection
@push("js")
<script>

    function idKeyup(){
        //$(".resultForm").fadeOut("slow");
        $("#applicationId, #applicantDetails, #applicationStatus, #applicationDisrepancy, #note").html("");
    }

    function trackApplication(elm){
        
        

        const applicationId = $("#input_applicationid").val();
    
        if(!isRealValue(applicationId)){
            var err = 1;
            var msg = "Please enter your valid Application-Id for tracking."
            showToast(err,msg);
            return false;
        }else{
            
            $("#applicationId, #applicantDetails, #applicationStatus, #applicationDisrepancy, #note").html("Loading...");

            var elmId = $(elm).attr("id");
            $(elm).attr("disabled",true);
            var orgTxt = $(elm).attr("data-txt");
            var loadingTxt = $(elm).attr("data-loadingtxt");
            showLoader(elmId,loadingTxt); 
            
            $(".resultForm").fadeIn("slow");

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
                    $("#applicantDetails").html(fullName);
                    $("#applicationStatus").html(verificationStatus);
                    $("#applicationDisrepancy").html(discrepanciesTxt);
                    $("#note").html(note);
                }else{
                    var err = 1;
                    var msg = "The entered Application ID is invalid."
                    showToast(err,msg);
                    return false;
                }
                
            });
        }
    }  
</script>
@endpush