@php
if(!empty($customers)){
    $customersData = $customers["data"];
}else{
    $customersData = [];
}

@endphp
@extends("app")
@section("contentbox")
<style>
/* Add this class to the icon or button to apply the spinning effect */
.spinner {
    display: inline-block;
    animation: spin 1s linear infinite;  /* Adjust the speed by changing the time (1s in this case) */
}

/* Define the keyframes to animate the rotation */
@keyframes spin {
    0% {
        transform: rotate(0deg);  /* Starting angle */
    }
    100% {
        transform: rotate(360deg);  /* Full rotation */
    }
}

</style>

<div class="container-fluid">
    <div class="row column_title">
        <div class="col-md-12">
            <div class="page_title">
                <h2>My Customers</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        <div class="white_shd full margin_bottom_30">
            <div class="full graph_head">
                <div class="heading1 margin_0 row fullwidth">
                    <div class="col-md-6">
                        <h2>Customers List</h2>
                    </div>
                    <div class="col-md-6 align-right">
                        <form class="searchForm" method="get" >
                            <input type="email" name="email" class="form-control searchInput" placeholder="Enter customer's email to search">
                            <button type="submit" class="form-control searchButton"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="table_section padding_infor_info">
                <div class="table-responsive-sm">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name & Email</th>
                            <th>Company</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    
                    if(!empty($customersData)){
                        foreach($customersData as $k => $row){    
                            
                            $id = $row["id"];
                            $email = $row["email"];
                            $fname = $row["fname"];
                            $lname = $row["lname"];
                            $fullName = ucwords($fname." ".$lname);
                            $company = $row["company"];
                            $phone = $row["phone"];
                            $createDateTime = $row["createDateTime"];
                            $createDate = date("M d, Y H:i:s", strtotime($createDateTime));
                            
                    ?>
                                
                        <tr id="row-{{$id}}">
                            <td>{{$k+1}}</td>
                            <td>{{$fullName}}<br>{{$email}}</td>
                            <td>{{$company}}</td>
                            <td>{{$createDate}}</td>
                            <td>
                                <a href="{{url('admin/admin-customer/'.$id)}}" target="_blank" class=""><i class="fa fa-user"></i>&nbsp;Profile</a>
                                
                                <span class="navSeprator"></span>

                                <a href="{{url('admin/admin-customer-applicants/'.$id)}}" target="_blank" class=""><i class="fa fa-users"></i>&nbsp;Applicants</a>
                                
                                <span class="navSeprator"></span>

                                <a href="{{url('admin/admin-customer-applications/'.$id)}}" target="_blank" class=""><i class="fa fa-file-text-o"></i>&nbsp;Applications</a>
                            </td>
                        </tr>
                    <?php
                        }
                    }
                    ?>    
                    </tbody>
                </table>
                </div>

                @php if(!empty($customers)){ @endphp
                <div class="btn-group mr-2 pagination button_section button_style2">
                @php
          
                    $prevLink = $customers["links"][0]["url"]; //prevbutton url
                    $nextLink = $customers["links"][count($customers["links"]) - 1]["url"]; //nextbutton url
                    $activePageNum = "";
                    foreach($customers["links"] as $linkRw){
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
            @php } @endphp
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
@push("js")
<script>

//var spinnerIcon = elm.querySelector(".fa.fa-refresh");
//spinnerIcon.classList.add("spinner");

</script>
@endpush