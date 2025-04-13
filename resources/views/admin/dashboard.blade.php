@extends("app")
@section("contentbox")
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
        <div class="col-md-12">
            <div class="page_title">
                <h2>Dashboard</h2>
                
                <!--
                <span class="portalLinkContainer alert alert-primary">
                    <label>Applicant Portal:</label>
                    <input class="blue1_color btn btn-copy-link" style="margin-left: 5px;width: 650px;" type="text" id="portalLink" value="{{$applicantPortalLink}}" readonly="">

                    <button type="button" class="btn btn-outline-primary" onclick="copyLink();">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-copy" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M4 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 5a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1h1v1a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h1v1z"></path>
                        </svg>
                        Copy Link
                    </button>
                    <label>Copy the link above and share it with your customers to upload the documents for verification.</label>
                </span>
                -->
    
            </div>
        </div>
        </div>
        <div class="row column1">
        <div class="col-md-6 col-lg-3">
            <div class="full counter_section margin_bottom_30 yellow_bg">
                <div class="couter_icon">
                    <div> 
                    <i class="fa fa-group"></i>
                    </div>
                </div>
                <div class="counter_no">
                    <div>
                    <p class="total_no">{{$totalApplicants}}</p>
                    <p class="head_couter">My Applicants</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="full counter_section margin_bottom_30 blue1_bg">
                <div class="couter_icon">
                    <div> 
                    <i class="fa fa-file-text-o"></i>
                    </div>
                </div>
                <div class="counter_no">
                    <div>
                    <p class="total_no">{{$totalApplications}}</p>
                    <p class="head_couter">My Applications</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="full counter_section margin_bottom_30 green_bg">
                <div class="couter_icon">
                    <div> 
                    <i class="fa fa-clock-o"></i>
                    </div>
                </div>
                <div class="counter_no">
                    <div>
                    <p class="total_no" title="Pending Applications">{{$pendingApplications}}</p>
                    <p class="head_couter" title="Pending Applications">Pending</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div style="padding-bottom: 7px;" class="full counter_section margin_bottom_30 red_bg">
                <div class="couter_icon">
                    <div> 
                    <i class="fa fa-database"></i>
                    </div>
                </div>
                <div class="counter_no">
                    <div>
                    <p class="total_no">{{$packageDetails['documentsVerified'].'/'.$packageDetails['documentsVerifyLimit']}}</p>
                    <p style="font-size: 0.80rem;" class="head_couter">Verification Limit
                        <br>
                        Package: {{$packageDetails['packageName']}}
                    </p>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <!-- New Applications -->
        <div class="row column2 margin_bottom_30">
            <div class="full graph_head">
                <div class="heading1 margin_0 row fullwidth">
                    <div class="col-md-6">
                        <h2>New Applications</h2>
                    </div>
                    <div class="col-md-6 align-right">
                        <a href="{{url('/admin/myapplications')}}">View All</a>
                    </div>
                </div>
            </div>

            <div class="table_section padding_infor_info">
                <div class="table-responsive-sm">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Applicantion ID</th>
                                <th>Applicant Name</th>
                                <!--<th>Doc Title</th>
                                <th>Doc Type</th>
                                <th>Doc Number</th>-->
                                <th>Status</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        
                            if(!empty($applications)){
                                foreach($applications as $k => $row){
                        
                                    $id = $row["id"];
                                    $adminId = $row["adminId"];
                                    $portalId = $row["portalId"];
                                    $customerId = $row["customerId"];
                                    $customerName = $row["customerName"];
                                    $title = $row["title"];
                                    $description = $row["description"];
                                    $documentType = $row["documentType"];
                                    $documentNo = $row["documentNo"];
                                    $comment = $row["comment"];
                                    $verificationStatus = $row["verificationStatus"];
                                    $createDateTime = $row["createDateTime"];
                                    $updateDateTime = $row["updateDateTime"];
                                    
                                    $documentType = str_replace("_"," ",$documentType);
                                    $createDate = date("M d, Y", strtotime($createDateTime));
                                    
                                    
                        ?>
                                    
                            <tr>
                                <td>{{$k+1}}</td>
                                <td>{{$id}}</td>
                                <td>{{ucwords($customerName)}}</td>
                                <!--<td>{{ucwords($title)}}</td>
                                <td>{{ucwords($documentType)}}</td>
                                <td>{{$documentNo}}</td>-->
                                <td>{{ucwords($verificationStatus)}}</td>
                                <td>{{$createDate}}</td>
                                <td><a href="{{url('admin/application/'.$id)}}" class="btn cur-p btn-outline-primary" target="_blank">View</a></td>
                            </tr>
                        <?php
                            }
                        }
                        ?>    
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- End / New Applications -->
        
    </div>
</div>
@endsection
@push("js")
<script>
     function copyLink() {
            // Get the text field containing the link
            var link = document.getElementById("portalLink");

            // Select the text field
            link.select();
            link.setSelectionRange(0, 99999); // For mobile devices

            // Copy the text inside the text field
            document.execCommand("copy");

            var err = 0;
            var msg = "Link copied to clipboard: " + link.value;
            showToast(err,msg);
        }
</script>
@endpush