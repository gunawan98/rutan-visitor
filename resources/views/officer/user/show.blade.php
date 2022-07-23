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
						<li class="breadcrumb-item"><a href="{{route('officer.dashboard')}}">Dashboard</a></li>
						<li class="breadcrumb-item" aria-current="page"><a href="{{route('officer.user.index')}}">Data</a></li>
						<li class="breadcrumb-item active" aria-current="page">Detail</li>
				</ol>
		</nav>
		<div class="d-flex justify-content-between w-100 flex-wrap">
				<div class="mb-3 mb-lg-0">
						<h1 class="h4">Detail Data</h1>
						<p class="mb-0 fw-bold fs-5 text-secondary">{{$data_user->name}}</p>
						<p class="mb-0">{{$data_user->alamat}}</p>
				</div>
		</div>
</div>

<div class="row">
	<div class="col-12 col-xl-4">
			<div class="row">
					<div class="col-12 mb-4">
							<div class="card shadow border-0 text-center p-0">
									<div class="profile-cover rounded-top" data-background="{{asset('template/assets/img/profile-cover.jpg') }}"></div>
									<div class="card-body pb-5">
											<img src="https://ui-avatars.com/api/?name={{$data_user->name}}&size=128&background=random" class="avatar-xl rounded-circle mx-auto mt-n7 mb-4" alt="Neil Portrait">
											<h4 class="h3">{{$data_user->name}}</h4>
											<h5 class="fw-normal">{{$data_user->email}}</h5>
											<p class="text-gray mb-4">{{$data_user->alamat}}</p>
											<span class="btn btn-sm btn-gray-800 d-inline-flex align-items-center me-2">
													<svg class="icon icon-xs me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
													{{$data_user->no_telepon}}
											</span>
											<span class="btn btn-sm btn-secondary">{{$count_kunjungan}} kunjungan</span>
									</div>
								</div>
					</div>
					<div class="col-12">
							<div class="card card-body border-0 shadow mb-4">
									<h2 class="h5 mb-4">Preview Data KK</h2>
									<div class="d-flex align-items-center">
											<div class="me-3">
													<img class="rounded" src="{{url('uploads/file_kk/'.$data_user->file_kk)}}" alt="File KK">
											</div>
										</div>
							</div>
					</div>
			</div>
	</div>
	<div class="col-12 col-xl-1"></div>
	<div class="col-12 col-xl-6">
		<div class="row">
				<div class="col-12 mb-4">
						<div class="card border-0 shadow components-section">
								<div class="card-body">     
										<div class="row mb-4">
												<div class="col-lg-12 col-sm-12">
													<form action="{{route('officer.user.update', $data_user->id)}}" method="post" enctype="multipart/form-data">
														@csrf
														@method('put')
														<div class="mb-3">
																<label for="name">Nama</label>
																<div class="input-group">
																		<span class="input-group-text" id="basic-addon1">
																				<svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>  
																		</span>
																		<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$data_user->name}}" aria-label="name">
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
																		<input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$data_user->email}}" aria-label="email">
																		@error('email')
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
																		<input type="text" class="form-control @error('no_telepon') is-invalid @enderror" name="no_telepon" value="{{$data_user->no_telepon}}" aria-label="no_telepon">
																		@error('no_telepon')
																			<div class="invalid-feedback">{{ $message }}</div>
																		@enderror
																</div>
														</div>

														<div class="mb-3 @error('jenis_kelamin') text-danger @enderror">
																<label for="jenis_kelamin">Jenis Kelamin</label>
																<br>
																<div class="form-check form-check-inline">
																		<input type="radio" class="form-check-input" name="jenis_kelamin" id="laki-laki" value="laki-laki" {{ old('jenis_kelamin', $data_user->jenis_kelamin) == 'laki-laki' ? 'checked' : '' }}>
																		<label class="form-check-label" for="laki-laki">Laki-laki</label>
																</div>
																<div class="form-check form-check-inline ms-3">
																		<input type="radio" class="form-check-input" name="jenis_kelamin" id="perempuan" value="perempuan" {{ old('jenis_kelamin', $data_user->jenis_kelamin) == 'perempuan' ? 'checked' : '' }}>
																		<label class="form-check-label" for="perempuan">Perempuan</label>
																</div>
																@error('jenis_kelamin')
																	<div class="invalid-feedback">{{ $message }}</div>
																@enderror
														</div>

														<div class="mb-3">
																<label for="alamat">Alamat</label>
																<textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" rows="4">{{$data_user->alamat}}</textarea>
																@error('alamat')
																	<div class="invalid-feedback">{{ $message }}</div>
																@enderror
														</div>

														<div class="mb-3">
																<label for="name">Nomor KK</label>
																<div class="input-group">
																		<input type="text" class="form-control @error('no_kk') is-invalid @enderror" name="no_kk" value="{{$data_user->no_kk}}" aria-label="name">
																		@error('no_kk')
																			<div class="invalid-feedback">{{ $message }}</div>
																		@enderror
																</div>
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
		
</div>

	<div class="row p-2">
		<div class="alert alert-danger p-4" role="alert">
			<h4 class="alert-heading">Danger Zone!</h4>
			<p>Perhatian, menghapus akun pengguna berarti sama dengan menghentikan layanan bagi pengguna akun tersebut.</p>
			<hr>
			<button class="btn btn-danger btn-sm" onclick="deleteItem(this)" data-id="{{ $data_user->id }}">Hapus Akun</button>
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
											url:'{{url("officer/user")}}/'+id,
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
																window.location.href = "/officer/user";
															});
													}

											}
									});

							}

					} else if (
							result.dismiss === Swal.DismissReason.cancel
					) {
							swalWithBootstrapButtons.fire(
									'Cancelled',
									'Your imaginary file is safe :)',
									'error'
							);
					}
			});

	}

</script>
@endpush