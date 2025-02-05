@php

$id = $application["id"];
$adminId = $application["adminId"];
$portalId = $application["portalId"];
$customerId = $application["customerId"];
$title = ucwords($application["title"]);
$description = ucwords($application["description"]);
$documentType = ucwords($application["documentType"]);
$documentNo = $application["documentNo"];
$comment = ucwords($application["comment"]);
$verificationStatus = $application["verificationStatus"];
$verificationOutcome = $application["verificationOutcome"];
$verificationOutcomeTxt = ucwords($application["verificationOutcomeTxt"]);
$documents = $application["documents"];
$customer = $application["customerDetails"];

@endphp
@extends("app")
@section("contentbox")
<style>
    .preview {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-top: 10px;
    }

    .preview img,
    .preview object {
      max-width: 200px;
      margin-bottom: 10px;
    }

    .file-preview {
        position: relative;
        margin-bottom: 10px;
        width: fit-content;
        margin: auto;
    }
    
    .delete-btn {
        position: absolute;
        top: 0;
        right: 0;
        border: none;
        padding: 0px 5px 0px 0px;
        background: transparent;
        cursor: pointer;
    }

    .delete-btn .fa.fa-remove{
        color:red;
    }

    .uploadButton{
        width: fit-content;
        margin: auto;
        cursor: pointer;
    }

</style>
<div class="container-fluid">
    <div class="row column_title">
        <div class="col-md-12">
            <div class="page_title">
                <h2>Application Details</h2>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
        <div class="white_shd full margin_bottom_30">
            
            <div class="full graph_head">
                <form class="full graph_head">
                <div class="row mb-3">
                    <div class="col-md-6 heading1 margin_0 pdr-20 borderright-1">
                        <div>
                            <h6>Info</h6>
                            <div class="mb-3">
                                <label class="col-md-6 form-label">Application-Id:</label><label class="col-md-6 form-label">{{$id}}</label>
                                <label class="col-md-6 form-label">Status:</label><label class="col-md-6 form-label">{{ucwords($verificationStatus)}}</label>
                                <label class="col-md-6 form-label">Verification Outcome:</label><label class="col-md-6 form-label">{{$verificationOutcomeTxt}}</label>
                                <label class="col-md-6 form-label">Discrepancies Found:</label><label class="col-md-6 form-label"></label>
                            </div>
                        </div>
                        <div>
                            <h6>Applicant Details</h6>
                            <div class="mb-3">
                                <label class="col-md-6 form-label">Name:</label><label class="col-md-6 form-label">{{ucwords($customer['fname'].' '.$customer['lname'])}}</label>
                                <label class="col-md-6 form-label">Email:</label><label class="col-md-6 form-label">{{$customer['email']}}</label>
                            </div>
                        </div>                    
                    </div>
                    <div class="col-md-6 heading1 margin_0 pdl-20">
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <h6>Status</h6>
                                <select class="form-select form-control" id="documentStatus" name="documentStatus">
                                    <option value="">--Select Status--</option>
                                    <option value="verified">Verified</option>
                                    <option value="not verified">Not Verified</option>
                                    <option value="pending">Pending</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <h6>Verification Method</h6>
                                <select class="form-select form-control" id="verificationMethod" name="verificationMethod">
                                    <option value="">--Select Verification Method--</option>
                                    <option value="automated system check">Automated System Check</option>
                                    <option value="manual review">Manual Review</option>
                                    <option value="contact with issuing authority">Contact with Issuing Authority</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <h6>Verification Outcome</h6>
                                <select class="form-select form-control" id="verificationOutcome" name="verificationOutcome">
                                @php
                                foreach($verificationOutcomeOptions as $k => $vrfyOutOpt){
                                    $opt = '<option value="'.$k.'">'.$vrfyOutOpt.'</option>';   
                                    echo $opt;
                                }
                                @endphp
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <h6>Discrepancies</h6>
                                <select class="form-select form-control" id="discrepancies" name="discrepancies" onchange="discrepancyOnchange(this);">
                                <option value="">--Select Discrepancy--</option>
                                @php
                                foreach($DiscrepanciesOptions as $kk => $dspOpt){
                                    $opt = '<option value="'.$kk.'">'.$dspOpt.'</option>';   
                                    echo $opt;
                                }
                                @endphp
                                </select>
                            </div>
                        </div>
                        <div id="specifyDiscrepancyBox" class="row mb-3 hideMe">
                            <div class="col-md-12">
                                <h6>Specify</h6>
                                <textarea class="form-control" id="specifyDiscrepancy" name="specifyDiscrepancy" style="resize:none;" rows="3" placeholder="Specify the discrepancy details..." maxlength="160" oninput="updateCharacterCount()"></textarea>
                                <p class="text-align-right">Remaining characters: <span id="remainingChars">160</span></p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <button type="button" id="updateStatusBtn" class="updateStatusBtn btn cur-p btn-outline-primary" data-txt="Update" data-loadingtxt="Saving..." onclick="updateStatus();">Update</button>    
                            </div>
                        </div>    
                    </div>
                </div>
                </form>
            </div>
            <!-- Form -->
            <form class="full graph_head" id="documentForm">  
                            
                <div class="row mb-3">
                    <div class="col-md-6">
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="title" class="form-label">Document Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Document title" value="{{$title}}" readonly disabled>
                        </div>
                    </div>
                        <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="documentType" class="form-label">Document Type</label>
                            <select class="form-select form-control" id="documentType" name="documentType" disabled>
                                <option selected>{{$documentType}}</option>
                            </select>
                        </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                            <label for="documentNumber" class="form-label">Document Number</label>
                            <input type="text" class="form-control" id="documentNumber" placeholder="Document Number" value="{{$documentNo}}" readonly disabled>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" style="resize:none;" rows="8" placeholder="Description..." readonly disabled>{{$description}}</textarea>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="uploadDocumentt" class="form-label">Uploaded Documents</label>
                    <div class="border rounded p-3 text-center">
                        @php
                        foreach($documents as $document){
                            $filePath = $document["filePath"];
                            $mimeType = $document["mimeType"];
                            
                            if($mimeType == "application/pdf"){
                                //pdf file
                                $icon = '<i class="fa fa-file-pdf-o"></i>';
                                
                            }else{
                                //jpeg png file
                                $icon = '<i class="fa fa-file-image-o"></i>';
                            }
                        @endphp
                        <div class="documentBlock">
                            {!! $icon !!}
                            <a href="{{url($filePath)}}" class="btn cur-p btn-outline-primary" target="_blank" download>View</a>
                        </div>
                        
                        @php    
                        }
                        @endphp
                        
                        
                    </div>
                </div>

                <div class="mb-3">
                    <label for="comments" class="form-label">Additional Comments</label>
                    <textarea class="form-control" id="comments" name="comments" rows="3" placeholder="Enter any additional comments here..." readonly disabled>{{$comment}}</textarea>
                </div>

            </form>
            
            <!-- End / Form -->


        </div>
        </div>
    </div>
