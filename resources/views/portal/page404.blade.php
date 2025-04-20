<html lang="en-us" class=" lang-en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <title>SmartKYC | Portal LogIn</title>
    <link rel="shortcut icon" href="{{ url('assets/img/SmartKYC-32x32.png'); }}">

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


    </head>

<body class="inner_page error_404">
    <div class="full_container">
        <div class="container">
            <div class="center verticle_center full_height">
               <div class="error_page">
                  <div class="center">
                     <div class="error_icon">
                        <img class="img-responsive" src="{{url('assets/portal/images/error.png')}}" alt="page not found 404">
                     </div>
                  </div>
                  <br>
                  <h3>PAGE NOT FOUND !</h3>
                  <P>It seems the link you are trying to access is invalid, expired, or the page was not found (404).</P>
                  <div class="center">
                  <?php if($isLogin > 0){ ?>  
                        <a class="main_bt" href="{{url('portal/dashboard')}}">Go To Dashboard</a>
                    <?php }else{ ?>  
                        <a class="main_bt" href="{{url()}}">Go To Homae Page</a>
                  <?php } ?>  
                  
                </div>
               </div>
            </div>
        </div>
    </div>
</body>
</html>