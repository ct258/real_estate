@extends('layouts.admin_new.admin')
@section('content')
<!-- main content start -->
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
      <h2>BÌNH LUẬN</h2>  
      <br>    
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">Tất cả</li>
          <li class="breadcrumb-item"><a href="#">Của tôi</a></li>
          <li class="breadcrumb-item"><a href="#">Đang chờ</a></li>
          <li class="breadcrumb-item"><a href="#">Được phê duyệt </a></li>
          <li class="breadcrumb-item"><a href="#">Spam</a></li>
          <li class="breadcrumb-item"><a href="#">Thùng rác</a></li>
        </ol>
      </nav>



     








       {{-- page end --}}
</section>
 <!-- footer -->
        <div class="footer">
            <div class="wthree-copyright">
                <p>© Quản lý sàn giao dịch bất động sản | Made by student group learning E-Commerce Development <a href="{{route('real_estate.index')}}">Real-Estate</a></p>
            </div>
        </div>
  <!-- / footer -->
</section> 
<!--main content end-->
@endsection