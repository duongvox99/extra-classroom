@extends('layouts.app')

@section('title')
Login
@endsection

@section('head-script')
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
    <link rel="stylesheet" href="{{ asset('css/style.green.css') }}" id="theme-stylesheet">
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    
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
<div class="page-holder container-fluid d-flex align-items-center justify-content-center">
    <div class="row">
        <div class="col">
            <div id="card-login" class="card animated flipInX">
                <h2 class="card-header text-center text-primary"><small>{{ __('Login') }} |</small> Extra Classroom</h2>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <input id="email" type="email" placeholder="{{ __('Email Address') }}"
                            class="form-control form-control-lg shadow @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input id="password" type="password" placeholder="{{ __('Password') }}"
                            class="form-control form-control-lg text-success shadow @error('password') is-invalid @enderror" 
                            name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="remember" id="remember"
                                class="custom-control-input" {{ old('remember') ? 'checked' : '' }}>

                                <label class="custom-control-label" for="remember">
                                    {{ __('Remember me') }}
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary">
                                {{ __('Login') }}
                            </button>

                            <a href="{{ route('password.request') }} " class="btn btn-lg btn-outline-secondary" >
                                {{ __('What is my password?') }}
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
@endsection

@section('ui-script')
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/popper.js/umd/popper.min.js') }}"> </script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery.cookie/jquery.cookie.js') }}"> </script>
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
    <script src="{{ asset('js/front.js') }}"></script>

    <script>
    // Hàm này là hiệu ứng cho case input sai
    // Mày làm validate trên server nên tao chưa chèn vào được.
    // Mày thử cách nào thêm vào cho đẹp nhá
    function doErrorAnimate() {
        $('#card-login').removeClass()
                        .addClass('card animated shake faster delay-1s')
                        .one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',
                            function(){
                                $(this).removeClass().addClass('card animated'); 
                            });
    };
    </script>
@endsection