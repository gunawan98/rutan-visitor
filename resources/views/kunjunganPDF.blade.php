<!DOCTYPE html>
<html>
<head>
    <title>Laporan Data Kunjungan Bagi Tahanan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <h1>{{ $title }}</h1>

    @if($date)
		<p>
			Tanggal : {{ date('d-m-Y', strtotime($date)) }}
			<br>
			Total&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$total}} data
		</p>

    <p class="text-muted">Berikut merupakan data kunjungan berdasarkan pada data keterangan diatas.</p> 
		@endif

    <table class="table table-bordered">
				<tr>
						<th>Tanggal</th>
						<th>Waktu</th>
						<th>Petugas</th>
						<th>Nama Pengunjung</th>
						<th>Warga Rutan</th>
				</tr>

        @foreach ($data_kunjungan as $data)
        <tr>
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
						<td>
								{{$data->jadwal_kunjungan->petugas->nama_petugas}}
						</td>
						@foreach ($data->detail_kunjungan as $detail_kunjungan)
							
							<td>
									{{$detail_kunjungan->pengunjung->nama_pengunjung}}
							</td>
							<td>
								@foreach ($detail_kunjungan->pengunjung->detail_keluarga as $detail_keluarga)
									{{$detail_keluarga->warga_rutan->nama_warga_rutan}}
								@endforeach
							</td>
							
						@endforeach
        </tr>

        @endforeach

    </table>

</body>

</html>