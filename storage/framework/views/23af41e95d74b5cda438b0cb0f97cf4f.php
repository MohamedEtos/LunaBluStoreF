
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">

<head>
<?php echo $__env->make('admin.layout.head', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php echo $__env->yieldContent('css'); ?>

    
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/vendors/css/extensions/toastr.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/css-rtl/plugins/extensions/toastr.css')); ?>">
</head>
<body class="vertical-layout vertical-menu-modern 1-column  navbar-floating footer-static bg-full-screen-image  blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">

    
    


    <?php echo $__env->yieldContent('content'); ?>


    <?php echo $__env->make('admin.layout.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php echo $__env->yieldContent('script'); ?>

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
<?php /**PATH C:\Users\Papion\Documents\GitHub\LunaBluStoreF\resources\views/admin/layout/noauth.blade.php ENDPATH**/ ?>