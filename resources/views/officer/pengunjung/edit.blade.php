@extends('officer.layout.administrator')

@section('title','Admin - Edit Data Pengunjung')

@section('content')


@if(session()->has('success'))
@push('after-script')
<script>
	swalWithBootstrapButtons.fire({
			icon: 'success',
			title: 'Sukses',
			text: "{{ session()->get('message') }}",
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
						<li class="breadcrumb-item active"><a href="{{route('officer.pengunjung.index')}}">Data Pengunjung</a></li>
						<li class="breadcrumb-item active" aria-current="page">Edit</li>
				</ol>
		</nav>
		<div class="d-flex justify-content-between w-100 flex-wrap">
				<div class="mb-3 mb-lg-0">
						<h1 class="h4">Edit Data Pengunjung</h1>
				</div>
		</div>
</div>

<div class="row justify-content-md-center">
	<div class="col-12 col-xl-6 mx-auto">
		<div class="row">
				<div class="col-12 mb-4">
						<div class="card border-0 shadow components-section">
								<div class="card-body">     
										<div class="row mb-4">
												<div class="col-lg-12 col-sm-12">
													<form action="{{route('officer.pengunjung.update', $data->id_pengunjung)}}" method="post" enctype="multipart/form-data">
														@csrf
														@method('put')
														<div class="mb-3">
																<label for="nik">Nomor NIK</label>
																<div class="input-group">
																		<input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" value="{{ $data->nik }}" aria-label="nik">
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
																		<input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ $data->nama_pengunjung }}" aria-label="nama">
																		@error('nama')
																		<div class="invalid-feedback">{{ $message }}</div>
																		@enderror
																</div>
														</div>

														<div class="mb-3 @error('jenis_kelamin') text-danger @enderror">
																<label for="jenis_kelamin">Jenis Kelamin</label>
																<br>
																<div class="form-check form-check-inline">
																		<input type="radio" class="form-check-input" name="jenis_kelamin" id="laki-laki" value="laki-laki" {{ old('jenis_kelamin', $data->jenis_kelamin) == 'laki-laki' ? 'checked' : '' }}>
																		<label class="form-check-label" for="laki-laki">Laki-laki</label>
																</div>
																<div class="form-check form-check-inline ms-3">
																		<input type="radio" class="form-check-input" name="jenis_kelamin" id="perempuan" value="perempuan" {{ old('jenis_kelamin', $data->jenis_kelamin) == 'perempuan' ? 'checked' : '' }}>
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
																		<input type="text" class="form-control @error('no_telepon') is-invalid @enderror" name="no_telepon" value="{{ $data->no_telepon }}" aria-label="no_telepon">
																		@error('no_telepon')
																		<div class="invalid-feedback">{{ $message }}</div>
																		@enderror
																</div>
														</div>

														<div class="mb-3">
																<label for="alamat">Alamat</label>
																<textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" rows="4">{{ $data->alamat }}</textarea>
																@error('alamat')
																<div class="invalid-feedback">{{ $message }}</div>
																@enderror
														</div>

														<div class="mb-3">
																<label for="username">Username</label>
																<div class="input-group">
																		<span class="input-group-text" id="basic-addon1">
																				<svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>  
																		</span>
																		<input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ $data->username }}" aria-label="username">
																		@error('username')
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

														<div class="mb-3 @error('status') text-danger @enderror">
																<label for="status">Status</label>
																<br>
																<div class="form-check form-check-inline">
																		<input type="radio" class="form-check-input" name="status" value="y" {{ old('status', $data->status) == 'y' ? 'checked' : '' }}>
																		<label class="form-check-label" for="laki-laki">Aktif</label>
																</div>
																<div class="form-check form-check-inline ms-3">
																		<input type="radio" class="form-check-input" name="status" value="t" {{ old('status', $data->status) == 't' ? 'checked' : '' }}>
																		<label class="form-check-label" for="perempuan">Tidak Aktif</label>
																</div>
																@error('status')
																<div class="invalid-feedback">{{ $message }}</div>
																@enderror
														</div>

														<div class="mb-3 d-grid">
															<button type="submit" class="btn btn-sm btn-secondary align-items-center">
																<svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
																Update
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

	<div class="col-12 col-xl-6">
			<div class="row">
					<div class="col-12 mb-4">
							<div class="card shadow border-0 text-center p-0">
									<div class="profile-cover rounded-top" data-background="{{asset('template/assets/img/profile-cover.jpg') }}"></div>
									<div class="card-body pb-5">
											<img src="https://ui-avatars.com/api/?name={{$data->nama_pengunjung}}=d&size=128&background=random" class="avatar-xl rounded-circle mx-auto mt-n7 mb-4" alt="Neil Portrait">
											<h4 class="h3">{{$data->nama_pengunjung}}</h4>
											<h5 class="fw-normal">{{$data->username}}</h5>
											<p class="text-gray mb-4"><address></address></p>
											<span class="btn btn-sm btn-gray-800 d-inline-flex align-items-center me-2">
													<svg class="icon icon-xs me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
													{{$data->no_telepon}}
											</span>
											@foreach ($data->detail_syarat as $file)
												@if ($file->tanggal_verifikasi != null)
													<span class="btn btn-outline-success btn-sm d-inline-flex align-items-center me-2">
															<svg class="icon icon-xs me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
															Verivied
													</span>
												@else
													<span class="btn btn-outline-danger btn-sm d-inline-flex align-items-center me-2">
															<svg class="icon icon-xs me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
															Not Verivied
													</span>
												@endif
											@endforeach
									</div>
								</div>
					</div>
					<div class="col-12">
							<div class="card card-body border-0 shadow mb-4">
									<h2 class="h5 mb-4">Lampiran file syarat</h2>
									<div class="d-flex align-items-center">
											<div class="me-3">
												@foreach ($data->detail_syarat as $file)
													
												Click file: <span class="text-danger"><a href="{{url('uploads/file_syarat/'.$file->file_syarat)}}" target="_blank">{{$file->file_syarat}}</a></span>
												@endforeach
											</div>
										</div>
										@foreach ($data->detail_syarat as $file)
											@if ($file->tanggal_verifikasi == null)
												<form action="{{route('officer.pengunjung.verify')}}" method="post" class="d-grid mt-4">
													@csrf
													@method('put')
													<input type="hidden" name="id_pengunjung" value="{{$data->id_pengunjung}}">
													<input type="hidden" name="id_detail_syarat" value="{{$file->id_detail_syarat}}">
													<button type="submit" class="btn btn-outline-success btn-fluid">Konfirmasi Akun</button>
												</form>
											@endif
										@endforeach
							</div>
					</div>

					<div class="col-12">
							<div class="card card-body border-0 shadow mb-4">
								<div class="row">
									<div class="col-9">
										<div class="pb-2">
											<h4>Detail Warga Rutan</h4>
										</div>

											<div class="row pb-2 g-0">
												<div class="col-sm-6 col-md-6 fw-bolder">Status Keluarga</div>
												<div class="col-6 col-md-6 text-muted">: {{$detail_keluarga->status_keluarga}}</div>
											</div>
											<div class="row pb-2 g-0">
												<div class="col-sm-6 col-md-6 fw-bolder">Nomor NIK</div>
												<div class="col-6 col-md-6 text-muted">: {{$detail_keluarga->warga_rutan->nik}}</div>
											</div>
											<div class="row pb-2 g-0">
												<div class="col-sm-6 col-md-6 fw-bolder">Nama</div>
												<div class="col-6 col-md-6 text-muted">: {{$detail_keluarga->warga_rutan->nama_warga_rutan}}</div>
											</div>
											<div class="row pb-2 g-0">
												<div class="col-sm-6 col-md-6 fw-bolder">Jenis Kelamin</div>
												<div class="col-6 col-md-6 text-muted">: {{$detail_keluarga->warga_rutan->jenis_kelamin}}</div>
											</div>
											<div class="row pb-2 g-0">
												<div class="col-sm-6 col-md-6 fw-bolder">Alamat</div>
												<div class="col-6 col-md-6 text-muted">: {{$detail_keluarga->warga_rutan->alamat}}</div>
											</div>
											<div class="row pb-2 g-0">
												<div class="col-sm-6 col-md-6 fw-bolder">Tipe Kurungan</div>
												<div class="col-6 col-md-6 text-muted">: {{$detail_keluarga->warga_rutan->jenis_warga_rutan->nama_jenis}}</div>
											</div>
											<div class="row pb-2 g-0">
												<div class="col-sm-6 col-md-6 fw-bolder">Kasus</div>
												<div class="col-6 col-md-6 text-muted">: {{$detail_keluarga->warga_rutan->kasus}}</div>
											</div>
											
									</div>

								</div>
							</div>
					</div>

			</div>
	</div>
		
</div>

@endsection