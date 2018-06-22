@extends('user.main.layout')
@section('title')
{{ $nameCategory }}
@endsection
@section('user_content')
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
					@include('user.main.sidebar')
					
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>{{ $nameCategory }}</h4>
							<div class="beta-products-details">
								<p class="pull-left">{{ $numberProduct }} kết quả </p>
								<div class="clearfix"></div>
							</div>

							<div class="row">

								
								@foreach ($listProductsByCategory as $value)
									<div class="col-sm-4 list-product-item">
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
												<a class="add-to-cart pull-left" href="{{url('user/cart/' . $value->id) }}" ><i class="fa fa-shopping-cart"></i></a>
												<a class="beta-btn primary" href="{{ url('user/product/' . $value->id) }}">Details <i class="fa fa-chevron-right"></i></a>
												<div class="clearfix"></div>
											</div>
										</div>
									</div>
								@endforeach
							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="row">
							{{ $listProductsByCategory->links() }}
						</div>
							
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection