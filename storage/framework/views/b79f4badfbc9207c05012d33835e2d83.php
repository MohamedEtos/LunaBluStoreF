
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title><?php echo e($title ?? 'Lubablu'); ?></title>
<meta name="description" content="<?php echo e($description ?? 'متجر لونا بلو للملابس'); ?>">
<meta name="theme-color" content="#ffffff">



<link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset($setting->favicon)); ?>">
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo e(asset('store/images/icons/apple-touch-icon.png')); ?>">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset('store/images/icons/favicon-32x32.png')); ?>">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('store/images/icons/favicon-48x48.png')); ?>">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('store/images/icons/favicon-16x16.png')); ?>">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('store/images/icons/favicon-48x48.png')); ?>">
<link rel="manifest" href="<?php echo e(asset('store/images/icons/site.webmanifest')); ?>">

<!-- Open Graph -->
<meta property="og:title" content="<?php echo e($title ?? 'LunaBlu|لونا بلو'); ?>">
<meta property="og:description" content="<?php echo e($description ?? 'متجر لونا بلو للملابس'); ?>">
<meta property="og:image" content="<?php echo e(!empty($image) ? (str_starts_with($image, 'http') ? $image : asset($image)) : asset('store/images/icons/logo-02.png')); ?>">
<meta property="og:url" content="<?php echo e($url ?? url()->current()); ?>">
<meta property="og:type" content="website">

<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?php echo e($title ?? 'LunaBlu|لونا بلو'); ?>">
<meta name="twitter:description" content="<?php echo e($description ?? 'متجر لونا بلو للملابس'); ?>">
<meta name="twitter:image" content="<?php echo e(!empty($image) ? (str_starts_with($image, 'http') ? $image : asset($image)) : asset('store/images/icons/logo-02.png')); ?>">


<!-- Facebook -->


<meta property="fb:app_id" content="1882574705681621">


<div id="fb-root"></div>
<script async defer crossorigin="anonymous"
  src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v19.0&appId=1882574705681621">
</script>







<link rel="canonical" href="<?php echo e($url ?? ''); ?>">






<meta name="msvalidate.01" content="7250B913D4CB255075A09A239EE816C1" />

<meta name="yandex-verification" content="c9c7a3de33a4aae9" />

<meta name="robots" content="index, follow">
<meta name="googlebot" content="noai, noimageai">
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-RPZ3P2T6KM"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-RPZ3P2T6KM');
</script>






<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">


<?php /**PATH C:\Users\Papion\Documents\GitHub\LunaBluStoreF\resources\views/store/layouts/meta.blade.php ENDPATH**/ ?>