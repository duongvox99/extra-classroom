@extends('layouts.app')

@section('title')
Đăng nhập
@endsection

@section('head-stylesheet')
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

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

    <style>
        body {
            background-image: linear-gradient(315deg, #7ee8fa 0%, #80ff72 74%);
            background-image: url('{{ asset('img/background.jpg') }}');
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
    </style>
@endsection

@section('head-custom-stylesheet')
    <style>
        body {
            background-image: linear-gradient(315deg, #7ee8fa 0%, #80ff72 74%);
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

@section('body-layout')
<div class="page-holder container-fluid d-flex align-items-center justify-content-center">
    <div class="row">
        <div class="col">
            <div id="card-login" class="card animated flipInX">
                <h2 class="card-header text-center text-primary"><small>Đăng nhập |</small> Extra Classroom</h2>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <input id="email" type="email" placeholder="Địa chỉ email"
                            class="form-control form-control-lg shadow @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input id="password" type="password" placeholder="Mật khẩu"
                            class="form-control form-control-lg text-success shadow @error('password') is-invalid @enderror"
                            name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

{{--                        <div class="form-group">--}}
{{--                            <div class="custom-control custom-checkbox">--}}
{{--                                <input type="checkbox" name="remember" id="remember"--}}
{{--                                class="custom-control-input" {{ old('remember') ? 'checked' : '' }}>--}}

{{--                                <label class="custom-control-label" for="remember">--}}
{{--                                    {{ __('Remember me') }}--}}
{{--                                </label>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="form-group pt-2">
                            <button type="submit" class="btn btn-lg btn-primary">
                                Đăng nhập
                            </button>

                            <a href="{{ route('password.request') }} " class="btn btn-lg btn-outline-secondary" >
                                Quên mật khẩu
                            </a>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('body-scripts')
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>

    <script>
    // Hàm này là hiệu ứng cho case input sai
    // Mày làm validate trên server nên tao chưa chèn vào được.
    // Mày thử cách nào thêm vào cho đẹp nhá
    function doErrorAnimate() {
        $('#card-login')
            .removeClass()
            .addClass('card animated shake faster delay-1s')
            .one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',
                function(){
                    $(this).removeClass().addClass('card animated');
                });
    };
    </script>
@endsection
