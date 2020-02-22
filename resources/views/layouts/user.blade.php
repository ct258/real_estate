@include('layouts.user.head')
@yield('css')

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <!-- End Page Preloder -->
    @include('layouts.user.header')
    @include('layouts.user.top')
    @include('layouts.user.breadcrumb')
    @yield('page')
    {{-- @include('layouts.user.page') --}}
    @include('layouts.user.client')
    @include('layouts.user.footer')
    @include('layouts.user.script')
    @yield('script')
</body>

</html>