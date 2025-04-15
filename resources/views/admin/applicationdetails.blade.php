@php

$id = $application["id"];
$adminId = $application["adminId"];
$portalId = $application["portalId"];

$createDateTime = $application["createDateTime"];
$submitDate = date("M d, Y", strtotime($createDateTime));

$verificationStatus = $application["verificationStatus"];
$verificationMethod = $application["verificationMethod"];
$verificationOutcome = $application["verificationOutcome"];
$verificationOutcomeTxt = ucwords($application["verificationOutcomeTxt"]);
$discrepancies = $application["discrepancies"];
$specifyDiscrepancy = $application["specifyDiscrepancy"];


$customerId = $customer["customerId"];
$fname = $customer["fname"];
$lname = $customer["lname"];
$email = $customer["email"];
$phone = $customer["phone"];

$applicationId = $application["id"];
$documentType = $application["documentType"];
$documentNo = $application["documentNo"];
$documents = $application["documents"];
$comment = $application["comment"];

$lastDate = $application["lastDate"];
$uploadCount = 0;
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
        /*padding-top:11px;*/
    }

    .previewDiv{
        padding-top: 7px;
        padding-bottom: 2px;
    }

    .modal-dialog {
        max-width: 700px !important;
        margin: 1.75rem auto;
    }

    @media (min-width: 576px) {
        .modal-dialog {
            max-width: 700px !important;
            margin: 1.75rem auto;
        }   
    }
