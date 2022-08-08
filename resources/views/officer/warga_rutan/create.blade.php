@extends('officer.layout.administrator')

@section('title','Admin - Tambah Data Warga Rutan')

@section('content')

@if(session('status'))
@push('after-script')
<script>
	swalWithBootstrapButtons.fire({
			icon: 'success',
			title: 'Sukses',
			text: 'Data berhasil ditambahkan.',
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
						<li class="breadcrumb-item active"><a href="{{route('officer.warga_rutan.index')}}">Data Warga Rutan</a></li>
						<li class="breadcrumb-item active" aria-current="page">Tambah</li>
				</ol>
		</nav>
		<div class="d-flex justify-content-between w-100 flex-wrap">
				<div class="mb-3 mb-lg-0">
						<h1 class="h4">Tambah Data Warga Rutan</h1>
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
													<form action="{{route('officer.warga_rutan.store')}}" method="post">
															@csrf
															<div class="mb-3">
																	<label for="nik">Nomor NIK</label>
																	<div class="input-group">
																			<input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" value="{{ old('nik') }}" aria-label="nik">
																	</div>
																	@error('nik')
																	<div class="invalid-feedback">{{ $message }}</div>
																	@enderror
															</div>

															<div class="mb-3">
																	<label for="nama">Nama</label>
																	<div class="input-group">
																			<span class="input-group-text" id="basic-addon1">
																					<svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>  
																			</span>
																			<input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" aria-label="nama">
																			@error('nama')
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
																	<label for="kasus">Kasus</label>
																	<div class="input-group">
																			<span class="input-group-text" id="basic-addon1">
																					<svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>  
																			</span>
																			<input type="text" class="form-control @error('kasus') is-invalid @enderror" name="kasus" value="{{ old('kasus') }}" aria-label="kasus">
																			@error('kasus')
																			<div class="invalid-feedback">{{ $message }}</div>
																			@enderror
																	</div>
															</div>

															<div class="mb-3">
																	<label for="jenis_warga_rutan_id">Tipe Kurungan</label>
																	<div class="input-group">
																			<select name="jenis_warga_rutan_id" class="form-select">
																				@foreach ($jenis_warga_rutan as $item)
																					<option value="{{$item->id}}">{{$item->nama_jenis}}</option>
																				@endforeach
																			</select>
																			@error('jenis_warga_rutan_id')
																			<div class="invalid-feedback">{{ $message }}</div>
																			@enderror
																	</div>
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