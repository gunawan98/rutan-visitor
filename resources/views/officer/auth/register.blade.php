@extends('template.authentication');

@section('title','Register Petugas')
@section('title-form', 'Daftar Akun Petugas')
@section('content-form')

<!-- Validation Errors -->
@if ($errors->any())
	<div>
		<div class="font-medium text-danger">
				{{ __('Whoops! Something went wrong.') }}
		</div>

		<ul class="mt-3 list-disc list-inside text-sm text-danger">
				@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
				@endforeach
		</ul>
	</div>
@endif

<form method="POST" action="{{ route('officer.register') }}" class="mt-4">
	@csrf

	<!-- Form -->
	<div class="form-group mb-4">
			<label for="name">Nama</label>
			<div class="input-group">
					<span class="input-group-text" id="basic-addon1">
						<svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
					</span>
					<input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" autofocus required>
			</div>  
	</div>
	<!-- End of Form -->
	<!-- Form -->
	<div class="form-group mb-4">
			<label for="email">Email</label>
			<div class="input-group">
					<span class="input-group-text" id="basic-addon1">
							<svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
					</span>
					<input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
			</div>  
	</div>
	<!-- End of Form -->
	<div class="form-group">
			<!-- Form -->
			<div class="form-group mb-4">
					<label for="password">Password</label>
					<div class="input-group">
							<span class="input-group-text" id="basic-addon2">
									<svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path></svg>
							</span>
							<input type="password" class="form-control" id="password" name="password" required>
					</div>  
			</div>
			<!-- End of Form -->
			<!-- Form -->
			<div class="form-group mb-4">
					<label for="password_confirmation">Konfirmasi Password</label>
					<div class="input-group">
							<span class="input-group-text" id="basic-addon2">
									<svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path></svg>
							</span>
							<input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
					</div>  
			</div>
	</div>
	<div class="d-grid">
			<button type="submit" class="btn btn-gray-800">Daftar</button>
	</div>
</form>
<div class="d-flex justify-content-center align-items-center mt-4">
		<span class="fw-normal">
				Sudah memiliki akun? 
				<a href="{{ route('officer.login') }}" class="fw-bold">Link login.</a>
		</span>
</div>

@endsection