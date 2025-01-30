@php
$portalId = '';
$adminId = 0;
@endphp
@extends("app")
@section("contentbox")

<div class="container-fluid">
    <div class="row column_title">
        <div class="col-md-12">
            <div class="page_title">
                <h2>New Application</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        <div class="white_shd full margin_bottom_30">
            <div class="full graph_head">
                <div class="heading1 margin_0"><h2>Document Verification Form</h2></div>
            </div>
            <!-- Form -->
            <form class="full graph_head">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="firstName" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="firstName" placeholder="First Name">
                    </div>
                    <div class="col-md-6">
                        <label for="lastName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lastName" placeholder="Last Name">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="example@domain.com">
                    </div>
                    <div class="col-md-6">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" id="phone" placeholder="000-000-0000">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" placeholder="Document title">
                        </div>
                    </div>
                        <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="documentType" class="form-label">Document Type</label>
                            <select class="form-select form-control" id="documentType">
                                <option selected>Please Select</option>
                                <option value="1">Passport</option>
                                <option value="2">Driver's License</option>
                                <option value="3">ID Card</option>
                            </select>
                        </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                            <label for="documentNumber" class="form-label">Document Number</label>
                            <input type="text" class="form-control" id="documentNumber" placeholder="Document Number">
                        </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" style="resize:none;" rows="8" placeholder="Description..."></textarea>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="uploadDocument" class="form-label">Upload Document</label>
                    <div class="border rounded p-3 text-center">
                        <label for="uploadDocument" class="form-label d-block">
                            <i class="bi bi-cloud-upload display-4"></i>
                            <p>Browse Files</p>
                            <input class="form-control d-none" type="file" id="uploadDocument">
                        </label>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="comments" class="form-label">Additional Comments</label>
                    <textarea class="form-control" id="comments" rows="3" placeholder="Enter any additional comments here..."></textarea>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn cur-p btn-primary submitApplBtn">Submit</button>
                </div>
            
            </form>
            
            <!-- End / Form -->


        </div>
        </div>
    </div>
</div>
<!---
<div class="container my-5">
    <div class="card shadow">
        <div class="card-body">
            <h3 class="card-title text-center">Document Verification Form</h3>
            <p class="text-center">Please provide the following information for document verification.</p>
            <form>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="firstName" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="firstName" placeholder="First Name">
                    </div>
                    <div class="col-md-6">
                        <label for="lastName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lastName" placeholder="Last Name">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="example@domain.com">
                    </div>
                    <div class="col-md-6">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" id="phone" placeholder="000-000-0000">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="documentType" class="form-label">Document Type</label>
                        <select class="form-select" id="documentType">
                            <option selected>Please Select</option>
                            <option value="1">Passport</option>
                            <option value="2">Driver's License</option>
                            <option value="3">ID Card</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="documentNumber" class="form-label">Document Number</label>
                        <input type="text" class="form-control" id="documentNumber" placeholder="Document Number">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="uploadDocument" class="form-label">Upload Document</label>
                    <div class="border rounded p-3 text-center">
                        <label for="uploadDocument" class="form-label d-block">
                            <i class="bi bi-cloud-upload display-4"></i>
                            <p>Browse Files</p>
                            <input class="form-control d-none" type="file" id="uploadDocument">
                        </label>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="comments" class="form-label">Additional Comments</label>
                    <textarea class="form-control" id="comments" rows="3" placeholder="Enter any additional comments here..."></textarea>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>-->
@endsection
@push("js")
<script></script>
@endpush