@extends('officer.layout.administrator')

@section('title','Admin - Detail Kunjungan')

@section('content')

<div class="py-4">
		<nav aria-label="breadcrumb" class="d-none d-md-inline-block">
				<ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
						<li class="breadcrumb-item">
								<a href="#">
										<svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
								</a>
						</li>
						<li class="breadcrumb-item"><a href="{{route('officer.dashboard')}}">Dashboard</a></li>
						<!-- <li class="breadcrumb-item active" aria-current="page"><a href="{{route('officer.visitor.tahanan')}}">Tipe Tahanan</a></li> -->
						<li class="breadcrumb-item active" aria-current="page">Detail</li>
				</ol>
		</nav>
		<div class="d-flex justify-content-between w-100 flex-wrap">
				<div class="mb-3 mb-lg-0">
						<h1 class="h4">Detail Data Kunjungan</h1>
				</div>
		</div>
</div>

<div class="row">
	<div class="col-12 col-xl-6">
			<div class="row">
					<div class="col-12 mb-4">
							<div class="card border-0 shadow components-section">
									<div class="card-body">     
										<div class="row">
												<div class="row pb-2 g-0">
													<div class="col-sm-6 col-md-6 fw-bolder">No. Antri</div>
													<div class="col-6 col-md-6 text-muted">: {{$kunjungan->no_antrian}}</div>
												</div>
												<div class="row pb-2 g-0">
													<div class="col-sm-6 col-md-6 fw-bolder">Tanggal</div>
													<div class="col-6 col-md-6 text-muted">: 
														@php
															$day = array("Mon"=>"Senin","Tue"=>"Selasa","Wed"=>"Rabu","Thu"=>"Kamis");
															echo $day[date('D', strtotime($kunjungan->tanggal_kunjungan))].", ";
														@endphp
														{{date('d-m-Y', strtotime($kunjungan->tanggal_kunjungan))}}
													</div>
												</div>
												<div class="row pb-2 g-0 pb-2">
													<div class="col-sm-6 col-md-6 fw-bolder">Jam</div>
													<div class="col-6 col-md-6 text-muted">: {{date('H:i', strtotime($kunjungan->tanggal_kunjungan))}} - {{date('H:i', strtotime($kunjungan->tanggal_kunjungan.'+ 5 minute'))}}</div>
												</div>
												<div class="row pb-2 g-0 pt-2">
													<div class="col-sm-6 col-md-6 fw-bolder">Jumlah Pengikut Laki-laki</div>
													<div class="col-6 col-md-6 text-muted">: 
														@if ($kunjungan->jmh_pengikut_laki)
															{{$kunjungan->jmh_pengikut_laki}} orang
														@else
															-
														@endif
													</div>
												</div>
												<div class="row pb-2 g-0">
													<div class="col-sm-6 col-md-6 fw-bolder">Jumlah Pengikut Perempuan</div>
													<div class="col-6 col-md-6 text-muted">: 
														@if ($kunjungan->jmh_pengikut_perempuan)
															{{$kunjungan->jmh_pengikut_perempuan}} orang
														@else
															-
														@endif
													</div>
												</div>
												<div class="row pb-2 g-0">
													<div class="col-sm-6 col-md-6 fw-bolder">Jumlah Pengikut Anak-anak</div>
													<div class="col-6 col-md-6 text-muted">: 
														@if ($kunjungan->jmh_pengikut_anak)
															{{$kunjungan->jmh_pengikut_anak}} orang
														@else
															-
														@endif
													</div>
												</div>
												<div class="row pb-3 g-0" style="border-bottom: 1px dashed gray;">
													<div class="col-sm-6 col-md-6 fw-bolder">Petugas</div>
													<div class="col-6 col-md-6 text-muted">: {{$kunjungan->petugas->name}}</div>
												</div>

												<div class="text-center pt-3 pb-2">
													<h4>Data Pengunjung</h4>
												</div>
												<div class="row pb-4 g-0">
													<div class="col-sm-6 col-md-6 p-1">
														<img class="rounded" src="{{url('uploads/file_kk/'.$kunjungan->user->file_kk)}}" alt="File KK">
													</div>
													<div class="col-sm-6 col-md-6 p-1">
														<img class="rounded" src="{{url('uploads/file_ktp_user/'.$kunjungan->user->file_ktp)}}" alt="File KTP">
													</div>
												</div>
												<div class="row pb-2 g-0">
													<div class="col-sm-6 col-md-4 fw-bolder">Nama</div>
													<div class="col-6 col-md-8 text-muted">: {{$kunjungan->user->name}}</div>
												</div>
												<div class="row pb-2 g-0">
													<div class="col-sm-6 col-md-4 fw-bolder">Jenis Kelamin</div>
													<div class="col-6 col-md-8 text-muted">: {{$kunjungan->user->jenis_kelamin}}</div>
												</div>
												<div class="row pb-2 g-0">
													<div class="col-sm-6 col-md-4 fw-bolder">Alamat</div>
													<div class="col-6 col-md-8 text-muted">: {{$kunjungan->user->alamat}}</div>
												</div>
												<div class="row pb-2 g-0">
													<div class="col-sm-6 col-md-4 fw-bolder">No. Telephone</div>
													<div class="col-6 col-md-8 text-muted">: {{$kunjungan->user->no_telepon}}</div>
												</div>
												<div class="row pb-2 g-0">
													<div class="col-sm-6 col-md-4 fw-bolder">Email</div>
													<div class="col-6 col-md-8 text-muted">: {{$kunjungan->user->email}}</div>
												</div>
												<div class="row pb-2 g-0">
													<div class="col-sm-6 col-md-4 fw-bolder">Nomor KK</div>
													<div class="col-6 col-md-8 text-muted">: {{$kunjungan->user->no_kk}}</div>
												</div>
												<div class="row pb-2 g-0">
													<div class="col-sm-6 col-md-4 fw-bolder">Nomor NIK</div>
													<div class="col-6 col-md-8 text-muted">: {{$kunjungan->user->no_nik}}</div>
												</div>
										</div>
									</div>
							</div>
					</div>
			</div>
	</div>


	<div class="col-12 col-xl-6">
			<div class="row">
						<div class="card card-body border-0 shadow mb-4">
							<div class="row">
								<div class="col-7">
									<div class="row pb-2 g-0">
										<div class="col-sm-6 col-md-4 fw-bolder">Nama</div>
										<div class="col-6 col-md-8 text-muted">: {{$kunjungan->warga_rutan->name}}</div>
									</div>
									<div class="row pb-2 g-0">
										<div class="col-sm-6 col-md-4 fw-bolder">Tipe</div>
										<div class="col-6 col-md-8 text-muted">: {{$kunjungan->warga_rutan->tipe}}</div>
									</div>
									<div class="row pb-2 g-0">
										<div class="col-sm-6 col-md-4 fw-bolder">Kasus</div>
										<div class="col-6 col-md-8 text-muted">: {{$kunjungan->warga_rutan->kasus}}</div>
									</div>
									<div class="row pb-2 g-0">
										<div class="col-sm-6 col-md-4 fw-bolder">Hubungan Keluarga</div>
										<div class="col-6 col-md-8 text-muted">: {{$kunjungan->warga_rutan->hubungan}}</div>
									</div>
									<div class="row pb-2 g-0">
										<div class="col-sm-6 col-md-4 fw-bolder">Nomor NIK</div>
										<div class="col-6 col-md-8 text-muted">: {{$kunjungan->warga_rutan->no_nik}}</div>
									</div>
								</div>

								<div class="col-5">
									@if ($kunjungan->warga_rutan->file_foto)
										<img src="{{url('uploads/file_foto/'.$kunjungan->warga_rutan->file_foto)}}" height="200px">
									@endif
								</div>

								<div>
									<p class="fw-bolder">KTP Pelaku Kriminal</p>
									<div class="text-center">
										@if ($kunjungan->warga_rutan->file_ktp)
											<img src="{{url('uploads/file_ktp/'.$kunjungan->warga_rutan->file_ktp)}}" height="200px">
										@endif
									</div>
								</div>
							</div>
						</div>
			</div>
	</div>

</div>


@endsection