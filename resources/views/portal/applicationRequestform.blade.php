@php

$incompleteProfile = $customer["incompleteProfile"];
$portalId = $customer["portalId"];
$customerId = $customer["customerId"];
$fname = $customer["fname"];
$lname = $customer["lname"];
$email = $customer["email"];
$phone = $customer["phone"];

$applicationId = $application["id"];
$documentType = $application["documentType"];
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
<div class="container-fluid">
    <div class="row column_title">
        <div class="col-md-12">
            <div class="page_title">
                <h2>Application #{{$applicationId}}</h2>
            </div>
        </div>
    </div>
    @if($incompleteProfile == 1)
        <div class="alert alert-danger" style="display:block; position:relative; right:unset; bottom:unset;">Please first complete your profile to submit application.</div>
    @endif

    <div class="alert alert-danger" style="display:block; position:relative; right:unset; bottom:unset;">Please submit your required documents before {{date("F j, Y", strtotime($lastDate))}}.</div>
    

    <div class="row">
        <div class="col-md-12">
        <div class="white_shd full margin_bottom_30">
            
            <div class="full graph_head">
                <div class="heading1 margin_0"><h2>Upload Documents</h2></div>
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
                

                @php
                $documentTypeArr = explode(",",$documentType);
                foreach($documentTypeArr as $k => $docType){ $uploadCount++; @endphp
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
                                <input type="hidden" class="form-control" id="documentType" name="documentType[]" placeholder="Document Type" value="{{$docType}}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="documentNumber_{{$k+1}}" class="form-label">Document Number<span class="required">*</span></label>
                                <input type="text" class="form-control documentNumber" id="documentNumber_{{$k+1}}" name="documentNumber[]" placeholder="Document Number">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!--<label for="description" class="form-label">Description<span class="required">*</span></label>
                        <textarea class="form-control" id="description" name="description" style="resize:none;" rows="8" placeholder="Description..."></textarea>-->
                        <label class="form-label">Upload Document<span class="required">*</span></label>
                        <label class="form-label" style="font-size: 10px; color: #721c24;">If your document has more than one page or contains multiple pages, please upload it as a PDF. Only JPEG, JPG, PNG, or PDF files are allowed to be uploaded.</label>   
                        <div class="border rounded text-center">
                            <label id="labeluploadDocument_{{$k+1}}" for="uploadDocument_{{$k+1}}" class="form-label dd-block uploadButton">
                                <i class="bi bi-cloud-upload display-4"></i>
                                <p style="font-size:12px; line-height:10px; margin-bottom: 0;">Browse File</p>
                                <input class="form-control d-none" type="file" id="uploadDocument_{{$k+1}}" name="uploadDocument[]" onchange="uploadFiles(event)" accept=".jpeg,.jpg,.png,.pdf"
                                >
                                <input class="form-control d-none" type="hidden" id="DocumentUpload" name="DocumentUpload" value="0">
                                <input class="form-control d-none" type="hidden" id="base64Input" name="base64Input" value="">
                            </label>
                            <div id="preview_{{$k+1}}" class="previewDiv"></div>
                        </div>

                    </div>
                </div>

                @php } @endphp

                <!--<div class="mb-3">
                    <label for="uploadDocumentt" class="form-label">Upload Document<span class="required">*</span></label>
                    <div class="border rounded p-3 text-center">
                        <label id="uploadButton" for="uploadDocument" class="form-label d-block uploadButton">
                            <i class="bi bi-cloud-upload display-4"></i>
                            <p>Browse Files</p>
                            <input class="form-control d-none" type="file" id="uploadDocument" name="uploadDocument" onchange="uploadFiles()" accept="image/*,.pdf">
                            <input class="form-control d-none" type="hidden" id="DocumentUpload" name="DocumentUpload" value="0">
                            <input class="form-control d-none" type="hidden" id="base64Input" name="base64Input" value="">
                        </label>
                        <div id="preview"></div>
                    </div>
                </div>-->

                <div class="mb-3">
                    <label for="comments" class="form-label">Additional Comments</label>
                    <textarea class="form-control" id="comments" name="comments" rows="3" placeholder="Enter any additional comments here..."></textarea>
                </div>

                <div class="text-center">
                    
                    @if($incompleteProfile == 1)
                        <div class="alert alert-danger" style="display:block; position:relative; right:unset; bottom:unset;">Please first complete your profile to submit application.</div>
                    @else
                        <button type="button" class="btn cur-p btn-primary submitApplBtn" onclick="submitForm();">Submit</button>
                    @endif
                    
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

