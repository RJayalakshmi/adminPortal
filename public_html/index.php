<!DOCTYPE html>
<!--
Beyond Admin - Responsive Admin Dashboard Template build with Twitter Bootstrap 3
Version: 1.3
Purchase: http://wrapbootstrap.com
-->

<html xmlns="http://www.w3.org/1999/xhtml">
<!--Head-->
<head>
    <meta charset="utf-8" />
    <title>Login Page</title>

    <meta name="description" content="login page" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">

    <!--Basic Styles-->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link id="bootstrap-rtl-link" href="" rel="stylesheet" />
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />

    <!--Fonts-->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300" rel="stylesheet" type="text/css">

    <!--Beyond styles-->
    <link id="beyond-link" href="assets/css/beyond.min.css" rel="stylesheet" />
    <link href="assets/css/demo.min.css" rel="stylesheet" />
    <link href="assets/css/animate.min.css" rel="stylesheet" />
    <link id="skin-link" href="" rel="stylesheet" type="text/css" />

    <!--Skin Script: Place this script in head to load scripts for skins and rtl support-->
    <script src="assets/js/skins.min.js"></script>
    <style type="text/css">
        .login-container .logobox p{
          text-align: center; 
        }
        .logobox{
            padding: 10px !important;
            margin-bottom: 10px;
        }
    </style>
</head>
<!--Head Ends-->
<!--Body-->
<body>
    <div class="login-container animated fadeInDown">
        <div class="loginbox bg-white">
            <div class="loginbox-title">SIGN IN</div>
            <form id="loginForm">
                <div class="loginbox-textbox">
                    <input type="email" class="form-control" name="username" placeholder="Email" id="email" />
                </div>
                <div class="loginbox-textbox">
                    <input type="password" class="form-control" name="pwd" placeholder="Password" id="pwd" />
                </div>
                <div class="loginbox-submit">
                    <input type="submit" class="btn btn-primary btn-block" value="Login">
                </div>
                <div class="alert alert-danger fade in error">
                    <i class="fa-fw fa fa-times"></i>
                    <strong>Error!</strong> <span></span>
                </div>
            </form>
        </div>
        <div class="logobox" style="height: 70px !important;">
            <p>
                <strong>
                    Email: user@gmail.com <br/>
                    Password: Test1234
                </strong>
            </p>
        </div>
    </div>

    <!--Basic Scripts-->
    <script src="assets/js/jquery-2.0.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/slimscroll/jquery.slimscroll.min.js"></script>

    <!--Beyond Scripts-->
    <script src="assets/js/beyond.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $(".error").hide();
            // Form submit function
            $('#loginForm').submit(function(e){
                e.preventDefault();
                if($.trim($("#email").val()).length > 0 && $.trim($("#pwd").val()).length > 0){
                    var data = {'email': $("#email").val(), 'password': $("#pwd").val()};
                    
                    $.ajax({
                        url:"Login.php",
                        method: "POST",
                        data: data,
                        dataType: "text"
                    }).done(function(response){
                        if(response == "false"){
                            $(".error span").html("Invalid Email/Password");
                            $(".error").show();
                        }else{
                            window.location = "clients.php";
                        }
                    });
                }else{
                    $(".error span").html("Enter email and password");
                    $(".error").show();
                }                
            });
        });
    </script>
    
</body>
<!--Body Ends-->
</html>
