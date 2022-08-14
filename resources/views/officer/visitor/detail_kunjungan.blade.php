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
						<li class="breadcrumb-item active" aria-current="page"><a href="{{route('officer.visitor.kunjungan')}}">Kunjungan</a></li>
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
													<div class="col-sm-6 col-md-4 fw-bolder">No. Antri</div>
													<div class="col-6 col-md-8 text-muted">: {{$kunjungan->no_antri}}</div>
												</div>
												<div class="row pb-2 g-0">
													<div class="col-sm-6 col-md-4 fw-bolder">Tanggal</div>
													<div class="col-6 col-md-8 text-muted">: 
														@php
															$day = array("Mon"=>"Senin","Tue"=>"Selasa","Wed"=>"Rabu","Thu"=>"Kamis");
															echo $day[date('D', strtotime($kunjungan->tanggal_kunjungan))].", ";
														@endphp
														{{date('d-m-Y', strtotime($kunjungan->tanggal_kunjungan))}}
													</div>
												</div>
												<div class="row pb-2 g-0 pb-2">
													<div class="col-sm-6 col-md-4 fw-bolder">Jam</div>
													<div class="col-6 col-md-8 text-muted">: {{date('H:i', strtotime($kunjungan->tanggal_kunjungan))}} - {{date('H:i', strtotime($kunjungan->tanggal_kunjungan.'+ 5 minute'))}}</div>
												</div>
												<!-- <div class="row pb-2 g-0 pt-2">
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
												</div> -->
												<div class="row pb-3 g-0" style="border-bottom: 1px dashed gray;">
													<div class="col-sm-6 col-md-4 fw-bolder">Petugas</div>
													<div class="col-6 col-md-8 text-muted">: {{$kunjungan->jadwal_kunjungan->petugas->nama_petugas}}</div>
												</div>

												<div class="text-center pt-3 pb-2">
													<h4>Data Pengunjung</h4>
												</div>
												<div class="row pb-2 g-0">
													<div class="col-sm-6 col-md-4 fw-bolder">Username</div>
													<div class="col-6 col-md-8 text-muted">: {{$detail_kunjungan->pengunjung->username}}</div>
												</div>
												<div class="row pb-2 g-0">
													<div class="col-sm-6 col-md-4 fw-bolder">Nomor NIK</div>
													<div class="col-6 col-md-8 text-muted">: {{$detail_kunjungan->pengunjung->nik}}</div>
												</div>
												<div class="row pb-2 g-0">
													<div class="col-sm-6 col-md-4 fw-bolder">Nama</div>
													<div class="col-6 col-md-8 text-muted">: {{$detail_kunjungan->pengunjung->nama_pengunjung}}</div>
												</div>
												<div class="row pb-2 g-0">
													<div class="col-sm-6 col-md-4 fw-bolder">Jenis Kelamin</div>
													<div class="col-6 col-md-8 text-muted">: {{$detail_kunjungan->pengunjung->jenis_kelamin}}</div>
												</div>
												<div class="row pb-2 g-0">
													<div class="col-sm-6 col-md-4 fw-bolder">Alamat</div>
													<div class="col-6 col-md-8 text-muted">: {{$detail_kunjungan->pengunjung->alamat}}</div>
												</div>
												<div class="row pb-2 g-0">
													<div class="col-sm-6 col-md-4 fw-bolder">No. Telephone</div>
													<div class="col-6 col-md-8 text-muted">: {{$detail_kunjungan->pengunjung->no_telepon}}</div>
												</div>
												
										</div>
									</div>
							</div>
					</div>
			</div>
	</div>


	<div class="col-12 col-xl-5">
			<div class="row">
						<div class="card card-body border-0 shadow mb-4">
							<div class="row">
								<div class="col-9">
									<div class="pb-2">
										<h4>Data Kriminal</h4>
									</div>
									@foreach ($detail_kunjungan->pengunjung->detail_keluarga as $detail_keluarga)

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
										
									@endforeach
								</div>

							</div>
						</div>
			</div>
	</div>

</div>


@endsection