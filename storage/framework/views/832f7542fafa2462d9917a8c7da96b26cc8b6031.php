<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <link href="<?php echo e(URL::asset('css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(URL::asset('font-awesome/css/font-awesome.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(URL::asset('css/animate.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/plugins/summernote/summernote.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/plugins/summernote/summernote-bs3.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/plugins/dataTables/datatables.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(URL::asset('css/style.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(URL::asset('css/styleadmin.css')); ?>" rel="stylesheet">
    
    <script src="<?php echo e(URL::asset('js/jquery-3.1.1.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('js/plugins/chartJs/Chart.min.js')); ?>"></script>
   
</head>
<body>
	<div id="wrapper">
        <?php echo $__env->make('main.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div id="page-wrapper" class="gray-bg">
            <?php echo $__env->make('main.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->yieldContent('content'); ?>
            <?php echo $__env->make('main.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
	</div>
<!-- Mainly scripts -->
    <script src="<?php echo e(URL::asset('js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('js/plugins/metisMenu/jquery.metisMenu.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('js/plugins/slimscroll/jquery.slimscroll.min.js')); ?>"></script>

    <!-- Flot -->
 

    <!-- Peity -->
    <script src="<?php echo e(URL::asset('js/plugins/peity/jquery.peity.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('js/demo/peity-demo.js')); ?>"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo e(URL::asset('js/inspinia.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('js/plugins/pace/pace.min.js')); ?>"></script>

    <!-- jQuery UI -->
    <script src="<?php echo e(URL::asset('js/plugins/jquery-ui/jquery-ui.min.js')); ?>"></script>

    <!-- Jvectormap -->
    <script src="<?php echo e(URL::asset('js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')); ?>"></script>

    <!-- EayPIE -->
    <script src="<?php echo e(URL::asset('js/plugins/easypiechart/jquery.easypiechart.js')); ?>"></script>

    <!-- Sparkline -->
    <script src="<?php echo e(URL::asset('js/plugins/sparkline/jquery.sparkline.min.js')); ?>"></script>

    <!-- Sparkline demo data  -->
    <script src="<?php echo e(URL::asset('js/demo/sparkline-demo.js')); ?>"></script>

    



    

</body>
</html>
