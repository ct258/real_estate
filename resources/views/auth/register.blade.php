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

            .card-signin .card-img-left {
            width: 45%;
            
            /* background: scroll center url('https://source.unsplash.com/WEQbe2jBg40/414x512');
            background-size: cover; */
            }

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
                width: 750px;
                margin: auto;
                background-color: white;
                /* margin-right: 378px; */
                position: relative;
                right: 120px;
                
            }

            body {
                background: url(http://localhost:8080/real_estate/public/leramiz/img/bg.jpg);
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
            .footer-w3l > p {
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
            .infor {
                margin: 11px 0px;
                font-family: 'Source Sans Pro', sans-serif;
            }
            .infor p {
                font-size: 16px;
                padding: 5px 0;
            }
            .street.infor {
                margin-bottom: 48px;
            }
            /* button.btn.btn-lg.btn-primary.btn-block.text-uppercase {
                width: 200px;
                margin: auto;
                background: #30caa8;
            } */
            h5.card-title.text-center i {
                /* padding: 0 5px; */
                margin-left: -30px;
                padding: 0 9px;
                font-size: 27px;
                color: #30caa8;
            }
            h5.card-title.text-center {
                font-weight: bold;
                font-size: 25px;
            }
            .card-body.right {
                /* float: right; */
                /* border: 1px solid black; */
                position: absolute;
                right: 5px;
                top: 0;
            }
            /* animation */
           
    </style>
</head>
<body>
    <div class="container">
      <div class="row">
        <div class="col-lg-10 col-xl-6 mx-auto">
            <div class="card card-signin flex-row my-5 register-top">
              <div class="card-img-left d-none d-md-flex">
                  <!-- Background image for card set in CSS! -->
                  <form class="form-signin">
                    <div class="card-body">
                        <h5 class="card-title text-center"> <i class="fa fa-user-circle"></i>Register</h5>
                          <div class="form-label-group">
                            <input type="text" id="inputUserame" name="username" class="form-control" placeholder="Username"  autofocus>
                            <label for="inputUserame">Username</label>
                          </div>
                          <div class="form-label-group">
                            <input type="email" id="inputEmail" class="form-control" placeholder="Email address" >
                            <label for="inputEmail">Email address</label>
                          </div>
                          <div class="form-label-group">
                            <input type="password" id="inputPassword" class="form-control" placeholder="Password" >
                            <label for="inputPassword">Password</label>
                          </div>
                          <div class="form-label-group">
                            <input type="password" id="inputConfirmPassword" class="form-control" placeholder="Password" >
                            <label for="inputConfirmPassword">Confirm password</label>
                          </div>
                          <div class="form-label-group">
                            <input type="text" id="inputFullname" name="fullname" class="form-control" placeholder="Fullname"  autofocus>
                            <label for="inputFullname">Fullname</label>
                          </div>
                          <div class="form-label-group">
                            <input type="text" id="inputId" name="fullname" class="form-control" placeholder="ID Card"  autofocus>
                            <label for="inputFullname">IDCard</label>
                          </div>
                          <div class="form-label-group">
                            <input type="text" id="inputPhone" class="form-control" placeholder="Phone Number"  name="phone">
                            <label for="inputEmail">Phone number</label>
                          </div>
                          
                          <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i class="fa fa-google mr-2"></i> Sign up with Google</button>
                          <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i class="fa fa-facebook-f mr-2"></i> Sign up with Facebook</button>
                          <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Submit</button>
                          <a class="d-block text-center mt-2 small" href="#">Sign In</a>
                          <hr class="my-4">
                    </div>
                    <div class="card-body right">
                      {{-- <h5 class="card-title text-center">Fill In Form</h5> --}}
                        <div class="gender infor">
                            <p>Gender</p>
                          <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="gender" value="nam" checked>Male
                              </label>
                            </div>
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="gender" value="nu">Female
                              </label>
                            </div>
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="gender" value="khac">Other
                              </label>
                            </div>
                        </div>

                        <div class="avatar infor">
                            <p>Avatar</p>
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="customFile">
                              <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                        <div class="date infor">
                            <p>Birthday</p>
                          <div class="form-group">
                              <input type="date" name="bday" max="3000-12-31" 
                                    min="1000-01-01" class="form-control">
                            </div>
                        </div>
                        <hr>
                        <div class="form-label-group infor">
                            <p>Province </p>
                          <select class="form-control" id="sel1">
                              <option>Cần Thơ</option>
                              
                            </select>
                          
                        </div>
                        <div class="form-label-group infor">
                            <p>District </p>
                          <select class="form-control" id="sel1">
                              <option>Ninh Kiều</option>
                              
                            </select>
                          
                        </div>
                        <div class="form-label-group infor">
                            <p>Ward </p>
                          <select class="form-control" id="sel1">
                              <option>
                                  Hưng Lợi
                              </option>
                              
                            </select>
                          
                        </div>
                        <div class="street infor">
                            <p>Street</p>
                          <input type="text" class="form-control" id="street" placeholder="Hẽm 51 ">
                        </div>
                    </div>   
                  <form>
              </div>
                   
        </div>
      </div>
    </div>
 
    <div class="footer-w3l">
      <p class="agile"> &copy; 2020 RealEstate Login Form . All Rights Reserved | Design by  TeamCT258</p>
  </div>

    
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

    //animation for register
    $(document).ready(function () {
      $(".next").on('click', function () {
        console.log("ok");
        $('.register-top').animate({
          top: '-600px',
          opacity: 0,
          
        });
        $('.container.container-bottom').animate({
          // top: '-750px',
          opacity: 999,
          
        });
        

      });
    });






    </script>
</body>
</html>