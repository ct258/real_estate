@include('layouts.admin.head')

<body>
    <!--main content start-->
    <div class="eror-w3">
        <div class="agile-info">
            <h3>SORRY</h3>
            <h2>404</h2>
            <p>An error Occurred in the Application And Your Page could not be Served.</p>
            <a href="{{route('dashboard')}}">go home</a>
        </div>
    </div>
    @include('layouts.admin.script')
</body>

</html>