@extends('main.layout')
@section('title')
    Danh sách cửa hàng
@endsection
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight list-product">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Danh sách cửa hàng</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link" href="{{ route('admin.shop.create') }}">
                                <button class="btn btn-primary">Thêm cửa hàng</button>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        @php
                            $stt = 1;
                        @endphp
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                                <tr>
                                    <th class="text-center">STT</th>
                                    <th class="text-center">Tên cửa hàng</th>
                                    <th class="text-center">Địa chỉ</th>
                                    <th class="text-center">Số điện thoại</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Ngày tạo</th>
                                    <th class="text-center"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($shop as $element)
                                    <tr>
                                        <td class="align-middle text-center" style="width: 35px;height: auto">{{$stt++}}</td>
                                        <td>{{$element->shop_name}}</td>
                                        <td>{{$element->address}}</td>
                                        <td>{{$element->phone}}</td>
                                        <td class="text-center">{{$element->email}}</td>
                                        <td class="text-center">{{$element->created_at}}</td>
                                        <td class="text-center" style="width: 200px">
                                            <a href=""><button class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                            <a href="{{ url('admin/shop/'.$element->id.'/edit') }}"><button class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                            <form action="{{ url('admin/shop/'.$element->id ) }}" method="POST" style="display: inline">
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