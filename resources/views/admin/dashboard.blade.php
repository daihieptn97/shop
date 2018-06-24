@extends('main.layout')
@section('title')
    Admin | Trang chủ
@endsection
@section('content')
    <div class="wrapper wrapper-content dashboard">
        <div class="row">
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-success pull-right">Tháng này</span>
                                <h5>Thu nhập</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">{{number_format($totalIncomeMonth) . ' VND'}}</h1>
                                <small>Tổng thu nhập</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-info pull-right">Tháng này</span>
                                <h5>Đơn hàng</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">
                                    {{number_format($totalOrderMonth) .' Đơn'}}
                                </h1>
                                <small>Đơn hàng mới</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-primary pull-right">Tháng này</span>
                                <h5>Sản phẩm</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">{{$totalProductMonth . ' Chiếc'}}</h1>
                                <small>Bán được</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Chờ duyệt</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">
                                {{number_format($totalPendingBill) . ' Đơn' }}</h1>
                               
                                <small>Yêu cầu duyệt</small>
                            </div>
                        </div>
            </div>
        </div>
        <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Thống kê</h5>
                                <div class="pull-right">
                                    <div class="btn-group">
                                        <button type="button" class="select-date-chart select-month-chart btn btn-xs btn-white active">Tháng</button>
                                        <button type="button" class="select-date-chart select-year-chart btn btn-xs btn-white">Năm</button>
                                    </div>
                                </div>
                            </div>
                            <div class="ibox-content">
                            <div >
                                <canvas id="barChart" class="barChart-date chart-active" height="100px"></canvas>
                                <canvas id="barChart-product-year" class="barChart-date" height="100px"></canvas>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            


            <script type="text/javascript">
                var base_url = '{{url('')}}';

                /* statistical by month */
                var dataProduct =  [];
                @foreach ($statisticalProduct as $value)
                dataProduct[{{ $value['label'] - 1 }}] =  {{ $value['count_order_year'] }} ;
                @endforeach

                var dataOrder =  [];
                @foreach ($statisticalOrder as $value)
                dataOrder[{{ $value['label'] - 1 }}] =  {{ $value['count_order_year'] }} ;
                @endforeach


                /*  statistical by Year  */
                var dataProductYear = [];
                var labelYear =  [];
                
                labelYear[6] = parseInt((new Date()).getFullYear()) ;

                //Assign value in array label chart statistical by Year

                for(var i  = 1; i < 6; i++){
                    var temp =  6 - i + 1;
                    labelYear[6 - i] = labelYear[6] - i;
                    labelYear[6 + i] = labelYear[6] + i;
                }

                // Assign value in array data product by year
                 @foreach ($statisticalProductYear as $value)
                        for(var j  = 0; j < 12; j++){
                            if({{ $value['label']}} == labelYear[j]){
                                dataProductYear[j] =   {{ $value['count_order_year'] }};
                            }
                        }
                @endforeach

                //Assign value in array order by year
                dataOrderYear = [];
                @foreach ($statisticalOderYear as $value)
                        for(var j  = 0; j < 12; j++){
                            if({{ $value['label']}} == labelYear[j]){
                                dataOrderYear[j] =   {{ $value['count_order_year'] }};
                            }
                        }
                @endforeach

            </script>
            <script type="text/javascript" src="{{ url('js/dashboard-admin.js') }}"></script>
@endsection