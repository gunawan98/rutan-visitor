@extends('officer.layout.administrator')

@section('title','Admin - Jenis Syarat')

@section('content')

@if(session('success'))
@push('after-script')
<script>
	swalWithBootstrapButtons.fire({
			icon: 'success',
			title: 'Sukses',
			text: 'Data berhasil diupdate.',
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
						<li class="breadcrumb-item active"><a href="{{route('officer.jenis_syarat.index')}}">Jenis Syarat</a></li>
						<li class="breadcrumb-item active" aria-current="page">Edit</li>
				</ol>
		</nav>
		<div class="d-flex justify-content-between w-100 flex-wrap">
				<div class="mb-3 mb-lg-0">
						<h1 class="h4">Jenis Syarat</h1>
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
													<form action="{{route('officer.jenis_syarat.update', $data->id_jenis_syarat)}}" method="post">
														@csrf
														@method('put')
														<div class="mb-3">
																<label for="nama_syarat">Nama Syarat</label>
																<div class="input-group">
																		<span class="input-group-text" id="basic-addon1">
																				<svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>  
																		</span>
																		<input type="text" class="form-control @error('nama_syarat') is-invalid @enderror" name="nama_syarat" value="{{ $data->nama_syarat }}" aria-label="nama_syarat">
																		@error('nama_syarat')
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
		
</div>

@endsection