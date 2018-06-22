<?php $__env->startSection('title'); ?>
    Danh sách khách hàng
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4">
                    <div class="contact-box">
                        <a href="profile.html">
                        <div class="col-sm-4">
                            <div class="text-center">
                                <img alt="image" class="img-circle m-t-xs img-responsive" src="<?php echo e(asset('img/a1.jpg')); ?>">
                                
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <h3><strong><?php echo e($element->fullname); ?></strong></h3>
                            <p><i class="fa fa-map-marker"></i> <?php echo e($element->address); ?></p>
                            <address>
                                Email : <?php echo e($element->email); ?><br>
                                Phone : <?php echo e($element->phonenumber); ?>

                            </address>

                        </div>
                        <div class="clearfix"></div>
                            </a>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('main.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>