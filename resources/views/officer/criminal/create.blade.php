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
						<li class="breadcrumb-item active" aria-current="page">Input Data</li>
				</ol>
		</nav>
		<div class="d-flex justify-content-between w-100 flex-wrap">
				<div class="mb-3 mb-lg-0">
						<h1 class="h4">Input Data Kriminal</h1>
				</div>
		</div>
</div>

<div class="row">
		<div class="col-12 mb-4">
				<div class="card border-0 shadow components-section">
						<div class="card-body">   
							<form action="{{route('officer.criminal.store')}}" method="post" enctype="multipart/form-data">
								@csrf
								<div class="row mb-4">
										<div class="col-lg-6 col-sm-6">
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
														<label for="no_nik">NIK</label>
														<div class="input-group">
																<span class="input-group-text" id="basic-addon1">
																	<svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a1 1 0 00-1 1v1a1 1 0 002 0V3a1 1 0 00-1-1zM4 4h3a3 3 0 006 0h3a2 2 0 012 2v9a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2zm2.5 7a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm2.45 4a2.5 2.5 0 10-4.9 0h4.9zM12 9a1 1 0 100 2h3a1 1 0 100-2h-3zm-1 4a1 1 0 011-1h2a1 1 0 110 2h-2a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
																</span>
																<input type="text" class="form-control @error('no_nik') is-invalid @enderror" name="no_nik" value="{{ old('no_nik') }}" aria-label="no_nik">
																@error('no_nik')
																<div class="invalid-feedback">{{ $message }}</div>
																@enderror
														</div>
												</div>

												<div class="mb-3">
														<label for="file_ktp" class="form-label">File KTP</label>
														<input class="form-control @error('file_ktp') is-invalid @enderror" type="file" id="file_ktp" name="file_ktp">
														@error('file_ktp')
														<div class="invalid-feedback">{{ $message }}</div>
														@enderror
												</div>

												<div class="mb-3">
														<label for="file_foto" class="form-label">Foto</label>
														<input class="form-control @error('file_foto') is-invalid @enderror" type="file" id="file_foto" name="file_foto">
														@error('file_foto')
														<div class="invalid-feedback">{{ $message }}</div>
														@enderror
												</div>

												<div class="mb-3 @error('tipe') text-danger @enderror">
														<label for="tipe">Tipe</label>
														<br>
														<div class="form-check form-check-inline">
																<input type="radio" class="form-check-input" name="tipe" id="pidana" value="pidana" {{ old('tipe') == 'pidana' ? 'checked' : '' }}>
																<label class="form-check-label" for="pidana">Pidana</label>
														</div>
														<div class="form-check form-check-inline ms-3">
																<input type="radio" class="form-check-input" name="tipe" id="tahanan" value="tahanan" {{ old('tipe') == 'tahanan' ? 'checked' : '' }}>
																<label class="form-check-label" for="tahanan">Tahanan</label>
														</div>
														@error('tipe')
														<div class="invalid-feedback">{{ $message }}</div>
														@enderror
												</div>

												<div class="mb-3">
														<label for="kasus">Kasus</label>
														<div class="input-group">
																<span class="input-group-text" id="basic-addon1">
																	<svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path></svg>
																</span>
																<input type="text" class="form-control @error('kasus') is-invalid @enderror" name="kasus" value="{{ old('kasus') }}" aria-label="kasus">
																@error('kasus')
																<div class="invalid-feedback">{{ $message }}</div>
																@enderror
														</div>
												</div>
										</div>
										<div class="col-lg-4 col-sm-6">
											
												<div class="mb-3">
													<label class="my-1 me-2" for="user_id">ID Akun Pengguna</label>
													<select class="form-select @error('user_id') is-invalid @enderror" id="user_id" name="user_id" aria-label="Default select example">
														@foreach ($data_user as $user)
															<option value="{{$user->id}}">{{$user->name}} - {{$user->no_telepon}}</option>
														@endforeach
													</select>
													@error('user_id')
														<div class="invalid-feedback">{{ $message }}</div>
													@enderror
												</div>
												
												<div class="mb-3">
														<label for="hubungan">Hubungan Keluarga</label>
														<div class="input-group">
																<span class="input-group-text" id="basic-addon1">
																	<svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path></svg>
																</span>
																<input type="text" class="form-control @error('hubungan') is-invalid @enderror" name="hubungan" value="{{ old('hubungan') }}" aria-label="hubungan">
																@error('hubungan')
																<div class="invalid-feedback">{{ $message }}</div>
																@enderror
														</div>
												</div>
												
										</div>
								</div>
								<div class="row mb-2 justify-content-md-center">
									<div class="col-lg-6 col-sm-6">
										<div class="mb-3 d-grid">
											<button type="submit" class="btn btn-sm btn-secondary align-items-center">
												<svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
												Simpan
											</button>
										</div>
									</div>
								</div>
							</form>
						</div>
				</div>
		</div>
</div>

@endsection