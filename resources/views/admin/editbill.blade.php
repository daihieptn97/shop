@extends('main.layout')
@section('title')
	Sửa hóa đơn
@endsection
@section('content')
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
                    <form method="post" action="{{ url('admin/bill/'.$bill->id) }}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="form-group col-sm-6">
                            <label class="col-sm-2 control-label">Tên khách hàng</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="name" readonly value="{{$bill->fullname}}" required></div>
                        </div>
                        <div class="form-group col-sm-6">
                            <label class="col-sm-2 control-label">Địa chỉ</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="address" readonly value="{{$bill->address}}" required></div>
                        </div>
                        <div class="form-group col-sm-6">
                            <label class="col-sm-2 control-label">Số điện thoại</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="phonenumber" readonly value="{{$bill->phonenumber}}" required></div>
                        </div>
                       <div class="form-group col-sm-6">
                            <label class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="email" readonly value="{{$bill->email}}" required></div>
                        </div>
                        <div class="form-group col-sm-3">
                            <label class="col-sm-4 control-label">Tổng tiền</label>
                            <div class="col-sm-8"><input type="number" class="form-control" name="date" readonly value="{{$bill->payment+$bill->shipping}}" required></div>
                        </div>
                        <div class="form-group col-sm-3">
                            <label class="col-sm-4 control-label">Phí ship</label>
                            <div class="col-sm-8"><input type="number" class="form-control" name="date" readonly value="{{$bill->shipping}}" required></div>
                        </div>
                        <div class="form-group col-sm-3">
                            <label class="col-sm-6 control-label">Ngày mua</label>
                            <div class="col-sm-6"><input type="text" class="form-control" name="text" readonly value="{{$bill->created_at}}" required></div>
                        </div>
                        <div class="form-group col-sm-3">
                            <label class="col-sm-4 control-label">Trạng thái</label>
                            <div class="col-sm-8">
                                <select class="form-control m-b" name="status">
                                        <option value="1" @if ($bill->status == 1)
                                            selected
                                        @endif>Đã thanh toán</option>
                                        <option value="0" @if ($bill->status != 1)
                                            selected
                                        @endif>Chưa thanh toán</option>
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
                                @php
                                    $stt = 1;
                                @endphp
                            @foreach ($bill->userorder as $element)
                                <tr>
                                    <td>{{$stt++}}</td>
                                    <td>{{$element->product->name}}</td>
                                    <td><img src="{{ asset($element->product->image) }}" style="width: 65px;height: auto" alt=""></td>
                                    <td>{{$element->count}}</td>
                                    <td>{{$element->payment}} {{$element->product->unit}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="form-group col-sm-12">
                            <div class="col-sm-4 col-sm-offset-6">
                                <button class="btn btn-warning" type="submit">Sửa hóa đơn</button>
                                <button class="btn btn-white" type="submit">Hủy</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection