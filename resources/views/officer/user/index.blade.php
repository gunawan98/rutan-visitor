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
						<li class="breadcrumb-item"><a href="{{route('officer.dashboard')}}">Dashboard</a></li>
						<li class="breadcrumb-item active" aria-current="page">Data Pengguna</li>
				</ol>
		</nav>
		<div class="d-flex justify-content-between w-100 flex-wrap">
				<div class="mb-3 mb-lg-0">
						<h1 class="h4">Informasi Pengguna Akun</h1>
						<p class="mb-0">Klik tombol detail untuk melihat lebih lanjut.</p>
				</div>
		</div>
</div>

<div class="card border-0 shadow mb-4">
		<div class="card-body">
				<div class="table-responsive">
						<table class="table table-centered table-nowrap mb-0 rounded">
								<thead class="thead-light">
										<tr>
												<th class="border-0 rounded-start">#</th>
												<th class="border-0">Nama</th>
												<th class="border-0">Alamat</th>
												<th class="border-0">No. Telepon</th>
												<th class="border-0"></th>
										</tr>
								</thead>
								<tbody>
									@foreach ($data_users as $data)
									<tr>
											<td>{{ $loop->iteration }}</td>
											<td class="fw-bold align-items-center">
													<svg class="icon icon-xxs text-gray-500 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
													{{$data->name}}
											</td>
											<td>
													{{$data->alamat}}
											</td>
											<td>
												<a class="small fw-bold" href="#">{{ $data->no_telepon }}</a>
											</td>
											<td class="text-success">
												<a href="{{route('officer.user.show', $data->id)}}">
													<button type="button" class="btn btn-sm btn-secondary d-inline-flex align-items-center">
															<svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
															Detail
													</button>
												</a>
											</td>
									</tr>
									@endforeach
								</tbody>
						</table>
				</div>
		</div>
</div>


@endsection