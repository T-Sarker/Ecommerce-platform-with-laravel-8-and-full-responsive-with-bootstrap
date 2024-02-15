        @include('admin.inc.header')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
                
            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            @include('admin.inc.sidebar')
            <!-- partial -->
            <div class="main-panel">
                @if(Session::has('success'))
                    <div class="toast align-items-center bg-success" role="alert" aria-live="assertive" aria-atomic="true" style="z-index: 9000000;position: absolute;right: 0;bottom: 0;">
                      <div class="d-flex">
                        <div class="toast-body" style="color: #fff;">
                        {{Session::get('success')}}
                       </div>
                      </div>
                    </div>
                @endif
                <div class="content-wrapper">
                    @yield('contents')
                </div>
                <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            @include('admin.inc.footer')
                