<!DOCTYPE html>
<html lang="en">

<head> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Primary Meta Tags -->
<title>@yield('title')</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Favicon -->
<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('template/assets/img/favicon/apple-touch-icon.png') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('template/assets/img/favicon/favicon-32x32.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('template/assets/img/favicon/favicon-16x16.png') }}">
<link rel="manifest" href="{{ asset('template/assets/img/favicon/site.webmanifest') }}">
<link rel="mask-icon" href="{{ asset('template/assets/img/favicon/safari-pinned-tab.svg') }}" color="#ffffff">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="theme-color" content="#ffffff">

<!-- Sweet Alert -->
<link type="text/css" href="{{ asset('template/vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">

<!-- Notyf -->
<link type="text/css" href="{{ asset('template/vendor/notyf/notyf.min.css') }}" rel="stylesheet">

<!-- Volt CSS -->
<link type="text/css" href="{{ asset('template/css/volt.css') }}" rel="stylesheet">

</head>

<body>

    <!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->
    

    <main>

        <!-- Section -->
        <section class="vh-lg-100 mt-5 mt-lg-0 bg-soft d-flex align-items-center">
            <div class="container">
                <div class="row justify-content-center form-bg-image" data-background-lg="{{url('/template/assets/img/illustrations/signin.svg')}}">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-100 fmxw-500">
                            <div class="text-center text-md-center mb-4 mt-md-0">
                                <h1 class="mb-0 h3">@yield('title-form')</h1>
                            </div>

														@yield('content-form')

                        </div>
                    </div>
                </div>
            </div>
        </section>
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

    
</body>

</html>