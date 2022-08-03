@extends('officer.layout.administrator')

@section('title','Admin - Jadwal Jaga')

@if(session('petugas_create'))
@push('after-script')
<script>
	swalWithBootstrapButtons.fire({
		icon: 'success',
		title: 'Berhasil',
		text: `{{Session::get('petugas_create')}}`,
		showConfirmButton: true,
	});
</script>
@endpush
@endif

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
						<li class="breadcrumb-item active" aria-current="page">Jadwal</li>
				</ol>
		</nav>
</div>

<div class="row">
		<div class="col-12 mb-4">
				<div class="card border-0 shadow components-section">
						<div class="card-body">   
							<form action="{{route('officer.jadwal.create')}}" method="post">
								@csrf
								<div class="row mb-4">
										<div class="col-lg-3 col-sm-3">
												<div class="mb-3">
													<label for="hari">Senin</label> 
													<br>
													@foreach ($data_mon as $data)
														<small class="text-muted"><i>*Saat ini: <strong>{{$data->petugas->name}}</strong></i></small> 
													@endforeach
												</div>
												<div class="mb-3">
													<label class="my-1 me-2" for="Mon">ID Petugas</label>
													<select class="form-select @error('Mon') is-invalid @enderror" id="Mon" name="Mon" aria-label="Default select example">
														<option value=""></option>
														@foreach ($data_petugas as $petugas)
															<option value="{{$petugas->id}}">{{$petugas->name}} - {{$petugas->jabatan}}</option>
														@endforeach
													</select>
													@error('Mon')
														<div class="invalid-feedback">{{ $message }}</div>
													@enderror
												</div>
										</div>
										<div class="col-lg-3 col-sm-3">
												<div class="mb-3">
														<label for="hari">Selasa</label>
														<br>
														@foreach ($data_tue as $data)
															<small class="text-muted"><i>*Saat ini: <strong>{{$data->petugas->name}}</strong></i></small> 
														@endforeach
												</div>
												<div class="mb-3">
													<label class="my-1 me-2" for="Tue">ID Petugas</label>
													<select class="form-select @error('Tue') is-invalid @enderror" id="Tue" name="Tue" aria-label="Default select example">
														<option value=""></option>
														@foreach ($data_petugas as $petugas)
															<option value="{{$petugas->id}}">{{$petugas->name}} - {{$petugas->jabatan}}</option>
														@endforeach
													</select>
													@error('Tue')
														<div class="invalid-feedback">{{ $message }}</div>
													@enderror
												</div>
										</div>
										<div class="col-lg-3 col-sm-3">
												<div class="mb-3">
														<label for="hari">Rabu</label>
														<br>
														@foreach ($data_wed as $data)
															<small class="text-muted"><i>*Saat ini: <strong>{{$data->petugas->name}}</strong></i></small> 
														@endforeach
												</div>
												<div class="mb-3">
													<label class="my-1 me-2" for="Wed">ID Petugas</label>
													<select class="form-select @error('Wed') is-invalid @enderror" id="Wed" name="Wed" aria-label="Default select example">
														<option value=""></option>
														@foreach ($data_petugas as $petugas)
															<option value="{{$petugas->id}}">{{$petugas->name}} - {{$petugas->jabatan}}</option>
														@endforeach
													</select>
													@error('Wed')
														<div class="invalid-feedback">{{ $message }}</div>
													@enderror
												</div>
										</div>
										<div class="col-lg-3 col-sm-3">
												<div class="mb-3">
														<label for="hari">Kamis</label>
														<br>
														@foreach ($data_thu as $data)
															<small class="text-muted"><i>*Saat ini: <strong>{{$data->petugas->name}}</strong></i></small> 
														@endforeach
												</div>
												<div class="mb-3">
													<label class="my-1 me-2" for="Thu">ID Petugas</label>
													<select class="form-select @error('Thu') is-invalid @enderror" id="Thu" name="Thu" aria-label="Default select example">
														<option value=""></option>
														@foreach ($data_petugas as $petugas)
															<option value="{{$petugas->id}}">{{$petugas->name}} - {{$petugas->jabatan}}</option>
														@endforeach
													</select>
													@error('Thu')
														<div class="invalid-feedback">{{ $message }}</div>
													@enderror
												</div>
										</div>
								</div>
								<div class="row mb-2 justify-content-md-center">
									<div class="col-lg-6 col-sm-6">
										<div class="mb-3 d-grid">
											<button type="submit" class="btn btn-sm btn-secondary align-items-center">
												<svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
												Simpan
											</button>
										</div>
									</div>
								</div>
							</form>
						</div>
				</div>
		</div>
</div>

<div class="card border-0 shadow mb-4">
		<div class="card-body">
				<h3>Petugas</h3>

				<form class="row gy-2 gx-3 align-items-center" method="post" action="{{route('officer.create.petugas')}}">
					@csrf
					<div class="col-auto">
						<div class="mb-3">
								<div class="input-group">
										<span class="input-group-text" id="basic-addon1">
												<svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>  
										</span>
										<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Nama">
										@error('name')
										<div class="invalid-feedback">{{ $message }}</div>
										@enderror
								</div>
						</div>
					</div>
					<div class="col-auto">
						<div class="mb-3">
								<div class="input-group">
										<span class="input-group-text" id="basic-addon1">
											<svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a1 1 0 00-1 1v1a1 1 0 002 0V3a1 1 0 00-1-1zM4 4h3a3 3 0 006 0h3a2 2 0 012 2v9a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2zm2.5 7a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm2.45 4a2.5 2.5 0 10-4.9 0h4.9zM12 9a1 1 0 100 2h3a1 1 0 100-2h-3zm-1 4a1 1 0 011-1h2a1 1 0 110 2h-2a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
										</span>
										<input type="text" class="form-control @error('jabatan') is-invalid @enderror" name="jabatan" value="{{ old('jabatan') }}" placeholder="Jabatan">
										@error('jabatan')
										<div class="invalid-feedback">{{ $message }}</div>
										@enderror
								</div>
						</div>
					</div>
					<div class="col-auto">
						<div class="mb-3">
							<button type="submit" class="btn btn-primary">Tambah</button>
						</div>
					</div>
				</form>

				<div class="table-responsive">
						<table class="table table-centered table-nowrap mb-0 rounded">
								<thead class="thead-light">
										<tr>
												<th class="border-0 rounded-start">#</th>
												<th class="border-0">Nama</th>
												<th class="border-0">Jabatan</th>
												<th class="border-0"></th>
										</tr>
								</thead>
								<tbody>
									@foreach ($data_petugas as $data)
									<tr>
											<td>{{ $loop->iteration }}</td>
											<td class="fw-bold align-items-center">
													<svg class="icon icon-xxs text-gray-500 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
													{{$data->name}}
											</td>
											<td>
													{{$data->jabatan}}
											</td>
											<td>
												<form method="POST" action="{{route('officer.delete.petugas', $data->id)}}">
														@csrf
														@method('delete')

														<div class="form-group">
															<button type="submit" class="btn btn-sm btn-danger d-inline-flex align-items-center">
																<svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
																Hapus
															</button>
														</div>
												</form>
													
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

@push('after-script')
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@endpush