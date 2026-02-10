	<!-- Footer -->
	<footer class="bg3 p-t-75 p-b-32">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-lg-3 p-b-50">
					<h2 class="h4 stext-301 cl0 p-b-30">
						الاقسام
					</h2>

					<ul>
					<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<li class="p-b-10">
							<a href="<?php echo e(route('product')); ?>?category=<?php echo e($category->id); ?>" class="stext-107 cl7 hov-cl1 trans-04">
								<?php echo e($category->name); ?>

							</a>
						</li>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</ul>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h2 class="h4 stext-301 cl0 p-b-30">
						تواصل معنا
					</h2>

					<ul>
						<li class="p-b-10">
							<a href="https://web.telegram.org/a/#-1003031440172"  aria-label="Visit our instragram page" class="stext-107 cl7 hov-cl1 trans-04">
								Telgram
							</a>
						</li>

						<li class="p-b-10">
							<a href="https://www.facebook.com/profile.php?id=61583415522354" aria-label="Visit our Facebook page" class="stext-107 cl7 hov-cl1 trans-04">
								FaceBook
							</a>
						</li>

						<li class="p-b-10">
							<a href="https://wa.me/201554063260 " aria-label="Visit our WhatsApp" class="stext-107 cl7 hov-cl1 trans-04">
								WhatsApp
							</a>
						</li>

						<li class="p-b-10">
							<a href="https://www.instagram.com/luna.blustore?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" aria-label="Visit our Instagram page" class="stext-107 cl7 hov-cl1 trans-04">
								Instagram
							</a>
						</li>


					</ul>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h2 class="h4 stext-301 cl0 p-b-30">
						اذا كان لديك مشكله
					</h2>

					<p class="stext-107 cl7 size-201">
						تواصل معنا علي 201554063260 
					</p>

					<div class="p-t-27">
						<a href="https://www.facebook.com/profile.php?id=61583415522354" aria-label="Visit our Facebook page" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="https://www.instagram.com/luna.blustore/" aria-label="Visit our Instagram page" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-instagram"></i>
						</a>

						<a href="https://wa.me/201554063260 " aria-label="Visit our WhatsApp" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-whatsapp"></i>
						</a>
					</div>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h2 class="h4 stext-301 cl0 p-b-30">
						اترك لنا رساله
					</h2>

					<form action="<?php echo e(route('message.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
						<div class="wrap-input1 w-full p-b-4">
							<input class="input1 bg-none plh1 stext-107 cl7" type="text" name="masseage" placeholder="اترك لنا رساله " required>
							<div class="focus-input1 trans-04"></div>
						</div>

						<div class="p-t-18">
							<button type="submit" class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
								ارسال
							</button>
						</div>
					</form>
				</div>
			</div>



				<p class="stext-107 cl6 txt-center">
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by LunaBlu|لونا بلو &amp; devolped by <a href="https://wa.me/201033441143"target="_blank" rel="noopener noreferrer"
>Mohamed Mahrous</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

				</p>
			</div>
		</div>
	</footer>


	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

<?php /**PATH C:\Users\Papion\Documents\GitHub\LunaBluStoreF\resources\views/store/layouts/footer.blade.php ENDPATH**/ ?>