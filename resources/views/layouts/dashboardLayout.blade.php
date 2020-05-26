@extends('layouts.app')

@section('title')
  Trung tâm điều khiển
@endsection

@section('head-stylesheet')
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

    <!-- Favicon-->
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

    @yield('head-custom-stylesheet')
@endsection

@section('section-header')
    <header class="header">
      <nav class="navbar navbar-expand-lg px-4 py-2 bg-white shadow">
            <a href="#" class="sidebar-toggler text-gray-500 mr-4 mr-lg-5 lead">
              <i class="fas fa-align-left"></i>
            </a>
            <a href="/" class="navbar-brand font-weight-bold text-uppercase">
                Bảng điều khiển @yield('role')
            </a>
        <ul class="ml-auto d-flex align-items-center list-unstyled mb-0">
          <li class="nav-item dropdown ml-auto">
              <a id="userInfo" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">
                <img src="{{ empty(Auth::user()->avatar) ? asset('img/no-avatar.png') : Auth::user()->avatar }}"
                    alt="Profile picture" style="max-width: 2.5rem; min-height: 2.5rem;"
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

@section('section-footer')
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

@section('body-layout')

    @yield('section-header')

    <div class="d-flex align-items-stretch">

      @yield('section-sidebar')

      <!-- Content Wrapper -->
      <div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-5">

          @yield('section-content')

        </div>
      </div>
    </div>

    @yield('section-footer')
@endsection

@section('body-scripts')
    <!-- Jquery-confirm -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/popper.js/umd/popper.min.js') }}"> </script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery.cookie/jquery.cookie.js') }}"> </script>

    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>

    <script src="{{ asset('js/front.js') }}"></script>

    @yield('body-custom-scripts')
@endsection
