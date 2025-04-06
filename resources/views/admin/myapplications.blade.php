@php
$applicationsData = $applications["data"];
@endphp

@extends("app")
@section("contentbox")
<div class="container-fluid">
    <div class="row column_title">
        <div class="col-md-12">
            <div class="page_title">
                <h2>My Applications</h2>
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
                            <th>Doc Title</th>
                            <th>Doc Type</th>
                            <th>Doc Number</th>
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
                                $createDate = date("M d, Y", strtotime($createDateTime));
                                
                                
                    ?>
                                
                        <tr>
                            <td>{{$k+1}}</td>
                            <td>{{$id}}</td>
                            <td>{{ucwords($customerName)}}</td>
                            <td>{{ucwords($title)}}</td>
                            <td>{{ucwords($documentType)}}</td>
                            <td>{{$documentNo}}</td>
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
@endpush