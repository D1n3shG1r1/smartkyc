@php
/*
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
$verificationOutcomeTxt = ucwords($application["verificationOutcomeTxt"]);
$documents = $application["documents"];
*/
$id = $application["id"];
$adminId = $application["adminId"];
$portalId = $application["portalId"];
$customerId = $application["customerId"];
$title = ucwords($application["title"]);
$description = ucwords($application["description"]);
$documentType = ucwords($application["documentType"]);
$documentNo = $application["documentNo"];
$comment = ucwords($application["comment"]);
$createDateTime = $application["createDateTime"];
$submitDate = date("M d, Y", strtotime($createDateTime));

$verificationStatus = $application["verificationStatus"];
$verificationMethod = $application["verificationMethod"];
$verificationOutcome = $application["verificationOutcome"];
$verificationOutcomeTxt = ucwords($application["verificationOutcomeTxt"]);
$discrepancies = $application["discrepancies"];
$specifyDiscrepancy = $application["specifyDiscrepancy"];

$documents = $application["documents"];
//$customer = $application["customerDetails"];


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
                <h2>Application</h2>
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
                                <label class="col-md-6 form-label">Submitted On:</label><label class="col-md-6 form-label">{{$submitDate}}</label>
                                <label class="col-md-6 form-label">Status:</label><label class="col-md-6 form-label">{{ucwords($verificationStatus)}}</label>
                                <label class="col-md-6 form-label">Verification Outcome:</label><label class="col-md-6 form-label">{{$verificationOutcomeTxt}}</label>
                                <label class="col-md-6 form-label">Discrepancies Found:</label>{{$DiscrepanciesOptions[$discrepancies]}}<label class="col-md-6 form-label"></label>
                            </div>
                        </div>
                                            
                    </div>
                    <div class="col-md-6 heading1 margin_0 pdl-20">
                           
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
</script>
@endpush