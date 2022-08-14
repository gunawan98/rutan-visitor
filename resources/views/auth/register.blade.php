<!DOCTYPE html>
<html lang="en">

<head> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Primary Meta Tags -->
<title>Register</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Favicon -->
<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('template/assets/img/Logo_lapas.png') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('template/assets/img/Logo_lapas.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('template/assets/img/Logo_lapas.png') }}">
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

    <main class="pt-5">

			<section class="mt-10 mt-lg-0 bg-soft d-flex align-items-center">
				<div class="container">
					<div class="row">
							<div class="col-12">
								<div class="text-center text-md-center mb-4 mt-md-0">
                  <h1 class="mb-0 h3">Registrasi Akun Anda</h1>
								</div>
							</div>
							<div class="col-12 mb-8">
									<div class="card border-0 shadow components-section">
											<div class="card-body">   
												<form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
													@csrf
													<div class="row mb-4">
														
															<div class="col-lg-6 col-sm-6">
																	<div class="mb-3">
																		<label for="username">Username</label>
																		<div class="input-group">
																				<span class="input-group-text" id="basic-addon1">
																					<svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
																				</span>
																				<input type="text" class="form-control" name="username" value="{{ old('username') }}" autofocus required>
																				@error('username')
																					<div class="invalid-feedback">{{ $message }}</div>
																				@enderror
																		</div> 
																	</div>

																	<div class="mb-3">
																		<label for="password">Password</label>
																			<div class="input-group">
																					<span class="input-group-text" id="basic-addon2">
																							<svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path></svg>
																					</span>
																					<input type="password" class="form-control" name="password" value="{{ old('password') }}" required>
																					@error('password')
																						<div class="invalid-feedback">{{ $message }}</div>
																					@enderror
																			</div>  
																	</div>

																	<div class="mb-3">
																		<label for="nik">Nomor NIK</label>
																		<div class="input-group">
																				<span class="input-group-text" id="basic-addon1">
																					<svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a1 1 0 00-1 1v1a1 1 0 002 0V3a1 1 0 00-1-1zM4 4h3a3 3 0 006 0h3a2 2 0 012 2v9a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2zm2.5 7a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm2.45 4a2.5 2.5 0 10-4.9 0h4.9zM12 9a1 1 0 100 2h3a1 1 0 100-2h-3zm-1 4a1 1 0 011-1h2a1 1 0 110 2h-2a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
																				</span>
																				<input type="text" class="form-control" name="nik" value="{{ old('nik') }}" autofocus required>
																				@error('nik')
																					<div class="invalid-feedback">{{ $message }}</div>
																				@enderror
																		</div> 
																	</div>

																	<div class="mb-3">
																		<label for="nama_pengunjung">Nama</label>
																		<div class="input-group">
																				<span class="input-group-text" id="basic-addon1">
																					<svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
																				</span>
																				<input type="text" class="form-control" name="nama_pengunjung" value="{{ old('nama_pengunjung') }}" autofocus required>
																				@error('nama_pengunjung')
																					<div class="invalid-feedback">{{ $message }}</div>
																				@enderror
																		</div> 
																	</div>

																	<div class="mb-3 @error('jenis_kelamin') text-danger @enderror">
																			<label for="jenis_kelamin">Jenis Kelamin</label>
																			<br>
																			<div class="form-check form-check-inline">
																					<input type="radio" class="form-check-input" name="jenis_kelamin" id="laki-laki" value="laki-laki" {{ old('jenis_kelamin') == 'laki-laki' ? 'checked' : '' }}>
																					<label class="form-check-label" for="laki-laki">Laki-laki</label>
																			</div>
																			<div class="form-check form-check-inline ms-3">
																					<input type="radio" class="form-check-input" name="jenis_kelamin" id="perempuan" value="perempuan" {{ old('jenis_kelamin') == 'perempuan' ? 'checked' : '' }}>
																					<label class="form-check-label" for="perempuan">Perempuan</label>
																			</div>
																			@error('jenis_kelamin')
																			<div class="invalid-feedback">{{ $message }}</div>
																			@enderror
																	</div>

																	<div class="mb-3">
																			<label for="no_telepon">No. Telephone</label>
																			<div class="input-group">
																					<span class="input-group-text" id="basic-addon1">
																							<svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>  
																					</span>
																					<input type="text" class="form-control @error('no_telepon') is-invalid @enderror" name="no_telepon" value="{{ old('no_telepon') }}" aria-label="no_telepon">
																					@error('no_telepon')
																					<div class="invalid-feedback">{{ $message }}</div>
																					@enderror
																			</div>
																	</div>

																	<div class="mb-3">
																			<label for="alamat">Alamat</label>
																			<textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" rows="4">{{ old('alamat') }}</textarea>
																			@error('alamat')
																			<div class="invalid-feedback">{{ $message }}</div>
																			@enderror
																	</div>

															</div>

															<div class="col-lg-6 col-sm-6">
																<div class="row">
																		<div class="col-12 mb-4">
																			<div class="card card-body border-0 shadow mb-4">
																					<div class="mb-3">
																						<label for="id_jenis_warga_rutan">Warga Rutan</label>
																						<select class="form-select" name="id_warga_rutan" id="select-warga">
																							<option value="">Cari warga rutan</option>
																							@foreach ($warga_rutan as $warga)
																								<option value="{{$warga->id_warga_rutan}}">{{$warga->nama_warga_rutan}}</option>
																							@endforeach
																						</select>
																						@error('id_jenis_warga_rutan')
																						<div class="invalid-feedback">{{ $message }}</div>
																						@enderror
																					</div>

																					<div class="mb-3">
																							<label for="status_keluarga">Hubungan Keluarga</label>
																							<div class="input-group">
																									<input type="text" class="form-control @error('status_keluarga') is-invalid @enderror" name="status_keluarga" value="{{ old('status_keluarga') }}" aria-label="status_keluarga">
																									@error('status_keluarga')
																									<div class="invalid-feedback">{{ $message }}</div>
																									@enderror
																							</div>
																					</div>
																				</div>

																				<div class="row pb-2 pt-2 g-0" style="border-top: 1px dashed gray;">
																					<div class="col-sm-6 col-md-4 fw-bolder">Nomor NIK</div>
																					<div class="col-6 col-md-8">: <span id="nik-kriminal"></span></div>
																				</div>
																				<div class="row pb-2 g-0">
																					<div class="col-sm-6 col-md-4 fw-bolder">Nama</div>
																					<div class="col-6 col-md-8">: <span id="nama-kriminal"></span></div>
																				</div>
																				<div class="row pb-2 g-0">
																					<div class="col-sm-6 col-md-4 fw-bolder">Jenis Kelamin</div>
																					<div class="col-6 col-md-8">: <span id="jenkel-kriminal"></span></div>
																				</div>
																				<div class="row pb-2 g-0">
																					<div class="col-sm-6 col-md-4 fw-bolder">Alamat</div>
																					<div class="col-6 col-md-8">: <span id="alamat-kriminal"></span></div>
																				</div>
																				<div class="row pb-2 g-0">
																					<div class="col-sm-6 col-md-4 fw-bolder">Tipe Kriminal</div>
																					<div class="col-6 col-md-8">: <span id="tipe-kriminal"></span></div>
																				</div>
																				<div class="row pb-2 g-0">
																					<div class="col-sm-6 col-md-4 fw-bolder">Kasus</div>
																					<div class="col-6 col-md-8">: <span id="kasus-kriminal"></span></div>
																				</div>
																			</div>
																		</div>
																		<div class="col-12">
																				<div class="card card-body border-0 shadow mb-4">
																						<h2 class="h5">Upload Kelengkapan Syarat</h2> 
																						<input class="form-control @error('file_syarat') is-invalid @enderror" type="file" id="file_syarat" name="file_syarat">
																						<br>
																						@error('file_syarat')
																						<div class="invalid-feedback">{{ $message }}</div>
																						@enderror
																						
																				</div>
																		</div>
																</div>
															</div>
													</div>
													<div class="row justify-content-md-center">
														<div class="mb-3 col-6 d-grid">
																<button type="submit" class="btn btn-sm btn-secondary align-items-center">
																	<svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
																	Daftar
																</button>
																<div class="d-flex justify-content-center align-items-center mt-4">
																		<span class="fw-normal">
																				Sudah memiliki akun?
																				<a href="{{ route('login') }}" class="fw-bold">Link login.</a>
																		</span>
																</div>
														</div>
													</div>
												</form>
											</div>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
	$(document).ready(function () {
		
		$('#select-warga').change(function () {
			var id_criminal = document.getElementById('select-warga').value;
			let url = `{{ route('kunjungan.filter.kriminal', ":id") }}`;
			url = url.replace(':id', id_criminal);
			
			$.ajax({
				type: 'get',
				url: url,
				success: function (data) {
					console.log(data);
					document.getElementById("nik-kriminal").innerHTML = data.nik;
					document.getElementById("nama-kriminal").innerHTML = data.nama_warga_rutan;
					document.getElementById("jenkel-kriminal").innerHTML = data.jenis_kelamin;
					document.getElementById("alamat-kriminal").innerHTML = data.alamat;
					document.getElementById("tipe-kriminal").innerHTML = data.jenis_warga_rutan.nama_jenis;
					document.getElementById("kasus-kriminal").innerHTML = data.kasus;
				}
			});
				
		});

	});
</script>

</body>

</html>