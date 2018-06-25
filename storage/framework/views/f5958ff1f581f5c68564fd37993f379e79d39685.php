<?php $__env->startSection('title'); ?>
    List Product
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="wrapper wrapper-content animated fadeInRight list-product">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Danh sách sản phẩm</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link" href="<?php echo e(route('admin.product.create')); ?>">
                                <button class="btn btn-primary">Thêm sản phẩm</button>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <?php
                            $stt = 1;
                        ?>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                                <tr>
                                    <th class="text-center">STT</th>
                                    <th class="text-center">Cửa hàng</th>
                                    <th class="text-center">Tên sản phẩm</th>
                                    <th class="text-center">Loại sản phẩm</th>
                                    <th class="text-center">Số lượng</th>
                                    <th class="text-center">Giá tiền</th>
                                    <th class="text-center">Hình ảnh</th>
                                    <th class="text-center"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="align-middle text-center"><?php echo e($stt++); ?></td>
                                        <td><?php echo e($element->shop->shop_name); ?></td>
                                        <td><?php echo e($element->name); ?></td>
                                        <td><?php echo e($element->category->name); ?></td>
                                        <td class="text-center"><?php echo e($element->count); ?></td>
                                        <td class="text-center"><?php echo e($element->price." ".$element->unit); ?></td>
                                        <td class="text-center"><img src="<?php echo e(asset($element->image)); ?>" style="width: 65px;height: auto" alt=""></td>
                                        <td class="text-center item-button">
                                            <a href="<?php echo e(url('user/product/'.$element->id)); ?>"><button class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                            <a href="<?php echo e(url('admin/product/'.$element->id.'/edit')); ?>"><button class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                            <form action="<?php echo e(url('admin/product/'.$element->id )); ?>" method="POST" style="display: inline">
                                                <?php echo e(csrf_field()); ?>

                                                <?php echo e(method_field('DELETE')); ?>

                                                <button class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
<script src="<?php echo e(asset('js/plugins/dataTables/datatables.min.js')); ?>"></script>
<script>
    $(document).ready(function(){
        $('.dataTables-example').DataTable({
            pageLength: 25,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                { extend: 'copy'},
                {extend: 'csv'},
                {extend: 'excel', title: 'ExampleFile'},
                {extend: 'pdf', title: 'ExampleFile'},

                {extend: 'print',
                 customize: function (win){
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                }
                }
            ]

        });

    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('main.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>