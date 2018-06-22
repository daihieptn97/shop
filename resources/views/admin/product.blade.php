@extends('main.layout')
@section('title')
    List Product
@endsection
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight list-product">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Danh sách sản phẩm</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link" href="{{ route('admin.product.create') }}">
                                <button class="btn btn-primary">Thêm sản phẩm</button>
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
                                    <th class="text-center">Cửa hàng</th>
                                    <th class="text-center">Tên sản phẩm</th>
                                    <th class="text-center">Loại sản phẩm</th>
                                    <th class="text-center">Số lượng</th>
                                    <th class="text-center">Giá tiền</th>
                                    <th class="text-center">Hình ảnh</th>
                                    <th class="text-center"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($data as $element)
                                    <tr>
                                        <td class="align-middle text-center" style="width: 35px;height: auto">{{$stt++}}</td>
                                        <td>{{$element->shop->shop_name}}</td>
                                        <td>{{$element->name}}</td>
                                        <td>{{$element->category->name}}</td>
                                        <td class="text-center" style="width: 100px;height: auto">{{$element->count}}</td>
                                        <td class="text-center" style="width: 200px;height: auto">{{$element->price." ".$element->unit}}</td>
                                        <td class="text-center"><img src="{{ asset($element->image) }}" style="width: 65px;height: auto" alt=""></td>
                                        <td class="text-center" style="width: 200px">
                                            <a href="{{ url('user/product/'.$element->id) }}"><button class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                            <a href="{{ url('admin/product/'.$element->id.'/edit') }}"><button class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                            <form action="{{ url('admin/product/'.$element->id ) }}" method="POST" style="display: inline">
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