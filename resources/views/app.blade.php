<!DOCTYPE html>
<html lang="en-us" class=" lang-en">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      
      <title>SmartKYC | {{$pageTitle}}</title>
      <link rel="shortcut icon" href="{{ url('assets/img/smartverify-32x32.png'); }}">

      @if(request()->is('admin/*'))
         <link rel="stylesheet" href="{{ url('assets/admin/css/bootstrap.min.css'); }}">
         <link rel="stylesheet" href="{{ url('assets/admin/css/bootstrap-icons.css'); }}"></link>
         <link rel="stylesheet" href="{{ url('assets/admin/css/style.css'); }}">
         <link rel="stylesheet" href="{{ url('assets/admin/css/responsive.css'); }}">
         
         <link rel="stylesheet" href="{{ url('assets/admin/css/color_2.css'); }}">
         <link rel="stylesheet" href="{{ url('assets/admin/css/bootstrap-select.css'); }}">
         
         <link rel="stylesheet" href="{{ url('assets/admin/css/perfect-scrollbar.css'); }}">
         <link rel="stylesheet" href="{{ url('assets/admin/css/custom.css'); }}">
      @elseif(request()->is('portal/*'))
         <link rel="preconnect" href="https://fonts.googleapis.com">
         <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
         <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
         <link rel="stylesheet" href="{{ url('assets/portal/css/bootstrap.min.css'); }}">
         <link rel="stylesheet" href="{{ url('assets/portal/css/bootstrap-icons.css'); }}"></link>
         <link rel="stylesheet" href="{{ url('assets/portal/css/style.css'); }}">
         <link rel="stylesheet" href="{{ url('assets/portal/css/responsive.css'); }}">
         
         <link rel="stylesheet" href="{{ url('assets/portal/css/color_2.css'); }}">
         <link rel="stylesheet" href="{{ url('assets/portal/css/bootstrap-select.css'); }}">
         
         <link rel="stylesheet" href="{{ url('assets/portal/css/perfect-scrollbar.css'); }}">
         <link rel="stylesheet" href="{{ url('assets/portal/css/custom.css'); }}">
      @else
         <!-- Google Font -->
         <link href="https://fonts.googleapis.com/css2?family=Lato&family=Oswald:wght@200;300;400&display=swap" rel="stylesheet">

         <!-- CSS Libraries -->
         <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
         <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
         <link href="{{ url('assets/lib/animate/animate.min.css')}}" rel="stylesheet">
         <link href="{{ url('assets/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

         <!-- Template Stylesheet -->
         <link rel="stylesheet" href="{{ url('assets/css/style.css'); }}">   
         
         
         <!-- old css
         <link class="hs-async-css dd" rel="stylesheet" href="{{ url('assets/css/main.min.css'); }}" as="style">
         <link class="hs-async-css" rel="stylesheet" href="{{ url('assets/css/_aos.min.css'); }}" as="style">
         <link class="hs-async-css" rel="stylesheet" href="{{ url('assets/css/child.min.css'); }}" as="style">
         <link class="hs-async-css" rel="stylesheet" href="{{ url('assets/css/_font-awsome.min.css'); }}" as="style">
         <link rel="stylesheet" href="{{ url('assets/css/module_79685541057_new-global-header.min.css'); }}">
         <link rel="stylesheet" href="{{ url('assets/css/slick.css'); }}"></link>
         <link rel="stylesheet" href="{{ url('assets/css/LanguageSwitcher.css'); }}"></link>
         <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css'); }}"></link>
         <link rel="stylesheet" href="{{ url('assets/css/bootstrap-icons.css'); }}"></link>
         <link rel="stylesheet" href="{{ url('assets/css/module_51601818863_banner.min.css'); }}">
         <link rel="stylesheet" href="{{ url('assets/css/module_51600793540_pricing.min.css'); }}">
         <link rel="stylesheet" href="{{ url('assets/css/module_51600771777_global-footer.min.css'); }}">
         <link rel="stylesheet" href="{{ url('assets/css/style.css'); }}">
         -->
      @endif
      
      <script>
         var CSRFTOKEN = "{{ csrf_token() }}";
         var SERVICEURL = "{{ url('') }}";
      </script>
      <script src="{{ url('assets/js/jquery-3.6.0.min.js'); }}"></script>   
     
      @stack("js")
       <!--<script src="{{ url('/assets/js/bootstrap.min.js') }}"></script>-->
      @if(request()->is('admin/*'))
         
         <!-- jQuery -->
         <!--<script src="{{ url('/assets/admin/js/jquery.min.js') }}"></script>-->
         <script src="{{ url('/assets/admin/js/popper.min.js') }}"></script>
         <script src="{{ url('/assets/admin/js/bootstrap.min.js') }}"></script>
         <!-- wow animation -->
         <script src="{{ url('/assets/admin/js/animate.js') }}"></script>
         <!-- select country -->
         <script src="{{ url('/assets/admin/js/bootstrap-select.js') }}"></script>
         <!-- owl carousel -->
         <script src="{{ url('/assets/admin/js/owl.carousel.js') }}"></script> 
         <!-- chart js -->
         <script src="{{ url('/assets/admin/js/Chart.min.js') }}"></script>
         <script src="{{ url('/assets/admin/js/Chart.bundle.min.js') }}"></script>
         <script src="{{ url('/assets/admin/js/utils.js') }}"></script>
         <script src="{{ url('/assets/admin/js/analyser.js') }}"></script>
         <!-- nice scrollbar -->
         <script src="{{ url('/assets/admin/js/perfect-scrollbar.min.js') }}"></script>
         <script>
            
            $(function(){
               setTimeout(function(){
                  var ps = new PerfectScrollbar('#sidebar');
               },500);

               var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
               var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
               return new bootstrap.Tooltip(tooltipTriggerEl)
               })
            });
         
         </script>
         <!-- custom js -->
         <script src="{{ url('/assets/admin/js/custom.js') }}"></script>
         <script src="{{ url('/assets/admin/js/chart_custom_style2.js') }}"></script>
         @elseif(request()->is('portal/*'))
         
         <!-- jQuery -->
         <!--<script src="{{ url('/assets/portal/js/jquery.min.js') }}"></script>-->
         <script src="{{ url('/assets/portal/js/popper.min.js') }}"></script>
         <script src="{{ url('/assets/portal/js/bootstrap.min.js') }}"></script>
         <!-- wow animation -->
         <script src="{{ url('/assets/portal/js/animate.js') }}"></script>
         <!-- select country -->
         <script src="{{ url('/assets/portal/js/bootstrap-select.js') }}"></script>
         <!-- owl carousel -->
         <script src="{{ url('/assets/portal/js/owl.carousel.js') }}"></script> 
         <!-- chart js -->
         <script src="{{ url('/assets/portal/js/Chart.min.js') }}"></script>
         <script src="{{ url('/assets/portal/js/Chart.bundle.min.js') }}"></script>
         <script src="{{ url('/assets/portal/js/utils.js') }}"></script>
         <script src="{{ url('/assets/portal/js/analyser.js') }}"></script>
         <!-- nice scrollbar -->
         <script src="{{ url('/assets/portal/js/perfect-scrollbar.min.js') }}"></script>
         <script>
            var ps = new PerfectScrollbar('#sidebar');
         </script>
         <!-- custom js -->
         <script src="{{ url('/assets/portal/js/custom.js') }}"></script>
         <script src="{{ url('/assets/portal/js/chart_custom_style2.js') }}"></script>

         @else
         <script src="{{ url('assets/js/script.js'); }}"></script>
         <!-- old-js
         <script src="{{ url('assets/js/script.js'); }}"></script>
         <script src="{{ url('assets/js/aos.min.js'); }}"></script>  
         -->
      @endif
   </head>
   <!--<body class="dashboard dashboard_2" data-aos-easingd="custom" data-aos-durationd="900" data-aos-delayd="0">-->
      <body>
   
      @if(request()->is('admin/*'))
         @include("admin.header")
      <input type="hidden" id="adminId" value="{{$LOGINUSER['adminId']}}" />
      @elseif(request()->is('portal/*'))
         @include("portal.header")
      @else 
         @include("header")
      @endif
      @yield("contentbox")
      
      @if(request()->is('admin/*'))
         @include("admin.footer")
      @elseif(request()->is('portal/*'))
         @include("portal.footer")
      @else
         @include("footer")
      @endif
      
      <div id="toastMessage" class="toastMessage alert alert-danger" role="alert">This is a danger alert—check it out!</div>
   </body>
</html>