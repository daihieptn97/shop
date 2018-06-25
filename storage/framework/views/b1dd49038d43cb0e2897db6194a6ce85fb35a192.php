<?php $__env->startSection('title'); ?>
Hóa Đơn
<?php $__env->stopSection(); ?>

<?php $__env->startSection('user_content'); ?>

	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Hóa đơn</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="<?php echo e(url('user/index')); ?>">Home</a> / <span>Shopping Cart</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			<div class="cart-collaterals">
				<div class="info-user col-6 pl-3 pr-3">
					 <form method="get" class="form-horizontal">
                        <div class="form-group"><label class="col-sm-3 control-label">Tên khách hàng</label>
                            <div class="col-sm-9">
                            	<input type="text" class="form-control Obligatory numberphone" value="<?php echo e($order->fullname); ?>" readonly >
                            </div>
                        </div>
                        <div class="form-group"><label class="col-sm-3 control-label">Số điện thoại</label>
                            <div class="col-sm-9">
                            	<input type="text" class="form-control Obligatory email" value="<?php echo e($order->phonenumber); ?>" readonly >
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                         <div class="form-group"><label class="col-sm-3 control-label ">Ngày mua</label>
                            <div class="col-sm-9">
                            	<input type="text" class="form-control Obligatory name" value="<?php echo e($order->created_at); ?>" readonly>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-3 control-label">Phí ship</label>
                            <div class="col-sm-9"><input  type="text" id="address" class="Obligatory form-control address" value="<?php echo e($order->shipping); ?>" readonly></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                    </form>
				</div>
				<div class="info-user col-6 pl-3 pr-3">
					 <form method="get" class="form-horizontal">
                        <div class="form-group"><label class="col-sm-3 control-label">Địa chỉ</label>
                            <div class="col-sm-9">
                            	<input type="text" class="form-control Obligatory numberphone" value="<?php echo e($order->address); ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-9">
                            	<input type="text" class="form-control Obligatory email" value="<?php echo e($order->email); ?>" readonly>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                         <div class="form-group"><label class="col-sm-3 control-label ">Tổng tiền</label>
                            <div class="col-sm-9">
                            	<input type="text" class="form-control Obligatory name" value="<?php echo e($order->payment); ?>" readonly>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-3 control-label">Trạng thái</label>
                            <div class="col-sm-9">
                            	<?php if($order->status == 1): ?>
                            		<input  type="text" id="address" class="Obligatory form-control address" value="Đã thanh toán" readonly>
                            	<?php else: ?>
                            		<input  type="text" id="address" class="Obligatory form-control address" value="Chưa thanh toán" readonly>
                            	<?php endif; ?>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                    </form>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="table-responsive">
				<!-- Shop Products Table -->
				<table class="shop_table beta-shopping-cart-table table-cart" cellspacing="0">
					<thead>
						<tr>
							<th>STT</th>
							<th class="product-name">Sản phẩm</th>
							<th class="product-price">Giá sản phẩm</th>
							<th class="product-quantity">Số lượng</th>
							<th class="product-subtotal">Tổng tiền</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$stt = 1;
						?>
						<?php $__currentLoopData = $order->userorder; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr class="cart_item">
							<td><?php echo e($stt++); ?></td>
							<td class="product-name">
								<div class="media">
									<img class="pull-left" src="<?php echo e(asset($element->product->image)); ?>" alt="">
									<div class="media-body">
										<p class="font-large table-title"><?php echo e($element->product->name); ?></p>
									</div>
								</div>
							</td>
							<td class="product-price">
								<span class="amount " id="productprice"><?php echo e($element->product->price); ?></span>
							</td>

							<td class="product-quantity w-25" >
								<span class="amount " id="productprice"><?php echo e($element->count); ?></span>
							</td>

							<td class="product-subtotal">
								<span class="amount many_product_price"><?php echo e($element->payment); ?></span>
							</td>
						</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
				</table>
				<!-- End of Shop Table Products -->
			</div>


			<!-- Cart Collaterals -->
			
			<!-- End of Cart Collaterals -->
			<div class="clearfix"></div>

		</div> <!-- #content -->
	</div> <!-- .container -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.main.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>