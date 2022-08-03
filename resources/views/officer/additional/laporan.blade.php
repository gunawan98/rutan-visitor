@extends('officer.layout.administrator')

@section('title','Admin - Laporan')

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
						<li class="breadcrumb-item active" aria-current="page">Laporan</li>
				</ol>
		</nav>
</div>

<div class="row">

	<div class="col-xs-12 col-md-6">
		<div class="card border-0 shadow mb-4">
				<div class="card-body">

				<div class="row">
					<div class="col-md-9"><h4>Pengunjung Tipe Tahanan</h4></div>
					<div class="col-md-3">
					<a href="{{route('officer.download.tahanan')}}">
						<button type="button" class="btn btn-xs btn-secondary align-items-center">
							<svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
							Download
						</button>
					</a>
					</div>
				</div>
				
				<p></p>
				<ul class="timeline">
					@forelse ($inf_tahanan as $key => $data)
						<li class="timeline-item mb-5">
							<p class="text-muted mb-2 fw-bold">
								@php
									$day = array("Mon"=>"Senin","Tue"=>"Selasa","Wed"=>"Rabu","Thu"=>"Kamis");
									echo $day[date('D', strtotime($key))].", ";
								@endphp
								{{date('d-m-Y', strtotime($key))}}
							</p>
							
							<div class="row">
								<div class="col-6">
									<span class="text-danger">
										<a href="{{route('officer.download.tahanan',['tanggal'=>date('Y-m-d', strtotime($key)), 'total'=>$data->count()])}}">download data {{date('d-m-Y', strtotime($key))}}</a>
									</span>
								</div>
								<div class="col-6">
									<span class="text-muted" style="font-weight: 200;">{{$data->count()}} data</span>
								</div>
							</div>

						</li>
						@empty
						<h6 class="text-muted">Belum ada data terdaftar.</h6>
					@endforelse
				</ul>	
					
				</div>
		</div>
	</div>

	<div class="col-xs-12 col-md-6">
		<div class="card border-0 shadow mb-4">
				<div class="card-body">

				<div class="row">
					<div class="col-md-9"><h4>Pengunjung Tipe Narapidana</h4></div>
					<div class="col-md-3">
					<a href="{{route('officer.download.pidana')}}">
						<button type="button" class="btn btn-xs btn-secondary align-items-center">
							<svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
							Download
						</button>
					</a>
					</div>
				</div>

				<p></p>
				<ul class="timeline">
					@forelse ($inf_pidana as $key => $data)
						<li class="timeline-item mb-5">
							<p class="text-muted mb-2 fw-bold">
								@php
									$day = array("Mon"=>"Senin","Tue"=>"Selasa","Wed"=>"Rabu","Thu"=>"Kamis");
									echo $day[date('D', strtotime($key))].", ";
								@endphp
								{{date('d-m-Y', strtotime($key))}}
							</p>
							
							<div class="row">
								<div class="col-6">
									<span class="text-danger">
										<a href="{{route('officer.download.pidana',['tanggal' => date('Y-m-d', strtotime($key)), 'total'=>$data->count()])}}">download data {{date('d-m-Y', strtotime($key))}}</a>
									</span>
								</div>
								<div class="col-6">
									<span class="text-muted" style="font-weight: 200;">{{$data->count()}} data</span>
								</div>
							</div>
						</li>
						@empty
						<h6 class="text-muted">Belum ada data terdaftar.</h6>
					@endforelse
				</ul>	
					
				</div>
		</div>
	</div>

</div>


@endsection

@push('on-head')
<style>

.timeline {
      border-left: 1px solid hsl(0, 0%, 90%);
      position: relative;
      list-style: none;
    }

    .timeline .timeline-item {
      position: relative;
    }

    .timeline .timeline-item:after {
      position: absolute;
      display: block;
      top: 0;
    }

    .timeline .timeline-item:after {
      background-color: hsl(0, 0%, 90%);
      left: -38px;
      border-radius: 50%;
      height: 11px;
      width: 11px;
      content: "";
    }

</style>
@endpush
