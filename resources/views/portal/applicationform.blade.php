@php
/*
$data["adminId"] = $adminId;
$data["portalId"] = $portalId;
$data["customerId"] = $customerId;
$data["fname"] = $customerObj["fname"]; 
$data["lname"] = $customerObj["lname"];
$data["email"] = $customerObj["email"];
$data["phone"] = $customerObj["phone"];
incompleteProfile
*/

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
                <h2>New Application</h2>
            </div>
        </div>
    </div>
    @if($incompleteProfile == 1)
        <div class="alert alert-danger" style="display:block; position:relative; right:unset; bottom:unset;">Please first complete your profile to submit application.</div>
    @endif
    <div class="row">
        <div class="col-md-12">
        <div class="white_shd full margin_bottom_30">
            
            <div class="full graph_head">
                <div class="heading1 margin_0"><h2>Document Verification Form</h2></div>
            </div>
            <!-- Form -->
            <form class="full graph_head" id="documentForm">  
                <input type="hidden" class="form-control" id="adminId" name="adminId" value="{{$adminId}}">
                <input type="hidden" class="form-control" id="portalId" name="portalId" value="{{$portalId}}">
                <input type="hidden" class="form-control" id="customerId" name="customerId" value="{{$customerId}}">
                
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="firstName" class="form-label">First Name<span class="required">*</span></label>
                        <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" value="{{$fname}}">
                    </div>   
                    <div class="col-md-6">
                        <label for="lastName" class="form-label">Last Name<span class="required">*</span></label>
                        <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" value="{{$lname}}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email<span class="required">*</span></label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="{{$email}}">
                    </div>
                    <div class="col-md-6">
                        <label for="phone" class="form-label">Phone Number<span class="required">*</span></label>
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="000-000-0000" value="{{$phone}}">
                    </div>
                </div>
 
                <div class="row mb-3">
                    <div class="col-md-6">
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="title" class="form-label">Document Title<span class="required">*</span></label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Document title">
                        </div>
                    </div>
                        <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="documentType" class="form-label">Document Type<span class="required">*</span></label>
                            <select class="form-select form-control" id="documentType" name="documentType">
                                <option value="">Please Select</option>
                                <option value="passport">Passport</option>
                                <option value="driving_license">Driver's License</option>
                                <option value="id_card">ID Card</option>
                            </select>
                        </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                            <label for="documentNumber" class="form-label">Document Number<span class="required">*</span></label>
                            <input type="text" class="form-control" id="documentNumber" placeholder="Document Number">
                        </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="description" class="form-label">Description<span class="required">*</span></label>
                        <textarea class="form-control" id="description" name="description" style="resize:none;" rows="8" placeholder="Description..."></textarea>
                    </div>
                </div>

                <div class="mb-3">
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
                </div>

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
                    <button type="button" class="btn cur-p btn-primary submitApplBtn" onclick="submitForm();">Submit</button>
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

