<!doctype html>
<html lang="ar">
<head>
    <!-- Head -->
    <?php echo $__env->make('store.layouts.meta', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    
    <?php echo $__env->make('store.layouts.settings', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->yieldContent('head'); ?>

</head>


<body class="animsition">
  <main id="main-content">
    <div id="page-loader" aria-hidden="true">
        <span class="spinner"></span>
    </div>


    <?php echo $__env->make('store.layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('store.layouts.aside', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('store.layouts.cart', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>


    <?php echo $__env->yieldContent('content'); ?>


    <?php echo $__env->make('store.layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('store.layouts.scripts', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('store.layouts.cartScript', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    
    <?php echo $__env->yieldContent('script'); ?>
  </main>
</body>

</html>
<?php /**PATH C:\Users\Papion\Documents\GitHub\LunaBluStoreF\resources\views/store/layouts/master.blade.php ENDPATH**/ ?>