@extends('template.administrator')

@section('title','Rutan Visitors Web App')

@section('content')

<div class="row justify-content-md-center">


<div class="col-xs-12 col-md-6">
	<div class="card border-0 shadow mb-4">
			<div class="card-body">

			<h4>Informasi Antrian Pengunjung</h4>
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
						
						@foreach ($data as $list)
							<div class="row">
								<div class="col-4 ps-4">
									<span class="text-danger">
										{{date('H:i', strtotime($list->tanggal_kunjungan))}} - {{date('H:i', strtotime($list->tanggal_kunjungan.'+ 5 minute'))}}
									</span>
								</div>
								<div class="col-8">
									@foreach ($list->detail_kunjungan as $datakun)
										
									<div class="col-8">
										<span class="text-muted">{{$datakun->pengunjung->nama_pengunjung}}</span>
										<br>
										<span class="text-muted" style="font-weight: 200;">{{$datakun->pengunjung->alamat}}</span>
									</div>
									@endforeach										
								</div>
							</div>
						@endforeach
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

@push('styles')
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