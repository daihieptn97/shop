<?php $__env->startSection('title'); ?>
Thanh Toán
<?php $__env->stopSection(); ?>

<?php $__env->startSection('user_content'); ?>

	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Shopping Cart</h6>
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
			
			<div class="table-responsive">
				<!-- Shop Products Table -->
				<table class="shop_table beta-shopping-cart-table" cellspacing="0">
					<thead>
						<tr>
							<th class="product-name">Sản phẩm</th>
							<th class="product-price">Giá sản phẩm</th>
							<th class="product-status">Tình trạng</th>
							<th class="product-quantity">Số lượng</th>
							<th class="product-subtotal">Tổng tiền</th>
							<th class="product-remove">Xóa</th>
						</tr>
					</thead>
					<tbody>
						<?php if($infoProduct): ?>

						<tr class="cart_item">
							<td class="product-name">
								<div class="media">
									<img class="pull-left" src="<?php echo e(asset($infoProduct->image)); ?>" alt="">
									<div class="media-body">
										<p class="font-large table-title"><?php echo e($infoProduct->name); ?></p>
										<p class="table-option">Color: Red</p>
									</div>
								</div>
							</td>

							<td class="product-price">
								<span class="amount " id="productprice"><?php echo e($infoProduct->price); ?></span>
							</td>

							<td class="product-status">
								<?php if($infoProduct->count > 0): ?>
									<p><?php echo e('Còn hàng'); ?></p>
								<?php else: ?> 
									<p><?php echo e('hết hàng'); ?></p>
								<?php endif; ?>
								
							</td>

							<td class="product-quantity w-25" >
								<input class="numberproduct" type="number" value="1" >
							</td>

							<td class="product-subtotal">
								<span class="amount many_product_price"><?php echo e($infoProduct->price); ?></span>
							</td>

							<td class="product-remove">
								<a href="#" class="remove" title="Remove this item"><i class="fa fa-trash-o"></i></a>
							</td>
						</tr>
						<?php else: ?>
							<h4><?php echo e("không tồn tại sản phẩm"); ?></h4>
						<?php endif; ?>
					</tbody>

					
				</table>
				<!-- End of Shop Table Products -->
			</div>


			<!-- Cart Collaterals -->
			<div class="cart-collaterals">
				<div class="info-user col-8 pl-3 pr-3">
					 <form method="get" class="form-horizontal">
                        <div class="form-group"><label class="col-sm-2 control-label">Số điện thoại</label>
                            <div class="col-sm-10">
                            	<input type="number" class="form-control Obligatory numberphone">
                            	<input type="hidden" class="productID" value="<?php echo e($infoProduct->id); ?>">
                            </div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                            	<input type="email" class="form-control Obligatory email">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                         <div class="form-group"><label class="col-sm-2 control-label ">Họ tên</label>
                            <div class="col-sm-10">
                            	<input type="text" class="form-control Obligatory name">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">Địa chỉ</label>
                            <div class="col-sm-8"><input  type="text" id="address" class="Obligatory form-control address"></div><div class="col-sm-2"><button type="button" class="btn btn-primary" id="confirm-address">Xác nhận</button></div>
                        </div>
                        <input type="hidden" value="" id="shipping" class="Obligatory form-control shipping">
                        <input type="hidden" value="<?php echo e($infoProduct->shop->address); ?>" id="address-shop">
                        <div class="hr-line-dashed"></div>
                     
                       
                    </form>
				</div>
				<div class="cart-totals col-4">
					<div class="cart-totals-row"><h5 class="cart-total-title">Thông tin đơn hàng</h5></div>
					<div class="cart-totals-row"><span>Tạm tính :</span> <span id="payment-temp" class="many_product_price">$188.00</span></div>
					<div class="cart-totals-row"><span>Phí vận chuyển:</span> <span id="view-ship"></span></div>
					<div class="cart-totals-row"><span>Tổng cộng :</span> <span id="payment" class="many_product_price">$188.00</span></div>
					<div class="cart-totals-row">
						<span></span><button id="pay" class="beta-btn primary" name="update_cart">Thanh toán<i class="fa fa-chevron-right"></i></button> 
					</div>
					
				</div>

				
				<div class="clearfix"></div>
			</div>
			<!-- End of Cart Collaterals -->
			<div class="clearfix"></div>

		</div> <!-- #content -->
	</div> <!-- .container -->
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD7h3vfARzCarO1G3jquoiXk_fSpNfFSxY&callback=initialize&libraries=geometry,places" async defer></script>
	<script type="text/javascript">
		var base_url = '<?php echo e(url('')); ?>';
	</script>
	<script type="text/javascript" src="<?php echo e(url('js/cart.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.main.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>