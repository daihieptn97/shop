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
                                <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div>
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
                                <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div>
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
                                <h1 class="no-margins"><?php echo e($totalOrderToday . ' Chiếc'); ?></h1>
                                <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div>
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
                                <h5>Orders</h5>
                                <div class="pull-right">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-xs btn-white active">Today</button>
                                        <button type="button" class="btn btn-xs btn-white">Monthly</button>
                                        <button type="button" class="btn btn-xs btn-white">Annual</button>
                                    </div>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                <div class="col-lg-9">
                                    <div >
                                        
                                     
                                        <canvas id="barChart" height="100px"></canvas>
                         
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <ul class="stat-list">
                                        <li>
                                            <h2 class="no-margins">1000</h2>
                                            <small>Total orders in period</small>
                                            <div class="stat-percent">0% <i class="fa fa-level-up text-navy"></i></div>
                                            <div class="progress progress-mini">
                                                <div style="width: 48%;" class="progress-bar"></div>
                                            </div>
                                        </li>
                                        <li>
                                            <h2 class="no-margins ">1000</h2>
                                            <small>Orders in last month</small>
                                            <div class="stat-percent">0% <i class="fa fa-level-down text-navy"></i></div>
                                            <div class="progress progress-mini">
                                                <div style="width: 60%;" class="progress-bar"></div>
                                            </div>
                                        </li>
                                        <li>
                                            <h2 class="no-margins ">1000</h2>
                                            <small>Monthly income from orders</small>
                                            <div class="stat-percent">22% <i class="fa fa-bolt text-navy"></i></div>
                                            <div class="progress progress-mini">
                                                <div style="width: 22%;" class="progress-bar"></div>
                                            </div>
                                        </li>
                                        </ul>
                                    </div>
                                </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                var base_url = '<?php echo e(url('')); ?>';
                var dataProduct =  [];
                <?php $__currentLoopData = $statisticalProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                dataProduct[<?php echo e($value['monthOrder'] - 1); ?>] =  <?php echo e($value['count_order_year']); ?> ;
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                var dataOrder =  [];
                <?php $__currentLoopData = $statisticalOrder; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                dataOrder[<?php echo e($value['monthOrder'] - 1); ?>] =  <?php echo e($value['count_order_year']); ?> ;
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </script>
            <script type="text/javascript" src="<?php echo e(url('js/dashboard-admin.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('main.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>