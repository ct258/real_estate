<!-- Hero section -->
<style>
  img.d-block.w-100 {
    height: 650px;
    background-size: cover;

  }

  section.feature-section.spad {
    margin-top: 100px;
    margin-bottom: 100px;
  }
</style>
<div class="slider">

  <div class="load">

  </div>
  <div class="content">
    <div id="carouselExampleIndicators" style="padding-top:80px" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
      </ol>
      <div class="carousel-inner">
        @foreach ($banner as $key=>$value)

        <div class="carousel-item @if($key==0) active @endif">
          <img src="{{asset('img/banner/'.$value->banner_title)}}" class="d-block w-100" alt="...">
        </div>
        @endforeach
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        {{-- <span class="carousel-control-prev-icon" aria-hidden="true"></span> --}}
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        {{-- <span class="carousel-control-next-icon" aria-hidden="true"></span> --}}
        <span class="sr-only">Next</span>
      </a>
    </div>

    <div class="principal " data-wow-delay="0.5s">

      <h1>@lang('Real Estate Can Tho')</h1>
      <p>@lang('Reputation') - @lang('Trust') - @lang('Quickly') - @lang('Friendly')</p>
    </div>
  </div>
</div>
<!-- Hero section end -->