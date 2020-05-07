<!-- Page top section -->
{{-- <section class="page-top-section set-bg" data-setbg="{{asset('leramiz/img/page-top-bg.jpg')}}">

</section> --}}
<!--  Page top end -->
<style>
    .logo img{
          max-height: 40px;
          max-width: 200px;
      }
   </style> 
<div class="container-fuild bg_top1" >
    <div class="container header">
        <div class="row row_1">
            <div class="col-lg-6">
                <div class="nav" >
                    {{-- {{dd($logo)}} --}}
                    <div class="logo" >
                        <a href="{{route('index')}}" class="logo"><img src="{{asset('img/banner/logo/'.$logo)}}"
                                alt=""></a>
                    </div>

                    @foreach ($data['form'] as $key1=>$value1)
                    <div class="dropdown">
                        <p class="dropbtn">{{$value1->form_translation_name}}</p>
                        <div class="dropdown-content">
                            @foreach ($data['type'] as $key2=>$value2)

                            @if($value2->form_id==$value1->form_id)
                            <a href="{{route('list',$value2->type_id)}}">{{$value2->type_translation_name}}</a>
                            <?php continue; ?>
                            @endif
                            
                            @endforeach

                        </div>
                    </div>
                    @endforeach

                    <a href="{{route('list_blog')}}" class="news">@lang('News')</a>
                </div>
            </div>
            <div class="col-lg-6 text-lg-right header-top-right">
                <div class="user-panel">
                    <div class="curency">
                        <div class="dropdown">
                            <p class="dropdown-toggle" data-toggle="dropdown">
                                @switch(\Session::get('currency'))
                                @case('VND')
                                đ VND
                                @break
                                @case('USD')
                                $ USD
                                @break
                                @case('EUR')
                                € EUR
                                @break
                                @case('GBP')
                                £ GBP
                                @break
                                @case('JPY')
                                ¥ JPY
                                @break
                                @default
                                đ VND
                                @endswitch
                            </p>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('currency',['VND']) }}" title="VND">đ VND</a></li>
                                <li><a href="{{route('currency',['USD']) }}" title="USD">$ USD</a></li>
                                <li><a href="{{route('currency',['EUR']) }}" title="EUR">€ EUR</a></li>
                                <li><a href="{{route('currency',['GBP']) }}" title="GBP">£ GBP</a></li>
                                <li><a href="{{route('currency',['JPY']) }}" title="JPY">¥ JPY</a></li>
                            </ul>
                        </div>
                    </div>
                    <a href="{{route('lang',['vi']) }}">Vi</a>
                    <a href="{{route('lang',['en']) }}">En</a>
                    <a href=""><i class="fas fa-bell"></i></i><span class="badge badge-danger badge-pill">14</span></a>
                    <a href="{{route('account') }}"><i class="fas fa-user-circle"></i></i>@lang('Account')</a>
                    <a href="{{url('cart/') }}"><i class="fa fa-shopping-cart"></i>@lang('Cart')</a>


                </div>

            </div>
        </div>

    </div>
</div>