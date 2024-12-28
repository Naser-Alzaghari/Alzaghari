<!-- Navbar Header -->
<nav
class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom"
>
<div class="container-fluid">
  

  <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
    <li
      class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none"
    >
      <a
        class="nav-link dropdown-toggle"
        data-bs-toggle="dropdown"
        href="#"
        role="button"
        aria-expanded="false"
        aria-haspopup="true"
      >
        <i class="fa fa-search"></i>
      </a>
      <ul class="dropdown-menu dropdown-search animated fadeIn">
        <form class="navbar-left navbar-form nav-search">
          <div class="input-group">
            <input
              type="text"
              placeholder="Search ..."
              class="form-control"
            />
          </div>
        </form>
      </ul>
    </li>
    
    <li class="nav-item topbar-user dropdown hidden-caret">
      <a
        class="dropdown-toggle profile-pic"
        data-bs-toggle="dropdown"
        href="#"
        aria-expanded="false"
      >
        <div class="avatar-sm">
          <img
            src="{{ asset('admin_assets/img/profile.jpg') }}"
            alt="..."
            class="avatar-img rounded-circle"
          />
        </div>
        <span class="profile-username">
          <span class="op-7">Hi,</span>
          <span class="fw-bold">{{Auth::guard('admin')->user()->name}}</span>
        </span>
      </a>
      <ul class="dropdown-menu dropdown-user animated fadeIn">
        <div class="dropdown-user-scroll scrollbar-outer">
          <li>
            <div class="user-box">
              <div class="avatar-lg">
                <img
                  src="{{ asset('admin_assets/img/profile.jpg') }}"
                  alt="image profile"
                  class="avatar-img rounded"
                />
              </div>
              <div class="u-text">
                <h4>{{Auth::guard('admin')->user()->name}}</h4>
                <p class="text-muted" style="text-overflow: ellipsis; white-space: nowrap;
">{{Auth::guard('admin')->user()->email}}</p>
                <a
                  href="{{route('admin.profile.edit')}}"
                  class="btn btn-xs btn-secondary btn-sm"
                  >View Profile</a
                >
              </div>
            </div>
          </li>
          <li>
            <div class="dropdown-divider"></div>
            
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="dropdown-item">
                    {{ __('Log Out') }}
                </button>
            </form>
          </li>
        </div>
      </ul>
    </li>
  </ul>
</div>
</nav>
<!-- End Navbar -->