@extends('main.layout')
@section('title')
    Tạo cửa hàng
@endsection
@section('content')
<div class="wrapper wrapper-content">
    <div class="row create-product">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Tạo cửa hàng</h5>
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
                    <form method="post" action="{{ url('admin/shop') }}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group col-sm-6">
                            <label class="col-sm-2 control-label">Tên cửa hàng</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="name" required></div>
                        </div>
                        <div class="form-group col-sm-6">
                            <label class="col-sm-2 control-label">Địa chỉ</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="address" required></div>
                        </div>
                        <div class="form-group col-sm-6">
                            <label class="col-sm-2 control-label">Số điện thoại</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="phonenumber" required></div>
                        </div>
                        <div class="form-group col-sm-6">
                            <label class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="email"></div>
                        </div>
                        <div class="form-group col-sm-6">
                            <label class="col-sm-2 control-label">Hình ảnh</label>
                            <div class="col-sm-10"><input type="file" id="files" name="image" class="form-control"></div>
                            <div class="col-sm-10 text-center col-sm-offset-2"><img src="" class="img-view" alt=""></div>
                        </div>  
                        <div class="form-group col-sm-12">
                            <div class="col-sm-4 col-sm-offset-5">
                                <button class="btn btn-success" type="submit">Thêm cửa hàng</button>
                                <button class="btn btn-white" type="submit">Hủy</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        document.getElementById('files').addEventListener('change', handleFileSelect, false);
        function handleFileSelect(evt) {
            var files = evt.target.files;
            for (var i = 0, f; f = files[i]; i++) {
                if (!f.type.match('image.*')) {
                    $('#files').val('');
                    alert('Chỉ chấp nhận tệp hình ảnh, vui lòng chọn lại.');
                    continue;
                }
                var reader = new FileReader();
                reader.onload = (function(theFile) {
                    return function(e) {
                        $(".img-view").attr('src', e.target.result);
                    };
                })(f);
                reader.readAsDataURL(f);
            }
        }

   });
</script>
@endsection