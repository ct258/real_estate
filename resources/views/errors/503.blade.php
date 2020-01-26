@include('layouts.admin.head')

<body>

    {{-- @include('layouts.admin.sidebar') --}}
    {{-- <div class="logo">
        <h4><a href="#">Light <strong>Blue</strong></a></h4>
    </div> --}}
    <div class="wrap">
        {{-- @include('layouts.admin.header') --}}
        <br>
        <br>
        <br>
        <div class="content container">
            {{-- @yield('content') --}}
            <div style="margin-left:200px">
                <img src="{{asset('img/error.png')}}" alt="Trang web hiện đang bảo trì">

                <br>
                <br>
                <br>
                <div style="margin-left:0px;font-size: 20px;">
                    <p>Website real_estate.com đang trong quá trình nâng cấp và bảo trì.</p>
                    <p>
                        Chúng tôi rất tiếc vì sự bất tiện này, bạn vui lòng quay lại sau ít phút.</p>
                </div>
            </div>
        </div>
        {{-- @include('layouts.admin.footer') --}}

        <div class="loader-wrap hiding hide">
            <i class="fa fa-circle-o-notch fa-spin"></i>
        </div>
    </div>

    @include('layouts.admin.script')
</body>

</html>