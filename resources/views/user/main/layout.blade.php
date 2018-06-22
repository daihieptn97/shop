<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/animate.css') }}" rel="stylesheet">
    
        
    <link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ URL::asset('dest/vendors/colorbox/example3/colorbox.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('dest/rs-plugin/css/settings.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('dest/rs-plugin/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('dest/css/style.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('dest/css/huong-style.css') }}">

    <script src="{{ URL::asset('js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    
</head>
<body>
 
    @include('user.main.header')
    @yield('user_content')
    @include('user.main.footer')
       

<!-- Mainly scripts -->

    <script src="{{ URL::asset('js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ URL::asset('js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>


  

    <!-- jQuery UI -->

    {{-- <script src="{{ URL::asset('js/plugins/jquery-ui/jquery-ui.min.js') }}"></script> --}}

  

    <!-- include js files -->
{{--   
    
    <script src="{{ URL::asset('dest/vendors/bxslider/jquery.bxslider.min.js') }}"></script>
    <script src="{{ URL::asset('dest/vendors/colorbox/jquery.colorbox-min.js') }}"></script>
    <script src="{{ URL::asset('dest/vendors/animo/Animo.js') }}"></script>
    <script src="{{ URL::asset('dest/vendors/dug/dug.js') }}"></script>
    <script src="{{ URL::asset('dest/js/scripts.min.js') }}"></script>
    <script src="{{ URL::asset('dest/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ URL::asset('dest/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>
     --}}
    {{-- <script src="{{ URL::asset('dest/js/waypoints.min.js') }}"></script> --}}
    <script src="{{ URL::asset('dest/js/wow.min.js') }}"></script>


    <!--customjs-->
    {{-- <script src="{{ URL::asset('dest/js/custom2.js') }}"></script> --}}

    <script>
    $(document).ready(function($) {    
        $(window).scroll(function(){
            if($(this).scrollTop()>150){
            $(".header-bottom").addClass('fixNav')
            }else{
                $(".header-bottom").removeClass('fixNav')
            }}
        )
    })
    </script>
</body>
</html>
