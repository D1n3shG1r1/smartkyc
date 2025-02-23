@php
if(!empty($currentPackage)){
    $package = $currentPackage["package"];
    $packageName = $currentPackage["packageName"];
    $starton = $currentPackage["starton"];
    $expireon = $currentPackage["expireon"];
    $expired = $currentPackage["expired"];
    $active = $currentPackage["active"];
    /*
    $package $expired $active
    "package-basic"
    "package-business"
    "package-enterprise"
    "package-payasyougo"
    */
}else{
    $package = "";
    $packageName = "";
    $starton = "";
    $expireon = "";
    $expired = 1;
    $active = 0;
}
@endphp
@extends("app")
@section("contentbox")
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>My Package</h2>
                    <p class="currentPackageRow">
                    <span class="currentPackageSpan">
                        Current Package: {{$packageName}}
                    </span>
                    <span class="currentPackageSpan">
                        Status: @php if($expired == 1 || $active == 0){ echo "Inactive"; }else{ echo "Active"; } @endphp
                    </span>
                    <span class="currentPackageSpan">Expires on: {{date("M d, Y", strtotime($expireon))}}</span>    
                    </p>
                </div>
            </div>
        </div>

        <div class="row column1">
            <div class="col-md-12">
                <div class="white_shd full margin_bottom_30">
                    <div class="full graph_head">
                        <div class="heading1 margin_0">
                        <h2>Packages</h2>
                        </div>
                    </div>
                    <div class="full price_table padding_infor_info">
                        <div class="row">
                            <!-- column price --> 
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <div class="table_price full">
                                <div class="inner_table_price">
                                    <div class="price_table_head yellow_bg">
                                    @php
                                    if($package == "package-payasyougo" && $expired == 0 && $active == 1) {
                                    @endphp
                                    <div class="discount-ribbon">Active</div>
                                    @php
                                    }
                                    @endphp
                                    <h2>Pay-As-You-Go</h2>
                                    </div>
                                    <div class="price_table_inner">
                                    <div class="cont_table_price_blog">
                                        <p class="yellow_color">₦ <span class="price_no">9,000</span> per Document</p>
                                    </div>
                                    <div class="cont_table_price">
                                        <ul>
                                            <li><a href="#">Are you an occasional user? Who need to verify documents on a case-by-case basis. Then this is the option for you!</a></li>
                                            <li><i class="fa fa-check"></i><a href="#">Cost ₦9,000 per document</a></li>
                                            <li><i class="fa fa-check"></i><a href="#">Processing time: 1-3 business days</a></li>
                                            <li><i class="fa fa-check"></i><a href="#">Real-time tracking</a></li>
                                            <li><i class="fa fa-check"></i><a href="#">Full verification report</a></li>
                                        </ul>
                                    </div>
                                    </div>
                                    <div class="price_table_bottom">
                                    <div class="center">
                                        
                                    <a class="main_bt" href="javascript:void(0);" data-toggle="modal" data-target="#QuoteModal">Get Quote</a></div>
                                    
                                </div>
                                </div>
                            </div>
                        </div>
                        <!-- end column price -->
                        <!-- column price --> 
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <div class="table_price full">
                                <div class="inner_table_price">
                                    <div class="price_table_head blue1_bg">
                                    @php
                                    if($package == "package-basic" && $expired == 0 && $active == 1) {
                                    @endphp
                                    <div class="discount-ribbon">Active</div>
                                    @php
                                    }
                                    @endphp
                                    <h2>Basic</h2>
                                    </div>
                                    <div class="price_table_inner">
                                    <div class="cont_table_price_blog">
                                        <p class="blue1_color">₦ <span class="price_no">37,500</span> Monthly</p>
                                    </div>
                                    <div class="cont_table_price">
                                        <ul>
                                            <li><a href="#">Are you an individual or a small business with minimal verification needs? Then this is the option for you!</a></li>
                                            <li><i class="fa fa-check"></i><a href="#">Verify up to 5 documents per month</a></li>
                                            <li><i class="fa fa-check"></i><a href="#">Cost: ₦7,500 per document</a></li>
                                            <li><i class="fa fa-check"></i><a href="#">Processing time: 1-3 business days</a></li>
                                        </ul>
                                    </div>
                                    </div>
                                    <div class="price_table_bottom">
                                    <div class="center">
                                    @php
                                        if($package == "package-basic" && $expired == 0 && $active == 1) {
                                    @endphp
                                            <a class="main_bt disabled" href="javascript:void(0);" disabled>Buy Now</a>
                                    @php
                                        } else {
                                    @endphp
                                            <a class="main_bt" href="{{ url('admin/buy/package-basic') }}">Buy Now</a>
                                    @php
                                        }
                                    @endphp
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end column price -->
                        <!-- column price --> 
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <div class="table_price full">
                                <div class="inner_table_price">
                                    <div class="price_table_head green_bg">
                                    @php
                                    if($package == "package-business" && $expired == 0 && $active == 1) {
                                    @endphp
                                    <div class="discount-ribbon">Active</div>
                                    @php
                                    }
                                    @endphp
                                    <h2>Business</h2>
                                    </div>
                                    <div class="price_table_inner">
                                    <div class="cont_table_price_blog">
                                        <p class="green_color">₦ <span class="price_no">450,000</span> Monthly</p>
                                    </div>
                                    <div class="cont_table_price">
                                        <ul>
                                            <li><a href="#">Medium to large businesses with higher verification needs.</a></li>
                                            <li><i class="fa fa-check"></i><a href="#">Verify up to 100 documents per month</a></li>
                                            <li><i class="fa fa-check"></i><a href="#">Cost: ₦4,500 per document</a></li>
                                            <li><i class="fa fa-check"></i><a href="#">Processing time: 1-3 business days</a></li>
                                            <li><i class="fa fa-check"></i><a href="#">API integration for automated verification</a></li>
                                            <li><i class="fa fa-check"></i><a href="#">Bulk upload capability</a></li>
                                            <li><i class="fa fa-check"></i><a href="#">Customizable reporting features</a></li>
                                            <li><i class="fa fa-check"></i><a href="#">Priority support</a></li>
                                        </ul>
                                    </div>
                                    </div>
                                    <div class="price_table_bottom">
                                    <div class="center">
                                    @php
                                    if($package == "package-business" && $expired == 0 && $active == 1){
                                    @endphp
                                    <a class="main_bt disabled" href="javascript:void(0);" disabled>Buy Now</a>
                                    @php
                                    }else{
                                    @endphp
                                    <a class="main_bt" href="{{url('admin/buy/package-business')}}">Buy Now</a></div>
                                    @php
                                    }
                                    @endphp
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end column price -->
                        <!-- column price --> 
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <div class="table_price full">
                                <div class="inner_table_price">
                                    <div class="price_table_head red_bg">
                                    @php
                                    if($package == "package-enterprise" && $expired == 0 && $active == 1) {
                                    @endphp
                                    <div class="discount-ribbon">Active</div>
                                    @php
                                    }
                                    @endphp
                                    <h2>Enterprise</h2>
                                    </div>
                                    <div class="price_table_inner">
                                    <div style="display: none;" class="cont_table_price_blog">
                                        <p class="red_color">₦ <span class="price_no">?</span> Monthly</p>
                                    </div>
                                    <div class="cont_table_price">
                                        <ul>
                                            <li><a href="#">Large organizations or government entities with extensive verification requirements.</a></li>
                                            <li><i class="fa fa-check"></i><a href="#">Verify Unlimited documents per month</a></li>
                                            <li><i class="fa fa-check"></i><a href="#">Contact us for a custom quote</a></li>
                                            <li><i class="fa fa-check"></i><a href="#">Processing time:1-3 business days, with expedited options</a></li>
                                            <li><i class="fa fa-check"></i><a href="#">During production inspection</a></li>
                                            <li><i class="fa fa-check"></i><a href="#">Full API integration with custom workflows</a></li>
                                            <li><i class="fa fa-check"></i><a href="#">Bulk document processing</a></li>
                                            <li><i class="fa fa-check"></i><a href="#">Dedicated account manager</a></li>
                                            <li><i class="fa fa-check"></i><a href="#">Compliance and audit trail reporting</a></li>
                                            <li><i class="fa fa-check"></i><a href="#">24/7 priority customer support</a></li>
                                        </ul>
                                    </div>
                                    </div>
                                    <div class="price_table_bottom">
                                    <div class="center">
                                    @php
                                    if($package == "package-enterprise" && $expired == 0 && $active == 1){
                                    @endphp
                                        <a class="main_bt disabled" href="javascript:void(0);" disabled>Buy Now</a>
                                    @php
                                    }else{
                                    @endphp    
                                        <a class="main_bt" href="{{url('admin/buy/package-enterprise')}}">Buy Now</a>
                                    @php
                                    }
                                    @endphp
                                        
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end column price -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="modal fade" id="QuoteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Request a Quote</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <textarea id="messageInput" maxlength="320" rows="10" class="form-control" style="resize: none;" placeholder="Enter your message" oninput="updateCharacterCount()"></textarea>
                <p class="text-align-right">Remaining characters: <span id="remainingChars">320</span></p>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" id="sendQtBtn" class="btn btn-primary" data-txt="Request" data-loadingtxt="Requesting..." onclick="sendQuote(this);">Send</button>
            </div>
        </div>
    </div>
