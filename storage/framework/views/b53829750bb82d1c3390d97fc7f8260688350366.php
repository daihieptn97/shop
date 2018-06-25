<?php $__env->startSection('title'); ?>
    Cập nhật sản phẩm
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="wrapper wrapper-content">
    <div class="row create-product">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Cập nhật sản phẩm</h5>
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
                    <form method="post" action="<?php echo e(url('admin/product/'.$product->id)); ?>" class="form-horizontal" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo e(method_field('PUT')); ?>

                        <div class="col-md-6">
                            <div class="form-group col-sm-12">
                                <label class="col-sm-2 control-label">Cửa hàng</label>
                                <div class="col-sm-10">
                                    <select class="form-control m-b" name="shop_id">
                                        <?php $__currentLoopData = $shop; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($element->id == $product->shop_id): ?>
                                                <option value="<?php echo e($element->id); ?>" selected><?php echo e($element->shop_name); ?></option>
                                            <?php else: ?>
                                                <option value="<?php echo e($element->id); ?>"><?php echo e($element->shop_name); ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <label class="col-sm-2 control-label">Tên sản phẩm</label>
                                <div class="col-sm-10"><input type="text" class="form-control" name="name" value="<?php echo e($product->name); ?>" required></div>
                            </div>
                            <div class="form-group col-sm-8">
                                <label class="col-sm-3 control-label">Loại sản phẩm</label>
                                <div class="col-sm-9">
                                    <select class="form-control m-b" name="cate_id">
                                        <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($element->id == $product->cate_id): ?>
                                                <option value="<?php echo e($element->id); ?>" selected><?php echo e($element->name); ?></option>
                                            <?php else: ?>
                                                <option value="<?php echo e($element->id); ?>"><?php echo e($element->name); ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-sm-4">
                                <label class="col-sm-3 control-label">Số lượng</label>
                                <div class="col-sm-9"><input type="number" class="form-control" name="count" value="<?php echo e($product->count); ?>" required></div>
                            </div>
                            <div class="form-group col-sm-8">
                                <label class="col-lg-3 control-label">Giá tiền</label>
                                <div class="col-lg-9"><input type="number" class="form-control" name="price" value="<?php echo e($product->price); ?>" required></div>
                            </div>
                            <div class="form-group col-sm-4">
                                <label class="col-lg-3 control-label">Loại tiền</label>
                                <div class="col-lg-9">
                                    <select class="form-control m-b" name="unit">
                                        <option value="VND" <?php if($product->unit == "VND"): ?>
                                            selected
                                        <?php endif; ?>>VND</option>
                                        <option value="$" <?php if($product->unit == "$"): ?>
                                            selected
                                        <?php endif; ?>>$</option>
                                    </select>   
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group col-sm-12">
                                <label class="col-sm-2 control-label">Hình ảnh</label>
                                <div class="col-sm-10"><input type="file" id="files" name="image" class="form-control"></div>
                                <div class="col-sm-10 text-center col-sm-offset-2"><img src="<?php echo e(asset($product->image)); ?>" class="img-view" alt=""></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group col-sm-12">
                                <label class="col-sm-1 control-label">Mô tả sản phẩm</label>
                                <div class="col-sm-11">
                                    <div class="ibox float-e-margins">
                                        <div class="ibox-content no-padding">
                                            <textarea id="summernote" name="description" required>
                                                <?php echo e($product->description); ?>

                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                            <div class="col-sm-4 col-sm-offset-5">
                                <button class="btn btn-warning" type="submit">Sửa sản phẩm</button>
                                <button class="btn btn-white" type="submit">Hủy</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="<?php echo e(asset('js/plugins/summernote/summernote.min.js')); ?>"></script>

    <script>
        $(document).ready(function(){
            $('#summernote').summernote();

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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('main.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>