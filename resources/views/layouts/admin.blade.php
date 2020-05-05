@include('layouts.admin.head')

<body class="pre">
    {{-- hieuungloadtrang --}}
    <div class="loading">
        <img src="{{asset('admin\images\loader.gif')}}">
    </div>

    <section id="container">
        @include('layouts.admin.header')
        @include('layouts.admin.sidebar')
        <!-- main content start -->
        <section id="main-content">
            <section class="wrapper">

                @yield('content')

            </section>
            <!--wrapper end-->
            @include('layouts.admin.footer')
        </section>
        <!--main content end-->


    </section>
    @include('layouts.admin.script')
    @stack('script')
</body>

</html>