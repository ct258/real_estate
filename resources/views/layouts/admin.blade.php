@include('layouts.admin.head')

<body>

    @include('layouts.admin.sidebar')
    @include('layouts.admin.navbar')
    @yield('content')
    @include('layouts.admin.footer')


    @include('layouts.admin.script')
</body>

</html>