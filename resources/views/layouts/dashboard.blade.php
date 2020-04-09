@extends('layouts.app')

@section('title')
  Trung tâm điều khiển
@endsection

@section('head-script')
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">

    <!-- Themes template -->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,800">
    <link rel="stylesheet" href="{{ asset('css/orionicons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.green.css') }}" id="theme-stylesheet">
    <!-- Custom stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <!-- Jquery-confirm -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css">
    <!-- Favicon-->
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
@endsection

@section('page-header')
    <header class="header">
      <nav class="navbar navbar-expand-lg px-4 py-2 bg-white shadow">
            <a href="#" class="sidebar-toggler text-gray-500 mr-4 mr-lg-5 lead">
              <i class="fas fa-align-left"></i>
            </a>
            <a href="/" class="navbar-brand font-weight-bold text-uppercase">
              {{ config('app.name') }} - @yield('role')
            </a>
        <ul class="ml-auto d-flex align-items-center list-unstyled mb-0">
{{--          <li class="nav-item">--}}
{{--            <form id="searchForm" class="ml-auto d-none d-lg-block">--}}
{{--              <div class="form-group position-relative mb-0">--}}
{{--                <button type="submit" style="top: -3px; left: 0;" class="position-absolute bg-white border-0 p-0"><i class="o-search-magnify-1 text-gray text-lg"></i></button>--}}
{{--                <input type="search" placeholder="Search ..." class="form-control form-control-sm border-0 no-shadow pl-4">--}}
{{--              </div>--}}
{{--            </form>--}}
{{--          </li>--}}
{{--          <li class="nav-item dropdown mr-3">--}}
{{--              <a id="notifications" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle text-gray-400 px-1">--}}
{{--                <i class="fa fa-bell"></i>--}}
{{--                <span class="notification-icon"></span>--}}
{{--            </a>--}}
{{--            <div aria-labelledby="notifications" class="dropdown-menu"><a href="#" class="dropdown-item">--}}
{{--                <div class="d-flex align-items-center">--}}
{{--                  <div class="icon icon-sm bg-violet text-white"><i class="fab fa-twitter"></i></div>--}}
{{--                  <div class="text ml-2">--}}
{{--                    <p class="mb-0">You have 2 followers</p>--}}
{{--                  </div>--}}
{{--                </div></a><a href="#" class="dropdown-item">--}}
{{--                <div class="d-flex align-items-center">--}}
{{--                  <div class="icon icon-sm bg-green text-white"><i class="fas fa-envelope"></i></div>--}}
{{--                  <div class="text ml-2">--}}
{{--                    <p class="mb-0">You have 6 new messages</p>--}}
{{--                  </div>--}}
{{--                </div></a><a href="#" class="dropdown-item">--}}
{{--                <div class="d-flex align-items-center">--}}
{{--                  <div class="icon icon-sm bg-blue text-white"><i class="fas fa-upload"></i></div>--}}
{{--                  <div class="text ml-2">--}}
{{--                    <p class="mb-0">Server rebooted</p>--}}
{{--                  </div>--}}
{{--                </div></a><a href="#" class="dropdown-item">--}}
{{--                <div class="d-flex align-items-center">--}}
{{--                  <div class="icon icon-sm bg-violet text-white"><i class="fab fa-twitter"></i></div>--}}
{{--                  <div class="text ml-2">--}}
{{--                    <p class="mb-0">You have 2 followers</p>--}}
{{--                  </div>--}}
{{--                </div></a>--}}
{{--              <div class="dropdown-divider"></div><a href="#" class="dropdown-item text-center"><small class="font-weight-bold headings-font-family text-uppercase">View all notifications</small></a>--}}
{{--            </div>--}}
{{--          </li>--}}
          <li class="nav-item dropdown ml-auto">
              <a id="userInfo" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">
                <img src="{{ empty(Auth::user()->avatar) ? asset('img/no-avatar.png') : Auth::user()->avatar }}"
                    alt="Profile picture" style="max-width: 2.5rem;"
                    class="img-fluid rounded-circle shadow">
              </a>
            <div aria-labelledby="userInfo" class="dropdown-menu">
                <a href="{{ route('profile') }}" class="dropdown-item">
                    <strong class="d-block text-uppercase headings-font-family">
                        {{ Auth::user()->name }}
                    </strong>
                    <small>Hồ sơ cá nhân</small>
                </a>
              <div class="dropdown-divider"></div><a href="#" class="dropdown-item">Settings</a><a href="#" class="dropdown-item">Activity log       </a>
              <div class="dropdown-divider"></div>
              <a href="{{ route('logout') }}" class="dropdown-item"
              onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf  </form>
            </div>
          </li>
        </ul>
      </nav>
    </header>
@endsection

@section('page-body')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar -->
      @yield('sidebar-items')

      <!-- Content -->
      @yield('content')
    </div>
@endsection

@section('page-footer')

  <footer class="footer bg-white shadow align-self-end py-3 px-xl-5 w-100">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6 text-center text-md-left text-primary">
            <p class="mb-2 mb-md-0">
            <span class="text-muted">Copyright © <b><a href="https://www.facebook.com/duongvox" target="_blank">noBUG Team</a></b></span>
            </p>
          </div>
          <div class="col-md-6 text-center text-md-right text-gray-400 ">
            <p class="mb-0">Template by <a href="https://bootstrapious.com/admin-templates" class="external text-gray-400">Bootstrapious</a></p>
          </div>
        </div>
      </div>
    </footer>
@endsection

@section('ui-script')
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/popper.js/umd/popper.min.js') }}"> </script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery.cookie/jquery.cookie.js') }}"> </script>
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
    <script src="{{ asset('js/charts-home.js') }}"></script>
    <script src="{{ asset('js/front.js') }}"></script>
@endsection
