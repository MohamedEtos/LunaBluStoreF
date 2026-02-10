
<!--===============================================================================================-->
	<script src="{{ asset('store/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
<!--===============================================================================================-->
	<script src="{{ asset('store/vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('store/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('store/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('store/vendor/daterangepicker/moment.min.js') }}"></script>
	<script src="{{ asset('store/vendor/daterangepicker/daterangepicker.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('store/vendor/slick/slick.min.js') }}"></script>
	<script src="{{ asset('store/js/slick-custom.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('store/vendor/parallax100/parallax100.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('store/vendor/MagnificPopup/jquery.magnific-popup.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('store/vendor/isotope/isotope.pkgd.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('store/vendor/sweetalert/sweetalert.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('store/vendor/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('store/js/main.js') }}"></script>

<!--===============================================================================================-->
	{{-- Expose Laravel data to JavaScript --}}
	<script>
		window.App = {
			csrfToken: '{{ csrf_token() }}',
			routes: {
				storeVisitorActivity: '{{ route("storeVisitorActivity") }}',
				cartAdd: '{{ route("cart.add") }}'
			}
		};

		// Flash Messages
		@if(Session::has('success'))
			window.App.flashSuccess = '{{ session('success') }}';
		@endif

		@if(Session::has('error'))
			window.App.flashError = '{{ session('error') }}';
		@endif
	</script>

	{{-- Vite JS Bundle --}}
	@vite(['resources/js/index.js'])


