    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="<?php echo e(route('dashboard')); ?>">
                        <div class="brand-logo"></div>
                        <h2 class="brand-text mb-0">LunaBlu|لونا بلو</h2>
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" nav-item <?php echo e(request()->routeIs('dashboard') ? 'active' : ''); ?>"><a href="<?php echo e(route('dashboard')); ?>"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">LunaBlu|لونا بلو</span> <?php if($ordersCount > 0 ): ?> <span class="badge badge badge-primary badge-pill float-right mr-2"><?php echo e($ordersCount); ?></span> <?php endif; ?></a>
                    <ul class="menu-content">

                        <li class="<?php echo e(request()->routeIs('dashboard') ? 'active' : ''); ?>"><a href="<?php echo e(route('dashboard')); ?>"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="eCommerce">الرئيسية</span></a>
                        </li>
                    </ul>
                </li>
                </li>
                <li class=" nav-item <?php echo e(request()->routeIs('productList') ? 'active' : ''); ?>"><a href="<?php echo e(route('productList')); ?>"><i class="feather icon-layout"></i><span class="menu-title" data-i18n="product">المنتجات</span></a>
                </li>

                <li class=" nav-item <?php echo e(request()->routeIs('Orders') ? 'active' : ''); ?>"><a href="<?php echo e(route('Orders')); ?>"><i class="feather icon-zap"></i><span class="menu-title" data-i18n="visit">الطلبات</span> <?php if($ordersCount > 0 ): ?> <span class="badge badge badge-primary badge-pill float-right mr-2"><?php echo e($ordersCount); ?></span> <?php endif; ?></a>
                </li>

                <li class=" nav-item <?php echo e(request()->routeIs('Categorylist') ? 'active' : ''); ?>"><a href="<?php echo e(route('Categorylist')); ?>"><i class="feather icon-link-2"></i><span class="menu-title" data-i18n="Chat">الاقسام</span></a>
                </li>
                <li class=" nav-item <?php echo e(request()->routeIs('admin.reviews.index') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.reviews.index')); ?>"><i class="feather icon-star"></i><span class="menu-title" data-i18n="Reviews">التعليقات</span> <?php if($reviewsCount > 0 ): ?> <span class="badge badge badge-primary badge-pill float-right mr-2"><?php echo e($reviewsCount); ?></span> <?php endif; ?></a>
                </li>
                <li class=" nav-item <?php echo e(request()->routeIs('admin.messages.index') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.messages.index')); ?>"><i class="feather icon-mail"></i><span class="menu-title" data-i18n="Messages">الرسائل</span></a>
                </li>
                <li class=" nav-item <?php echo e(request()->routeIs('shaping_coast') ? 'active' : ''); ?>"><a href="<?php echo e(route('shaping_coast')); ?>"><i class="feather icon-credit-card"></i><span class="menu-title" data-i18n="Todo">رسوم الشحن</span></a>
                </li>
                <li class=" nav-item <?php echo e(request()->routeIs('fabricList') ? 'active' : ''); ?>"><a href="<?php echo e(route('fabricList')); ?>"><i class="feather icon-check-square"></i><span class="menu-title" data-i18n="Todo">انواع القماش</span></a>
                </li>
                <li class=" nav-item <?php echo e(request()->routeIs('setting') ? 'active' : ''); ?>"><a href="<?php echo e(route('setting')); ?>"><i class="feather icon-settings"></i><span class="menu-title" data-i18n="Settings">اعدادات الموقع</span></a>
                </li>
                <li class=" nav-item <?php echo e(request()->routeIs('visitorsList') ? 'active' : ''); ?>"><a href="<?php echo e(route('visitorsList')); ?>"><i class="feather icon-activity"></i><span class="menu-title" data-i18n="visit">الزوار</span></a>
                </li>
                <li class=" nav-item <?php echo e(request()->routeIs('visitorsActivities') ? 'active' : ''); ?>"><a href="<?php echo e(route('visitorsActivities')); ?>"><i class="feather icon-activity"></i><span class="menu-title" data-i18n="Settings">نشاط الزوار </span></a>
                </li>
                <li class=" nav-item <?php echo e(request()->routeIs('admin.errors.index') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.errors.index')); ?>"><i class="feather icon-alert-circle"></i><span class="menu-title" data-i18n="Errors">تقارير الأخطاء</span></a>
                </li>

            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->
<?php /**PATH C:\Users\Papion\Documents\GitHub\LunaBluStoreF\resources\views/admin/layout/aside.blade.php ENDPATH**/ ?>