</div>
@endsection
@push("js")
<script>
    
    function updateCharacterCount() {
        var textarea = document.getElementById("specifyDiscrepancy");
        var remainingChars = document.getElementById("remainingChars");
        var maxLength = textarea.getAttribute("maxlength");
        var currentLength = textarea.value.length;

        var charsLeft = maxLength - currentLength;
        remainingChars.textContent = charsLeft;

        if (charsLeft <= 0) {
            remainingChars.style.color = "red";
        } else {
            remainingChars.style.color = "black";
        }
    }

    function discrepancyOnchange(elm){
        var disVal = $(elm).val();
        disVal = parseInt(disVal);
        if(disVal == 15){
            $("#specifyDiscrepancyBox").removeClass("hideMe");
        }else{
            $("#specifyDiscrepancyBox").addClass("hideMe");
            $("#specifyDiscrepancy").val("");
            $("specifyDiscrepancy").attr("maxlength", 160);
        }
        
    }

    function updateStatus(){
        
        var documentStatus = $("#documentStatus").val();
        var verificationMethod = $("#verificationMethod").val();
        var vrfOutcome = $("#verificationOutcome").val();
        var discrepancies = $("#discrepancies").val();
        //discrepancies = parseInt(discrepancies);
        var specifyDiscrepancy = $("#specifyDiscrepancy").val();
        if(!isRealValue(discrepancies)){
            var err = 1;
            var msg = "Please select the discrepancy option.";
            showToast(err,msg);
            return false;
        }else if(parseInt(discrepancies) == 15 && !isRealValue(specifyDiscrepancy)){
            var err = 1;
            var msg = "Please specify the discrepancy details.";
            showToast(err,msg);
            return false;    
        }else if(specifyDiscrepancy.length > 160){
            var err = 1;
            var msg = "Discrepancy details cannot exceed 160 characters.";
            showToast(err,msg);
            return false;
        }else{
            var requrl = "admin/updateApplicationStatus";
            var postdata = {
                "documentStatus":documentStatus,
                "discrepancies":discrepancies,
                "specifyDiscrepancy":specifyDiscrepancy
            };
            
            console.log(postdata);
            return false;
            callajax(requrl, postdata, function(resp){
            });
        }
        
    }
</script>
@endpush