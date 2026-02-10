@extends('store.layouts.master')

@section('head')
    <!-- ===== PRELOAD LCP IMAGES ===== -->
    @if($setting)
    <link rel="preload" as="image" href="{{ asset($setting->slider1_image) }}" type="image/avif" fetchpriority="high">
    <link rel="preload" as="image" href="{{ asset($setting->slider2_image) }}" type="image/avif" fetchpriority="high">
    <link rel="preload" as="image" href="{{ asset($setting->slider3_image) }}" type="image/avif" fetchpriority="high">
    @endif
@endsection
@section('content')

	<!-- Slider -->
	<section class="section-slide">
		<div class="wrap-slick1 rs2-slick1">
			<div class="slick1">

                @for($i = 1; $i <= 3; $i++)
				<div class="item-slick1 bg-overlay1" style="background-image: url('{{ asset($setting->{'slider'.$i.'_image'}) }}');" role="img"
  aria-label="{{ $setting->{'slider'.$i.'_title'} }}" data-thumb="{{ asset($setting->{'slider'.$i.'_thumb'}) }}" data-caption="{{ $setting->{'slider'.$i.'_title'} }}">
					<div class="container h-full">
						<div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
								<span class="ltext-202 txt-center cl0 respon2 alt_{{ $i }}">
                                    {{ $setting->{'slider'.$i.'_title'} }}
								</span>
							</div>

							<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
								<h1 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
									{{ $setting->{'slider'.$i.'_caption'} }}
                                </h1>
							</div>

							<div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
								<a href="{{ $setting->{'slider'.$i.'_link'} }}" class="flex-c-m  stext-101 bbc cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04">
									{{ $setting->{'slider'.$i.'_btn_text'} }}
								</a>
							</div>
						</div>
					</div>
				</div>
                @endfor

			</div>

			<div class="wrap-slick1-dots p-lr-10"></div>
		</div>
	</section>


	<!-- Banner -->
	<div class="sec-banner bg0 p-t-95 p-b-55">
		<div class="container">
			<div class="row">

                @for($i = 1; $i <= 2; $i++)
				<div class="col-md-6 p-b-30 m-lr-auto">
					<!-- Block1 -->
					<div class="block1 wrap-pic-w">
						<img src="{{ asset($setting->{'banner'.$i.'_image'}) }}" alt="IMG-BANNER" width="570" height="370" loading="lazy">

						<a href="{{ $setting->{'banner'.$i.'_link'} }}" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
									{{ $setting->{'banner'.$i.'_title'} }}
								</span>

								<span class="block1-info stext-102 trans-04">
									{{ $setting->{'banner'.$i.'_info'} }}
								</span>
							</div>

							<div class="block1-txt-child2 p-b-4 trans-05">
								<div class="block1-link stext-101 cl0 trans-09">
									اكتشف الان
								</div>
							</div>
						</a>
					</div>
				</div>
                @endfor

                @for($i = 3; $i <= 5; $i++)
				<div class="col-md-6 col-lg-4 p-b-30 m-lr-auto">
					<!-- Block1 -->
					<div class="block1 wrap-pic-w">
						<img src="{{ asset($setting->{'banner'.$i.'_image'}) }}" alt="IMG-BANNER" width="370" height="240" loading="lazy">

						<a href="{{ $setting->{'banner'.$i.'_link'} }}" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
									{{ $setting->{'banner'.$i.'_title'} }}
								</span>

								<span class="block1-info stext-102 trans-04">
									{{ $setting->{'banner'.$i.'_info'} }}
								</span>
							</div>

							<div class="block1-txt-child2 p-b-4 trans-05">
								<div class="block1-link stext-101 cl0 trans-09">
									اكتشف الان
								</div>
							</div>
						</a>
					</div>
				</div>
                @endfor

			</div>
		</div>
	</div>


	<!-- Product -->
	<section class="bg0 p-t-23 p-b-130 arabic_section">
		<div class="container">
			<div class="p-b-10">
				<h3 class="ltext-103 cl5">
				{{ $setting->home_section_title ?? 'اكتشفي جمال التفاصيل...' }}
				</h3>
			</div>

			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
						مجموعتنا
					</button>

                    @foreach ($fabrics as $fabric )
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".{{ $fabric->name }}">
						{{ $fabric->name }}
					</button>
                    @endforeach

				</div>

				<div class="flex-w flex-c-m m-tb-10">
					<div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
						<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
						<i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						 Filter
					</div>

					<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
						<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
						<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Search
					</div>
				</div>

				<!-- Search product -->
				<div class="dis-none panel-search w-full p-t-10 p-b-15">
					<div class="bor8 dis-flex p-l-15">
						<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
							<i class="zmdi zmdi-search"></i>
						</button>

                        <form method="GET" action="{{ route('home') }}" class="mb-4 w-100">
                            <input
                                type="text"
                                name="search"
                                value="{{ request('search') }}"
                                placeholder="ابحث عن منتج..."
                                class="mtext-107 cl2 size-114 plh2 p-r-15"
                            >
                        </form>

						{{-- <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search"> --}}
					</div>
				</div>

				<!-- Filter -->
				<div class="dis-none panel-filter w-full p-t-10">
					<div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
						<div class="filter-col1 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Sort By
							</div>

							<ul>
								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Default
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Popularity
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Average rating
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
										Newness
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Price: Low to High
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Price: High to Low
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col2 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Price
							</div>

							<ul>
								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
										All
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$0.00 - $50.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$50.00 - $100.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$100.00 - $150.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$150.00 - $200.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$200.00+
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col3 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Color
							</div>

							<ul>
								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #222;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Black
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #4272d7;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
										Blue
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #b3b3b3;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Grey
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #00ad5f;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Green
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #fa4251;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Red
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #aaa;">
										<i class="zmdi zmdi-circle-o"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										White
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col4 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Tags
							</div>

							<div class="flex-w p-t-4 m-r--5">
								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Fashion
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Lifestyle
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Denim
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Streetstyle
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Crafts
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row  isotope-grid" id="products-wrapper">
                @include('store.parts.product_loop')
			</div>

			{{-- <!-- Pagination -->
			<div class="flex-c-m flex-w w-full p-t-38">
				<a href="#" class="flex-c-m how-pagination1 trans-04 m-all-7 active-pagination1">
					1
				</a>

				<a href="#" class="flex-c-m how-pagination1 trans-04 m-all-7">
					2
				</a>

            </div> --}}

			<!-- Load more (Hidden / Replaced by Infinite Scroll) -->
            <div id="loading" style="display:none; text-align:center; padding-top: 20px;">
                <!-- Optional: Add a spinner here if desired, otherwise the skeleton serves as loading indicator -->
            </div>
        </div>
	</section>

@endsection

@section('head')
{{-- Order Celebration Script --}}
@if(request()->has('order_success'))
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.3/dist/confetti.browser.min.js"></script>
<script>
    window.addEventListener('DOMContentLoaded', function() {
        function celebrateOrder() {
            confetti({ particleCount: 140, spread: 70, origin: { y: 0.6 } });
            setTimeout(() => confetti({ particleCount: 100, spread: 120, origin: { y: 0.7 } }), 250);
        }
        celebrateOrder();
    });
</script>
@endif
@endsection

