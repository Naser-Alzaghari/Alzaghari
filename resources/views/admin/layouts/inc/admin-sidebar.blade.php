<!-- Sidebar -->
<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo mt-3">
      <!-- Logo Header -->
      <div class="logo-header" data-background-color="dark">
        <a href="{{route('admin.dashboard')}}" class="logo">
          <img
            src="{{ asset('admin_assets/img/logo/logo-white.svg')}}"
            alt="navbar brand"
            class="navbar-brand"
            height="45"
          />
        </a>
        <div class="nav-toggle">
          <button class="btn btn-toggle toggle-sidebar">
            <i class="gg-menu-right"></i>
          </button>
          <button class="btn btn-toggle sidenav-toggler">
            <i class="gg-menu-left"></i>
          </button>
        </div>
        <button class="topbar-toggler more">
          <i class="gg-more-vertical-alt"></i>
        </button>
      </div>
      <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
      <div class="sidebar-content">
        
        <ul class="nav nav-secondary">
          <li class="nav-item {{ Request::is('admin') ? 'active' : '' }}">
            <a
              href="{{route('admin.dashboard')}}"
              class="collapsed"
              aria-expanded="false"
            >
              <i class="fas fa-home"></i>
              <p>Dashboard</p>
                          </a>
                      </li>
          <li class="nav-item {{ Request::is('admin/categories*') ? 'active' : '' }}">
            <a
              href="{{route('admin.categories')}}"
              class="collapsed"
              aria-expanded="false"
            >
            <i class="fas fa-book-open"></i>
              <p>categories</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('admin/orders*') ? 'active' : '' }}">
            <a
              href="{{route('admin.orders')}}"
              class="collapsed"
              aria-expanded="false"
            >
              <i class="fas fa-cart-arrow-down"></i>
              <p>orders</p>
            </a>
          </li>
          {{-- <li class="nav-item {{ Request::is('admin/coupons*') ? 'active' : '' }}">
            <a
              href="{{route('admin.coupons')}}"
              class="collapsed"
              aria-expanded="false"
            >
              <i class="fas fa-tag"></i>
              <p>coupons</p>
            </a>
          </li> --}}
          <li class="nav-item {{ Request::is('admin/products*') ? 'active' : '' }}">
            <a
              href="{{route('admin.products')}}"
              class="collapsed"
              aria-expanded="false"
            >
              <i class="fas fa-box"></i>
              <p>products</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('admin/reviews*') ? 'active' : '' }}">
            <a
              href="{{route('admin.reviews')}}"
              class="collapsed"
              aria-expanded="false"
            >
              <i class="fab fa-rocketchat"></i>
              <p>reviews</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('admin/users*') ? 'active' : '' }}">
            <a
              href="{{route('admin.users')}}"
              class="collapsed"
              aria-expanded="false"
            >
              <i class="fas fa-user"></i>
              <p>users</p>
            </a>
          </li>
          




                            </ul>
      </div>
    </div>
  </div>
  <!-- End Sidebar -->