</style>
<script src="{{url('assets/js/pdf.min.js')}}"></script>
<div class="container-fluid">
    <div class="row column_title">
        <div class="col-md-12">
            <div class="page_title">
                <h2>Application #{{$applicationId}}</h2>
            </div>
        </div>
    </div>
    
    
    <div class="row">
        <div class="col-md-12">
        <div class="white_shd full margin_bottom_30">
            
            <div class="full graph_head">
                <form class="fulll graph_headd">
                <div class="row mb-3">
                    <div class="col-md-6 heading1 margin_0 pdr-20 borderright-1">
                        <div>
                            <h6>Info</h6>
                            <div class="mb-3">
                                <label class="col-md-6 form-label">Application-Id:</label><label class="col-md-6 form-label">{{$id}}</label>
                                <label class="col-md-6 form-label">Submitted On:</label><label class="col-md-6 form-label">{{$submitDate}}</label>
                                <label class="col-md-6 form-label">Status:</label><label class="col-md-6 form-label">{{ucwords($verificationStatus)}}</label>
                                <label class="col-md-6 form-label">Verification Outcome:</label><label class="col-md-6 form-label">{{$verificationOutcomeTxt}}</label>
                                <label class="col-md-6 form-label">Discrepancies Found:</label>{{$DiscrepanciesOptions[$discrepancies]}}<label class="col-md-6 form-label"></label>
                            </div>
                        </div>
                                            
                    </div>
                    @php if($isSystemAdmin > 0){ @endphp
                    <div class="col-md-6 heading1 margin_0 pdl-20">
                        <input type="hidden" id="applicationId" value="{{$id}}" />
                        <input type="hidden" id="portalId" value="{{$portalId}}" />
                        
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <h6>Status</h6>
                                @php
                                    $statusOptions = ['verified' => '', 'not verified' => '', 'pending' => ''];
                                    if (array_key_exists($verificationStatus, $statusOptions)) {
                                        $statusOptions[$verificationStatus] = 'selected';
                                    }
                                @endphp
                                <select class="form-select form-control" id="documentStatus" name="documentStatus">
                                    <option value="">--Select Status--</option>
                                    <option value="verified" {{ $statusOptions['verified'] }}>Verified</option>
                                    <option value="not verified" {{ $statusOptions['not verified'] }}>Not Verified</option>
                                    <option value="pending" {{ $statusOptions['pending'] }}>Pending</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <h6>Verification Method</h6>
                                @php
                                $methodOptions = ['automated system check' => '', 'manual review' => '', 'contact with issuing authority' => ''];
                                    if (array_key_exists($verificationMethod, $methodOptions)) {
                                        $methodOptions[$verificationMethod] = 'selected';
                                    }
                                @endphp
                                <select class="form-select form-control" id="verificationMethod" name="verificationMethod">
                                    <option value="">--Select Verification Method--</option>
                                    <option value="automated system check" {{ $methodOptions['automated system check'] }}>Automated System Check</option>
                                    <option value="manual review" {{ $methodOptions['manual review'] }}>Manual Review</option>
                                    <option value="contact with issuing authority" {{ $methodOptions['contact with issuing authority'] }}>Contact with Issuing Authority</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <h6>Verification Outcome</h6>
                                <select class="form-select form-control" id="verificationOutcome" name="verificationOutcome">
                                @php
                                foreach($verificationOutcomeOptions as $k => $vrfyOutOpt) {
                                    $selected = ''; // Reset $selected for each option
                                    if($verificationOutcome == $k) {
                                        $selected = "selected";
                                    }
                                    $opt = '<option value="'.$k.'" '.$selected.'>'.$vrfyOutOpt.'</option>';   
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
                                    $selected = ''; // Reset $selected for each option
                                    if($discrepancies == $kk) {
                                        $selected = "selected";
                                    }
                                    
                                    $opt = '<option value="'.$kk.'" '.$selected.'>'.$dspOpt.'</option>';   
                                    echo $opt;
                                }
                                @endphp
                                </select>
                            </div>
                        </div>
                        <div id="specifyDiscrepancyBox" class="row mb-3 hideMe">
                            <div class="col-md-12">
                                <h6>Specify</h6>
                                <textarea class="form-control" id="specifyDiscrepancy" name="specifyDiscrepancy" style="resize:none;" rows="3" placeholder="Specify the discrepancy details..." maxlength="160" oninput="updateCharacterCount()">{{$specifyDiscrepancy}}</textarea>
                                <p class="text-align-right">Remaining characters: <span id="remainingChars">160</span></p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <button type="button" id="updateStatusBtn" class="updateStatusBtn btn cur-p btn-outline-primary" data-txt="Update" data-loadingtxt="Saving..." onclick="updateStatus();">Update</button>    
                            </div>
                        </div>    
                    </div>
                    @php } @endphp
                </div>
                </form>
            </div>

            <!-- Form -->
            <form class="full graph_head" id="documentForm">  
            <input type="hidden" class="form-control" id="_token" name="_token" value="{{ csrf_token() }}">    
            <input type="hidden" class="form-control" id="portalId" name="portalId" value="{{$portalId}}">
                <input type="hidden" class="form-control" id="customerId" name="customerId" value="{{$customerId}}">
                <input type="hidden" class="form-control" id="applicationId" name="applicationId" value="{{$applicationId}}">

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="firstName" class="form-label">First Name<span class="required">*</span></label>
                        <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" value="{{$fname}}" readonly>
                    </div>   
                    <div class="col-md-6">
                        <label for="lastName" class="form-label">Last Name<span class="required">*</span></label>
                        <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" value="{{$lname}}" readonly>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email<span class="required">*</span></label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="{{$email}}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="phone" class="form-label">Phone Number<span class="required">*</span></label>
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="000-000-0000" value="{{$phone}}" readonly>
                    </div>
                </div>
                
                <input type="hidden" class="form-control" id="documentType" name="documentType" placeholder="Document Type" value="{{$documentType}}">

                @php
                $documentTypeArr = explode(",",$documentType);
                $documentNoArr = explode(",",$documentNo);
                foreach($documentTypeArr as $k => $docType){
                    $documentNoVal = $documentNoArr[$k];
                    $docPath = $documents[$k]["filePath"];
                    $docMime = $documents[$k]["mimeType"];


                    if($docMime == "application/pdf"){
                        //pdf file
                        $icon = '<i class="bi bi-filetype-pdf display-4"></i>';
                        
                    }else{
                        //jpeg png file
                        $icon = '<i class="bi bi-filetype-jpg display-4"></i>';
                    }

                    $uploadCount++;
                @endphp
                <div class="row">
                <div class="col-md-12 heading1"><h2>#{{$k+1}} {{ucwords(documentsTypes($docType))}}</h2></div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                    <!--<div class="row mb-3">
                            <div class="col-md-12">
                                <label for="title" class="form-label">Document Title<span class="required">*</span></label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Document title">
                            </div>
                        </div>-->

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="documentType" class="form-label">Document Type<span class="required">*</span></label>
                                <span type="text" class="form-control" readonly> {{ucwords(documentsTypes($docType))}}</span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="documentNumber_{{$k+1}}" class="form-label">Document Number<span class="required">*</span></label>
                                <input type="text" class="form-control documentNumber" id="documentNumber_{{$k+1}}" name="documentNumber[]" value="{{$documentNoVal}}" placeholder="Document Number" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!--<label for="description" class="form-label">Description<span class="required">*</span></label>
                        <textarea class="form-control" id="description" name="description" style="resize:none;" rows="8" placeholder="Description..."></textarea>-->
                        <label class="form-label">Document<span class="required">*</span></label>
                        <div class="border rounded text-center">

                            <div id="preview_{{$k+1}}" class="previewDiv">
                                {!! $icon !!}
                                <a href="javascript:void(0);" class="uploadDeleteBtn" onClick="viewFile('{{$docPath}}','{{$docMime}}')" data-toggle="modal" data-target="#previewModal"><i class="fa fa-eye"></i>&nbsp;View</a>
                                
                                <span class="navSeprator"></span>
                                
                                <a href="{{$docPath}}" class="uploadViewBtn" download><i class="fa fa-download"></i>&nbsp;Download</a>
                            </div>
                            
                        </div>

                    </div>
                </div>

                @php } @endphp

                <div class="mb-3">
                    <label for="comments" class="form-label">Additional Comments</label>
                    <textarea class="form-control" id="comments" name="comments" rows="3" placeholder="Enter any additional comments here..." readonly>{{$comment}}</textarea>
                </div>
            
            </form>
            
            <!-- End / Form -->


        </div>
        </div>
    </div>
