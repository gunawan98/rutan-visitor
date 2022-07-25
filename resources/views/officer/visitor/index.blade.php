@extends('officer.layout.administrator')

@section('title','Admin - Manajemen Data Pengunjung')

@push('on-head')
<link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endpush

@section('content')

<div class="py-4">
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item">
                <a href="#">
                    <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                </a>
            </li>
            <li class="breadcrumb-item"><a href="{{route('officer.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Kunjungan</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">Daftar Seluruh Kunjungan</h1>
            <p class="mb-0">Untuk memfilter data silahkan pilih filter pada tombol sebelah kanan.</p>
        </div>
        <div>

        </div>
    </div>
</div>

<div class="card border-0 shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-centered table-nowrap mb-0 rounded yajra-datatable">
                <thead class="thead-light">
                    <tr>
                        <th class="border-0 rounded-start">#</th>
                        <th class="border-0">Nama Akun</th>
                        <th class="border-0">Kriminal</th>
                        <th class="border-0">Pengikut Pria</th>
                        <th class="border-0">Pengikut Wanita</th>
                        <th class="border-0">Pengikut Anak</th>
                        <th class="border-0">No. Antrian</th>
                        <!-- <th class="border-0">Jam Kunjungan</th> -->
                        <th class="border-0"></th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@push('after-script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

<script type="text/javascript">
    $(function () {
        var table = $('.yajra-datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('officer.visitor.list') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'user',
                    name: 'user.name'
                },
                {
                    data: 'criminal',
                    name: 'criminal.name'
                },
                {
                    data: 'jmh_pengikut_laki',
                    name: 'jmh_pengikut_laki'
                },
                {
                    data: 'jmh_pengikut_perempuan',
                    name: 'jmh_pengikut_perempuan'
                },
                {
                    data: 'jmh_pengikut_anak',
                    name: 'jmh_pengikut_anak'
                },
                {
                    data: 'no_antrian',
                    name: 'no_antrian'
                },

            ]
        });

    });

</script>

@endpush
