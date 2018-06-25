@extends('user.main.layout')
@section('title')
Hóa Đơn
@endsection

@section('user_content')

	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Hóa đơn</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{ url('user/index') }}">Home</a> / <span>Shopping Cart</span>
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
                            	<input type="text" class="form-control Obligatory numberphone" value="{{$order->fullname}}" readonly >
                            </div>
                        </div>
                        <div class="form-group"><label class="col-sm-3 control-label">Số điện thoại</label>
                            <div class="col-sm-9">
                            	<input type="text" class="form-control Obligatory email" value="{{$order->phonenumber}}" readonly >
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                         <div class="form-group"><label class="col-sm-3 control-label ">Ngày mua</label>
                            <div class="col-sm-9">
                            	<input type="text" class="form-control Obligatory name" value="{{$order->created_at}}" readonly>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-3 control-label">Phí ship</label>
                            <div class="col-sm-9"><input  type="text" id="address" class="Obligatory form-control address" value="{{$order->shipping}}" readonly></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                    </form>
				</div>
				<div class="info-user col-6 pl-3 pr-3">
					 <form method="get" class="form-horizontal">
                        <div class="form-group"><label class="col-sm-3 control-label">Địa chỉ</label>
                            <div class="col-sm-9">
                            	<input type="text" class="form-control Obligatory numberphone" value="{{$order->address}}" readonly>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-9">
                            	<input type="text" class="form-control Obligatory email" value="{{$order->email}}" readonly>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                         <div class="form-group"><label class="col-sm-3 control-label ">Tổng tiền</label>
                            <div class="col-sm-9">
                            	<input type="text" class="form-control Obligatory name" value="{{$order->payment}}" readonly>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-3 control-label">Trạng thái</label>
                            <div class="col-sm-9">
                            	@if ($order->status == 1)
                            		<input  type="text" id="address" class="Obligatory form-control address" value="Đã thanh toán" readonly>
                            	@else
                            		<input  type="text" id="address" class="Obligatory form-control address" value="Chưa thanh toán" readonly>
                            	@endif
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
						@php
							$stt = 1;
						@endphp
						@foreach ($order->userorder as $element)
							<tr class="cart_item">
							<td>{{$stt++}}</td>
							<td class="product-name">
								<div class="media">
									<img class="pull-left" src="{{ asset($element->product->image) }}" alt="">
									<div class="media-body">
										<p class="font-large table-title">{{$element->product->name}}</p>
									</div>
								</div>
							</td>
							<td class="product-price">
								<span class="amount " id="productprice">{{$element->product->price}}</span>
							</td>

							<td class="product-quantity w-25" >
								<span class="amount " id="productprice">{{$element->count}}</span>
							</td>

							<td class="product-subtotal">
								<span class="amount many_product_price">{{$element->payment}}</span>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				<!-- End of Shop Table Products -->
			</div>


			<!-- Cart Collaterals -->
			
			<!-- End of Cart Collaterals -->
			<div class="clearfix"></div>

		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection