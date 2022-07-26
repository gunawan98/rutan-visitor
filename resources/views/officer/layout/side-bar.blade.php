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
        <span class="nav-link  d-flex justify-content-between align-items-center" data-bs-toggle="collapse" data-bs-target="#user-menu">
          <span>
						<a href="{{ route('officer.dashboard') }}">
							<span class="sidebar-icon">
								<svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path></svg>
							</span>
							<span class="sidebar-text">Dashboard</span>
						</a>
					</span>
        </span>
      </li>

      <li class="nav-item">
        <span
          class="nav-link  d-flex justify-content-between align-items-center" data-bs-toggle="collapse" data-bs-target="#user-menu">
          <span>
            <span class="sidebar-icon">
              <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path></svg>
            </span> 
            <span class="sidebar-text">Akun Pengguna</span>
          </span>
          <span class="link-arrow">
            <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
          </span>
        </span>
        <div class="multi-level collapse {{ (request()->is('officer/user*')) ? 'show' : '' }}"
          role="list" id="user-menu" aria-expanded="false">
          <ul class="flex-column nav">
            <li class="nav-item {{ (Request::route()->getName() == 'officer.user.create') ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('officer.user.create') }}">
                <span class="sidebar-text">Pendaftaran</span>
              </a>
            </li>
            <li class="nav-item {{ (Request::route()->getName() == 'officer.user.index') ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('officer.user.index') }}">
                <span class="sidebar-text">Data Pengguna</span>
              </a>
            </li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <span
          class="nav-link  d-flex justify-content-between align-items-center"
          data-bs-toggle="collapse" data-bs-target="#criminal-menu">
          <span>
            <span class="sidebar-icon">
              <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1.323l3.954 1.582 1.599-.8a1 1 0 01.894 1.79l-1.233.616 1.738 5.42a1 1 0 01-.285 1.05A3.989 3.989 0 0115 15a3.989 3.989 0 01-2.667-1.019 1 1 0 01-.285-1.05l1.715-5.349L11 6.477V16h2a1 1 0 110 2H7a1 1 0 110-2h2V6.477L6.237 7.582l1.715 5.349a1 1 0 01-.285 1.05A3.989 3.989 0 015 15a3.989 3.989 0 01-2.667-1.019 1 1 0 01-.285-1.05l1.738-5.42-1.233-.617a1 1 0 01.894-1.788l1.599.799L9 4.323V3a1 1 0 011-1zm-5 8.274l-.818 2.552c.25.112.526.174.818.174.292 0 .569-.062.818-.174L5 10.274zm10 0l-.818 2.552c.25.112.526.174.818.174.292 0 .569-.062.818-.174L15 10.274z" clip-rule="evenodd"></path></svg>
            </span> 
            <span class="sidebar-text">Kriminal</span>
          </span>
          <span class="link-arrow">
            <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
          </span>
        </span>
        <div class="multi-level collapse {{ (request()->is('officer/criminal*')) ? 'show' : '' }}"
          role="list" id="criminal-menu" aria-expanded="false">
          <ul class="flex-column nav">
            <li class="nav-item {{ (Request::route()->getName() == 'officer.criminal.create') ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('officer.criminal.create') }}">
                <span class="sidebar-text">Input baru</span>
              </a>
            </li>
            <li class="nav-item {{ (Request::route()->getName() == 'officer.criminal.index') ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('officer.criminal.index') }}">
                <span class="sidebar-text">Data</span>
              </a>
            </li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <span
          class="nav-link  d-flex justify-content-between align-items-center"
          data-bs-toggle="collapse" data-bs-target="#service-menu">
          <span>
            <span class="sidebar-icon">
              <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path></svg>
            </span> 
            <span class="sidebar-text">Pelayanan</span>
          </span>
          <span class="link-arrow">
            <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
          </span>
        </span>
        <div class="multi-level collapse {{ (request()->is('officer/visitor*')) ? 'show' : '' }}"
          role="list" id="service-menu" aria-expanded="false">
          <ul class="flex-column nav">
            <li class="nav-item {{ (Request::route()->getName() == 'officer.visitor.tahanan') ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('officer.visitor.tahanan') }}">
                <span class="sidebar-text">Kunjungan Tahanan</span>
              </a>
            </li>
            <li class="nav-item {{ (Request::route()->getName() == 'officer.visitor.pidana') ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('officer.visitor.pidana') }}">
                <span class="sidebar-text">Kunjungan Pidana</span>
              </a>
            </li>
          </ul>
        </div>
      </li>
    </ul>
  </div>
</nav>