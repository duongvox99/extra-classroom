<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title')Bảng điều khiển giáo viên
    </title>

    <link rel="icon" href="{{ asset('img/icon.ico') }}" type="image/ico"/>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />

    {{-- need to optimize --}}
    <link rel="stylesheet" href="{{ asset('css/BangDieuKhienGiaoVien.css') }}">

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.js" integrity="sha256-Ka8obxsHNCz6H9hRpl8X4QV3XmhxWyqBpk/EpHYyj9k=" crossorigin="anonymous"></script>
    @yield('extend-script')
</head>

<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2 left_col position-relative">

            <nav class="nav flex-column my-nav">
                <div class="navbar navbar-brand nav_title" style="border: 0;">
                    <a href="" class="site_title"><img src="{{ asset('img/math-logo.png') }}" alt="Logo" style="width:40px;">
                        <span><strong>ExtraClassroom</strong></span></a>
                </div>
                <ul class="nav flex-column my-nav-menu">
                    <li class="nav-item">
                        <a class="nav-link"
                           href="{{ route('teacher.groups.index') }}" @yield('nav-teacher-groups')><i
                                class="fas fa-users"></i> Nhóm lớp học</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                           href="{{ route('teacher.exams.index') }}" @yield('nav-teacher-exams')><i
                                class="fas fa-star"></i> Đề kiểm tra</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                           href="{{ route('teacher.users.index') }}" @yield('nav-teacher-users')><i
                                class="fas fa-user"></i> Người dùng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                           href="{{ route('teacher.topics.index') }}" @yield('nav-teacher-topics')><i
                                class="fas fa-th-list"></i> Chủ đề câu hỏi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                           href="{{ route('teacher.questions.index') }}" @yield('nav-teacher-questions')><i
                                class="fas fa-stream"></i> Ngân hàng câu hỏi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                           href="{{ route('leaderboard') }}" @yield('nav-leaderboard')><i
                                class="fas fa-trophy"></i> Bảng xếp hạng</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="col-lg-10 right_col" role="main">
            <!-- top navigation -->
            <nav class="navbar navbar-default navbar-expand-md my-nav">
                <ul class="navbar-nav ml-auto account">
                    <!-- Dropdown -->
                    <li class="nav-item dropdown ">
                        <a id="navbarDropdownMenuLink" class="nav-link dropdown-toggle account" href="{{ route('profile') }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="
                                @if (Auth::user()->avatar != "")
                                    {{Auth::user()->avatar}}
                                @else
                                    {{ asset('img/no-avatar.png') }}
                                @endif" alt="Avatar" class="avatar">

                            <span>{{ Auth::user()->name }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-custom" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{ route('profile') }}">Hồ sơ cá nhân</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                Đăng xuất
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
            <!-- /top navigation -->
            <!-- page content -->
            <div class="container-content">
                @yield('content')
            </div>

        </div>
        <!-- /page content -->
    </div>


</div>
<div id="footer">
    <footer>
        <span class="text-muted">Copyright © <b><a href="https://www.facebook.com/duongvox" target="_blank">Dương Võ</a></b></span>
    </footer>
</div>
</body>

</html>
