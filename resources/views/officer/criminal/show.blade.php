@extends('officer.layout.administrator')

@section('title','Admin - Manajemen Data User')

@section('content')

@push('on-head')
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@endpush

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

<div class="py-4">
		<nav aria-label="breadcrumb" class="d-none d-md-inline-block">
				<ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
						<li class="breadcrumb-item">
								<a href="#">
										<svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
								</a>
						</li>
						<li class="breadcrumb-item"><a href="#">Tables</a></li>
						<li class="breadcrumb-item active" aria-current="page">Bootstrap tables</li>
				</ol>
		</nav>
		<div class="d-flex justify-content-between w-100 flex-wrap">
				<div class="mb-3 mb-lg-0">
						<h1 class="h4">Detail Data</h1>
						<p class="mb-0 fw-bold fs-5 text-secondary">{{$data_criminal->name}}</p>
						<p class="mb-0">{{$data_criminal->tipe}}</p>
				</div>
				<div>
						<a href="https://themesberg.com/docs/volt-bootstrap-5-dashboard/components/tables/" class="btn btn-outline-gray-600 d-inline-flex align-items-center">
								<svg class="icon icon-xs me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg>
								Bootstrap Tables Docs
						</a>
				</div>
		</div>
</div>

<div class="row">
	<div class="col-12 col-xl-4">
			<div class="row">
					<div class="col-12 mb-4">
							<div class="card border-0 shadow components-section">
									<div class="card-body">     
											<div class="row mb-4">
													<div class="col-lg-12 col-sm-12">
														<form action="{{route('officer.criminal.update', $data_criminal->id)}}" method="post" enctype="multipart/form-data">
															@csrf
															@method('put')
															<div class="mb-3">
																	<label for="name">Nama</label>
																	<div class="input-group">
																			<span class="input-group-text" id="basic-addon1">
																					<svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>  
																			</span>
																			<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$data_criminal->name}}" aria-label="name">
																			@error('name')
																				<div class="invalid-feedback">{{ $message }}</div>
																			@enderror
																	</div>
															</div>

															<div class="mb-3">
																	<label for="no_nik">Nomor NIK</label>
																	<div class="input-group">
																			<span class="input-group-text" id="basic-addon1">
																				<svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a1 1 0 00-1 1v1a1 1 0 002 0V3a1 1 0 00-1-1zM4 4h3a3 3 0 006 0h3a2 2 0 012 2v9a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2zm2.5 7a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm2.45 4a2.5 2.5 0 10-4.9 0h4.9zM12 9a1 1 0 100 2h3a1 1 0 100-2h-3zm-1 4a1 1 0 011-1h2a1 1 0 110 2h-2a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
																			</span>
																			<input type="no_nik" class="form-control @error('no_nik') is-invalid @enderror" name="no_nik" value="{{$data_criminal->no_nik}}" aria-label="no_nik">
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

															<div class="mb-3 @error('tipe') text-danger @enderror">
																	<label for="tipe">Tipe</label>
																	<br>
																	<div class="form-check form-check-inline">
																			<input type="radio" class="form-check-input" name="tipe" id="pidana" value="pidana" {{ old('tipe', $data_criminal->tipe) == 'pidana' ? 'checked' : '' }}>
																			<label class="form-check-label" for="pidana">Pidana</label>
																	</div>
																	<div class="form-check form-check-inline ms-3">
																			<input type="radio" class="form-check-input" name="tipe" id="tahanan" value="tahanan" {{ old('tipe', $data_criminal->tipe) == 'tahanan' ? 'checked' : '' }}>
																			<label class="form-check-label" for="tahanan">Tahanan</label>
																	</div>
																	@error('tipe')
																		<div class="invalid-feedback">{{ $message }}</div>
																	@enderror
															</div>

															<div class="mb-4">
																	<label for="kasus">Kasus</label>
																	<div class="input-group">
																			<input type="text" class="form-control @error('kasus') is-invalid @enderror" name="kasus" value="{{$data_criminal->kasus}}" aria-label="name">
																			@error('kasus')
																				<div class="invalid-feedback">{{ $message }}</div>
																			@enderror
																	</div>
															</div>

															<hr style="height:2px;border-width:0;color:gray;background-color:gray">

															<div class="mb-3 mt-4">
																<label class="my-1 me-2" for="user_id">ID Akun Pengguna</label>
																<select class="form-select @error('user_id') is-invalid @enderror" id="user_id" name="user_id" aria-label="Default select example">
																	@foreach ($data_user as $user)
																		<option value="{{$user->id}}" {{ ($user->id == $data_criminal->user_id) ? 'selected' : '' }}>{{$user->name}} - {{$user->no_telepon}}</option>
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
																		<input type="text" class="form-control @error('hubungan') is-invalid @enderror" name="hubungan" value="{{$data_criminal->hubungan}}" aria-label="hubungan">
																		@error('hubungan')
																		<div class="invalid-feedback">{{ $message }}</div>
																		@enderror
																</div>
															</div>

															<div class="mb-3 d-grid">
																<button type="submit" class="btn btn-sm btn-secondary align-items-center">
																	<svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
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

	<div class="col-12 col-xl-8">
			<div class="row">
					<div class="col-12 mb-4">
						<div class="card card-body border-0 shadow mb-4">
							<div class="row pb-2 g-0">
								<div class="col-sm-6 col-md-4 fw-bolder">Nama</div>
								<div class="col-6 col-md-8">: {{$data_criminal->name}}</div>
							</div>
							<div class="row pb-2 g-0">
								<div class="col-sm-6 col-md-4 fw-bolder">Tipe</div>
								<div class="col-6 col-md-8">: {{$data_criminal->tipe}}</div>
							</div>
							<div class="row pb-2 g-0 pb-3" style="border-bottom: 1px dashed gray;">
								<div class="col-sm-6 col-md-4 fw-bolder">Kasus</div>
								<div class="col-6 col-md-8">: {{$data_criminal->kasus}}</div>
							</div>
							<div class="row pb-2 g-0 pt-2">
								<div class="col-sm-6 col-md-4 fw-bolder">Nama Akun Saudara</div>
								<div class="col-6 col-md-8">: {{$data_criminal->user->name}}</div>
							</div>
							<div class="row pb-2 g-0">
								<div class="col-sm-6 col-md-4 fw-bolder">Email</div>
								<div class="col-6 col-md-8">: {{$data_criminal->user->email}}</div>
							</div>
							<div class="row pb-2 g-0">
								<div class="col-sm-6 col-md-4 fw-bolder">Nomor Telepon</div>
								<div class="col-6 col-md-8">: {{$data_criminal->user->no_telepon}}</div>
							</div>
							<div class="row pb-2 g-0">
								<div class="col-sm-6 col-md-4 fw-bolder">Hubungan Keluarga</div>
								<div class="col-6 col-md-8">: {{$data_criminal->hubungan}}</div>
							</div>
						</div>
					</div>
					<div class="col-12">
							<div class="card card-body border-0 shadow mb-4">
									<h2 class="h5">Preview File Nomor KK. <span class="text-muted" style="font-weight: 400;">{{$data_criminal->user->no_kk}}</span></h2> 
									<div class="d-flex align-items-center">
										<div class="mx-auto">
												<img class="rounded" src="{{url('uploads/file_kk/'.$data_criminal->user->file_kk)}}" alt="File KK Tidak Ditemukan" height="200px">
										</div>
									</div> 

									<h2 class="h5 mt-2">Preview File Nomor NIK. <span class="text-muted" style="font-weight: 400;">{{$data_criminal->no_nik}}</span></h2> 
									<div class="d-flex align-items-center">
										<div class="mx-auto">
												<img class="rounded" src="{{url('uploads/file_ktp/'.$data_criminal->file_ktp)}}" alt="File NIK Tidak Ditemukan" height="200px">
										</div>
									</div>                                       
							</div>
					</div>
			</div>
	</div>

	
		
