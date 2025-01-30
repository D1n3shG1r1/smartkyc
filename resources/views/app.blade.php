<!DOCTYPE html>
<html lang="en-us" class=" lang-en">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      
      <title>SmartVerify | {{$pageTitle}}</title>
      <link rel="shortcut icon" href="{{ url('assets/img/cropped-walls-black-fav-270x270.jpg'); }}">
      
      <!--
      <meta name="description" content="Compare inspection quotes quickly with the largest network of inspection professionals worldwide. Access over 165,000 quality control experts today">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta property="og:description" content="Compare inspection quotes quickly with the largest network of inspection professionals worldwide. Access over 165,000 quality control experts today">
      <meta property="og:title" content="Global Inspection Marketplace | Worldwide Network of Inspectors">
      <meta name="twitter:description" content="Compare inspection quotes quickly with the largest network of inspection professionals worldwide. Access over 165,000 quality control experts today">
      <meta name="twitter:title" content="Global Inspection Marketplace | Worldwide Network of Inspectors">
      -->

      @if(request()->is('admin/*'))
         <link rel="stylesheet" href="{{ url('assets/admin/css/bootstrap.min.css'); }}">
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
         <link rel="stylesheet" href="{{ url('assets/portal/css/style.css'); }}">
         <link rel="stylesheet" href="{{ url('assets/portal/css/responsive.css'); }}">
         
         <link rel="stylesheet" href="{{ url('assets/portal/css/color_2.css'); }}">
         <link rel="stylesheet" href="{{ url('assets/portal/css/bootstrap-select.css'); }}">
         
         <link rel="stylesheet" href="{{ url('assets/portal/css/perfect-scrollbar.css'); }}">
         <link rel="stylesheet" href="{{ url('assets/portal/css/custom.css'); }}">
      @else
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
         
      @endif
      
      <!--
      <link rel="canonical" href="{{ url('/'); }}">
      <link rel="apple-touch-icon" href="https://inspexion.com/hubfs/0.Charte%20graphique/App.jpg">
      <meta name="facebook-domain-verification" content="iymegdh2v7fh0hja7u4fjbxadmhvew">
      <meta property="og:image" content="https://inspexion.com/hubfs/The%20Worlds%20Largest%20Inspection%20Marketplace.png">
      <meta property="og:image:width" content="300">
      <meta property="og:image:height" content="175">
      <meta name="twitter:image" content="https://inspexion.com/hubfs/The%20Worlds%20Largest%20Inspection%20Marketplace.png">
      <meta property="og:url" content="{{ url('/'); }}">
      <meta name="twitter:card" content="summary_large_image">
      <meta http-equiv="content-language" content="en">
      <link rel="alternate" hreflang="en" href="{{ url('/'); }}">
      <link rel="alternate" hreflang="fr" href="{{ url('/'); }}">
      -->
      @stack("js")
      <script>
         var CSRFTOKEN = "{{ csrf_token() }}";
         var SERVICEURL = "{{ url('') }}";
      </script>
      <script src="{{ url('assets/js/jquery-3.6.0.min.js'); }}"></script>   
      <script src="{{ url('/assets/js/bootstrap.min.js') }}"></script>
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
            var ps = new PerfectScrollbar('#sidebar');
         </script>
         <!-- custom js -->
         <script src="{{ url('/assets/admin/js/custom.js') }}"></script>
         <script src="{{ url('/assets/admin/js/chart_custom_style2.js') }}"></script>
         @else
         <script src="{{ url('assets/js/script.js'); }}"></script>
         <script src="{{ url('assets/js/aos.min.js'); }}"></script>  
      @endif
   </head>
   <body class="dashboard dashboard_2" data-aos-easingd="custom" data-aos-durationd="900" data-aos-delayd="0">
   
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
      
      <div id="toastMessage" class="alert alert-danger" role="alert">This is a danger alert—check it out!</div>
   </body>
</html>