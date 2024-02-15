<footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2017 <a href="https://www.bootstrapdash.com/" target="_blank">BootstrapDash</a>. All rights reserved.</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
     <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/perfect-scrollbar.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
     <script src="{{asset('admin')}}/assets/js/dashboard.js"></script>
     <script src="{{asset('admin')}}/assets/js/custom.js"></script>
     <script src="{{asset('admin')}}/assets/js/off-canvas.js"></script>
     <script src="{{asset('admin')}}/assets/js/misc.js"></script>
     {{-- <script src="https://cdn.tiny.cloud/1/ystk8b0mjqzit9nua953zlnsule3u0pirz4sqhvabkiupl23/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script> --}}
     {{-- <script>
      tinymce.init({
        selector: 'textarea.textarea'
      });
    </script> --}}
     <script>
        $(document).ready(function() {
            $('.toast').toast({delay: 4000});
            $(".toast").toast('show');
        });
    </script>
    @stack('body-scripts');
</body>

</html>