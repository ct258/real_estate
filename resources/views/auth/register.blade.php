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
      width: 50%;

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

    .infor {
      margin: 11px 0px;
      font-family: 'Source Sans Pro', sans-serif;
    }

    .infor p {
      font-size: 16px;
      padding: 0px 0;
    }

    .street.infor {
      margin-bottom: 48px;
    }

    /* button.btn.btn-lg.btn-primary.btn-block.text-uppercase {
                width     : 200px;
                margin    : auto;
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
      top: 42px;
      width: 50%;
    }

    p {
      margin-bottom: 0;
      margin-top: 1rem;
    }

    input[type=number]::-webkit-inner-spin-button {
      -webkit-appearance: none;
    }

    .field-icon {
      float: right;
      /* margin-left: -25px; */
      margin-top: -35px;
      margin-right: 10px;
      position: relative;
      z-index: 2;
      color: gray;
    }

    #customFile::before {
      content: 'Select some files';
    }

    label.form-check-label.female {
      margin-left: 45px;
    }

    input#inputAddress {
      margin-top: 23px;
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
            <form class="form-signin" action="{{route('register.verty')}}" method="post" name='form_register'
              onsubmit="return validateForm()">
              @csrf
              <div class="card-body">
                <h5 class="card-title text-center"> <i class="fa fa-user-circle"></i>Register</h5>
                <div class="form-label-group">
                  <input type="text" id="inputUserame" name="username" class="form-control" placeholder="Username"
                    autofocus required>
                  <label for="inputUserame">Username <font color="red">*</font></label>
                </div>
                <div class="form-label-group">
                  <input type="password" id="inputPassword" name='password' class="form-control" placeholder="Password"
                    required>
                  <span toggle="#inputPassword" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                  <label for="inputPassword">Password <font color="red">*</font> </label>
                </div>
                <div class="form-label-group">
                  <input type="password" id="inputConfirmPassword" class="form-control" placeholder="Password" required>
                  <span toggle="#inputConfirmPassword"
                    class="fa fa-fw fa-eye field-icon toggle-confirm-password"></span>
                  <label for="inputConfirmPassword">Confirm password <font color="red">*</font></label>
                </div>
                <div class="form-label-group">
                  <input type="text" id="inputFullname" name="fullname" class="form-control" placeholder="Fullname"
                    autofocus required>
                  <label for="inputFullname">Fullname <font color="red">*</font></label>
                </div>
                <div class="form-label-group">
                  <input type="email" id="inputEmail" name='email' class="form-control" placeholder="Email address">
                  <label for="inputEmail">Email address</label>
                </div>
                <div class="form-label-group">
                  <input type="number" id="inputPhone" name="phone" class="form-control" placeholder="Phone Number"
                    required>
                  <label for="inputPhone">Phone number <font color="red">*</font> </label>
                </div>
                <div class="form-label-group">
                  <input type="number" id="inputId" name="IDCard" class="form-control" placeholder="ID Card" autofocus>
                  <label for="inputId">IDCard</label>
                </div>


                {{-- <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i
                    class="fa fa-google mr-2"></i> Sign up with Google</button>
                <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i
                class="fa fa-facebook-f mr-2"></i> Sign up with Facebook</button> --}}
                <button class="btn btn-lg btn-success btn-block text-uppercase" type="submit">Sign Up</button>
                <button class="btn btn-lg btn-info btn-block text-uppercase"
                  onclick="window.location.href='{{url('login')}}'">Sign In</button>
                {{-- <a class="d-block text-center mt-2 small" href="{{url('/login')}}">Sign In</a> --}}
                <hr class="my-4">
              </div>
              <div class="card-body right">
                {{-- <h5 class="card-title text-center">Fill In Form</h5> --}}
                <div class="gender infor">
                  <p>Gender</p>
                  <div class="form-check">
                    <label class="form-check-label male">
                      <input type="radio" class="form-check-input" name="gender" value="0" checked>Male
                    </label>
                    <label class="form-check-label female">
                      <input type="radio" class="form-check-input" name="gender" value="1">Female
                    </label>
                  </div>
                  {{-- <div class="form-check">
                  </div> --}}
                  {{-- <div class="form-check">
                    <label class = "form-check-label">
                    <input type  = "radio" class = "form-check-input" name = "gender" value = "khac">Other
                    </label>
                  </div> --}}
                </div>

                {{-- <div class="avatar infor">
                  <p>Avatar</p>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile" style="visibility:hidden;">
                    <label class="custom-file-label" for="customFile">Choose avatar image</label>
                  </div>
                </div> --}}
                <div class="date infor">
                  <p>Birth</p>
                  <div class="form-group">
                    <input type="date" name="birth" max="3000-12-31" min="1000-01-01" class="form-control">
                  </div>
                </div>
                <hr>
                <div class="form-label-group infor">
                  <p>Province </p>
                  <select class="form-control" id="province">
                    <option value="">-- Chọn Tỉnh/Thành phố --</option>
                    @foreach ($province as $item)
                    <option value="{{$item->province_id}}">{{$item->province_name}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-label-group infor">
                  <p>District </p>
                  <select class="form-control" name="district" id="district">
                    <option value="">-- Chọn Quận/Huyện --</option>
                  </select>
                </div>

                <div class="form-label-group infor">
                  <p>Ward </p>
                  <select class="form-control" name="ward" id="ward">
                    <option value="">-- Chọn Phường/Xã --</option>
                  </select>
                </div>
                <div class="form-label-group">
                  <input type="number" id="inputAddress" name="address" class="form-control" placeholder="Address"
                    autofocus>
                  <label for="inputAddress">Address</label>
                </div>

              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="footer-w3l">
      <p class="agile"> &copy; 2020 RealEstate Login Form . All Rights Reserved | Design by TeamCT258</p>
    </div>
  </div>

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  {{-- <script src="{{asset('leramiz/js/jquery-3.4.1.min.js')}}"></script> --}}
  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script>
    $(".toggle-password").click(function() {

$(this).toggleClass("fa-eye fa-eye-slash");
var input = $($(this).attr("toggle"));
if (input.attr("type") == "password") {
  input.attr("type", "text");
} else {
  input.attr("type", "password");
}
});
    $(".toggle-confirm-password").click(function() {

$(this).toggleClass("fa-eye fa-eye-slash");
var input = $($(this).attr("toggle"));
if (input.attr("type") == "password") {
  input.attr("type", "text");
} else {
  input.attr("type", "password");
}
});
  </script>
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
          top    : '-600px',
          opacity: 0,
          
        });
        $('.container.container-bottom').animate({
          // top: '-750px',
          opacity: 999,
          
        });
        

      });
    });
  </script>
  <script>
    $(document).ready(function () {
          //lấy quận huyện theo tỉnh thành phố
          $("#province").change(function(){
              var province_id = $(this).val();
              $.get("./district/"+province_id, function(data){
                  $("#district").html(data);
              });
          });
         
          //lấy phường xã theo tỉnh,huyện
          $("#district").change(function(){
              var district_id = "";
              var district_id = $("#district").val();
              $.get("./ward/"+district_id, function(data){
                  $("#ward").html(data);
              });
          });
          
      
          //reset tất cả về ban đầu khi thay đổi tỉnh
          $("#province").change(function(){
              var province_id = $("#province").val();
              if(province_id=='province_id'){
                  var data1 = "<option value='0'>-- Chọn Quận/Huyện --</option>";
                  var data2 = "<option value='0'>-- Chọn Phường/Xã --</option>";
                  $("#district").html(data1);
                  $("#ward").html(data2);
              }
          });
          //reset tất cả về ban đầu khi thay đổi quận
          $("#district").change(function(){
            var data2 = "<option value='0'>-- Chọn Phường/Xã --</option>";
            $("#ward").html(data2);
              
                        });
      });
  </script>
  <script>
    var sta;
    function validateForm() {
return sta;
    }
  $(document).ready(function () {
    //check username
      $("#inputUserame").change(function(){
              var username = $(this).val();
              $.get("./find_username/"+username, function(data){
                if(data==true){
                  $("#inputUserame").css("border-color"," green");
                  sta=true;
                }else{
                  $("#inputUserame").css("border-color"," red");
                  sta=false;
                }
                });
          });
          //check confirm password
          $("#inputPassword,#inputConfirmPassword").change(function(){
              var inputPassword = $("#inputPassword").val();
              var inputConfirmPassword = $("#inputConfirmPassword").val();
              if(inputConfirmPassword==""){
                $("#inputConfirmPassword").css("border-color"," red");
                sta=false;
              }
              if(inputPassword != inputConfirmPassword){
                $("#inputConfirmPassword").css("border-color"," red");
                sta=false;
              }else{
                $("#inputConfirmPassword").css("border-color"," green");
                sta=true;
              }
              
          });
          //check email
          $("#inputEmail").change(function(){
              var inputEmail = $("#inputEmail").val();
              var atposition=inputEmail.indexOf("@");  
              var dotposition=inputEmail.lastIndexOf(".");  
                if (atposition<1 || dotposition<atposition+2 || dotposition+2>=inputEmail.length){  
                  $("#inputEmail").css("border-color"," red");
                  sta=false;
                }  
                else{
                  $("#inputEmail").css("border-color"," green");
                  sta=true;
                }
              
              
          });
    });
    
  </script>
</body>

</html>