@include('layouts.admin.head')

<body>

    @include('layouts.admin.sidebar')
    <div class="wrap">

        @yield('content')
    </div>
    @include('layouts.admin.footer')


    @include('layouts.admin.script')
</body>

</html>