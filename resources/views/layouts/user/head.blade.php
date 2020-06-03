<html lang="en">

<head>
  <title>Batdongsan - Kênh thông tin bất động sản số n Việt Nam</title>
  <meta charset="UTF-8">
  <meta name="description" content="LERAMIZ Landing Page Template">
  <meta name="keywords" content="LERAMIZ, unica, creative, html">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Favicon -->
  <link href="{{asset('leramiz/img/favicon.jpg')}}" rel="shortcut icon" />

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


  <!-- Stylesheets -->
  <link rel="stylesheet" href="{{asset('leramiz/css/bootstrap.min.css')}}" />
  <link rel="stylesheet" href="{{asset('leramiz/css/font-awesome.min.css')}}" />
  <link rel="stylesheet" href="{{asset('leramiz/css/animate.css')}}" />
  <link rel="stylesheet" href="{{asset('leramiz/css/animate1.css')}}" />

  <link rel="stylesheet" href="{{asset('leramiz/css/owl.carousel.css')}}" />
  <link rel="stylesheet" href="{{asset('leramiz/css/style.css')}}" />
  <link rel="stylesheet" href="{{asset('leramiz/css/style1.css')}}" />
  <link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"
    integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  {{-- Leaflet --}}
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
    integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
    crossorigin="" />
  @stack('css')
  <style>
    a.carousel-control-next {
      z-index: 0;
    }

    .col-lg-2.search1 button.btn.btn-orange {

      z-index: 99;
    }

    svg {
      color: 30caa8;
    }

    .site-breadcrumb {
      padding: 15px 35px;
    }

    .scrollupp {
      width: 40px;
      background-color: #30caa8;
      height: 45px;
      top: 94%;
      right: 50px;
      display: block;
      position: fixed;
      animation-name: example;
      animation-duration: 1s;
      animation-iteration-count: 1000;
    }

    /* Code animation */
    @keyframes example {
      0% {
        top: 92%;
      }

      50% {
        top: 94%;
      }

      100% {
        top: 92%;
      }

    }

    svg.svg-inline--fa.fa-angle-up.fa-w-10 {
      font-size: 32px;
      padding-left: 4px;
      margin: auto;
      width: 90%;
      color: white;
    }

    .container-fuild.bg_top1 {
      /* position: relative; */
      box-shadow: 0px 0px 15px 0px #D6D6D6;
    }

    .curency {
      position: static;
      display: inherit;
    }

    /* dropdown hover top */
    .dropdown:hover>.dropdown-menu {
      display: block;
    }

    .dropdown>.dropdown-toggle:active {
      /*Without this, clicking will make it sticky*/
      pointer-events: none;
    }

    p.dropdown-toggle {
      display: inline-block;
      margin-left: 10px;
    }

    .dropbtn {
      /* background-color: #4CAF50; */
      color: black;
      /* padding: 16px; */
      font-size: 16px;
      text-shadow: 0 0 0.5px;
      /* border: none; */
    }

    .dropdown {
      position: relative;
      display: inline-block;
      padding-right: 15px
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f1f1f1;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      z-index: 1;
      width: 250px;
    }

    .dropdown-content a {
      color: black;
      padding: 5px 16px;
      text-decoration: none;
      display: block;
      font-size: 14px;
      text-decoration: none;
    }

    .dropdown-content a:hover {
      background-color: #ddd;
      text-decoration: none;
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }

    .dropdown:hover .dropbtn {
      color: #30caa8;
    }

    .news {
      color: black;
      text-decoration: none !important;
      text-shadow: 0 0 0.5px;
    }

    .news:hover {
      color: #30caa8 !important;
    }

    .container.header {
      padding-top: 20px;
    }

    p.dropdown-toggle {
      color: black;
    }

    .logo {
      padding-right: 30px;

    }

    section.feature-section.spad {
      margin-top: 50px;
      margin-bottom: 100px;
    }

    .frame {
      box-shadow: 0px 0px 15px 0px #D6D6D6;
      padding-top: 20px;
    }

    .name_re:hover {
      text-decoration: none;
    }
  </style>
  @yield('css')
</head>