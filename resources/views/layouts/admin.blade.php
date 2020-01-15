@include('layouts.admin.head')

<body>

    @include('layouts.admin.sidebar')
    <div class="wrap">
        @include('layouts.admin.header')
        <div class="content container">
            @yield('content')
        </div>
        @include('layouts.admin.footer')

        <div class="loader-wrap hiding hide">
            <i class="fa fa-circle-o-notch fa-spin"></i>
        </div>
    </div>

    @include('layouts.admin.script')
</body>

</html>