@extends('layouts.app')

@section('title')
Login
@endsection

@section('extend-scripts-head')
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->

    <!-- Themes template -->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,800">
    <link rel="stylesheet" href="{{ asset('css/orionicons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.default.css') }}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <!-- Favicon-->
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

    <!-- Old project scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
    <style>
        body {
            background-image: url('{{ asset('img/background.jpg') }}');
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
        .deptrai {
            background-color: rgba(255, 255, 255, 0.95);
        }
        @supports (-webkit-backdrop-filter: none) or (backdrop-filter: none) {
            .deptrai {
                -webkit-backdrop-filter: blur(10px);
                backdrop-filter: blur(10px);
                background-color: rgba(255, 255, 255, 0.5);  
            }
        }
    </style>
@endsection

@section('page-body')
<div class="page-holder d-flex align-items-center justify-content-center">
    <div class="container-fluid d-flex justify-content-center">
        <div class="col col-sm-10 col-md-6">
            <div class="card border-white">
                <h2 class="card-header text-center text-success">{{ __('Login') }} - Extra Classroom</h2>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row">
                            <!-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> -->
                            <div class="col mx-auto">
                                <input id="email" type="email" placeholder="{{ __('Email Address') }}"
                                class="form-control form-control-lg shadow @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" 
                                required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <!-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> -->
                            <div class="col mx-auto">
                                <input id="password" type="password" placeholder="{{ __('Password') }}"
                                class="form-control form-control-lg shadow @error('password') is-invalid @enderror" 
                                name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="remember" id="remember"
                                    class="custom-control-input" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="custom-control-label" for="remember">
                                        {{ __('Remember me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row d-flex justify-content-center">
                            <button type="submit" class="col btn btn-lg btn-primary my-2 mx-2">
                                {{ __('Login') }}
                            </button>

                            <a href="{{ route('password.request') }} " class="col btn btn-lg my-2 mx-2 btn-outline-secondary" >
                                {{ __('Forgot Your Password?') }}
                            </a>

                            <!-- cái gì đây méo hiểu :v -->
                            <!-- @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- <div class="page-holder d-flex align-items-center">
      <div class="container">
        <div class="row align-items-center py-5">
          <div class="col-5 col-lg-7 mx-auto mb-5 mb-lg-0">
            <div class="pr-lg-5"><img src="img/illustration.svg" alt="" class="img-fluid"></div>
          </div>
          <div class="col-lg-5 px-lg-4">
            <h1 class="text-base text-primary text-uppercase mb-4">Extraclass Room</h1>
            <h2 class="mb-4">Đăng nhập vào hệ thống!</h2>
            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
            <form method="POST" action="{{ route('login') }}" class="mt-4">
              @csrf
              <div class="form-group mb-4">
                <input id="email" type="text" name="email" placeholder="{{ __('E-Mail Address') }}"
                       class="form-control border-0 shadow form-control-lg  @error('email') is-invalid @enderror"
                       value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group mb-4">
                <input id="password" type="password" name="passowrd" placeholder="{{ __('Password') }}"
                        class="form-control border-0 shadow form-control-lg text-violet @error('password') is-invalid @enderror"
                        required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              
              <div class="form-group mb-4">
                <div class="custom-control custom-checkbox">
                  <input id="remember" name="remember" type="checkbox" checked class="custom-control-input" {{ old('remember') ? 'checked' : '' }}>
                  <label for="remember" class="custom-control-label">{{ __('Remember Me') }}</label>
                </div>
              </div>

              <button type="submit" class="btn btn-primary shadow px-5">Log in</button>
              @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
              @endif
              
            </form>
          </div>
        </div>
      </div>
    </div> -->
@endsection

@section('extend-scripts')
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/popper.js/umd/popper.min.js') }}"> </script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery.cookie/jquery.cookie.js') }}"> </script>
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
    <script src="{{ asset('js/front.js') }}"></script>
@endsection