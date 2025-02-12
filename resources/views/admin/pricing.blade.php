@php
if(!empty($currentPackage)){
    $package = $currentPackage["package"];
    $starton = $currentPackage["starton"];
    $expireon = $currentPackage["expireon"];
    $expired = $currentPackage["expired"];
    $active = $currentPackage["active"];
}else{
    $package = "";
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
                    <span>
                        <button type="button" class="status btn btn-success blue1_bg btn-xs">  {{ config('custom.packageName.' . $package) }}</button>
                        
                        @php 
                        if($expired == 1 || $active == 0){
                        @endphp    
                            <button type="button" class="status btn btn-fail btn-xs">Inactive</button>
                        @php
                        }else{
                        @endphp
                        
                        <button type="button" class="status btn btn-success btn-xs">Active</button>
                        @php
                        }
                        @endphp
                    </span>
                    <span>Expires on:<h2>{{$expireon}}</h2></span>
    
    
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
                                    <div class="price_table_head blue1_bg">
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
                                    <div class="center"><a class="main_bt" href="{{url('admin/buy/package-basic')}}">Buy Now</a></div>
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
                                    <h2>Business</h2>
                                    </div>
                                    <div class="price_table_inner">
                                    <div class="cont_table_price_blog">
                                        <p class="green_color">₦ <span class="price_no">4,50,000</span> Monthly</p>
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
                                    <div class="center"><a class="main_bt" href="{{url('admin/buy/package-business')}}">Buy Now</a></div>
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
                                    <div class="center"><a class="main_bt" href="{{url('admin/buy/package-enterprise')}}">Buy Now</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end column price -->
                        <!-- column price --> 
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <div class="table_price full">
                                <div class="inner_table_price">
                                    <div class="price_table_head yellow_bg">
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
                                    <div class="center"><a class="main_bt" href="{{url('admin/buy/package-payasyougo')}}">Buy Now</a></div>
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

@endsection
@push("js")
@endpush
