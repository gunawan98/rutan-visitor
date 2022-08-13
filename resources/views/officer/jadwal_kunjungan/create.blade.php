@extends('officer.layout.administrator')

@section('title','Admin - Tambah Jadwal Kunjungan')

@push('on-head')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
 
    <!-- Include Moment.js CDN -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js">
    </script>
 
    <!-- Include Bootstrap DateTimePicker CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js">
    </script>
@endpush

@push('after-script')
	<script>
		$('.form-time').datetimepicker({
				format: 'hh:mm'
		});
	</script>
@endpush

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
						<li class="breadcrumb-item active"><a href="{{route('officer.jadwal_kunjungan.index')}}">Jadwal Kunjungan</a></li>
						<li class="breadcrumb-item active" aria-current="page">Tambah</li>
				</ol>
		</nav>
		<div class="d-flex justify-content-between w-100 flex-wrap">
				<div class="mb-3 mb-lg-0">
						<h1 class="h4">Tambah Jadwal Kunjungan</h1>
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
													<form action="{{route('officer.jadwal_kunjungan.store')}}" method="post">
														@csrf

														<div class="mb-3">
																<label for="id_petugas">Petugas</label>
																<div class="input-group">
																		<select name="id_petugas" class="form-select">
																			@foreach ($petugas as $data)
																				<option value="{{$data->id_petugas}}">{{$data->nama_petugas}}</option>
																			@endforeach
																		</select>
																		@error('id_petugas')
																		<div class="invalid-feedback">{{ $message }}</div>
																		@enderror
																</div>
														</div>

														<div class="mb-3">
																<label for="nik">Hari</label>
																<div class="input-group">
																	<select name="hari" class="form-select">
																		<option value="Mon">Senin</option>
																		<option value="Tue">Selasa</option>
																		<option value="Wed">Rabu</option>
																		<option value="Thu">Kamis</option>
																	</select>
																</div>
																@error('nik')
																<div class="invalid-feedback">{{ $message }}</div>
																@enderror
														</div>

														<div class="mb-3">
																<label for="jam_mulai">Jam Mulai</label>
																<div class="input-group">
																		<span class="input-group-text" id="basic-addon1">
																				<svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path></svg>  
																		</span>
																		<input class="form-control form-time" type="text" name="jam_mulai" />
																		@error('jam_mulai')
																		<div class="invalid-feedback">{{ $message }}</div>
																		@enderror
																</div>
														</div>

														<div class="mb-3">
																<label for="jam_selesai">Jam Selesai</label>
																<div class="input-group">
																		<span class="input-group-text" id="basic-addon1">
																				<svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path></svg>  
																		</span>
																		<input class="form-control form-time" type="text" name="jam_selesai" />
																		@error('jam_selesai')
																		<div class="invalid-feedback">{{ $message }}</div>
																		@enderror
																</div>
														</div>

														<div class="mb-3">
																<label for="kapasitas">Kapasitas</label>
																<div class="input-group">
																		<span class="input-group-text" id="basic-addon1">
																				<svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"></path></svg>  
																		</span>
																		<input type="text" class="form-control @error('kapasitas') is-invalid @enderror" name="kapasitas" value="{{ old('kapasitas') }}" aria-label="kapasitas">
																		@error('kapasitas')
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