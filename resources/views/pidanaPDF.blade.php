<!DOCTYPE html>
<html>
<head>
    <title>Laporan Data Kunjungan Bagi Narapidana</title>
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
						<th>No. Antri</th>
						<th>Tanggal</th>
						<th>Jam</th>
						<th>Nama Akun</th>
						<th>Warga Rutan</th>
				</tr>

        @foreach ($data_kunjungan as $data)
        <tr>
            <td>{{ $data->no_antrian }}</td>
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
								{{$data->user->name}}
						</td>
						<td>
								{{$data->warga_rutan->name}}
						</td>
        </tr>

        @endforeach

    </table>

</body>

</html>