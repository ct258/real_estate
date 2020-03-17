<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->
{{-- <!DOCTYPE html>
<html> --}}

{{--<head>
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
</head>--}}

{{-- <body>
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
    <input type="checkbox" value='remember' name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
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
</body> --}}

{{-- </html> --}}



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | RealEstate</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- //font-awesome icons -->
    <link href="//fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">

    <style>
        :root {
            --input-padding-x: 1.5rem;
            --input-padding-y: .75rem;
        }



        .card-signin {
            border: 0;
            border-radius: 1rem;
            box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .card-signin .card-title {
            margin-bottom: 2rem;
            font-weight: 300;
            font-size: 1.5rem;
        }

        /* .card-signin .card-img-left {
            width: 45%;
            
            background: scroll center url('https://source.unsplash.com/WEQbe2jBg40/414x512');
            background-size: cover;
            } */

        .card-signin .card-body {
            padding: 2rem;
        }

        .form-signin {
            width: 100%;
        }

        .form-signin .btn {
            font-size: 80%;
            border-radius: 5rem;
            letter-spacing: .1rem;
            font-weight: bold;
            padding: 1rem;
            transition: all 0.2s;
        }

        .form-label-group {
            position: relative;
            margin-bottom: 1rem;
        }

        .form-label-group input {
            height: auto;
            border-radius: 2rem;
        }

        .form-label-group>input,
        .form-label-group>label {
            padding: var(--input-padding-y) var(--input-padding-x);
        }

        .form-label-group>label {
            position: absolute;
            top: 0;
            left: 0;
            display: block;
            width: 100%;
            margin-bottom: 0;
            /* Override default `<label>` margin */
            line-height: 1.5;
            color: #495057;
            border: 1px solid transparent;
            border-radius: .25rem;
            transition: all .1s ease-in-out;
        }

        .form-label-group input::-webkit-input-placeholder {
            color: transparent;
        }

        .form-label-group input:-ms-input-placeholder {
            color: transparent;
        }

        .form-label-group input::-ms-input-placeholder {
            color: transparent;
        }

        .form-label-group input::-moz-placeholder {
            color: transparent;
        }

        .form-label-group input::placeholder {
            color: transparent;
        }

        .form-label-group input:not(:placeholder-shown) {
            padding-top: calc(var(--input-padding-y) + var(--input-padding-y) * (2 / 3));
            padding-bottom: calc(var(--input-padding-y) / 3);
        }

        .form-label-group input:not(:placeholder-shown)~label {
            padding-top: calc(var(--input-padding-y) / 3);
            padding-bottom: calc(var(--input-padding-y) / 3);
            font-size: 12px;
            color: #777;
        }

        .btn-google {
            color: white;
            background-color: #ea4335;
        }

        .btn-facebook {
            color: white;
            background-color: #3b5998;
        }

            /* fix */
            .card.card-signin.flex-row.my-5 {
                width: 390px;
                margin: auto;
                background-color: white;
            }
        /* fix */
        .card.card-signin.flex-row.my-5 {
            width: 390px;
            margin: auto;
            --growth-from: 0.8;
            --growth-to: 1;
            background-color: white;
            animation: growth linear 0.3s
        }

        body {
            background: url("leramiz/img/bg.jpg");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .footer-w3l {
            /* width: 100%; */
            height: 50px;
            /* border: 1px solid; */
            color: white;
            font-family: 'Source Sans Pro', sans-serif;
            margin-bottom: 20px;
        }

        .footer-w3l>p {
            width: 560px;
            height: 100%;
            margin: auto;
            font-size: 15px;
            line-height: 50px;
        }

        h5.card-title.text-center i {
            /* padding: 0 5px; */
            margin-left: -30px;
            padding: 0 9px;
            font-size: 27px;
            color: #30caa8;
        }

        @-webkit-keyframes growth {
            from {
                transform: scale(var(--growth-from));
            }

            to {
                transform: scale(var(--growth-to));
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-9 mx-auto">
                <div class="card card-signin flex-row my-5">
                    {{-- <div class="card-img-left d-none d-md-flex">
                 <!-- Background image for card set in CSS! -->
              </div> --}}
                    <div class="card-body">

                        <h5 class="card-title text-center"><i class='fa fa-user-circle'></i>Login</h5>
                        <form class="form-signin" action="{{URL::route("postLogin")}} " method="POST">
                            @csrf
                            <div class="form-label-group">
                                <input type="text" id="inputUserame" class="form-control" placeholder="Username"
                                    required autofocus Name="username">
                                <label for="inputUserame">Username</label>
                            </div>

                            {{-- <div class="form-label-group">
                    <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required>
                    <label for="inputEmail">Email address</label>
                  </div> --}}

                            <hr>

                            <div class="form-label-group">
                                <input type="password" Name="password" id="inputPassword" class="form-control"
                                    placeholder="Password" required>
                                <label for="inputPassword">Password</label>
                            </div>

                            {{-- <div class="form-label-group">
                    <input type="password" id="inputConfirmPassword" class="form-control" placeholder="Password" required>
                    <label for="inputConfirmPassword">Confirm password</label>
                  </div> --}}

                            <button class="btn btn-lg btn-primary btn-block text-uppercase"
                                type="submit">Submit</button>
                            <a class="d-block text-center mt-2 small" href="#">Sign In</a>
                            <hr class="my-4">
                            <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i
                                    class="fa fa-google mr-2"></i> Sign up with Google</button>
                            <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i
                                    class="fa fa-facebook-f mr-2"></i> Sign up with Facebook</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-w3l">
        <p class="agile"> &copy; 2020 RealEstate Login Form . All Rights Reserved | Design by TeamCT258</p>
    </div>


    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>