@extends('template.administrator')

@section('title','Rutan Visitors Web App')

@section('content')

@if(session('visitor_success'))
@push('scripts')
<script>
	swalWithBootstrapButtons.fire({
		icon: 'success',
		title: 'Sukses',
		text: 'Pendaftaran kunjungan berhasil disimpan.',
		showConfirmButton: true,
	});
</script>
@endpush
@endif

<div class="col-md-6 col-xs-12 pb-5" style="margin: auto;">
	
	@forelse ($historys as $history)
		<div class="card border-0 shadow mb-4">
			<div class="card">
				<div class="card-header">
					<div class="row">
						<div class="col-xs-6 col-md-6">
							<svg class="w-6 h-6" fill="none" stroke="currentColor" width="25" height="25" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
			
							@php
								$day = array("Mon"=>"Senin","Tue"=>"Selasa","Wed"=>"Rabu","Thu"=>"Kamis");
								echo $day[date('D', strtotime($history->tanggal_kunjungan))].", ";
							@endphp
							{{date('d-m-Y', strtotime($history->tanggal_kunjungan))}}
						</div>
						<div class="col-xs-6 col-md-6 text-end">
							<svg class="w-6 h-6" fill="none" stroke="currentColor" width="25" height="25" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>

							{{date('H:i', strtotime($history->tanggal_kunjungan))}} - {{date('H:i', strtotime($history->tanggal_kunjungan.'+ 5 minute'))}}
						</div>
					</div>
				
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-sm-6">
							<h5 class="card-title">Target Kunjungan</h5>
							<div class="row pb-2 g-0">
								<p class="fw-bolder">Nama</p>
								<span class="card-text text-muted" style="margin-top: -15px; margin-left: 5px"><em>* {{$history->warga_rutan->name}}</em></span>
							</div>
							<div class="row pb-2 g-0">
								<p class="fw-bolder">Tipe</p>
								<span class="card-text text-muted" style="margin-top: -15px; margin-left: 5px"><em>* {{$history->warga_rutan->tipe}}</em></span>
							</div>
							<div class="row pb-2 g-0">
								<p class="fw-bolder">Kasus</p>
								<span class="card-text text-muted" style="margin-top: -15px; margin-left: 5px"><em>* {{$history->warga_rutan->kasus}}</em></span>
							</div>
							<div class="row pb-2 g-0">
								<p class="fw-bolder">Hubungan</p>
								<span class="card-text text-muted" style="margin-top: -15px; margin-left: 5px"><em>* {{$history->warga_rutan->hubungan}}</em></span>
							</div>
						</div>
						<div class="col-sm-6">
							<h5 class="card-title">Nomor Antrian</h5>
							<div 
								class="bg-secondary text-primary"
								style="
									margin: 0 auto;
									max-width: 50%;
									height: 100px;
									border-radius: 10px;
									text-align: center;
									padding: 25px;
									box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
								"
							>
								<h1>{{$history->no_antrian}}</h1>
							</div>
							<p class="text-danger mt-5"><small><em>NB: Harap hadir sebelum waktu nomor antrian</em></small></p>
							<p class="text-primary"><small>Petugas: {{$history->petugas->name}}</small></p>
						</div>
					</div>

				</div>
				<div class="card-footer text-muted text-end">
					Tanggal pendaftaran {{date('d F Y', strtotime($history->created_at))}}
				</div>
			</div>
		</div>
	@empty
		<div class="card border-0 shadow mb-4">
			<div class="card">
				<div class="card-header">
					
				</div>
				<div class="card-body">
					<h5 class="card-title">Anda belum pernah melakukan kunjungan</h5>
					<p class="card-text">Silahkan pilih menu pendaftaran kunjungan kemudian isi data sesuai ketentuan.</p>
				</div>
				<div class="card-footer text-muted text-end">
					©<span class="current-year"></span> <a class="text-primary fw-normal" href="#">RUTAN Kraksaan</a>
				</div>
			</div>
		</div>

	@endforelse
	
</div>


@endsection