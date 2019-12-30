   <!-- Essential javascripts for application to work-->
    <script src="{{ URL::asset('asset/backend/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ URL::asset('asset/backend/js/popper.min.js') }}"></script>
    <script src="{{ URL::asset('asset/backend/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('asset/backend/js/main.js') }}"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{ URL::asset('asset/backend/js/plugins/pace.min.js') }}"></script>
    <!-- Page specific javascripts-->
    @stack('js')
    
  </body>
</html>