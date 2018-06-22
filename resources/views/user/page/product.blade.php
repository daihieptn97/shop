@extends('user.main.layout')

@section('title')
{{$detailProduct->name }}
@endsection

@section('user_content');
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">{{$detailProduct->name }}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{ url('user/index') }}">Home</a> / <span>San Pham</span>
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
							<img src="{{ URL::asset($detailProduct->image) }}" alt="">
						</div>
						<div class="col-sm-8">
							<div class="">
								<div class="single-item-title"><h3>{{$detailProduct->name }}</h3></div>
								<p class="single-item-price">
									<b><span>{{$detailProduct->price . " " .$detailProduct->unit}}</span></b>
								</p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>
							<div class="single-item-options">
							
								@if ($detailProduct->count > 0)
									<div class="status status-exists">Còn hàng</div>
									<a class="add-to-cart" href="{{ url('user/cart/' . $detailProduct->id) }}">
										<i class="fa fa-shopping-cart"></i>
									</a>
								@else
									<div class="status status-not-exists">Hết hàng</div>
									
								@endif
							
							
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
							
							@foreach ($ortherProduct as $value)
								<div class="col-sm-4">
									<div class="single-item">
										<div class="single-item-header">
										<a href="{{ url('user/product/' . $value->id) }}">
											<img src="{{ URL::asset($value->image) }}" alt="">
										</a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{ $value->name }}</p>
											<p class="single-item-price">
												<span>{{ $value->price }}</span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{url('user/cart/' . $value->id) }}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{ url('user/product/' . $value->id) }}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
							@endforeach
						</div>
					</div> <!-- .beta-products-list -->
				</div>
				<div class="col-sm-3 aside">
					<div class="widget">
						<h3 class="widget-title">Sản phẩm mới</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								@foreach ($productNew as $value)
									<div class="media beta-sales-item">
										<a class="pull-left" href="{{ url('user/product/'. $value->id) }}"><img src="{{ url($value->image) }}" alt=""></a>
										<div class="media-body">
											{{$value->name }}
											<span class="beta-sales-price">{{ $value->price  }}</span>
										</div>
									</div>
								@endforeach
								
							</div>
						</div>
					</div> <!-- best sellers widget -->
					
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection