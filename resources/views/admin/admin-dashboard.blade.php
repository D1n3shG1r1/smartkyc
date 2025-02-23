@extends("app")
@section("contentbox")

<style>
/*.fa-naira-sign {
    --fa: "\e1f6";
    --fa--fa: "\e1f6\e1f6";
}*/
/*.fa-naira-sign {
    content: "\20A6";
}
*/

.fa-naira-sign:before{content:"\e1f6"}
</style>
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
        <div class="col-md-12">
            <div class="page_title">
                <h2>Dashboard</h2>
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
                    <p class="total_no">{{$totalcustomers}}</p>
                    <p class="head_couter">Customers</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="full counter_section margin_bottom_30 blue1_bg">
                <div class="couter_icon">
                    <div>
                    <i class="fa fa-money"></i>
                    </div>
                </div>
                <div class="counter_no">
                    <div>
                    <p class="total_no">{{$totalrevenue}}</p>
                    <p class="head_couter">Revenue</p>
                    </div>
                </div>
            </div>
        </div>
        <!--
        <div class="col-md-6 col-lg-3">
            <div class="full counter_section margin_bottom_30 green_bg">
                <div class="couter_icon">
                    <div> 
                    <i class="fa fa-clock-o"></i>
                    </div>
                </div>
                <div class="counter_no">
                    <div>
                    <p class="total_no" title="Pending Applications">0</p>
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
                    <p class="total_no">0</p>
                    <p style="font-size: 0.80rem;" class="head_couter">Verification Limit
                    </p>
                    </div>
                </div>
            </div>
        </div>
        -->
        </div>

        
    </div>
</div>
@endsection
@push("js")
<script>
    
</script>
@endpush