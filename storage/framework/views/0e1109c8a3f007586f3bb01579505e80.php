    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                        <ul class="nav navbar-nav">
                            <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon feather icon-menu"></i></a></li>
                        </ul>

                    </div>
                    <ul class="nav navbar-nav float-right">
                        
                        <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i class="ficon feather icon-maximize"></i></a></li>
                        <li class="nav-item nav-search"><a class="nav-link nav-link-search"><i class="ficon feather icon-search"></i></a>
                            <div class="search-input">
                                <div class="search-input-icon"><i class="feather icon-search primary"></i></div>
                                <input class="input" type="text" placeholder="Explore Vuexy..." tabindex="-1" data-search="template-list">
                                <div class="search-input-close"><i class="feather icon-x"></i></div>
                                <ul class="search-list search-list-main"></ul>
                            </div>
                        </li>
                        
                        <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon feather icon-bell"></i><span class="badge badge-pill badge-primary badge-up"><?php echo e($notificationsCount ?? 0); ?></span></a>
                            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                <li class="dropdown-menu-header">
                                    <div class="dropdown-header m-0 p-2">
                                        <h3 class="white"><?php echo e($notificationsCount ?? 0); ?> غير مؤكد</h3><span class="notification-title">طلبات جديدة</span>
                                    </div>
                                </li>
                                <li class="scrollable-container media-list">
                                <?php $__empty_1 = true; $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <a class="d-flex justify-content-between" href="<?php echo e(route('Orders')); ?>">
                                        <div class="media d-flex align-items-start">
                                            <div class="media-left"><i class="feather icon-shopping-cart font-medium-5 primary"></i></div>
                                            <div class="media-body">
                                                <h6 class="primary media-heading">طلب جديد #<?php echo e($order->order_number); ?></h6>
                                                <small class="notification-text"> القيمة: <?php echo e($order->total); ?> ج.م</small>
                                            </div><small>
                                                <time class="media-meta" datetime="<?php echo e($order->created_at); ?>"><?php echo e($order->created_at->diffForHumans()); ?></time></small>
                                        </div>
                                    </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <div class="p-2 text-center">لا توجد إشعارات جديدة</div>
                                <?php endif; ?>
                                </li>
                                <li class="dropdown-menu-footer"><a class="dropdown-item p-1 text-center" href="<?php echo e(route('Orders')); ?>">عرض كل الطلبات</a></li>
                            </ul>
                        </li>
                        <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <div class="user-nav d-sm-flex d-none"><span class="user-name text-bold-600"><?php echo e(Auth::user()->name); ?></span><span class="user-status">Available</span></div><span><img class="round" src="<?php echo e(asset('admin/images/portrait/small/avatar-s-11.jpg')); ?>" alt="avatar" height="40" width="40"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="/"><i class="feather icon-refresh-cw"></i> Vistit Store </a>

                                <div class="dropdown-divider"></div>

                                <form method="POST" class="dropdown-item" action="<?php echo e(route('logout')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <button class="btn bg-transparent border-0 p0"  type="submit"><i class="feather icon-power"></i> Logout</button>
                                </form>


                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
<?php /**PATH C:\Users\Papion\Documents\GitHub\LunaBluStoreF\resources\views/admin/layout/navbar.blade.php ENDPATH**/ ?>