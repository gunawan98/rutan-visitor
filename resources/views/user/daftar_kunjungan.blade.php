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
			@if ($cek_verify->tanggal_verifikasi != null)
				<div class="card border-0 shadow components-section">
						<div class="card-body">   
							<form action="{{route('kunjungan.store')}}" method="post" enctype="multipart/form-data">
								@csrf
								<div class="row mb-2">
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
														<option value="">---- Data kriminal yang terhubung ----</option>
														@foreach ($data_criminal as $criminal)
															<option value="{{$criminal->id_warga_rutan}}">{{$criminal->warga_rutan->nama_warga_rutan}}</option>
														@endforeach
													</select>
													@error('criminal_id')
														<div class="invalid-feedback">{{ $message }}</div>
													@enderror
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
																<div class="col-sm-6 col-md-4 fw-bolder">Username</div>
																<div class="col-6 col-md-8">: {{$data_user->username}}</div>
															</div>
															<div class="row pb-2 g-0">
																<div class="col-sm-6 col-md-4 fw-bolder">Nama</div>
																<div class="col-6 col-md-8">: {{$data_user->nama_pengunjung}}</div>
															</div>
															<div class="row pb-2 g-0">
																<div class="col-sm-6 col-md-4 fw-bolder">Jenis Kelamin</div>
																<div class="col-6 col-md-8">: {{$data_user->jenis_kelamin}}</div>
															</div>
															<div class="row pb-2 g-0">
																<div class="col-sm-6 col-md-4 fw-bolder">No. telepon</div>
																<div class="col-6 col-md-8">: {{$data_user->no_telepon}}</div>
															</div>
															<div class="row pb-2 g-0 pb-3" style="border-bottom: 1px dashed gray;">
																<div class="col-sm-6 col-md-4 fw-bolder">Alamat</div>
																<div class="col-6 col-md-8">: {{$data_user->alamat}}</div>
															</div>
															<div class="row pt-4 g-0">
																<div class="col-sm-12 col-md-12 fw-bolder"><h4>Data Kriminal:</h4></div>
															</div>
															<div class="row pb-2 g-0">
																<div class="col-xs-6 col-md-4 fw-bolder">Nomor NIK</div>
																<div class="col-xs-6 col-md-7">
																	: <span id="nik-kriminal">-</span>
																</div>
															</div>
															<div class="row pb-2 g-0">
																<div class="col-xs-6 col-md-4 fw-bolder">Nama</div>
																<div class="col-xs-6 col-md-7">
																	: <span id="nama-kriminal">-</span>
																</div>
															</div>
															<div class="row pb-2 g-0">
																<div class="col-xs-6 col-md-4 fw-bolder">Jenis Kelmain</div>
																<div class="col-xs-6 col-md-7">
																	: <span id="jenkel-kriminal">-</span>
																</div>
															</div>
															<div class="row pb-2 g-0">
																<div class="col-xs-6 col-md-4 fw-bolder">Alamat</div>
																<div class="col-xs-6 col-md-7">
																	: <span id="alamat-kriminal">-</span>
																</div>
															</div>
															<div class="row pb-2 g-0">
																<div class="col-xs-6 col-md-4 fw-bolder">Tipe Kriminal</div>
																<div class="col-xs-6 col-md-7">
																	: <span id="tipe-kriminal">-</span>
																</div>
															</div>
															<div class="row pb-2 g-0">
																<div class="col-xs-6 col-md-4 fw-bolder">Kasus</div>
																<div class="col-xs-6 col-md-7">
																	: <span id="kasus-kriminal">-</span>
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

			@else

				<div class="card border-0 shadow mb-4">
					<div class="card">
						<div class="card-header">
							
						</div>
						<div class="card-body">
							<h5 class="card-title">Anda belum bisa melakukan pendaftaran kunjungan</h5>
							<p class="card-text">Mohon menunggu sampai petugas memverifikasi data pada akun anda. Terima kasih</p>
						</div>
						<div class="card-footer text-muted text-end">
							©<span class="current-year"></span> <a class="text-primary fw-normal" href="#">RUTAN Kraksaan</a>
						</div>
					</div>
				</div>
				
			@endif
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
					document.getElementById("nik-kriminal").innerHTML = data.nik;
					document.getElementById("nama-kriminal").innerHTML = data.nama_warga_rutan;
					document.getElementById("jenkel-kriminal").innerHTML = data.jenis_kelamin;
					document.getElementById("alamat-kriminal").innerHTML = data.alamat;
					document.getElementById("tipe-kriminal").innerHTML = data.jenis_warga_rutan.nama_jenis;
					document.getElementById("kasus-kriminal").innerHTML = data.kasus;
				}
			});
				
		});
	});
</script>
@endpush