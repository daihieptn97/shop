<?php $__env->startSection('title'); ?>
    Trang chủ
<?php $__env->stopSection(); ?>
<?php $__env->startSection('user_content'); ?>

<div class="rev-slider">
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4 class="title-cate">Sản phẩm mới nhất</h4>
							<div class="beta-products-details">
								<div class="clearfix"></div>
							</div>

							<div class="row">
								<?php $__currentLoopData = $productNew; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<div class="col-sm-3">
										<div class="single-item">
											<div class="single-item-header">
												<a href="<?php echo e(url('user/product/' . $value->id)); ?>">
													<img src="<?php echo e(URL::asset($value->image)); ?>" alt="">
												</a>
											</div>
											<div class="single-item-body">
												<p class="single-item-title"><?php echo e($value->name); ?></p>
												<p class="single-item-price">
													<span class="flash-sale"><?php echo e($value->price . ' '. $value->unit); ?> </span>
												</p>

											</div>
											<div class="single-item-caption">
												<a class="add-to-cart pull-left" href="<?php echo e(url('user/cart/' . $value->id)); ?>"><i class="fa fa-shopping-cart"></i></a>
												<a class="beta-btn primary" href="<?php echo e(url('user/product/'.$value->id)); ?>">Details <i class="fa fa-chevron-right"></i></a>
												<div class="clearfix"></div>
											</div>
										</div>
									</div>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								
							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4 class="title-cate">Sản phẩm bán chạy</h4>

							<div class="beta-products-details">
								
								<div class="clearfix"></div>
							</div>
							<div class="space40">&nbsp;</div>
							<div class="row">
								<?php $__currentLoopData = $productTop; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<div class="col-sm-3">
										<div class="single-item">
											

											<div class="single-item-header">
												<a href="<?php echo e(url('user/product/' . $value->id)); ?>"><img src="<?php echo e(URL::asset($value->image)); ?>" alt=""></a>
											</div>
											<div class="single-item-body">
												<p class="single-item-title"><?php echo e($value->name); ?></p>
												<p class="single-item-price">

													
													<span class="flash-sale"><?php echo e($value->price . ' '. $value->unit); ?> </span>
												</p>
											</div>
											<div class="single-item-caption">
												<a class="add-to-cart pull-left" href="<?php echo e(url('user/cart/'.$value->id)); ?>">
													<i class="fa fa-shopping-cart"></i>
												</a>
												<a class="beta-btn primary" href="<?php echo e(url('user/product/'.$value->id)); ?>">Details 
													<i class="fa fa-chevron-right"></i>
												</a>
												<div class="clearfix"></div>
											</div>
										</div>
									</div>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								
								
							</div>
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.main.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>