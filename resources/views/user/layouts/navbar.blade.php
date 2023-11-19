<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row  no-print bg-dark">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center no-print bg-warning">
          <a class="navbar-brand brand-logo no-print" href="{{ url('/user/dashboard') }}"><img src="{{ asset('uploads/shop_logo/'.$logo ) }}" style="height: 50px; width: 50px; border-radius:50px;" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch no-print">
          <button class="navbar-toggler navbar-toggler align-self-center no-print" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu no-print"></span>
          </button>
          <ul class="navbar-nav navbar-nav-right no-print">
            <li class="nav-item nav-profile dropdown no-print">
              <a class="nav-link dropdown-toggle no-print" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img no-print">
                  <img src="{{ asset('uploads/profile_image/'.Auth::user()->image ) }}" alt="image">
                  <span class="availability-status online no-print"></span>
                </div>
                <div class="nav-profile-text no-print">
                  <p class="mb-1 text-light no-print">{{ Auth::user()->name }}</p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown no-print" aria-labelledby="profileDropdown">
                <a class="dropdown-item no-print" href="{{ route('showProfileSetting') }}">
                  <i class="mdi mdi-cached me-2 text-success no-print"></i> Profile Setting</a>
                <div class="dropdown-divider no-print"></div>
                <a class="dropdown-item no-print" href="{{ route('logout') }}">
                  <i class="mdi mdi-logout me-2 text-primary no-print"></i> Signout </a>
              </div>
            </li>
            <li class="nav-item d-none d-lg-block full-screen-link no-print">
              <a class="nav-link no-print">
                <i class="mdi mdi-fullscreen no-print" id="fullscreen-button"></i>
              </a>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center no-print" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu no-print"></span>
          </button>
        </div>
      </nav>