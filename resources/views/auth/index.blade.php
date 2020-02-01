<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<div class="div">
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Đăng nhập</title>
        <!-- Meta tag Keywords -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords"
            content="Glassy Login Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
        <script type="application/x-javascript">
            addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } 
        </script>
        <!-- Meta tag Keywords -->
        <!-- css files -->
        <link rel="stylesheet" href="{{asset('glassy_login_form/css/font-awesome.css')}}">
        <!-- Font-Awesome-Icons-CSS -->
        <link rel="stylesheet" href="{{asset('glassy_login_form/css/style.css')}}" type="text/css" media="all" />
        <!-- Style-CSS -->
        <!-- css files -->
        <!-- web-fonts -->
        <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700" rel="stylesheet">
        <link href="//fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700" rel="stylesheet">
        <!-- web-fonts -->
    </head>

    <body>
        <!--header-->
        <div class="header-w3l">
            <h1>Real Estate Login Form</h1>
        </div>
        <!--//header-->
        <!--main-->
        <div class="main-w3layouts-agileinfo">
            <!--form-stars-here-->
            <div class="wthree-form">
                <h2>Fill out the form below to login</h2>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-sub-w3">
                        <input type="text" name="Username" placeholder="Username " required="" />
                        <div class="icon-w3">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="form-sub-w3">
                        <input id="password" type="password" placeholder="Password "
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <div class="icon-w3">
                            <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                        </div>
                    </div>
                    <label class="anim">
                        <input class="checkbox" type="checkbox" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>

                        {{-- <input type="checkbox" class="checkbox"> --}}
                        <span>Remember Me</span>


                        @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Password?') }}
                        </a>
                        @endif
                    </label>
                    <div class="clear"></div>
                    <div class="submit-agileits">
                        <input type="submit" value="{{ __('Login') }}">
                    </div>
                </form>

            </div>
            <!--//form-ends-here-->

        </div>
        <!--//main-->
        <!--footer-->
        <div class="footer">
            <p>&copy; 2017 Glassy Login Form. All rights reserved | Design by <a
                    href="http://w3layouts.com">W3layouts</a>
            </p>
        </div>
        <!--//footer-->
    </body>

    </html>
</div>