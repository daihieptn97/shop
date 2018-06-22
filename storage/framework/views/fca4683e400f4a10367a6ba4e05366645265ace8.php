<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <link href="<?php echo e(URL::asset('css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(URL::asset('font-awesome/css/font-awesome.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(URL::asset('css/animate.css')); ?>" rel="stylesheet">
    
        
    <link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo e(URL::asset('dest/vendors/colorbox/example3/colorbox.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('dest/rs-plugin/css/settings.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('dest/rs-plugin/css/responsive.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('dest/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('dest/css/huong-style.css')); ?>">

    <script src="<?php echo e(URL::asset('js/jquery-3.1.1.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('js/bootstrap.min.js')); ?>"></script>
    
</head>
<body>
 
    <?php echo $__env->make('user.main.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->yieldContent('user_content'); ?>
    <?php echo $__env->make('user.main.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
       

<!-- Mainly scripts -->

    <script src="<?php echo e(URL::asset('js/plugins/metisMenu/jquery.metisMenu.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('js/plugins/slimscroll/jquery.slimscroll.min.js')); ?>"></script>


  

    <!-- jQuery UI -->

    

  

    <!-- include js files -->

    
    <script src="<?php echo e(URL::asset('dest/js/wow.min.js')); ?>"></script>


    <!--customjs-->
    

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
