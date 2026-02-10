
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">

<head>
<?php echo $__env->make('admin.layout.head', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php echo $__env->yieldContent('css'); ?>

    
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/vendors/css/extensions/toastr.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/css-rtl/plugins/extensions/toastr.css')); ?>">
    <link href="https://fonts.googleapis.com/css?family=Alexandria:300,400,500,600" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Alexandria:wght@100..900&display=swap" rel="stylesheet">

     <style>
    @font-face {
        font-family: 'Alexandria';
        src: url('<?php echo e(asset('store/fonts/Alexandria/alexandria-v6-latin-regular.woff2')); ?>') format('woff2'),
             url('<?php echo e(asset('store/fonts/Alexandria/Alexandria-VariableFont_wght.ttf')); ?>') format('truetype');
        font-weight: 400;
        font-style: normal;
        font-display: swap;
    }
    
    body, h1, h2, h3, h4, h5, h6, p, span, a, li, button, input, textarea, select, .navigation, * {
        font-family: 'Alexandria', sans-serif !important;
    }
    </style>
    
</head>
<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    <?php echo $__env->make('admin.layout.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('admin.layout.aside', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>


    <?php echo $__env->yieldContent('content'); ?>


    <?php echo $__env->make('admin.layout.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <!-- BEGIN: Vendor JS-->
    <script src="<?php echo e(asset('admin/vendors/js/vendors.min.js')); ?>"></script>
    <!-- BEGIN Vendor JS-->
    
    <!-- BEGIN: Theme JS-->
    <script src="<?php echo e(asset('admin/js/core/app-menu.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/core/app.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/scripts/components.js')); ?>"></script>
    <!-- END: Theme JS-->

    <?php echo $__env->yieldContent('script'); ?>
    <script src="<?php echo e(asset('admin/js/scripts/notifications.js')); ?>"></script>

        <script src="<?php echo e(asset('admin/vendors/js/extensions/toastr.min.js')); ?>"></script>
    	<?php if(Session::has('success')): ?>
            <script>toastr.success('<?php echo e(session('success')); ?>', 'تمت العمليه ');</script>
         <?php endif; ?>

        <?php if($errors->any()): ?>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <script>
                    toastr.error("<?php echo e($error); ?>", "خطا");
                </script>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>

</body>

</html>
<?php /**PATH C:\Users\Papion\Documents\GitHub\LunaBluStoreF\resources\views/admin/layout/master.blade.php ENDPATH**/ ?>