</div>

<div id="previewModal" class="modal" role="dialog" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Preview</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="previewModalBody" class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection
@push("js")
<script>
    //function loadPdfPreview(pdfPath){
const PDFStart = nameRoute => {
    
    let loadingTask = pdfjsLib.getDocument(nameRoute),
    pdfDoc = null,
    
    scale = 1,
    numPage = 1;
    
    const GeneratePDF = numPage => {
        $("#previewModalBody").html('');
        var totalPages = pdfDoc.numPages;
        pdfDoc.getPage(numPage).then(page => {
        
        let viewport = page.getViewport({scale:scale});

        var tmpPageNo = numPage;
        var tmpCanvas = document.createElement('canvas');
        tmpCanvas.id = "document_"+tmpPageNo;
        tmpCanvas.className = "document_canvas";
        tmpCanvas.width = viewport.width;
        tmpCanvas.height = viewport.height;
        
        $("#previewModalBody").append(tmpCanvas);

        var canvas = document.querySelector('#document_'+tmpPageNo);
        var ctx = canvas.getContext('2d');
        
        let renderContext = {
            canvasContext : ctx,
            viewport: viewport
        }


        page.render(renderContext);  

        })


        if(numPage < totalPages){
        
        var newPage = numPage + 1;
        GeneratePDF(newPage);  

        }else{
        
        console.log("else");
        
        }
        
    }

    loadingTask.promise.then(pdfDoc_ => {
        pdfDoc = pdfDoc_;

        var totalPages = pdfDoc.numPages;
        
        if(totalPages > 0){ 
        
        GeneratePDF(numPage);
        }

    });


    }
    
const startPdf = (pdfPath) => {
    PDFStart(pdfPath);
}

function viewFile(filePath, fileType){
    $("#previewModalBody").html("Loading...");
    
    if(fileType === 'application/pdf'){
        startPdf(filePath);
    }else if(fileType === 'image/jpeg'){
        const img = document.createElement('img');
        img.src = filePath;
        img.style = "width:100%; height:100%;";
        $("#previewModalBody").html(img);

    } else {
        $("#previewModalBody").html("Unsupported file type.");
    }
    
}

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

        var applicationId = $("#applicationId").val();
        var portalId = $("#portalId").val();
        var documentStatus = $("#documentStatus").val();
        var verificationMethod = $("#verificationMethod").val();
        var vrfOutcome = $("#verificationOutcome").val();
        var discrepancies = $("#discrepancies").val();
        //discrepancies = parseInt(discrepancies);
        var specifyDiscrepancy = $("#specifyDiscrepancy").val();
        
        if(!isRealValue(documentStatus)){
            var err = 1;
            var msg = "Please select the status.";
            showToast(err,msg);
            return false;
        }else if(documentStatus == 'verified' && !isRealValue(verificationMethod)){
            var err = 1;
            var msg = "Please select the verification method.";
            showToast(err,msg);
            return false;
        }else if(!isRealValue(vrfOutcome)){
            var err = 1;
            var msg = "Please select the verification outcome.";
            showToast(err,msg);
            return false;
        }else if(!isRealValue(discrepancies)){
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
                "applicationId":applicationId,
                "verificationStatus":documentStatus,
                "verificationMethod":verificationMethod,
                "verificationOutcome":vrfOutcome,
                "discrepancies":discrepancies,
                "specifyDiscrepancy":specifyDiscrepancy
            };
            
            callajax(requrl, postdata, function(resp){
                if(resp.C == 100){
                    var err = 0;
                    var msg = "Application status has been updated successfully.";
                    showToast(err,msg);        
                }else{
                    var err = 1;
                    var msg = resp.M;
                    showToast(err,msg);
                }
                
            });
        }
        
    }

    //http://local.smartkyc.com/portal/login/1f7eb1d132dd059422ead7d5660301a21db9d2eb?applicationtoken=1744308570290744
    //http://local.smartkyc.com/portal/documentrequest/1744308570290744
    //http://local.smartkyc.com/portal/login/1f7eb1d132dd059422ead7d5660301a21db9d2eb?applicationtoken=174439278683943
    //http://local.smartkyc.com/portal/documentrequest/174439278683943
</script>
@endpush