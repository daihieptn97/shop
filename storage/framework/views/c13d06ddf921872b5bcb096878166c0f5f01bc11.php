<?php $__env->startSection('title'); ?>
	Sửa hóa đơn
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="wrapper wrapper-content details-bill">
    <div class="row create-product">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Cập nhật hóa đơn</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#">Config option 1</a>
                            </li>
                            <li><a href="#">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <form method="post" action="<?php echo e(url('admin/bill/'.$bill->id)); ?>" class="form-horizontal" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo e(method_field('PUT')); ?>

                        <div class="form-group col-sm-6">
                            <label class="col-sm-2 control-label">Tên khách hàng</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="name" readonly value="<?php echo e($bill->fullname); ?>" required></div>
                        </div>
                        <div class="form-group col-sm-6">
                            <label class="col-sm-2 control-label">Địa chỉ</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="address" readonly value="<?php echo e($bill->address); ?>" required></div>
                        </div>
                        <div class="form-group col-sm-6">
                            <label class="col-lg-2 control-label">Số điện thoại</label>
                            <div class="col-lg-10"><input type="text" class="form-control" name="phonenumber" readonly value="<?php echo e($bill->phonenumber); ?>" required></div>
                        </div>
                       <div class="form-group col-sm-6">
                            <label class="col-lg-2 control-label">Email</label>
                            <div class="col-lg-10"><input type="text" class="form-control" name="email" readonly value="<?php echo e($bill->email); ?>" required></div>
                        </div>
                        <div class="form-group col-sm-6">
                            <label class="col-lg-2 control-label">Ngày mua</label>
                            <div class="col-lg-10"><input type="text" class="form-control" name="text" readonly value="<?php echo e($bill->created_at); ?>" required></div>
                        </div>
                        <div class="form-group col-sm-6">
                            <label class="col-lg-2 control-label">Tổng tiền</label>
                            <div class="col-lg-10"><input type="number" class="form-control" name="date" readonly value="<?php echo e($bill->payment); ?>" required></div>
                        </div>
                        <div class="form-group col-sm-6">
                            <label class="col-lg-2 control-label">Phí ship</label>
                            <div class="col-lg-10"><input type="number" class="form-control" name="date" readonly value="<?php echo e($bill->shipping); ?>" required></div>
                        </div>
                        <div class="form-group col-sm-6">
                            <label class="col-sm-2 control-label">Trạng thái</label>
                            <div class="col-sm-10">
                                <select class="form-control m-b" name="status">
                                        <option value="1" <?php if($bill->status == 1): ?>
                                            selected
                                        <?php endif; ?>>Đã thanh toán</option>
                                        <option value="0" <?php if($bill->status != 1): ?>
                                            selected
                                        <?php endif; ?>>Chưa thanh toán</option>
                                </select>
                            </div>
                        </div>
						<table class="table">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên sản phẩm</th>
                                <th></th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $stt = 1;
                                ?>
                            <?php $__currentLoopData = $bill->userorder; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($stt++); ?></td>
                                    <td><?php echo e($element->product->name); ?></td>
                                    <td><img src="<?php echo e(asset($element->product->image)); ?>" style="width: 65px;height: auto" alt=""></td>
                                    <td><?php echo e($element->count); ?></td>
                                    <td><?php echo e($element->payment); ?> <?php echo e($element->product->unit); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <div class="form-group col-sm-12">
                            <div class="col-sm-4 col-sm-offset-5">
                                <button class="btn btn-warning" type="submit">Sửa sản phẩm</button>
                                <button class="btn btn-white" type="submit">Hủy</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('main.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>