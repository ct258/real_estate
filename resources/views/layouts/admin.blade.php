@include('layouts.admin.head')

<body>
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
</body>

</html>