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

<div class="col-md-6 col-xs-12" style="margin: auto;">

	
	@foreach ($historys as $history)
		<div class="card border-0 shadow mb-4">
			<div class="card">
				<div class="card-header">
					{{date('d-m-Y', strtotime($history->tanggal_kunjungan))}}
				</div>
				<div class="card-body">
					<h5 class="card-title">{{$history->criminal->name}}</h5>
					<p class="card-text">Hubungan keluarga {{$history->criminal->hubungan}}</p>
					<a href="#" class="btn btn-primary">Lihat Detail</a>
				</div>
				<div class="card-footer text-muted text-end">
					Tanggal pendaftaran {{date('d F Y', strtotime($history->created_at))}}
				</div>
			</div>
		</div>
	@endforeach
	
</div>


@endsection