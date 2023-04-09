<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <a id="show-sidebar" class="btn btn-sm btn-dark" href="">
    <i class="fas fa-bars"></i>
  </a>
  <nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
      <div class="sidebar-brand">
        <div id="close-sidebar">
          <i class="fas fa-times"></i>
        </div>
      </div>
      <div class="sidebar-header">
        <div class="user-pic">
            <img src="{{asset(auth()->user()->photo)}}" alt="" srcset="">
        </div>
        <div class="user-info">
          <span class="user-name">
            {{ auth()->user()->name ?? "" }}
          </span>
          <span class="user-role">{{ auth()->user()->usertype->name ?? "" }}</span>
          <span class="user-status">
            <i class="fa fa-circle"></i>
            <span>Online</span>
          </span>
        </div>
      </div>
      <!-- sidebar-header  -->
      <div class="sidebar-search">
        <div>
          <div class="input-group">
            <input type="text" class="form-control search-menu" placeholder="Search...">
            <div class="input-group-append">
              <span class="input-group-text">
                <i class="fa fa-search" aria-hidden="true"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
      <!-- sidebar-search  -->
      <div class="sidebar-menu">
        <ul>
          <li >
            <a href="{{route('home')}}">
              <i class="fa fa-tachometer-alt"></i>
              <span>{{ __("shop") }}</span>
            </a>
          </li>
          <li >
            <a href="{{route('dashboard')}}">
              <i class="fa fa-tachometer-alt"></i>
              <span>{{ __("Dashboard") }}</span>
            </a>
          </li>
          <li>
            <a href="{{route('products')}}">
              <i class="fa fa-shopping-cart"></i>
              <span>{{ __("Products") }}</span>
            </a>
          </li>

        <li class="sidebar-dropdown">
            <a>
              <i class="fa fa-shopping-cart"></i>
              <span>{{ __("Products") }}</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="">{{ __("List") }}</a>
                </li>
                <li>
                  <a href="">{{ __("New") }}</a>
                </li>
                <li>
                  <a href="">{{ __("Trash") }}</a>
                </li>
              </ul>
            </div>
          </li>
          <li >
            <a href="{{route('logout')}}">
              <i class="fa fa-globe"></i>
              <span>Logout</span>
            </a>
          </li>
        </ul>
      </div>
      <!-- sidebar-menu  -->
    </div>
    <!-- sidebar-content  -->
    <div class="sidebar-footer">
      <a href="">
        <i class="fa fa-bell"></i>
        <span class="badge badge-pill badge-warning notification">3</span>
      </a>
      <a href="">
        <i class="fa fa-envelope"></i>
        <span class="badge badge-pill badge-success notification">7</span>
      </a>
      <a href="">
        <i class="fa fa-cog"></i>
        <span class="badge-sonar"></span>
      </a>
      <a href="{{ route('logout') }}">
        <i class="fa fa-power-off"></i>
      </a>
    </div>
  </nav>
