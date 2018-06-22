@extends('user.main.layout')
@section('title')
    Trang chủ
@endsection
@section('user_content')

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
								@foreach ($productNew as $value)
									<div class="col-sm-3">
										<div class="single-item">
											<div class="single-item-header">
												<a href="{{ url('user/product/' . $value->id) }}">
													<img src="{{ URL::asset($value->image) }}" alt="">
												</a>
											</div>
											<div class="single-item-body">
												<p class="single-item-title">{{$value->name}}</p>
												<p class="single-item-price">
													<span class="flash-sale">{{$value->price . ' '. $value->unit  }} </span>
												</p>

											</div>
											<div class="single-item-caption">
												<a class="add-to-cart pull-left" href="{{ url('user/cart/' . $value->id) }}"><i class="fa fa-shopping-cart"></i></a>
												<a class="beta-btn primary" href="{{ url('user/product/'.$value->id) }}">Details <i class="fa fa-chevron-right"></i></a>
												<div class="clearfix"></div>
											</div>
										</div>
									</div>
								@endforeach
								
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
								@foreach ($productTop as $value)
									<div class="col-sm-3">
										<div class="single-item">
											{{-- <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div> --}}

											<div class="single-item-header">
												<a href="{{ url('user/product/' . $value->id) }}"><img src="{{ URL::asset($value->image) }}" alt=""></a>
											</div>
											<div class="single-item-body">
												<p class="single-item-title">{{$value->name}}</p>
												<p class="single-item-price">

													{{-- <span class="flash-del">{{$value->price . '2312312'}}</span> --}}
													<span class="flash-sale">{{$value->price . ' '. $value->unit  }} </span>
												</p>
											</div>
											<div class="single-item-caption">
												<a class="add-to-cart pull-left" href="{{ url('user/cart/'.$value->id) }}">
													<i class="fa fa-shopping-cart"></i>
												</a>
												<a class="beta-btn primary" href="{{ url('user/product/'.$value->id) }}">Details 
													<i class="fa fa-chevron-right"></i>
												</a>
												<div class="clearfix"></div>
											</div>
										</div>
									</div>
								@endforeach
								
								
							</div>
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection