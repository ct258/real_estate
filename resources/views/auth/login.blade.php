<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>

<head>
    <title>Đăng nhập</title>
    <!-- custom-theme -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Elegant Login Form Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript">
        addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } 
    </script>
    <!-- //custom-theme  -->
    <link rel="stylesheet" href="{{asset('elegant_login_form/css/style.css')}}">
    <!-- font-awesome icons -->
    <link href="{{asset('elegant_login_form/css/font-awesome.css')}}" rel="stylesheet">
    <!-- //font-awesome icons -->
    <link href="//fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <style>
        input.username {
            background: #fff;
            margin: 0 25px 0px 0;
            color: #ccc6c6;
            box-sizing: border-box;
            display: block;
            width: 100%;
            border-width: 1px;
            border-style: solid;
            padding: 13px;
            outline: none;
            font-family: inherit;
            font-size: 0.95em;
        }
    </style>
</head>

<body>
    <div class="login-form w3_form">
        <!--  Title-->
        <div class="login-title w3_title">
            <h1>Elegant login Form</h1>
        </div>
        <div class="login w3_login">
            <h2 class="login-header w3_header">Log in</h2>
            <div class="w3l_grid">
                <form method="POST" action="{{URL::route("postLogin")}}" class="login-container">
                    @csrf
                    <input type="text" placeholder="Username" Name="username" class="username" required="">
                    <input type="password" placeholder="Password" Name="password" required="">
                    <label class="anim">
                        <input type="checkbox" value='remember' name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>
                        <span style="color: #ccc6c6;">Remember Me</span>
                    </label><br><br>
                    <input type="submit" value="Submit">
                </form>
                <div class="second-section w3_section">
                    <div class="bottom-header w3_bottom">
                        <h3>OR</h3>
                    </div>
                    <div class="social-links w3_social">
                        <ul>
                            <!-- facebook -->
                            <li> <a class="facebook" href="#" target="blank"><i class="fa fa-facebook"></i></a>
                            </li>

                            <!-- twitter -->
                            <li> <a class="twitter" href="#" target="blank"><i class="fa fa-twitter"></i></a>
                            </li>

                            <!-- google plus -->
                            <li> <a class="googleplus" href="#" target="blank"><i class="fa fa-google-plus"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="bottom-text w3_bottom_text">
                    <p>No account yet?<a href="#">Signup</a></p>
                    <h4> <a href="#">Forgot your password?</a></h4>
                </div>

            </div>
        </div>

    </div>





    <div class="footer-w3l">
        <p class="agile"> &copy; 2017 Elegant Login Form . All Rights Reserved | Design by <a
                href="http://w3layouts.com">W3layouts</a></p>
    </div>
</body>

</html>