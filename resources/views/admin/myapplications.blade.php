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
                            <th>Doc Title</th>
                            <th>Doc Type</th>
                            <th>Doc Number</th>
                            <th>Verification Status</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    //echo "<pre>"; print_r($applications); die;
                        if(!empty($applications)){
                            foreach($applications as $k => $row){
                    
                                $id = $row["id"];
                                $adminId = $row["adminId"];
                                $portalId = $row["portalId"];
                                $customerId = $row["customerId"];
                                $title = $row["title"];
                                $description = $row["description"];
                                $documentType = $row["documentType"];
                                $documentNo = $row["documentNo"];
                                $comment = $row["comment"];
                                $status = $row["status"];
                                $statusTxt = $row["statusTxt"];
                                $createDateTime = $row["createDateTime"];
                                $updateDateTime = $row["updateDateTime"];
                                
                                $documentType = str_replace("_"," ",$documentType);
                                $createDate = date("M d, Y", strtotime($createDateTime));
                                
                                
                    ?>
                                
                        <tr>
                            <td>{{$k+1}}</td>
                            <td>{{ucwords($title)}}</td>
                            <td>{{ucwords($documentType)}}</td>
                            <td>{{$documentNo}}</td>
                            <td>{{ucwords($statusTxt)}}</td>
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
        </div>
    </div>
</div>
@endsection
@push("js")
@endpush