// Function to handle the file input and upload process
var BASE64INPUT = "";
var BASE64ARR = {};
var uploadCount = "{{$uploadCount}}";
uploadCount = parseInt(uploadCount);

function uploadFiles(e) {
    const fileInput = e.target;
    const fileInputId = fileInput.id;
    const fileInputIdParts = fileInputId.split("_");
    const fileId = fileInputIdParts[1];
    const files = fileInput.files;
    
    // Clear previous previews if any
    $('#preview_'+fileId).html('');

    // Check if files are selected
    if (files.length === 0) {
        var err = 1;
        var msg = "Please select a file to upload!";
        showToast(err,msg);
        return;
    }

    // Process each file
    for (const file of files) {
        const filePreviewDiv = document.createElement('div');
        filePreviewDiv.classList.add('file-preview');

        // Preview Images
        if (file.type.startsWith('image/')) {
        const reader = new FileReader();
        reader.onload = function(e) {
            $("#DocumentUpload").val(1);
            $("#uploadButton").addClass("hideMe");
            $("#uploadButton").removeClass("d-block");
            // Get the base64 string here for the PDF
            BASE64ARR[fileId] = e.target.result;
            
            var previewHtml = `<i class="bi bi-file-image display-4"></i>
            <a href="javascript:void(0);" class="uploadDeleteBtn" onClick="removeFile('`+fileId+`')"><i class="fa fa-trash-o"></i>&nbsp;Delete</a><span class="navSeprator"></span><a href="javascript:void(0);" class="uploadViewBtn" onClick="viewFile('`+fileId+`','jpeg')" data-toggle="modal" data-target="#previewModal"><i class="fa fa-eye"></i>&nbsp;View</a>`;
             
            //filePreviewDiv.appendChild(previewHtml);


            // Add file preview to the DOM
            //document.getElementById('preview').appendChild(filePreviewDiv);
            document.getElementById('preview_'+fileId).innerHTML = previewHtml;
            $('#preview_'+fileId).removeClass("hideMe");
            $("#labeluploadDocument_"+fileId).addClass("hideMe");
        };
        reader.readAsDataURL(file);
        }
        // Preview PDFs
        else if (file.type === 'application/pdf') {
        const reader = new FileReader();
        reader.onload = function(e) {
            $("#DocumentUpload").val(1);
            $("#uploadButton").addClass("hideMe");
            $("#uploadButton").removeClass("d-block");
            
            BASE64ARR[fileId] = e.target.result;
            
            var previewHtml = `<i class="bi bi-file-image display-4"></i>
            <a href="javascript:void(0);" class="uploadDeleteBtn" onClick="removeFile('`+fileId+`')"><i class="fa fa-trash-o"></i>&nbsp;Delete</a><span class="navSeprator"></span><a href="javascript:void(0);" class="uploadViewBtn" onClick="viewFile('`+fileId+`','pdf')" data-toggle="modal" data-target="#previewModal"><i class="fa fa-eye"></i>&nbsp;View</a>`;
            
            // Add file preview to the DOM
            document.getElementById('preview_'+fileId).innerHTML = previewHtml;
            $('#preview_'+fileId).removeClass("hideMe");
            $("#labeluploadDocument_"+fileId).addClass("hideMe");
        };
        reader.readAsDataURL(file);
        }
    }
    
}

function removeFile(fileId){
    delete BASE64ARR[fileId];
    
    $('#preview_'+fileId).html("");
    $('#preview_'+fileId).addClass("hideMe");
    $("#labeluploadDocument_"+fileId).removeClass("hideMe");
    $("#uploadDocument_"+fileId).val("");
    /*filePreviewDiv.remove();
    fileInput.value = '';  // Optionally reset file input
    BASE64INPUT = '';
    $("#DocumentUpload").val(0);
    $("#uploadButton").addClass("d-block");
    $("#uploadButton").removeClass("hideMe");*/
}

