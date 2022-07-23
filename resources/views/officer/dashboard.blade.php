@extends('officer.layout.administrator')

@section('title','Admin - Dashboard')

@section('content')

<div class="row pt-5">
	<div class="col-12 col-sm-6 col-xl-4 mb-4">
			<div class="card border-0 shadow">
					<div class="card-body">
							<div class="row d-block d-xl-flex align-items-center">
									<div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
											<div class="icon-shape icon-shape-primary rounded me-4 me-sm-0">
													<svg class="icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path></svg>
											</div>
											<div class="d-sm-none">
													<h2 class="h5">Pengguna</h2>
													<h3 class="fw-extrabold mb-1">{{$total_users}} Akun</h3>
											</div>
									</div>
									<div class="col-12 col-xl-7 px-xl-0">
											<div class="d-none d-sm-block">
													<h2 class="h6 text-gray-400 mb-0">Pengguna</h2>
													<h3 class="fw-extrabold mb-2">{{$total_users}} akun</h3>
											</div>
											<small class="d-flex align-items-center text-gray-500">
													{{date('M Y', strtotime($oldest_users->created_at))}} - {{date('M Y', strtotime('today GMT'))}},
											</small>
											<small class="d-flex align-items-center text-gray-500">
													<svg class="icon icon-xxs text-gray-500 me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM4.332 8.027a6.012 6.012 0 011.912-2.706C6.512 5.73 6.974 6 7.5 6A1.5 1.5 0 019 7.5V8a2 2 0 004 0 2 2 0 011.523-1.943A5.977 5.977 0 0116 10c0 .34-.028.675-.083 1H15a2 2 0 00-2 2v2.197A5.973 5.973 0 0110 16v-2a2 2 0 00-2-2 2 2 0 01-2-2 2 2 0 00-1.668-1.973z" clip-rule="evenodd"></path></svg>
													Time
											</small> 
									</div>
							</div>
					</div>
			</div>
	</div>
	<div class="col-12 col-sm-6 col-xl-4 mb-4">
			<div class="card border-0 shadow">
					<div class="card-body">
							<div class="row d-block d-xl-flex align-items-center">
									<div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
											<div class="icon-shape icon-shape-secondary rounded me-4 me-sm-0">
													<svg class="icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path></svg>
											</div>
											<div class="d-sm-none">
													<h2 class="fw-extrabold h5">Tahanan</h2>
													<h3 class="mb-1">{{$total_tahanan}} orang</h3>
											</div>
									</div>
									<div class="col-12 col-xl-7 px-xl-0">
											<div class="d-none d-sm-block">
													<h2 class="h6 text-gray-400 mb-0">Tahanan</h2>
													<h3 class="fw-extrabold mb-2">{{$total_tahanan}} orang</h3>
											</div>
											<small class="d-flex align-items-center text-gray-500">
													{{date('M Y', strtotime($oldest_tahanan->created_at))}} - {{date('M Y', strtotime('today GMT'))}},  
											</small> 
											<small class="d-flex align-items-center text-gray-500">
													<svg class="icon icon-xxs text-gray-500 me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM4.332 8.027a6.012 6.012 0 011.912-2.706C6.512 5.73 6.974 6 7.5 6A1.5 1.5 0 019 7.5V8a2 2 0 004 0 2 2 0 011.523-1.943A5.977 5.977 0 0116 10c0 .34-.028.675-.083 1H15a2 2 0 00-2 2v2.197A5.973 5.973 0 0110 16v-2a2 2 0 00-2-2 2 2 0 01-2-2 2 2 0 00-1.668-1.973z" clip-rule="evenodd"></path></svg>
													Time
											</small> 
									</div>
							</div>
					</div>
			</div>
	</div>
	<div class="col-12 col-sm-6 col-xl-4 mb-4">
			<div class="card border-0 shadow">
					<div class="card-body">
							<div class="row d-block d-xl-flex align-items-center">
									<div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
											<div class="icon-shape icon-shape-tertiary rounded me-4 me-sm-0">
													<svg class="icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 0l-2 2a1 1 0 101.414 1.414L8 10.414l1.293 1.293a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
											</div>
											<div class="d-sm-none">
													<h2 class="fw-extrabold h5">Pidana</h2>
													<h3 class="mb-1">{{$total_pidana}} orang</h3>
											</div>
									</div>
									<div class="col-12 col-xl-7 px-xl-0">
											<div class="d-none d-sm-block">
													<h2 class="h6 text-gray-400 mb-0">Pidana</h2>
													<h3 class="fw-extrabold mb-2">{{$total_pidana}} orang</h3>
											</div>
											<small class="d-flex align-items-center text-gray-500">
													{{date('M Y', strtotime($oldest_pidana->created_at))}} - {{date('M Y', strtotime('today GMT'))}},  
											</small> 
											<small class="d-flex align-items-center text-gray-500">
													<svg class="icon icon-xxs text-gray-500 me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM4.332 8.027a6.012 6.012 0 011.912-2.706C6.512 5.73 6.974 6 7.5 6A1.5 1.5 0 019 7.5V8a2 2 0 004 0 2 2 0 011.523-1.943A5.977 5.977 0 0116 10c0 .34-.028.675-.083 1H15a2 2 0 00-2 2v2.197A5.973 5.973 0 0110 16v-2a2 2 0 00-2-2 2 2 0 01-2-2 2 2 0 00-1.668-1.973z" clip-rule="evenodd"></path></svg>
													Time
											</small> 
									</div>
							</div>
					</div>
			</div>
	</div>
	<div class="col-12 mb-4">
			<div class="card bg-yellow-100 border-0 shadow">
					<div class="card-header d-sm-flex flex-row align-items-center flex-0">
							<div class="d-block mb-3 mb-sm-0">
									<div class="fs-5 fw-normal mb-2">Grafik Kunjungan Pelayanan per Bulan</div>
									<h2 class="fs-3 fw-extrabold">{{$total_visitor}} history kunjungan</h2>
									<div class="small mt-2"> 
											<span class="fw-normal me-2">Antrian kunjungan</span>                              
											<span class="fas fa-angle-up text-success"></span>                                   
											<span class="text-success fw-bold">{{$total_visitor_new}} data</span>
									</div>
							</div>
							<div class="d-flex ms-auto">
									<a href="#" class="btn btn-secondary text-dark btn-sm me-2">Per Bulan</a>
							</div>
					</div>
					<div class="card-body p-2">
							<div class="ct-chart-sales-value ct-double-octave ct-series-g"></div>
					</div>
			</div>
	</div>
</div>


@endsection

@push('after-script')
	<script>
		const doc = document;
		doc.addEventListener("DOMContentLoaded", function(event) {
			if(doc.querySelector('.ct-chart-sales-value')) {
        
					let list_months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
					const temp = [];
					for(let i=0; i<12; i++){
							let cek_month = <?php echo json_encode($visitor_chart) ?>;
							let data_length = cek_month.length;
							temp[i] = ''
							for(let data=0; data<data_length; data++){
									if (list_months[i] == cek_month[data].monthname) {
											temp[i] = cek_month[data].count
									}
									
							}        
					}
					
          new Chartist.Line('.ct-chart-sales-value', {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            series: [
                temp
            ]
          }, {
            low: 0,
            showArea: true,
            fullWidth: true,
            plugins: [
              Chartist.plugins.tooltip()
            ],
            axisX: {
                // On the x-axis start means top and end means bottom
                position: 'end',
                showGrid: true
            },
            axisY: {
                // On the y-axis start means left and end means right
                showGrid: false,
                showLabel: false,
                labelInterpolationFnc: function(value) {
                    return '$' + (value / 1) + 'k';
                }
            }
        });
			}
		})
	</script>
@endpush