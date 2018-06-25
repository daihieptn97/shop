<?php $__env->startSection('title'); ?>
    Admin | Trang chủ
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="wrapper wrapper-content dashboard">
        <div class="row">
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-success pull-right">Tháng này</span>
                                <h5>Thu nhập</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?php echo e(number_format($totalIncomeMonth) . ' VND'); ?></h1>
                                <small>Tổng thu nhập</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-info pull-right">Tháng này</span>
                                <h5>Đơn hàng</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">
                                    <?php echo e(number_format($totalOrderMonth) .' Đơn'); ?>

                                </h1>
                                <small>Đơn hàng mới</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-primary pull-right">Tháng này</span>
                                <h5>Sản phẩm</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?php echo e($totalProductMonth . ' Chiếc'); ?></h1>
                                <small>Bán được</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Chờ duyệt</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">
                                <?php echo e(number_format($totalPendingBill) . ' Đơn'); ?></h1>
                               
                                <small>Yêu cầu duyệt</small>
                            </div>
                        </div>
            </div>
        </div>
        <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Thống kê</h5>
                                <div class="pull-right">
                                    <div class="btn-group">
                                        <button type="button" class="select-date-chart select-month-chart btn btn-xs btn-white active">Tháng</button>
                                        <button type="button" class="select-date-chart select-year-chart btn btn-xs btn-white">Năm</button>
                                    </div>
                                </div>
                            </div>
                            <div class="ibox-content">
                            <div >
                                <canvas id="barChart" class="barChart-date chart-active" height="100px"></canvas>
                                <canvas id="barChart-product-year" class="barChart-date" height="100px"></canvas>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            


            <script type="text/javascript">
                var base_url = '<?php echo e(url('')); ?>';

                /* statistical by month */
                var dataProduct =  [];
                <?php $__currentLoopData = $statisticalProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                dataProduct[<?php echo e($value['label'] - 1); ?>] =  <?php echo e($value['count_order_year']); ?> ;
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                var dataOrder =  [];
                <?php $__currentLoopData = $statisticalOrder; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                dataOrder[<?php echo e($value['label'] - 1); ?>] =  <?php echo e($value['count_order_year']); ?> ;
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                /*  statistical by Year  */
                var dataProductYear = [];
                var labelYear =  [];
                
                labelYear[6] = parseInt((new Date()).getFullYear()) ;

                //Assign value in array label chart statistical by Year

                for(var i  = 1; i < 6; i++){
                    var temp =  6 - i + 1;
                    labelYear[6 - i] = labelYear[6] - i;
                    labelYear[6 + i] = labelYear[6] + i;
                }

                // Assign value in array data product by year
                 <?php $__currentLoopData = $statisticalProductYear; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        for(var j  = 0; j < 12; j++){
                            if(<?php echo e($value['label']); ?> == labelYear[j]){
                                dataProductYear[j] =   <?php echo e($value['count_order_year']); ?>;
                            }
                        }
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                //Assign value in array order by year
                dataOrderYear = [];
                <?php $__currentLoopData = $statisticalOderYear; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        for(var j  = 0; j < 12; j++){
                            if(<?php echo e($value['label']); ?> == labelYear[j]){
                                dataOrderYear[j] =   <?php echo e($value['count_order_year']); ?>;
                            }
                        }
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </script>
            <script type="text/javascript" src="<?php echo e(url('js/dashboard-admin.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('main.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>