function viewFile(fileId, fileType){
    $("#previewModalBody").html("Loading...");
    const fileData = BASE64ARR[fileId];
    if(fileType == 'pdf'){
        const objectTag = document.createElement('object');
        objectTag.data = fileData;
        objectTag.type = 'application/pdf';
        objectTag.style = "width:100%; height:800px;";
        $("#previewModalBody").html(objectTag);

    }else if(fileType == 'jpeg'){
        const img = document.createElement('img');
        img.src = fileData;
        img.style = "width:100%; height:100%;";
        $("#previewModalBody").html(img);

    }else{
        $("#previewModalBody").html("Loading...");    
    }
    
}

    function submitForm(){
        
        var portalId = $("#portalId").val();
        var customerId = $("#customerId").val();
        var applicationId = $("#applicationId").val();
        
        var firstName = $("#firstName").val();
        var lastName = $("#lastName").val();
        var email = $("#email").val();
        var phone = $("#phone").val();
        //var title = $("#title").val();
        //var documentType = $("#documentType").val();
        var documentNumber = $("#documentNumber").val();
        var description = $("#description").val();
        var DocumentUpload = $("#DocumentUpload").val();
        DocumentUpload = parseInt(DocumentUpload);
        var uploadDocument = $("#uploadDocument").val();
        var comments = $("#comments").val();

        var documentNumErr = 0;
        var documentNumbersArr = [];
        $(".documentNumber").each(function(i, elm){
            var docNum = $(elm).val().trim();
            if(!isRealValue(docNum)){
                documentNumErr = 1;    
            }else{
                documentNumbersArr.push(docNum);
            }
        });

        
        if(!isRealValue(firstName)){
            var err = 1;
            var msg = "First name is required.";
            showToast(err,msg);
            return false;
        }else if(!isRealValue(lastName)){
            var err = 1;
            var msg = "Last name is required.";
            showToast(err,msg);
            return false;
        }else if(!isRealValue(email)){
            var err = 1;
            var msg = "Email is required.";
            showToast(err,msg);
            return false;
        }else if(!isRealValue(phone)){
            var err = 1;
            var msg = "Phone number is required.";
            showToast(err,msg);
            return false;
        }/*else if(!isRealValue(title)){
            var err = 1;
            var msg = "Document title is required.";
            showToast(err,msg);
            return false;
        }else if(!isRealValue(documentType)){
            var err = 1;
            var msg = "Document type is required.";
            showToast(err,msg);
            return false;
        }*/else if(documentNumErr > 0){
            var err = 1;
            var msg = "Document number is required.";
            showToast(err,msg);
            return false;
        }/*else if(!isRealValue(description)){
            var err = 1;
            var msg = "Document description is required.";
            showToast(err,msg);
            return false;
        }else if(!isRealValue(uploadDocument) || DocumentUpload == 0){
            var err = 1;
            var msg = "Upload Document.";
            showToast(err,msg);
            return false;
        }*/
        else if(Object.keys(BASE64ARR).length === 0) {
            var err = 1;
            var msg = "Please upload required documents.";
            showToast(err,msg);
            return false;
        }else if(Object.keys(BASE64ARR).length < uploadCount){
            var err = 1;
            var msg = "Please upload all "+uploadCount+" documents.";
            showToast(err,msg);
            return false;
        }else{

            const requrl = "portal/submitapplicationrequest";
            var postdata = new FormData($('#documentForm')[0]);
            callajaxFormData(requrl, postdata, function (resp) {
                if (resp.C == 100) {
                    var err = 0;
                    var msg = "Your application is submitted successfully.";
                    showToast(err,msg);     
                    setTimeout(function(){
                        window.location.href = "{{url('portal/myapplications')}}";
                    },1000);
                    
                    
                } else {
                    var err = 1;
                    var msg = "Something went wrong please try again.";
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