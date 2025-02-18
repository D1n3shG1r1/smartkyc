@php
$customersData = $customers["data"];
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
                <h2>My Applicants</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        <div class="white_shd full margin_bottom_30">
            <div class="full graph_head">
                <div class="heading1 margin_0 row fullwidth">
                    <div class="col-md-6">
                        <h2>Applicants List</h2>
                    </div>
                    <div class="col-md-6 align-right">
                        <form class="searchForm" method="get" >
                            <input type="email" name="email" class="form-control searchInput" placeholder="Enter email to search">
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
                            <th>Name</th>
                            <th>Email</th>
                            <th>OTP</th>
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
                            $otp = $row["otp"];
                            
                    ?>
                                
                        <tr id="row-{{$id}}">
                            <td>{{$k+1}}</td>
                            <td>{{$fullName}}</td>
                            <td>{{$email}}</td>
                            <td id="otp-{{$id}}" style="letter-spacing: 5px;"><span>{{$otp}}</span>
                            <button type="button" id="otpcopybtn-{{$id}}" class="btn btn-outline-primary" onclick="copyOtp(this);">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-copy" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M4 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 5a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1h1v1a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h1v1z"></path>
                                </svg>
                                Copy OTP
                            </button>
                            </td>
                            <td><a href="javascript:void(0);" data-id="{{$id}}" onclick="generateotp(this);" class="btn cur-p btn-outline-primary regenerate-otp-btn"><i class="fa fa-refresh"></i>Regenerate OTP</a></td>
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

            </div>
        </div>
        </div>
    </div>
</div>
@endsection
@push("js")
<script>

function copyOtp(elm) {
    // Get the ID attribute of the element
    var idAttr = elm.getAttribute("id");
    
    // Split the ID to extract the dataId part
    var idAttrParts = idAttr.split("-");
    var dataId = idAttrParts[1];

    // Get the td element that contains the OTP text
    var otpTd = document.getElementById('otp-' + dataId);

    // Get the text content (assuming it's wrapped in a span or another tag)
    var link = otpTd.querySelector("span");

    // Select the text inside the link/span
    var range = document.createRange();
    range.selectNodeContents(link);
    var selection = window.getSelection();
    selection.removeAllRanges();
    selection.addRange(range);

    // Copy the selected text
    document.execCommand("copy");

    // Show the success message
    var err = 0;
    var msg = "OTP copied to clipboard: " + link.textContent;
    showToast(err, msg);
}


function generateotp(elm){
    
    var spinnerIcon = elm.querySelector(".fa.fa-refresh");
    spinnerIcon.classList.add("spinner");

    var dataId = $(elm).attr("data-id");

    var requrl = "admin/generateotp";
    var postdata = {
        "id":dataId
    };
    
    callajax(requrl, postdata, function(resp){
        $(".errorMessage").html(resp.M);
        var err = 1;
        if(resp.C == 100){
            err = 0;
            const newOtp = resp.R.otp;
            $("#otp-"+dataId+" span").text(newOtp);
        }
        
        var msg = resp.M;
        showToast(err,msg);
        spinnerIcon.classList.remove("spinner");
    });
}
</script>
@endpush