<?php $__env->startSection('title'); ?>
<?php echo e($detailProduct->name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('user_content'); ?>;
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title"><?php echo e($detailProduct->name); ?></h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="<?php echo e(url('user/index')); ?>">Home</a> / <span>San Pham</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">

					<div class="row">
						<div class="col-sm-4">
							<img src="<?php echo e(URL::asset($detailProduct->image)); ?>" alt="">
						</div>
						<div class="col-sm-8">
							<div class="">
								<div class="single-item-title"><h3><?php echo e($detailProduct->name); ?></h3></div>
								<p class="single-item-price">
									<b><span><?php echo e($detailProduct->price . " " .$detailProduct->unit); ?></span></b>
								</p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>
							<div class="single-item-options">
							
								<?php if($detailProduct->count > 0): ?>
									<div class="status status-exists">Còn hàng</div>
									<a class="add-to-cart" href="<?php echo e(url('user/cart/' . $detailProduct->id)); ?>">
										<i class="fa fa-shopping-cart"></i>
									</a>
								<?php else: ?>
									<div class="status status-not-exists">Hết hàng</div>
									
								<?php endif; ?>
							
							
								<div class="clearfix"></div>


							</div>
						</div>
					</div>

					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
					
					<div class="panel" id="tab-description">
						<h4>Đánh giá sản phẩm</h4>
						<div class="space20">&nbsp;</div>
						<?php
							echo $detailProduct->description;
						?>
					</div>
					</div>
					<div class="space50">&nbsp;</div>
					<div class="beta-products-list">
						<h4>Sản phẩm khác</h4>

						<div class="row">
							
							<?php $__currentLoopData = $ortherProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<div class="col-sm-4">
									<div class="single-item">
										<div class="single-item-header">
										<a href="<?php echo e(url('user/product/' . $value->id)); ?>">
											<img src="<?php echo e(URL::asset($value->image)); ?>" alt="">
										</a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title"><?php echo e($value->name); ?></p>
											<p class="single-item-price">
												<span><?php echo e($value->price); ?></span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="<?php echo e(url('user/cart/' . $value->id)); ?>"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="<?php echo e(url('user/product/' . $value->id)); ?>">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</div>
					</div> <!-- .beta-products-list -->
				</div>
				<div class="col-sm-3 aside">
					<div class="widget">
						<h3 class="widget-title">Sản phẩm mới</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								<?php $__currentLoopData = $productNew; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<div class="media beta-sales-item">
										<a class="pull-left" href="<?php echo e(url('user/product/'. $value->id)); ?>"><img src="<?php echo e(url($value->image)); ?>" alt=""></a>
										<div class="media-body">
											<?php echo e($value->name); ?>

											<span class="beta-sales-price"><?php echo e($value->price); ?></span>
										</div>
									</div>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								
							</div>
						</div>
					</div> <!-- best sellers widget -->
					
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.main.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>