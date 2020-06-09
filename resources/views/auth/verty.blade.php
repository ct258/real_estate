<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register | RealEstate</title>
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
            background: url("../leramiz/img/bg.jpg");
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

        button.btn.btn-lg.btn-warning.btn-block.text-uppercase {
            border-radius: 5rem;
            font-size: 80%;
            border-radius: 5rem;
            letter-spacing: .1rem;
            font-weight: bold;
            padding: 1rem;
            transition: all 0.2s;
        }

        button.btn.btn-lg.btn-info.btn-block.text-uppercase {
            border-radius: 5rem;
            font-size: 80%;
            border-radius: 5rem;
            letter-spacing: .1rem;
            font-weight: bold;
            padding: 1rem;
            transition: all 0.2s;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-9 mx-auto">
                <div class="card card-signin flex-row my-5">
                    <div class="card-body">
                        @if($message = Session::get('success'))
                        <div class="alert alert-success" role="alert">
                            <p>{{$message}}</p>
                            <p class="mb-0"></p>
                        </div>
                        @endif
                        @if($error = Session::get('error'))
                        <div class="alert alert-danger" role="alert">
                            <p>{{$error}}</p>
                            <p class="mb-0"></p>
                        </div>
                        @endif

                        <h5 class="card-title text-center"><i class='fa fa-user-circle'></i>Verify</h5>
                        <form class="form-signin" action="{{route('register.submit')}}" method="POST">
                            @csrf
                            <div class="form-label-group">

                                {{-- mẫu --}}
                                {{-- {{$request->text}} --}}
                                <input type="hidden" name="code" value="{{$request->text}}">
                                {{-- mẫu --}}
                                <input type="hidden" name="username" value="{{$request->username}}">
                                <input type="hidden" name="password" value="{{$request->password}}">
                                <input type="hidden" name="fullname" value="{{$request->fullname}}">
                                <input type="hidden" name="email" value="{{$request->email}}">
                                <input type="hidden" name="phone" value="{{$request->phone}}">
                                <input type="hidden" name="IDCard" value="{{$request->IDCard}}">
                                <input type="hidden" name="gender" value="{{$request->gender}}">
                                <input type="hidden" name="birth" value="{{$request->birth}}">
                                <input type="hidden" name="ward" value="{{$request->ward}}">
                                <input type="hidden" name="address" value="{{$request->address}}">
                            </div>
                            <div class="form-label-group">
                                <input type="text" id="verify" class="form-control" placeholder="Username" required
                                    autofocus Name="verify">
                                <label for="verify">Code</label>
                            </div>
                            <label for="captcha">Captcha</label>
                            {!! NoCaptcha::renderJs() !!}
                            {!! NoCaptcha::display() !!}


                            <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>


                            <hr>


                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign
                                Up</button><br>

                        </form>
                        <form action="{{route('register.verty')}}" method="post">
                            @csrf
                            <button class="btn btn-lg btn-warning btn-block text-uppercase" type="submit">Send
                                Again</button><br>
                            <button type="button" class="btn btn-lg btn-info btn-block text-uppercase"
                                onclick="window.location.href='{{url('login')}}'">Sign In</button>

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