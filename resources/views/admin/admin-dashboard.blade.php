@extends("app")
@section("contentbox")
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


        <!-- graph -->
        <div class="row column2 graph margin_bottom_30">
            <div class="col-md-6 col-lg-6">
                <div class="white_shd full">
                    <div class="full graph_head">
                        <div class="heading1 margin_0">
                        <h2>Weekly Registrations</h2>
                        </div>
                    </div>
                    <div class="full graph_revenue">
                        <div class="row">
                        <div class="col-md-12">
                            <div class="content">
                                <div class="area_chart">
                                    <div class="row">
                                    <div class="col-md-12">
                                        <canvas id="customers_chart"></canvas>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-6">
                <div class="white_shd full">
                    <div class="full graph_head">
                        <div class="heading1 margin_0">
                        <h2>Weekly Sales</h2>
                        </div>
                    </div>
                    <div class="full graph_revenue">
                        <div class="row">
                        <div class="col-md-12">
                            <div class="content">
                                <div class="area_chart">
                                    <div class="row"> 
                                    <div class="col-md-12">
                                        <canvas id="sales_chart"></canvas>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end graph -->

        
    </div>
</div>
@endsection
@push("js")
<script>
    
$(function () {
    var salesChartData = @json($salesChartData);
    var customersChartData = @json($customersChartData);
    
    new Chart(document.getElementById("customers_chart").getContext("2d"), getChartJs('line', customersChartData,"Customers"));
    new Chart(document.getElementById("sales_chart").getContext("2d"), getChartJs('line', salesChartData,"Sales (NGN)"));

});

function getChartJs(type, data, title) {
 var config = null;

 if (type === 'line') {
   config = {
     type: 'line',
     data: {
       labels: data.labels,
       datasets: [{
         label: title,
         data: data.values,
         borderColor: 'rgba(33, 150, 243, 1)',
         backgroundColor: 'rgba(33, 150, 243, 0.2)',
         pointBorderColor: 'rgba(33, 150, 243, 1)',
         pointBackgroundColor: 'rgba(255, 255, 255, 1)',
         pointBorderWidth: 1
       }]
     },
     options: {
       responsive: true,
       legend: false,
       scales: {
            y: {
                beginAtZero: true,  // Start the Y-axis at zero
                min: 0,  // Explicitly set minimum value for Y-axis to 0
                ticks: {
                    stepSize: 1,  // Set step size to 1, or adjust as needed
                    callback: function(value) {
                        return Number.isInteger(value) ? value : '';  // Ensure integer values only
                    }
                }
            }
        }
     }
   }
 }
 
 return config;
}

</script>
@endpush