// Function to handle the file input and upload process
var BASE64INPUT = "";
function uploadFiles() {
    
    const fileInput = document.getElementById('uploadDocument');
    const files = fileInput.files;
        
    // Clear previous previews if any
    document.getElementById('preview').innerHTML = '';

    // Check if files are selected
    if (files.length === 0) {
        alert('Please select a file to upload!');
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
            BASE64INPUT = e.target.result;
            
            const img = document.createElement('img');
            img.src = e.target.result;

            filePreviewDiv.appendChild(img);

            // Add delete button
            const deleteBtn = document.createElement('button');
            deleteBtn.innerHTML = '<i class="fa fa-remove"></i>';
            deleteBtn.classList.add('delete-btn');
            deleteBtn.onclick = function() {
                filePreviewDiv.remove();
                fileInput.value = '';  // Optionally reset file input
                BASE64INPUT = '';
                $("#DocumentUpload").val(0);
                $("#uploadButton").addClass("d-block");
                $("#uploadButton").removeClass("hideMe");
            };
            filePreviewDiv.appendChild(deleteBtn);

            // Add file preview to the DOM
            document.getElementById('preview').appendChild(filePreviewDiv);
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
            BASE64INPUT = e.target.result;
            const objectTag = document.createElement('object');
            objectTag.data = e.target.result;
            objectTag.type = 'application/pdf';
            objectTag.width = '200';
            objectTag.height = '300';
            filePreviewDiv.appendChild(objectTag);

            // Add delete button
            const deleteBtn = document.createElement('button');
            deleteBtn.innerHTML = '<i class="fa fa-remove"></i>';
            deleteBtn.classList.add('delete-btn');
            deleteBtn.onclick = function() {
                filePreviewDiv.remove();
                fileInput.value = '';  // Optionally reset file input
                BASE64INPUT = '';
                $("#DocumentUpload").val(0);
                $("#uploadButton").addClass("d-block");
                $("#uploadButton").removeClass("hideMe");
            };
            filePreviewDiv.appendChild(deleteBtn);

            // Add file preview to the DOM
            document.getElementById('preview').appendChild(filePreviewDiv);
        };
        reader.readAsDataURL(file);
        }
    }
    
    /*
    // Prepare FormData and send it to the server (this part remains unchanged)
    const formData = new FormData();
    for (const file of files) {
        formData.append('files[]', file);
    }

    fetch('YOUR_SERVER_UPLOAD_ENDPOINT', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        alert('Files uploaded successfully!');
    })
    .catch(error => {
        alert('Upload failed, please try again.');
        console.error(error);
    });
    */
}


    function submitForm(){
        var adminId = $("#adminId").val();
        var portalId = $("#portalId").val();
        var customerId = $("#customerId").val();

        var firstName = $("#firstName").val();
        var lastName = $("#lastName").val();
        var email = $("#email").val();
        var phone = $("#phone").val();
        var title = $("#title").val();
        var documentType = $("#documentType").val();
        var documentNumber = $("#documentNumber").val();
        var description = $("#description").val();
        var DocumentUpload = $("#DocumentUpload").val();
        DocumentUpload = parseInt(DocumentUpload);
        var uploadDocument = $("#uploadDocument").val();
        var comments = $("#comments").val();
        
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
        }else if(!isRealValue(title)){
            var err = 1;
            var msg = "Document title is required.";
            showToast(err,msg);
            return false;
        }else if(!isRealValue(documentType)){
            var err = 1;
            var msg = "Document type is required.";
            showToast(err,msg);
            return false;
        }else if(!isRealValue(documentNumber)){
            var err = 1;
            var msg = "Document number is required.";
            showToast(err,msg);
            return false;
        }else if(!isRealValue(description)){
            var err = 1;
            var msg = "Document description is required.";
            showToast(err,msg);
            return false;
        }else if(!isRealValue(uploadDocument) || DocumentUpload == 0){
            var err = 1;
            var msg = "Document is required.";
            showToast(err,msg);
            return false;
        }else{

            const requrl = "portal/submitapplication";
            const postdata = {
                "adminId": adminId,
                "portalId": portalId,
                "customerId":customerId,
                "firstName":firstName,
                "lastName":lastName,
                "email":email,
                "phone":phone,
                "title":title,
                "documentType":documentType,
                "documentNumber":documentNumber,
                "description":description,
                "comments":comments,
                "base64Input":BASE64INPUT
            };

            callajax(requrl, postdata, function (resp) {
                if (resp.C == 100) {
                    var err = 0;
                    var msg = "Your application is submitted successfully.";
                    showToast(err,msg);     
                    
                    window.location.href = "{{url('portal/myapplications')}}";
                } else {
                    var err = 1;
                    var msg = "Something went wrong please try again.";
                    showToast(err,msg);        
                }
            });
            
        }
    }

</script>
@endpush