@extends('officer.layout.administrator')

@section('title','Admin - Manajemen Data User')

@section('content')

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
						<p class="mb-0">{{$data_user->name}}</p>
						<p class="mb-0">{{$data_user->alamat}}</p>
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
							<div class="card shadow border-0 text-center p-0">
									<div class="profile-cover rounded-top" data-background="{{asset('template/assets/img/profile-cover.jpg') }}"></div>
									<div class="card-body pb-5">
											<img src="{{asset('template/assets/img/team/profile-picture-1.jpg') }}" class="avatar-xl rounded-circle mx-auto mt-n7 mb-4" alt="Neil Portrait">
											<h4 class="h3">Neil Sims</h4>
											<h5 class="fw-normal">Senior Software Engineer</h5>
											<p class="text-gray mb-4">New York, USA</p>
											<a class="btn btn-sm btn-gray-800 d-inline-flex align-items-center me-2" href="#">
													<svg class="icon icon-xs me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"></path></svg>
													Connect
											</a>
											<a class="btn btn-sm btn-secondary" href="#">Send Message</a>
									</div>
								</div>
					</div>
					<div class="col-12">
							<div class="card card-body border-0 shadow mb-4">
									<h2 class="h5 mb-4">Select profile photo</h2>
									<div class="d-flex align-items-center">
											<div class="me-3">
													<!-- Avatar -->
													<img class="rounded avatar-xl" src="../assets/img/team/profile-picture-3.jpg" alt="change avatar">
											</div>
											<div class="file-field">
													<div class="d-flex justify-content-xl-center ms-xl-3">
															<div class="d-flex">
																	<svg class="icon text-gray-500 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd"></path></svg>
																	<input type="file">
																	<div class="d-md-block text-left">
																			<div class="fw-normal text-dark mb-1">Choose Image</div>
																			<div class="text-gray small">JPG, GIF or PNG. Max size of 800K</div>
																	</div>
															</div>
													</div>
												</div>                                        
									</div>
							</div>
					</div>
					<div class="col-12">
							<div class="card card-body border-0 shadow">
									<h2 class="h5 mb-4">Select cover photo</h2>
									<div class="d-flex align-items-center">
											<div class="me-3">
													<!-- Avatar -->
													<img class="rounded avatar-xl" src="../assets/img/profile-cover.jpg" alt="change cover">
											</div>
											<div class="file-field">
													<div class="d-flex justify-content-xl-center ms-xl-3">
															<div class="d-flex">
																	<svg class="icon text-gray-500 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd"></path></svg>
																	<input type="file">
																	<div class="d-md-block text-left">
																			<div class="fw-normal text-dark mb-1">Choose Image</div>
																			<div class="text-gray small">JPG, GIF or PNG. Max size of 800K</div>
																	</div>
															</div>
													</div>
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
													<form action="{{route('officer.user.update', $data_user->id)}}" method="post">
														<div class="mb-3">
																<label for="name">Nama</label>
																<div class="input-group">
																		<span class="input-group-text" id="basic-addon1">
																				<svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>  
																		</span>
																		<input type="text" class="form-control" name="name" aria-label="name">
																</div>
														</div>

														<div class="mb-3">
																<label for="email">Email</label>
																<div class="input-group">
																		<span class="input-group-text" id="basic-addon1">
																				<svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>  
																		</span>
																		<input type="text" class="form-control" name="name" aria-label="name">
																</div>
														</div>

														<div class="mb-3">
																<label for="no_telepon">No. Telephone</label>
																<div class="input-group">
																		<span class="input-group-text" id="basic-addon1">
																				<svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>  
																		</span>
																		<input type="text" class="form-control" name="name" aria-label="name">
																</div>
														</div>

														<div class="mb-3">
																<label for="jenis_kelamin">Jenis Kelamin</label>
																<br>
																<div class="form-check form-check-inline">
																		<input type="radio" class="form-check-input" name="jenis_kelamin" id="laki-laki" checked>
																		<label class="form-check-label" for="laki-laki">Laki-laki</label>
																</div>
																<div class="form-check form-check-inline ms-3">
																		<input type="radio" class="form-check-input" name="jenis_kelamin" id="perempuan">
																		<label class="form-check-label" for="perempuan">Perempuan</label>
																</div>
														</div>

														<div class="mb-3">
																<label for="alamat">Alamat</label>
																<textarea class="form-control" name="alamat" rows="4"></textarea>
														</div>

														<div class="mb-3">
																<label for="name">Nomor KK</label>
																<div class="input-group">
																		<input type="text" class="form-control" name="no_kk" aria-label="name">
																</div>
														</div>

														<div class="mb-3">
																<label for="file_kk" class="form-label">File KK</label>
																<input class="form-control" type="file" id="file_kk" name="file_kk">
														</div>

														<div class="mb-3 d-grid">
															<button type="button" class="btn btn-sm btn-secondary align-items-center">
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


@endsection