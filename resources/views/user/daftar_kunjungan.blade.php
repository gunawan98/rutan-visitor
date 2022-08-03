@extends('template.administrator')

@section('title','Rutan Visitors Web App')

@if(session('error'))
@push('scripts')
<script>
	swalWithBootstrapButtons.fire({
		icon: 'warning',
		title: 'Peringatan',
		text: `{{Session::get('error')}}`,
		showConfirmButton: true,
	});
</script>
@endpush
@endif

@section('content')
<div class="row">
		<div class="col-12 mb-8">
				<div class="card border-0 shadow components-section">
						<div class="card-body">   
							<form action="{{route('kunjungan.store')}}" method="post" enctype="multipart/form-data">
								@csrf
								<div class="row mb-4">
										<div class="col-lg-6 col-sm-6">
												<div class="mb-3">
													<label class="my-1 me-2" for="tanggal">Cari tanggal</label>
													<div class="input-group">
														<span class="input-group-text">
																<svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
														</span>
														<input data-datepicker="" class="form-control" name="tanggal_kunjungan" type="text" placeholder="dd/mm/yyyy" required>                                               
														@error('tanggal_kunjungan')
															<div class="invalid-feedback">{{ $message }}</div>
														@enderror
													</div>
												</div>

												<div class="mb-3">
													<label class="my-1 me-2" for="criminal_id">Nama Napi</label>
													<select class="form-select @error('criminal_id') is-invalid @enderror" id="criminal_id" name="criminal_id" aria-label="Default select example">
														<option value="">---- Data Criminal ----</option>
														@foreach ($data_criminal as $criminal)
															<option value="{{$criminal->id}}">{{$criminal->name}} (Hubungan : {{$criminal->hubungan}})</option>
														@endforeach
													</select>
													@error('criminal_id')
														<div class="invalid-feedback">{{ $message }}</div>
													@enderror
												</div>

												<div class="card border-1 shadow components-section">
													<div class="card-body">
														<div class="mb-5">
																<label for="nama_pengunjung">Nama Pengunjung</label>
																<div class="input-group">
																	<span class="input-group-text" id="basic-addon1">
																		<svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path></svg>
																	</span>
																	<input type="text" class="form-control @error('nama_pengunjung') is-invalid @enderror" name="nama_pengunjung" value="{{ old('nama_pengunjung') }}" aria-label="nama_pengunjung">
																	@error('nama_pengunjung')
																		<div class="invalid-feedback">{{ $message }}</div>
																	@enderror
																</div>
														</div>
														<div class="mb-1 text-end">
															<h5>Jumlah Pengikut :</h5>
														</div>
														<div class="mb-3">
																<label for="jmh_pengikut_laki">Laki-laki</label>
																<div class="input-group">
																	<span class="input-group-text" id="basic-addon1">
																		<svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path></svg>
																	</span>
																	<input type="text" class="form-control @error('jmh_pengikut_laki') is-invalid @enderror" name="jmh_pengikut_laki" value="{{ old('jmh_pengikut_laki') }}" aria-label="jmh_pengikut_laki">
																	@error('jmh_pengikut_laki')
																		<div class="invalid-feedback">{{ $message }}</div>
																	@enderror
																</div>
														</div>
														<div class="mb-3">
																<label for="jmh_pengikut_perempuan">Perempuan</label>
																<div class="input-group">
																	<span class="input-group-text" id="basic-addon1">
																		<svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path></svg>
																	</span>
																	<input type="text" class="form-control @error('jmh_pengikut_perempuan') is-invalid @enderror" name="jmh_pengikut_perempuan" value="{{ old('jmh_pengikut_perempuan') }}" aria-label="jmh_pengikut_perempuan">
																	@error('jmh_pengikut_perempuan')
																	<div class="invalid-feedback">{{ $message }}</div>
																	@enderror
																</div>
														</div>
														<div class="mb-3">
																<label for="jmh_pengikut_anak">Anak-anak</label>
																<div class="input-group">
																	<span class="input-group-text" id="basic-addon1">
																		<svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path></svg>
																	</span>
																	<input type="text" class="form-control @error('jmh_pengikut_anak') is-invalid @enderror" name="jmh_pengikut_anak" value="{{ old('jmh_pengikut_anak') }}" aria-label="jmh_pengikut_anak">
																	@error('jmh_pengikut_anak')
																	<div class="invalid-feedback">{{ $message }}</div>
																	@enderror
																</div>
														</div>
													</div>
												</div>

												<div class="mb-3 d-grid">
													<button type="submit" class="btn btn-sm btn-secondary align-items-center">
														<svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
														Daftar
													</button>
												</div>

										</div>

										<div class="col-lg-6 col-sm-6">
											<div class="row">
													<div class="col-12 mb-4">
														<div class="card card-body border-0 shadow mb-4">
															<div class="row pb-2 g-0">
																<div class="col-sm-12 col-md-12 fw-bolder"><h4>Akun:</h4></div>
															</div>
															<div class="row pb-2 g-0">
																<div class="col-sm-6 col-md-4 fw-bolder">Nama</div>
																<div class="col-6 col-md-8">: {{$data_user->name}}</div>
															</div>
															<div class="row pb-2 g-0">
																<div class="col-sm-6 col-md-4 fw-bolder">Jenis Kelamin</div>
																<div class="col-6 col-md-8">: {{$data_user->jenis_kelamin}}</div>
															</div>
															<div class="row pb-2 g-0">
																<div class="col-sm-6 col-md-4 fw-bolder">No. telepon</div>
																<div class="col-6 col-md-8">: {{$data_user->no_telepon}}</div>
															</div>
															<div class="row pb-2 g-0">
																<div class="col-sm-6 col-md-4 fw-bolder">Email</div>
																<div class="col-6 col-md-8">: {{$data_user->email}}</div>
															</div>
															<div class="row pb-2 g-0 pb-3" style="border-bottom: 1px dashed gray;">
																<div class="col-sm-6 col-md-4 fw-bolder">Alamat</div>
																<div class="col-6 col-md-8">: {{$data_user->alamat}}</div>
															</div>
															<div class="row pb-2 g-0">
																<div class="col-sm-12 col-md-12 fw-bolder"><h4>Data Kriminal:</h4></div>
															</div>
															<div class="row pb-2 g-0 pt-3">
																<div class="col-xs-6 col-md-4 fw-bolder">Nama</div>
																<div class="col-xs-6 col-md-7">
																	: <span id="nama-kriminal">-</span>
																</div>
															</div>
															<div class="row pb-2 g-0 pt-3">
																<div class="col-xs-6 col-md-4 fw-bolder">Tipe</div>
																<div class="col-xs-6 col-md-7">
																	: <span id="tipe-kriminal">-</span>
																</div>
															</div>
															<div class="row pb-2 g-0 pt-3">
																<div class="col-xs-6 col-md-4 fw-bolder">Kasus</div>
																<div class="col-xs-6 col-md-7">
																	: <span id="kasus-kriminal">-</span>
																</div>
															</div>
															<div class="row pb-2 g-0 pt-3">
																<div class="col-xs-6 col-md-4 fw-bolder">Hubungan Keluarga</div>
																<div class="col-xs-6 col-md-7">
																	: <span id="hubungan-kriminal">-</span>
																</div>
															</div>
														</div>
													</div>
													<div class="col-12">
															<div class="card card-body border-0 shadow mb-4">
																	<h2 class="h5">Preview File KTP <span class="text-muted" style="font-weight: 400;">No. <span id="ktp-kriminal">-</span></span></h2> 
																	<div class="d-flex align-items-center">
																		<div class="mx-auto">
																			<img class="rounded" id="preview-ktp" src="" alt="File KTP Tidak Ditemukan" height="200px">
																		</div>
																	</div> 
                                   
															</div>
													</div>
											</div>
									</div>
								</div>
							</form>
						</div>
				</div>
		</div>
</div>
@endsection

@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
	$(document).ready(function () {
		$('#criminal_id').change(function () {
			var id_criminal = document.getElementById('criminal_id').value;
			let url = `{{ route('kunjungan.filter.kriminal', ":id") }}`;
			url = url.replace(':id', id_criminal);
			
			$.ajax({
				type: 'get',
				url: url,
				success: function (data) {
					document.getElementById("nama-kriminal").innerHTML = data.name;
					document.getElementById("tipe-kriminal").innerHTML = data.tipe;
					document.getElementById("kasus-kriminal").innerHTML = data.kasus;
					document.getElementById("hubungan-kriminal").innerHTML = data.hubungan;
					document.getElementById("ktp-kriminal").innerHTML = data.no_nik;
					document.getElementById('preview-ktp').src=`{{url('uploads/file_ktp/${data.file_ktp}')}}`;
				}
			});
				
		});
	});
</script>
@endpush