</div>

	<div class="row p-2">
		<div class="alert alert-danger p-4" role="alert">
			<h4 class="alert-heading">Danger Zone!</h4>
			<p>Perhatian, menghapus data berarti sama dengan menghilangkan data secara permanen.</p>
			<hr>
			<button class="btn btn-danger btn-sm" onclick="deleteItem(this)" data-id="{{ $data_criminal->id }}">Hapus Data</button>
		</div>
	</div>
@endsection

@push('after-script')
<script type="application/javascript">

	function deleteItem(e){

			let id = e.getAttribute('data-id');

			const swalWithBootstrapButtons = Swal.mixin({
					customClass: {
							confirmButton: 'btn btn-success mx-3',
							cancelButton: 'btn btn-danger mx-3'
					},
					buttonsStyling: false
			});

			swalWithBootstrapButtons.fire({
					title: 'Apakah anda yakin?',
					text: "Konfirmasi tombol dibawah ini.",
					icon: 'warning',
					showCancelButton: true,
					confirmButtonText: 'Hapus',
					cancelButtonText: 'Batal',
					reverseButtons: true
			}).then((result) => {
					if (result.value) {
							if (result.isConfirmed){

									$.ajax({
											type:'DELETE',
											url:'{{url("officer/criminal")}}/'+id,
											data:{
													"_token": "{{ csrf_token() }}",
											},
											success:function(data) {
													if (data.success){
															swalWithBootstrapButtons.fire({
																	title: "Sukses",
																	text: "Data berhasil dihapus.",
																	type: "success",
																	icon: 'success',
															})
															.then(function() {
																window.location.href = "/officer/criminal";
															});
													}

											}
									});

							}

					} else if (
							result.dismiss === Swal.DismissReason.cancel
					) {
							swalWithBootstrapButtons.fire(
									'Berhasil',
									'Pembatalan berhasil dilakukan.',
									'error'
							);
					}
			});

	}

</script>
@endpush