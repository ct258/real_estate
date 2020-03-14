@include('layouts.admin_new.head')

<body>
     <section id="container"> 
        @include('layouts.admin_new.header')
        @include('layouts.admin_new.sidebar')
        @yield('content')
     </section> 
        @include('layouts.admin_new.script')
</body>

</html>