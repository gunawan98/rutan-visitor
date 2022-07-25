<!DOCTYPE html>
<html lang="en">

<head> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Primary Meta Tags -->
<title>@yield('title')</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Favicon -->
<link rel="apple-touch-icon" sizes="120x120" href="{{asset('template/assets/img/favicon/apple-touch-icon.png') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{asset('template/assets/img/favicon/favicon-32x32.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{asset('template/assets/img/favicon/favicon-16x16.png') }}">
<link rel="manifest" href="{{asset('template/assets/img/favicon/site.webmanifest') }}">
<link rel="mask-icon" href="{{asset('template/assets/img/favicon/safari-pinned-tab.svg') }}" color="#ffffff">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="theme-color" content="#ffffff">

<!-- Sweet Alert -->
<link type="text/css" href="{{ asset('template/vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">

<!-- Notyf -->
<link type="text/css" href="{{ asset('template/vendor/notyf/notyf.min.css') }}" rel="stylesheet">

<!-- Volt CSS -->
<link type="text/css" href="{{ asset('template/css/volt.css') }}" rel="stylesheet">

@stack('on-head')

</head>

<body>        

@include('officer.layout.side-bar')
    
<main class="content">

	@include('officer.layout.top-bar')

	@yield('content')

	<footer class="bg-white rounded shadow p-5 mb-4 mt-4">
			<div class="row">
					<div class="col-12 col-md-4 col-xl-6 mb-4 mb-md-0">
							<p class="mb-0 text-center text-lg-start">©<span class="current-year"></span> <a class="text-primary fw-normal" href="#">RUTAN Kraksaan</a></p>
					</div>
					<div class="col-12 col-md-8 col-xl-6 text-center text-lg-start">
							<!-- List -->
							<ul class="list-inline list-group-flush list-group-borderless text-md-end mb-0">
									<li class="list-inline-item px-0 px-sm-2">
											<a href="#">Website</a>
									</li>
									<li class="list-inline-item px-0 px-sm-2">
											<a href="#">Email</a>
									</li>
							</ul>
					</div>
			</div>
	</footer>
</main>

<!-- Core -->
<script src="{{ asset('template/vendor/@popperjs/core/dist/umd/popper.min.js') }}"></script>
<script src="{{ asset('template/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>

<!-- Vendor JS -->
<script src="{{ asset('template/vendor/onscreen/dist/on-screen.umd.min.js') }}"></script>

<!-- Slider -->
<script src="{{ asset('template/vendor/nouislider/distribute/nouislider.min.js') }}"></script>

<!-- Smooth scroll -->
<script src="{{ asset('template/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js') }}"></script>

<!-- Charts -->
<script src="{{ asset('template/vendor/chartist/dist/chartist.min.js') }}"></script>
<script src="{{ asset('template/vendor/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') }}"></script>

<!-- Datepicker -->
<script src="{{ asset('template/vendor/vanillajs-datepicker/dist/js/datepicker.min.js') }}"></script>

<!-- Sweet Alerts 2 -->
<script src="{{ asset('template/vendor/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>

<!-- Moment JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>

<!-- Vanilla JS Datepicker -->
<script src="{{ asset('template/vendor/vanillajs-datepicker/dist/js/datepicker.min.js') }}"></script>

<!-- Notyf -->
<script src="{{ asset('template/vendor/notyf/notyf.min.js') }}"></script>

<!-- Simplebar -->
<script src="{{ asset('template/vendor/simplebar/dist/simplebar.min.js') }}"></script>

<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

<!-- Volt JS -->
<script src="{{ asset('template/assets/js/volt.js') }}"></script>

<script>
	const swalWithBootstrapButtons = Swal.mixin({
			customClass: {
					confirmButton: 'btn btn-primary',
					cancelButton: 'btn btn-gray'
			},
			buttonsStyling: false
	});
</script>

@stack('after-script')

</body>

</html>