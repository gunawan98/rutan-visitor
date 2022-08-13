<nav class="navbar navbar-dark navbar-theme-primary px-4 col-12 d-lg-none">
    <a class="navbar-brand me-lg-5" href="{{route('officer.dashboard')}}">
        <img class="navbar-brand-dark" src="{{asset('template/assets/img/logo-polri.png')}}" alt="Volt logo" /> <img class="navbar-brand-light" src="../../assets/img/brand/dark.svg" alt="Volt logo" />
    </a>
    <div class="d-flex align-items-center">
        <button class="navbar-toggler d-lg-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

<nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
  <div class="sidebar-inner px-4 pt-3">
    <!-- <div class="user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center pb-4">
      <div class="d-flex align-items-center">
        <div class="avatar-lg me-4">
          <img src="../../assets/img/team/profile-picture-3.jpg" class="card-img-top rounded-circle border-white"
            alt="Bonnie Green">
        </div>
        <div class="d-block">
          <h2 class="h5 mb-3">Hi, Jane</h2>
          <a href="../../pages/examples/sign-in.html" class="btn btn-secondary btn-sm d-inline-flex align-items-center">
            <svg class="icon icon-xxs me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>            
            Sign Out
          </a>
        </div>
      </div>
      <div class="collapse-close d-md-none">
        <a href="#sidebarMenu" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="true"
            aria-label="Toggle navigation">
            <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
          </a>
      </div>
    </div> -->
    <ul class="nav flex-column pt-3 pt-md-0">
      <li class="nav-item">
        <a href="{{route('officer.dashboard')}}" class="nav-link d-flex align-items-center">
          <span class="sidebar-icon">
            <img src="{{asset('template/assets/img/Logo_lapas.png')}}" height="20" width="20" alt="Volt Logo">
          </span>
          <span class="mt-1 ms-1 sidebar-text">Rutan Kraksaan</span>
        </a>
      </li>

      <li class="nav-item {{ (Request::route()->getName() == 'officer.dashboard') ? 'active' : '' }}">
        <span class="nav-link  d-flex justify-content-between align-items-center" data-bs-toggle="collapse">
          <span>
						<a href="{{ route('officer.dashboard') }}">
							<span class="sidebar-icon">
								<svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a2 2 0 012-2h10a2 2 0 012 2v8a2 2 0 01-2 2h-2.22l.123.489.804.804A1 1 0 0113 18H7a1 1 0 01-.707-1.707l.804-.804L7.22 15H5a2 2 0 01-2-2V5zm5.771 7H5V5h10v7H8.771z" clip-rule="evenodd"></path></svg>
							</span>
							<span class="sidebar-text">Dashboard</span>
						</a>
					</span>
        </span>
      </li>

			<li class="nav-item">
        <span
          class="nav-link  d-flex justify-content-between align-items-center"
          data-bs-toggle="collapse" data-bs-target="#main-menu">
          <span>
            <span class="sidebar-icon">
              <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"></path></svg>
            </span> 
            <span class="sidebar-text">Main Data</span>
          </span>
          <span class="link-arrow">
            <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
          </span>
        </span>
        <div class="multi-level collapse {{ (request()->is('officer/data/*')) ? 'show' : '' }}"
          role="list" id="main-menu" aria-expanded="false">
          <ul class="flex-column nav">
            <li class="nav-item {{ (request()->is('officer/data/pengunjung')) || (request()->is('officer/data/pengunjung/*')) ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('officer.pengunjung.index') }}">
                <span class="sidebar-text">Pengunjung</span>
              </a>
            </li>
            <li class="nav-item {{ (request()->is('officer/data/petugas')) || (request()->is('officer/data/petugas/*')) ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('officer.petugas.index') }}">
                <span class="sidebar-text">Petugas</span>
              </a>
            </li>
            <li class="nav-item {{ (request()->is('officer/data/warga_rutan')) || (request()->is('officer/data/warga_rutan/*')) ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('officer.warga_rutan.index') }}">
                <span class="sidebar-text">Warga Rutan</span>
              </a>
            </li>
            <li class="nav-item {{ (request()->is('officer/data/jadwal_kunjungan')) || (request()->is('officer/data/jadwal_kunjungan/*')) ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('officer.jadwal_kunjungan.index') }}">
                <span class="sidebar-text">Jadwal Kunjungan</span>
              </a>
            </li>
          </ul>
        </div>
      </li>

			<li class="nav-item">
        <span
          class="nav-link  d-flex justify-content-between align-items-center"
          data-bs-toggle="collapse" data-bs-target="#setting-menu">
          <span>
            <span class="sidebar-icon">
              <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path></svg>
            </span> 
            <span class="sidebar-text">Setting</span>
          </span>
          <span class="link-arrow">
            <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
          </span>
        </span>
        <div class="multi-level collapse {{ (request()->is('officer/setting/')) || (request()->is('officer/setting/*')) ? 'show' : '' }}"
          role="list" id="setting-menu" aria-expanded="false">
          <ul class="flex-column nav">
            <li class="nav-item {{ (request()->is('officer/setting/jenis_syarat')) || (request()->is('officer/setting/jenis_syarat/*')) ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('officer.jenis_syarat.index') }}">
                <span class="sidebar-text">Jenis Syarat</span>
              </a>
            </li>
            <li class="nav-item {{ (request()->is('officer/setting/jenis_warga_rutan')) || (request()->is('officer/setting/jenis_warga_rutan/*')) ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('officer.jenis_warga_rutan.index') }}">
                <span class="sidebar-text">Jenis Warga Rutan</span>
              </a>
            </li>
          </ul>
        </div>
      </li>

			<li class="nav-item {{ (Request::route()->getName() == 'officer.dashboard') ? 'active' : '' }}">
        <span class="nav-link  d-flex justify-content-between align-items-center" data-bs-toggle="collapse">
          <span>
						<a href="{{ route('officer.dashboard') }}">
							<span class="sidebar-icon">
							<svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1.323l3.954 1.582 1.599-.8a1 1 0 01.894 1.79l-1.233.616 1.738 5.42a1 1 0 01-.285 1.05A3.989 3.989 0 0115 15a3.989 3.989 0 01-2.667-1.019 1 1 0 01-.285-1.05l1.715-5.349L11 6.477V16h2a1 1 0 110 2H7a1 1 0 110-2h2V6.477L6.237 7.582l1.715 5.349a1 1 0 01-.285 1.05A3.989 3.989 0 015 15a3.989 3.989 0 01-2.667-1.019 1 1 0 01-.285-1.05l1.738-5.42-1.233-.617a1 1 0 01.894-1.788l1.599.799L9 4.323V3a1 1 0 011-1zm-5 8.274l-.818 2.552c.25.112.526.174.818.174.292 0 .569-.062.818-.174L5 10.274zm10 0l-.818 2.552c.25.112.526.174.818.174.292 0 .569-.062.818-.174L15 10.274z" clip-rule="evenodd"></path></svg>
							</span>
							<span class="sidebar-text">Kunjungan</span>
						</a>
					</span>
        </span>
      </li>

			<li class="nav-item {{ (Request::route()->getName() == 'officer.dashboard') ? 'active' : '' }}">
        <span class="nav-link  d-flex justify-content-between align-items-center" data-bs-toggle="collapse">
          <span>
						<a href="{{ route('officer.dashboard') }}">
							<span class="sidebar-icon">
								<svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm2 10a1 1 0 10-2 0v3a1 1 0 102 0v-3zm2-3a1 1 0 011 1v5a1 1 0 11-2 0v-5a1 1 0 011-1zm4-1a1 1 0 10-2 0v7a1 1 0 102 0V8z" clip-rule="evenodd"></path></svg>
							</span>
							<span class="sidebar-text">Laporan</span>
						</a>
					</span>
        </span>
      </li>
    </ul>
  </div>

</nav>