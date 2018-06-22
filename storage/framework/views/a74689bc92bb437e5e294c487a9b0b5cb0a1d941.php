<?php $__env->startSection('title'); ?>
<?php echo e($nameCategory); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('user_content'); ?>
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản phẩm</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="index.html">Home</a> / <span>Sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<?php echo $__env->make('user.main.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4><?php echo e($nameCategory); ?></h4>
							<div class="beta-products-details">
								<p class="pull-left"><?php echo e($numberProduct); ?> kết quả </p>
								<div class="clearfix"></div>
							</div>

							<div class="row">

								
								<?php $__currentLoopData = $listProductsByCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<div class="col-sm-4 list-product-item">
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
												<a class="add-to-cart pull-left" href="<?php echo e(url('user/cart/' . $value->id)); ?>" ><i class="fa fa-shopping-cart"></i></a>
												<a class="beta-btn primary" href="<?php echo e(url('user/product/' . $value->id)); ?>">Details <i class="fa fa-chevron-right"></i></a>
												<div class="clearfix"></div>
											</div>
										</div>
									</div>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="row">
							<?php echo e($listProductsByCategory->links()); ?>

						</div>
							
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.main.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>