</div>
@endsection
@push("js")
<script>

function updateCharacterCount() {
    var textarea = document.getElementById("messageInput");
    var remainingChars = document.getElementById("remainingChars");
    var maxLength = textarea.getAttribute("maxlength");
    var currentLength = textarea.value.length;

    var charsLeft = maxLength - currentLength;
    remainingChars.textContent = charsLeft;

    if (charsLeft <= 0) {
        remainingChars.style.color = "red";
    } else {
        remainingChars.style.color = "black";
    }
}

function sendQuote(elm){
    var myModal = new bootstrap.Modal(document.getElementById('QuoteModal'));

    var message = $("#messageInput").val();
    
    if(!isRealValue(message)){
        var err = 1;
        var msg = "Please type your message.";
        showToast(err,msg);
        return false;
    }
    
    if(message.length > 320){
        var err = 1;
        var msg = "Your message cannot exceed 320 characters.";
        showToast(err,msg);
        return false;
    }

    var elmId = $(elm).attr("id");
    $(elm).attr("disabled",true);
    var orgTxt = $(elm).attr("data-txt");
    var loadingTxt = $(elm).attr("data-loadingtxt");
    showLoader(elmId,loadingTxt); 

    var requrl = "admin/savequote";
    var jsondata = {
        "message":message
    };
    
    callajax(requrl, jsondata, function(resp){
        $(elm).removeAttr("disabled");
        hideLoader(elmId,orgTxt);
        
        $("#messageInput").val("");
        myModal.hide();

        if(resp.C == 100){
            var err = 0;
            var msg = "Your request has been submitted. We will contact you shortly.";
            showToast(err,msg);    
        }else{
            var err = 1;
            var msg = "Your session has expired. Please log in again to continue.";
            showToast(err,msg);    
        }
    });
}
</script>
@endpush
