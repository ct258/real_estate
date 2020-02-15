@yield('script')
<!-- common libraries. required for every page-->
<script src="{{asset('lib/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('lib/jquery-pjax/jquery.pjax.js')}}"></script>
<script src="{{asset('lib/bootstrap-sass/assets/javascripts/bootstrap.min.js')}}"></script>
<script src="{{asset('lib/widgster/widgster.js')}}"></script>
<script src="{{asset('lib/underscore/underscore.js')}}"></script>

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> --}}
<!-- common application js -->
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/settings.js')}}"></script>

{{-- CKEditor --}}
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace('editor1'); 
</script>

<!-- common templates -->
<script type="text/template" id="settings-template">
    <div class="setting clearfix">
        <div>Sidebar on the</div>
        <div id="sidebar-toggle" class="pull-left btn-group" data-toggle="buttons-radio">
            <% onRight = sidebar == 'right'%>
            <button type="button" data-value="left" class="btn btn-sm btn-default <%= onRight? '' : 'active' %>">Left</button>
            <button type="button" data-value="right" class="btn btn-sm btn-default <%= onRight? 'active' : '' %>">Right</button>
        </div>
    </div>
    <div class="setting clearfix">
        <div>Sidebar</div>
        <div id="display-sidebar-toggle" class="pull-left btn-group" data-toggle="buttons-radio">
            <% display = displaySidebar%>
            <button type="button" data-value="true" class="btn btn-sm btn-default <%= display? 'active' : '' %>">Show</button>
            <button type="button" data-value="false" class="btn btn-sm btn-default <%= display? '' : 'active' %>">Hide</button>
        </div>
    </div>
</script>

<script type="text/template" id="sidebar-settings-template">
    <% auto = sidebarState == 'auto'%>
    <% if (auto) {%>
    <button type="button"
            data-value="icons"
            class="btn-icons btn btn-transparent btn-sm">Icons</button>
    <button type="button"
            data-value="auto"
            class="btn-auto btn btn-transparent btn-sm">Auto</button>
    <%} else {%>
    <button type="button"
            data-value="auto"
            class="btn btn-transparent btn-sm">Auto</button>
    <% } %>
</script>

<!-- page specific scripts -->
<!-- page libs -->
<script src="{{asset('lib/slimScroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('lib/jquery.sparkline/index.js')}}"></script>

<script src="{{asset('lib/backbone/backbone.js')}}"></script>
<script src="{{asset('lib/backbone.localStorage/build/backbone.localStorage.min.js')}}"></script>

<script src="{{asset('lib/d3/d3.min.js')}}"></script>
<script src="{{asset('lib/nvd3/build/nv.d3.min.js')}}"></script>

<!-- page application js -->
<script src="{{asset('js/index.js')}}"></script>
<script src="{{asset('js/chat.js')}}"></script>

<!-- page template -->
<script type="text/template" id="message-template">
    <div class="sender pull-left">
        <div class="icon">
            <img src="{{asset('img/2.png')}}" class="img-circle" alt="">
        </div>
        <div class="time">
            just now
        </div>
    </div>          
    <div class="chat-message-body">
        <span class="arrow"></span>
        <div class="sender"><a href="#">Tikhon Laninga</a></div>
        <div class="text">
            <%- text %>
        </div>
    </div>
</script>
@yield('script')