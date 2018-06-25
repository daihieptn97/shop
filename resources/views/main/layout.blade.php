<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plugins/summernote/summernote.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plugins/summernote/summernote-bs3.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/styleadmin.css') }}" rel="stylesheet">
    
    <script src="{{ URL::asset('js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ URL::asset('js/plugins/chartJs/Chart.min.js') }}"></script>
   
</head>
<body>
    <div id="wrapper">
        @include('main.sidebar')
        <div id="page-wrapper" class="gray-bg">
            @include('main.header')
            @yield('content')
            @include('main.footer')
        </div>
    </div>
<!-- Mainly scripts -->
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ URL::asset('js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

    <!-- Flot -->
 {{--    <script src="{{ URL::asset('js/plugins/flot/jquery.flot.js') }}"></script>
    <script src="{{ URL::asset('js/plugins/flot/jquery.flot.tooltip.min.js') }}"></script>
    <script src="{{ URL::asset('js/plugins/flot/jquery.flot.spline.js') }}"></script>
    <script src="{{ URL::asset('js/plugins/flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ URL::asset('js/plugins/flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ URL::asset('js/plugins/flot/jquery.flot.symbol.js') }}"></script>
    <script src="{{ URL::asset('js/plugins/flot/jquery.flot.time.js') }}"></script> --}}

    <!-- Peity -->
    <script src="{{ URL::asset('js/plugins/peity/jquery.peity.min.js') }}"></script>
    <script src="{{ URL::asset('js/demo/peity-demo.js') }}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{ URL::asset('js/inspinia.js') }}"></script>
    <script src="{{ URL::asset('js/plugins/pace/pace.min.js') }}"></script>

    <!-- jQuery UI -->
    <script src="{{ URL::asset('js/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

    <!-- Jvectormap -->
    <script src="{{ URL::asset('js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ URL::asset('js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>

    <!-- EayPIE -->
    <script src="{{ URL::asset('js/plugins/easypiechart/jquery.easypiechart.js') }}"></script>

    <!-- Sparkline -->
    <script src="{{ URL::asset('js/plugins/sparkline/jquery.sparkline.min.js') }}"></script>

    <!-- Sparkline demo data  -->
    <script src="{{ URL::asset('js/demo/sparkline-demo.js') }}"></script>

    



    

</body>
</html>
