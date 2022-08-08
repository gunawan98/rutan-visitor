@extends('officer.layout.administrator')

@section('title','Admin - Manajemen Data Pengunjung')

@push('on-head')
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@endpush

@if(session()->has('success'))
@push('after-script')
<script>
	swalWithBootstrapButtons.fire({
			icon: 'success',
			title: 'Sukses',
			text: "{{ session()->get('message') }}",
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
						<li class="breadcrumb-item active" aria-current="page">Data Pengunjung</li>
				</ol>
		</nav>
		<div class="d-flex justify-content-between w-100 flex-wrap">
				<div class="mb-3 mb-lg-0">
						<h1 class="h4">Informasi Pengunjung</h1>
						<p class="mb-0">Klik tombol tambah untuk menambahkan pengunjung.</p>
				</div>

				<div class="text-end">
					<a href="{{route('officer.pengunjung.create')}}">
							<button type="button" class="btn btn-sm btn-secondary d-inline-flex align-items-center">
								<svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z"></path></svg>
								Tambah
							</button>
					</a>
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
												<th class="border-0">Email</th>
												<th class="border-0">Status</th>
												<th class="border-0"></th>
										</tr>
								</thead>
								<tbody>
									@foreach ($pengunjung as $data)
									<tr>
											<td>{{ $loop->iteration }}</td>
											<td class="fw-bold align-items-center">
													<svg class="icon icon-xxs text-gray-500 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
													{{$data->nama}}
											</td>
											<td>
													{{$data->alamat}}
											</td>
											<td class="small fw-bold">
												{{ $data->no_telepon }}
											</td>
											<td>
												<a class="small fw-bold" href="#">{{ $data->email }}</a>
											</td>
											<td>
												@if ($data->status == 'y')
													<span class="text-success">Aktif</span>
												@else
													<span class="text-muted">Tidak aktif</span>
												@endif
											</td>
											<td>
												<a href="{{route('officer.pengunjung.edit', $data->id)}}">
													<button type="button" class="btn btn-sm btn-secondary d-inline-flex align-items-center">
															<svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
															Edit
													</button>
												</a>
												<button type="button" class="btn btn-danger btn-sm" onclick="deleteItem(this)" data-id="{{ $data->id }}">
													<svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> Hapus
												</button>
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
<script type="application/javascript">

	function deleteItem(e){

			let id = e.getAttribute('data-id');

			const swalWithBootstrapButtons = Swal.mixin({
					customClass: {
							confirmButton: 'btn btn-success mx-3',
							cancelButton: 'btn btn-danger mx-3'
					},
					buttonsStyling: false
			});

			swalWithBootstrapButtons.fire({
					title: 'Apakah anda yakin?',
					text: "Konfirmasi tombol dibawah ini.",
					icon: 'warning',
					showCancelButton: true,
					confirmButtonText: 'Hapus',
					cancelButtonText: 'Batal',
					reverseButtons: true
			}).then((result) => {
					if (result.value) {
							if (result.isConfirmed){

									$.ajax({
											type:'DELETE',
											url:'{{url("officer/data/pengunjung")}}/'+id,
											data:{
													"_token": "{{ csrf_token() }}",
											},
											success:function(data) {
													if (data.success){
															swalWithBootstrapButtons.fire({
																	title: "Sukses",
																	text: "Data berhasil dihapus.",
																	type: "success",
																	icon: 'success',
															})
															.then(function() {
																window.location.href = "/officer/data/pengunjung";
															});
													}

											}
									});

							}

					} else if (
							result.dismiss === Swal.DismissReason.cancel
					) {
							swalWithBootstrapButtons.fire(
									'Cancelled',
									'Hapus data dibatalkan.',
									'error'
							);
					}
			});

	}

</script>
@endpush