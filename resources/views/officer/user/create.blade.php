@extends('officer.layout.administrator')

@section('title','Admin - Manajemen Data User')

@section('content')

@if(session('status'))
@push('after-script')
<script>
	swalWithBootstrapButtons.fire({
			icon: 'success',
			title: 'Sukses',
			text: 'Akun berhasil ditambahkan.',
			showConfirmButton: true,
	});
</script>
@endpush
@endif

@if ($errors->any())
@push('after-script')
<script>
	swalWithBootstrapButtons.fire({
		icon: 'error',
		title: 'Terjadi Kesalahan',
		text: 'Dimohon periksa data kembali!',
		footer: 'Hubungi kontak layanan jika memiliki keluhan.'
	});
</script>
@endpush
@endif

<div class="py-4">
		<nav aria-label="breadcrumb" class="d-none d-md-inline-block">
				<ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
						<li class="breadcrumb-item">
								<a href="#">
										<svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
								</a>
						</li>
						<li class="breadcrumb-item"><a href="{{route('officer.dashboard')}}">Dashboard</a></li>
						<li class="breadcrumb-item active" aria-current="page">Pendaftaran Akun</li>
				</ol>
		</nav>
		<div class="d-flex justify-content-between w-100 flex-wrap">
				<div class="mb-3 mb-lg-0">
						<h1 class="h4">Pendaftaran Akun Pengguna</h1>
				</div>
		</div>
</div>

<div class="row">
	<div class="col-12 col-xl-6 mx-auto">
		<div class="row">
				<div class="col-12 mb-4">
						<div class="card border-0 shadow components-section">
								<div class="card-body">     
										<div class="row mb-4">
												<div class="col-lg-12 col-sm-12">
													<!-- @if ($errors->any())
														<div>
															<div class="font-medium text-danger">
																	{{ __('Whoops! Something went wrong.') }}
															</div>

															<ul class="mt-3 list-disc list-inside text-sm text-danger">
																	@foreach ($errors->all() as $error)
																			<li>{{ $error }}</li>
																	@endforeach
															</ul>
														</div>
													@endif -->
													<form action="{{route('officer.user.store')}}" method="post" enctype="multipart/form-data">
														@csrf
														<div class="mb-3">
																<label for="name">Nama</label>
																<div class="input-group">
																		<span class="input-group-text" id="basic-addon1">
																				<svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>  
																		</span>
																		<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" aria-label="name">
																		@error('name')
																		<div class="invalid-feedback">{{ $message }}</div>
																		@enderror
																</div>
														</div>

														<div class="mb-3">
																<label for="email">Email</label>
																<div class="input-group">
																		<span class="input-group-text" id="basic-addon1">
																				<svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>  
																		</span>
																		<input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" aria-label="email">
																		@error('email')
																		<div class="invalid-feedback">{{ $message }}</div>
																		@enderror
																</div>
														</div>
														
														<div class="mb-3">
																<label for="password">Password</label>
																<div class="input-group">
																		<span class="input-group-text" id="basic-addon1">
																				<svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 8a6 6 0 01-7.743 5.743L10 14l-1 1-1 1H6v2H2v-4l4.257-4.257A6 6 0 1118 8zm-6-4a1 1 0 100 2 2 2 0 012 2 1 1 0 102 0 4 4 0 00-4-4z" clip-rule="evenodd"></path><</svg>  
																		</span>
																		<input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" aria-label="password">
																		@error('password')
																		<div class="invalid-feedback">{{ $message }}</div>
																		@enderror
																</div>
														</div>

														<div class="mb-3">
																<label for="password_confirmation">Konfirmasi Password</label>
																<div class="input-group">
																		<span class="input-group-text" id="basic-addon1">
																		<svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 8a6 6 0 01-7.743 5.743L10 14l-1 1-1 1H6v2H2v-4l4.257-4.257A6 6 0 1118 8zm-6-4a1 1 0 100 2 2 2 0 012 2 1 1 0 102 0 4 4 0 00-4-4z" clip-rule="evenodd"></path><</svg>  
																		</span>
																		<input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" value="{{ old('password_confirmation') }}" aria-label="password_confirmation">
																		@error('password_confirmation')
																		<div class="invalid-feedback">{{ $message }}</div>
																		@enderror
																</div>
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
																<label for="alamat">Alamat</label>
																<textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" rows="4">{{ old('alamat') }}</textarea>
																@error('alamat')
																<div class="invalid-feedback">{{ $message }}</div>
																@enderror
														</div>

														<div class="mb-3">
																<label for="name">Nomor KK</label>
																<div class="input-group">
																		<input type="text" class="form-control @error('no_kk') is-invalid @enderror" name="no_kk" value="{{ old('no_kk') }}" aria-label="no_kk">
																</div>
																@error('no_kk')
																<div class="invalid-feedback">{{ $message }}</div>
																@enderror
														</div>

														<div class="mb-3">
																<label for="file_kk" class="form-label">File KK</label>
																<input class="form-control @error('file_kk') is-invalid @enderror" type="file" id="file_kk" name="file_kk">
																@error('file_kk')
																<div class="invalid-feedback">{{ $message }}</div>
																@enderror
														</div>

														<div class="mb-3 d-grid">
															<button type="submit" class="btn btn-sm btn-secondary align-items-center">
																<svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
																Simpan
															</button>
														</div>
													</form>

												</div>
										</div>
								</div>
						</div>
				</div>
		</div>
	</div>
		
</div>

@endsection