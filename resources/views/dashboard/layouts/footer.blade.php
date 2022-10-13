<!-- Main Footer -->

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{asset('dashboard/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('dashboard/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dashboard/dist/js/adminlte.js')}}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->

<!-- Toastr -->
<script src="{{asset('dashboard/plugins/toastr/toastr.min.js')}}"></script>

  @stack('script')
  @if (Session::has('message'))
  <script>
  toastr.{{session()->get('message')['type']}}("{{session()->get('message')['message']}}")
  </script>
  @endif
</body>
</html>
