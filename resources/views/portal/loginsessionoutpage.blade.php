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

    <style>
    .center {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }
    .main_bt {
        margin-bottom: 10px; /* spacing between button and text */
    }

    .loginErr{
        display: none;
        color:#842029;
    } 
    </style>

    </head>

<body class="inner_page error_404">
    <div class="full_container">
        <div class="container">
            <div class="center verticle_center full_height">
               <div class="error_page">
                  <div class="center">
                     <div class="error_icon">
                        <img class="img-responsive" src="{{url('assets/portal/images/419.png')}}" alt="session expired 404">
                     </div>
                  </div>
                  <br>
                  <h3>Session expired !</h3>
                  <P>Please try logging in again using the document request link sent to your registered email, or click the login button below.</P>
                  <div class="center">
                    <a class="main_bt" href="javascript:void(0);" onclick="login()">Login</a>
                    
                    <span class="loginErr">It seems the button is not working. Please try logging in using the document request link sent to your registered email.</span>
                  </div>
               </div>
            </div>
        </div>
    </div>
    <script>
        function login(){
            
            const portal_Id = localStorage.getItem('portalId');
            const request_Token = localStorage.getItem('requestToken');
        
            if((portal_Id && portal_Id != '' && portal_Id != undefined && portal_Id != null) && (request_Token && request_Token != '' && request_Token != undefined && request_Token != null)){
                window.location.href = 'login/'+portal_Id+'?applicationtoken='+request_Token;
            }else{
                document.getElementsByClassName('loginErr')[0].style.display = 'block';
            }
        }
    </script>
</body>
</html>