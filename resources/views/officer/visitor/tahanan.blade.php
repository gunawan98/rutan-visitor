@extends('officer.layout.administrator')

@section('title','Admin - Manajemen Data Pengunjung')

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
						<li class="breadcrumb-item active" aria-current="page">Kunjungan Tipe Tahanan</li>
				</ol>
		</nav>
		<div class="d-flex justify-content-between w-100 flex-wrap">
				<div class="mb-3 mb-lg-0">
						<h1 class="h4">Daftar Kunjungan Tipe Tahanan</h1>
						<p class="mb-0">Untuk memfilter data silahkan pilih filter pada tombol sebelah kanan.</p>
				</div>
				<div class="text-end">
					<form class="row g-3" method="GET">
						<div class="row g-3">
							<div class="col-sm-5 me-6">
								<select class="form-select ms-6" name="filter">
									<option value="">Default</option>
									@foreach ($date_draft as $key => $data)
										<option value="{{date('Y-m-d', strtotime($key))}}">{{date('Y-m-d', strtotime($key))}}</option>
									@endforeach
								</select>
							</div>
							<div class="col-sm-1">
								<button type="submit" class="btn btn-primary mb-3">Search</button>
							</div>
						</div>
					</form>
				</div>
		</div>
</div>

<div class="card border-0 shadow mb-4">
		<div class="card-body">
				<div class="table-responsive">
						<table class="table table-centered table-nowrap mb-0 rounded">
								<thead class="thead-light">
										<tr>
												<th class="border-0 rounded-start">No. Antri</th>
												<th class="border-0">Tanggal</th>
												<th class="border-0">Jam</th>
												<th class="border-0">Nama Akun</th>
												<th class="border-0">Kriminal</th>
												<th class="border-0">Pengikut Pria</th>
												<th class="border-0">Pengikut Wanita</th>
												<th class="border-0">Pengikut Anak</th>
										</tr>
								</thead>
								<tbody>
									@foreach ($data_kunjungan as $data)
									<tr>
											<td class="text-center">
												<strong>
													{{ $data->no_antrian }}
												</strong>
											</td>
											<td>
												@php
													$day = array("Mon"=>"Senin","Tue"=>"Selasa","Wed"=>"Rabu","Thu"=>"Kamis");
													echo $day[date('D', strtotime($data->tanggal_kunjungan))].", ";
												@endphp
												{{date('d-m-Y', strtotime($data->tanggal_kunjungan))}}
											</td>
											<td>
												{{date('H:i', strtotime($data->tanggal_kunjungan))}} - {{date('H:i', strtotime($data->tanggal_kunjungan.'+ 5 minute'))}}
											</td>
											<td class="fw-bold align-items-center">
													<svg class="icon icon-xxs text-gray-500 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
													{{$data->user->name}}
											</td>
											<td>
													{{$data->criminal->name}}
											</td>
											<td class="text-center">
												{{ $data->jmh_pengikut_laki }}
											</td>
											<td class="text-center">
												{{ $data->jmh_pengikut_perempuan }}
											</td>
											<td class="text-center">
												{{ $data->jmh_pengikut_anak }}
											</td>
											<!-- <td class="text-success">
												<a href="{{route('officer.user.show', $data->id)}}">
													<button type="button" class="btn btn-sm btn-secondary d-inline-flex align-items-center">
															<svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
															Detail
													</button>
												</a>
											</td> -->
									</tr>
									@endforeach
								</tbody>
						</table>
				</div>
		</div>
</div>


@endsection