@extends('main.layout')
@section('title')
    Danh sách hóa đơn
@endsection
@section('content')
<div class="wrapper wrapper-content animated fadeInRight list-bill">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Quản lý hóa đơn</h5>
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

                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th class="text-center">Mã HĐ</th>
                        <th class="text-center">Họ tên</th>
                        <th class="text-center">Địa chỉ</th>
                        <th class="text-center">Số điện thoại</th>
                        <th class="text-center">Tổng tiền</th>
                        <th class="text-center">Ngày</th>
                        <th class="text-center">Trạng thái</th>
                        <th class="text-center"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($bill as $element)
                        <tr class="gradeX">
                        <td class="text-center" style="width: 70px;height: auto">{{$element->id}}</td>
                        <td>{{$element->fullname}}</td>
                        <td>{{$element->address}}</td>
                        <td class="text-center">{{$element->phonenumber}}</td>
                        <td class="text-center">{{$element->payment + $element->shipping}}</td>
                        <td class="text-center">{{$element->created_at}}</td>
                        <td class="text-center">@if ($element->status == 0)
                            Chưa thanh toán
                        @else
                            Đã thanh toán
                        @endif</td>
                        <td class="text-center" style="width: 200px">
                            <a href="{{ url('admin/bill/'.$element->id) }}"><button class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                            <a href="{{ url('admin/bill/'.$element->id.'/edit') }}"><button class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                            <form action="{{ url('admin/bill/'.$element->id ) }}" method="POST" style="display: inline">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                            </form>
                        </td>
                        </tr>
                    @endforeach
                    </tbody>
                    </table>
                        </div>

                    </div>
                </div>
            </div>
            </div>
        </div>
<script src="{{ asset('js/plugins/dataTables/datatables.min.js') }}"></script>
<script>
$(document).ready(function(){
    $('.dataTables-example').DataTable({
        pageLength: 25,
        responsive: true,
        dom: '<"html5buttons"B>lTfgitp',
        buttons: [
            { extend: 'copy'},
            {extend: 'csv'},
            {extend: 'excel', title: 'ExampleFile'},
            {extend: 'pdf', title: 'ExampleFile'},

            {extend: 'print',
             customize: function (win){
                    $(win.document.body).addClass('white-bg');
                    $(win.document.body).css('font-size', '10px');

                    $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
            }
            }
        ]

    });

});

</script>
@endsection