@include('layouts.user.head')


<body>

    <script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0&appId=2548241168749728&autoLogAppEvents=1">
    </script>
    {{-- <script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0&appId=2548241168749728&autoLogAppEvents=1">
    </script> --}}
    <!-- Page Preloder -->
    {{-- <div id="preloder">
        <div class="loader"></div>
    </div> --}}
    <!-- End Page Preloder -->
    {{-- {{dd(\Auth::guard('account')->user()->load('customer')->customer->customer_id)}} --}}
    {{-- {{dd(\Auth::guard('account')->check())}} --}}
    @if (\Auth::guard('account')->check()&&\Auth::guard('account')->user()->hasRole('customer'))
    @include('layouts.user.header_user')
    @else
    @include('layouts.user.header')
    @endif

    {{-- @include('layouts.user.top') --}}
    {{-- @include('layouts.user.breadcrumb') --}}
    @yield('page')
    {{-- @include('layouts.user.page') --}}
    @include('layouts.user.client')
    @include('layouts.user.footer')
    @include('layouts.user.script')
    @stack('script')
</body>

</html>