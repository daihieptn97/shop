@extends('main.layout');
@section('title')
    Chi tiết hóa đơn
@endsection
@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Static Tables</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>
                    <a>Tables</a>
                </li>
                <li class="active">
                    <strong>Static Tables</strong>
                </li>
            </ol>
        </div>
    </div>
    
    <ul class="nav nav-tabs">
      <li id="info-bill-detail" class="active">
        <h4>Thông tin đơn hàng</h4>
        
      </li>
      <li id="map-bill-detail" >
        <h4>Bản đồ</h4>
      </li>
         </ul>
      <div id="bill-map" class="details-bill"></div>
      <div id="bill-info" class="wrapper wrapper-content animated fadeInRight details-bill active">
                <div class="row">
                    <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Basic Table</h5>
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
                            <div class="form-group col-sm-6">

                                <label class="col-sm-2 control-label">Tên khách hàng</label>
                                <div class="col-sm-10"><input type="text" class="form-control" readonly name="name" value="{{$detail->fullname}}" required></div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="col-sm-2 control-label">Địa chỉ</label>
                                <div class="col-sm-10"><input type="text" class="form-control"  readonly name="address" value="{{$detail->address}}" required></div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="col-sm-2 control-label">Số điện thoại</label>
                                <div class="col-sm-10"><input type="text" class="form-control"  readonly name="phonenumber" value="{{$detail->phonenumber}}" required></div>
                            </div>
                           <div class="form-group col-sm-6">
                                <label class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10"><input type="text" class="form-control"  readonly name="email" value="{{$detail->email}}" required></div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="col-sm-2 control-label">Ngày mua</label>
                                <div class="col-sm-10"><input type="text" class="form-control"  readonly name="date" value="{{$detail->created_at}}" required></div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="col-sm-2 control-label">Tổng tiền</label>
                                <div class="col-sm-10"><input type="text" class="form-control" readonly  name="payment" value="{{$detail->payment + $detail->shipping }}" required></div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="col-sm-2 control-label">Phí ship</label>
                                <div class="col-sm-10"><input type="text" class="form-control" readonly  name="date" value="{{$detail->shipping}}" required></div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="col-sm-2 control-label">Trạng thái</label>
                                @if ($detail->status == 1)
                                    <div class="col-sm-10"><input type="text" class="form-control" readonly  name="status" value="Đã thanh toán" required></div>
                                @else
                                    <div class="col-sm-10"><input type="text" class="form-control" readonly  name="status" value="Chưa thanh toán" required></div>
                                @endif
                            </div>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="text-center">STT</th>
                                    <th class="text-center">Tên sản phẩm</th>
                                    <th class="text-center"></th>
                                    <th class="text-center">Số lượng</th>
                                    <th class="text-center">Thành tiền</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $stt = 1;
                                    @endphp
                                @foreach ($detail->userorder as $element)
                                    <tr>
                                        <td class="text-center">{{$stt++}}</td>
                                        <td class="text-center">{{$element->product->name}}</td>
                                        <td class="text-center"><img src="{{ asset($element->product->image) }}" style="width: 65px;height: auto" alt=""></td>
                                        <td class="text-center">{{$element->count}}</td>
                                        <td class="text-center">{{$element->payment}} {{$element->product->unit}}</td>
                                    </tr>
                                @endforeach
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-center">Phí ship</td>
                                        <td class="text-center">{{$detail->shipping}} VND</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-center">Tổng tiền</td>
                                        <td class="text-center">{{$detail->payment+$detail->shipping}} VND</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

 

    <script type="text/javascript">
        var origin_bill = "{{$origin_bill . ',vn'}}";
        var destination_bill = "{{$detail->address . ',vn'}}";
    </script>
    <script type="text/javascript" src="{{ url('js/detailbill.js') }}"></script>
      <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA7xXAxlsvz_M_WHauc9koBZrKLz70fJoE&callback=initMap">
    </script>
@endsection