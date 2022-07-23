<!DOCTYPE html>
<html lang="en">

<head> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Primary Meta Tags -->
<title>@yield('title')</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Favicon -->
<link rel="apple-touch-icon" sizes="120x120" href="../../assets/img/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="../../assets/img/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="../../assets/img/favicon/favicon-16x16.png">
<link rel="manifest" href="../../assets/img/favicon/site.webmanifest">
<link rel="mask-icon" href="../../assets/img/favicon/safari-pinned-tab.svg" color="#ffffff">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="theme-color" content="#ffffff">

<!-- Sweet Alert -->
<link type="text/css" href="{{ asset('template/vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">

<!-- Notyf -->
<link type="text/css" href="{{ asset('template/vendor/notyf/notyf.min.css') }}" rel="stylesheet">

<!-- Volt CSS -->
<link type="text/css" href="{{ asset('template/css/volt.css') }}" rel="stylesheet">

@stack('styles')

</head>

<body>        

<nav class="navbar navbar-expand-lg navbar-transparent navbar-dark navbar-theme-primary mb-4">
    <div class="container position-relative">
        <a class="navbar-brand me-lg-3" href="#">
            <img class="navbar-brand-dark" src="../../assets/brand/light.svg" alt="rutan app">
            <img class="navbar-brand-light" src="../../assets/brand/dark.svg" alt="rutan app">
        </a>
        <div class="navbar-collapse collapse w-100" id="navbar-default-primary">
            <div class="navbar-collapse-header">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="#">
                            <img src="../../assets/img/brand/dark.svg" alt="rutan app">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <i class="fas fa-times" data-toggle="collapse" role="button"
                            data-target="#navbar-default-primary" aria-controls="navbar-default-primary"
                            aria-expanded="false" aria-label="Toggle navigation"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex align-items-center">
				<ul class="navbar-nav align-items-center">
						<li class="nav-item dropdown ms-lg-3">
							<a class="nav-link dropdown-toggle pt-1 px-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								<div class="media d-flex align-items-center">
									<img class="avatar rounded-circle" alt="Image placeholder" src="{{asset('template/assets/img/logo-polri.png')}}">
									<div class="media-body ms-2 text-dark align-items-center d-none d-lg-block">
										<span class="mb-0 font-small fw-bold text-white-900">{{Auth::user()->name}}</span>
									</div>
								</div>
							</a>
							<div class="dropdown-menu dashboard-dropdown dropdown-menu-end mt-2 py-1">
								<a class="dropdown-item d-flex align-items-center" href="#">
									<svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path></svg>
									My Profile
								</a>
								<a class="dropdown-item d-flex align-items-center" href="#">
									<svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path></svg>
									Settings
								</a>
								<a class="dropdown-item d-flex align-items-center" href="#">
									<svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm0 2h10v7h-2l-1 2H8l-1-2H5V5z" clip-rule="evenodd"></path></svg>
									Messages
								</a>
								<a class="dropdown-item d-flex align-items-center" href="#">
									<svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-2 0c0 .993-.241 1.929-.668 2.754l-1.524-1.525a3.997 3.997 0 00.078-2.183l1.562-1.562C15.802 8.249 16 9.1 16 10zm-5.165 3.913l1.58 1.58A5.98 5.98 0 0110 16a5.976 5.976 0 01-2.516-.552l1.562-1.562a4.006 4.006 0 001.789.027zm-4.677-2.796a4.002 4.002 0 01-.041-2.08l-.08.08-1.53-1.533A5.98 5.98 0 004 10c0 .954.223 1.856.619 2.657l1.54-1.54zm1.088-6.45A5.974 5.974 0 0110 4c.954 0 1.856.223 2.657.619l-1.54 1.54a4.002 4.002 0 00-2.346.033L7.246 4.668zM12 10a2 2 0 11-4 0 2 2 0 014 0z" clip-rule="evenodd"></path></svg>
									Support
								</a>
								<div role="separator" class="dropdown-divider my-1"></div>
								<form method="POST" action="{{ route('officer.logout') }}">
									@csrf
									<a class="dropdown-item d-flex align-items-center" href="#" onclick="event.preventDefault(); this.closest('form').submit();">
										<svg class="dropdown-icon text-danger me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
										Logout
									</a>
								</form>
							</div>
						</li>
					</ul>

            <button class="navbar-toggler ms-2" type="button" data-toggle="collapse"
                data-target="#navbar-default-primary" aria-controls="navbar-default-primary"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>
</nav>

<main class="container">

	@yield('content')

</main>

<nav class="navbar navbar-expand navbar-dark bg-primary fixed-bottom" style="height: 50px !important;">
	<ul class="navbar-nav nav-justified w-100 h-30">
		<li class="nav-item">
			<a href="{{route('dashboard.index')}}" class="nav-link {{ (Request::route()->getName() == 'dashboard.index') ? 'text-secondary' : '' }}">
				<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-house-fill mx-auto" viewBox="0 0 16 16">
					<path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
					<path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
				</svg>
			</a>
		</li>
		<li class="nav-item">
			<a href="{{route('kunjungan.index')}}" class="nav-link {{ (Request::route()->getName() == 'kunjungan.index') ? 'text-secondary' : '' }}">
				<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-plus-circle-fill mx-auto" viewBox="0 0 16 16">
					<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
				</svg>
			</a>
		</li>
		<li class="nav-item">
			<a href="{{route('history.index')}}" class="nav-link {{ (Request::route()->getName() == 'history.index') ? 'text-secondary' : '' }}">
				<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-clock-history mx-auto" viewBox="0 0 16 16">
					<path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z"/>
					<path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z"/>
					<path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z"/>
				</svg>
			</a>
		</li>

	</ul>
</nav>

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

@stack('scripts')

    
</body>

</html>