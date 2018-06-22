    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="<?php echo e(URL::asset('img/profile_small.jpg')); ?>" />
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">David Williams</strong>
                             </span> <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="<?php echo e(url('admin/profile')); ?>">Profile</a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo e(url('logout')); ?>">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        IN+
                    </div>
                </li>
                <?php
                    $action = explode('/', $_SERVER['REQUEST_URI']);
                    $action = end($action);
                ?>
                <li <?php if($action == 'index'): ?>
                   class="active"
                <?php endif; ?>>
                    <a href="<?php echo e(url('admin/index')); ?>"><i class="fa fa-th-large"></i> <span class="nav-label">Trang chủ</span></a>
                </li>
                <li <?php if($action == 'shop'): ?>
                   class="active"
                <?php endif; ?>>
                    <a href="<?php echo e(url('admin/shop')); ?>"><i class="fa fa-shopping-cart"></i> <span class="nav-label">Cửa hàng</span></a>
                </li>
                <li <?php if($action == 'product'): ?>
                   class="active"
                <?php endif; ?>>
                    <a href="<?php echo e(url('admin/product')); ?>"><i class="fa fa-diamond"></i> <span class="nav-label">Sản phẩm</span></a>
                </li>
                <li <?php if($action == 'user'): ?>
                   class="active"
                <?php endif; ?>>
                    <a href="<?php echo e(url('admin/user')); ?>"><i class="fa fa-users"></i> <span class="nav-label">Khách hàng</span></a>
                </li>
                <li <?php if($action == 'bill'): ?>
                   class="active"
                <?php endif; ?>>
                    <a href="<?php echo e(url('admin/bill')); ?>"><i class="fa fa-clipboard"></i> <span class="nav-label">Hóa đơn</span></a>
                </li>
            </ul>
        </div>
    </nav>