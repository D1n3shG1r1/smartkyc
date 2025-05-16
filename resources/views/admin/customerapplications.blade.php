@php
$applicationsData = $applications["data"];
@endphp

@extends("app")
@section("contentbox")
<div class="container-fluid">
    <div class="row column_title">
        <div class="col-md-12">
            <div class="page_title">
                <h2>Applications for the customer</h2>
                <span>{{$userEmail}} ({{$userName}})</span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        <div class="white_shd full margin_bottom_30">
            <div class="full graph_head">
                <div class="heading1 margin_0"><h2>Applications List</h2></div>
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
                        if(!empty($applicationsData)){
                            foreach($applicationsData as $k => $row){
                    
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
                                $createDate = date("M d, Y H:i:s", strtotime($createDateTime));
                                
                                
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
                            <td>
                                <a href="{{url('admin/application/'.$id)}}" class="" target="_blank">View</a>

                                <span class="navSeprator"></span>

                                <a href="javascript:void(0);" data-id="{{$id}}" onclick="deleteApplication(this);" class="" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete the applicant and all of their related documents." style="cursor:pointer;"><i class="fa fa-trash-o"></i>&nbsp; Delete</a>
                        
                        
                            </td>
                        </tr>
                    <?php
                        }
                    }
                    ?>
                    </tbody>
                </table>
                </div>

                <div class="btn-group mr-2 pagination button_section button_style2">
                @php
          
                    $prevLink = $applications["links"][0]["url"]; //prevbutton url
                    $nextLink = $applications["links"][count($applications["links"]) - 1]["url"]; //nextbutton url
                    $activePageNum = "";
                    foreach($applications["links"] as $linkRw){
                        if($linkRw["active"] == 1){
                        $activePageNum = $linkRw["label"];
                        }
                    }  

                    if($prevLink != ""){
                        $prevurl = $prevLink;
                        $prevHref = 'href='.$prevurl;
                        $prevdisable = "";
                    }else{
                        $prevHref = "";
                        $prevdisable = "disabled";
                    }

                    if($nextLink != ""){
                        $nexturl = $nextLink;
                        $nextHref = 'href='.$nexturl;
                        $nextdisable = "";
                    }else{
                        $nextHref = "";
                        $nextdisable = "disabled";
                    }
                    
                    @endphp    
         
                <a class="btn paginate_button previous {{$prevdisable}}" {{$prevHref}} aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="-1" id="DataTables_Table_0_previous"><i class="fa fa-angle-double-left"></i></a>
            
                <a class="btn active paginate_button current" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0">{{$activePageNum}}</a>
            
                <a class="btn paginate_button next {{$nextdisable}}" {{$nextHref}}  aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="-1" id="DataTables_Table_0_next"><i class="fa fa-angle-double-right"></i></a>    
            </div>

            </div>
        </div>
        </div>
    </div>
</div>
@endsection
@push("js")
<script>
function deleteApplication(elm){
    var applicationId = $(elm).attr("data-id");
    
    var title = 'Delete Application #'+applicationId;
    var message = 'Are you sure you want to delete this record? This will also delete all related documents, and once deleted, it cannot be reversed.';
    var confirmText = 'Yes';
    var cancelText = 'No';
    
    // Update modal content dynamically
    document.getElementById('confirmModalLabel').textContent = title;
    document.getElementById('confirmMessage').textContent = message;
    document.getElementById('confirmBtn').textContent = confirmText;
    document.getElementById('confirmCancelBtn').textContent = cancelText;

    // Reset event listeners
    const confirmButton = document.getElementById('confirmBtn');
    const cancelButton = document.getElementById('confirmCancelBtn');

    // Add event listener for confirmation action
    confirmButton.onclick = function() {
        // Place your confirmation action here

        var elmId = $(elm).attr("id");
        
        $(elm).attr("disabled",true);
        var orgTxt = $(elm).attr("data-txt");
        var loadingTxt = $(elm).attr("data-loadingtxt");
        showLoader(elmId,loadingTxt);

        var requrl = "admin/deleteApplication";
        var postdata = {
            "applicationId":applicationId
        };
        
        callajax(requrl, postdata, function(resp){
            
            $(elm).removeAttr("disabled");
            hideLoader(elmId,orgTxt); 
            
            if(resp.C == 100){
                var err = 0;
                var msg = 'Record has been deleted successfully.';
                showToast(err,msg);
                window.location.reload();

            }else{
                var err = 1;
                var msg = resp.M;
                showToast(err,msg);

            }
            
        });

        var myModal = new bootstrap.Modal(document.getElementById('confirmModal'));
        myModal.hide();
    };

    // Add event listener for cancel action
    cancelButton.onclick = function() {
        var myModal = new bootstrap.Modal(document.getElementById('confirmModal'));
        myModal.hide();
    };

    // Show the modal
    var myModal = new bootstrap.Modal(document.getElementById('confirmModal'));
    myModal.show();

}
</script>
@endpush