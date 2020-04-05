@extends('layouts.app')

@section('sidebar-items')
<div id="sidebar" class="sidebar py-3">
    <div class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family">MAIN</div>
    <ul class="sidebar-menu list-unstyled">
            <li class="sidebar-list-item">
                <a href="/" class="sidebar-link text-muted active">
                    <i class="o-home-1 mr-3 text-gray"></i>
                    <span>Home</span>
                </a>
            </li>
            <li class="sidebar-list-item">
                <a href="{{ route('teacher.groups.index') }}" data-toggle="collapse" data-target="#pages" aria-expanded="false" aria-controls="pages" class="sidebar-link text-muted">
                    <i class="o-user-details-1 mr-3 text-gray"></i>
                    <span>Nhóm lớp học</span>
                </a>
                <div id="pages" class="collapse">
                    <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
                    <li class="sidebar-list-item"><a href="#" class="sidebar-link text-muted pl-lg-5">Lớp 10A1</a></li>
                    <li class="sidebar-list-item"><a href="#" class="sidebar-link text-muted pl-lg-5">Lớp 11 Chuyên tin</a></li>
                    <li class="sidebar-list-item"><a href="#" class="sidebar-link text-muted pl-lg-5">Lớp du ♥</a></li>
                    <li class="sidebar-list-item"><a href="#" class="sidebar-link text-muted pl-lg-5">Lớp con cằc</a></li>
                    </ul>
                </div>
            </li>
            <li class="sidebar-list-item">
                <a href="{{ route('teacher.exams.index') }}" class="sidebar-link text-muted">
                    <i class="o-sales-up-1 mr-3 text-gray"></i>
                    <span>Đề kiểm tra</span>
                </a>
            </li>
            <li class="sidebar-list-item">
                <a href="{{ route('teacher.users.index') }}" class="sidebar-link text-muted">
                    <i class="o-survey-1 mr-3 text-gray"></i>
                    <span>Người dùng</span>
                </a>
            </li>
            <li class="sidebar-list-item">
                <a href="{{ route('teacher.topics.index') }}" class="sidebar-link text-muted">
                    <i class="o-survey-1 mr-3 text-gray"></i>
                    <span>Chủ đề câu hỏi</span>
                </a>
            </li>
            <li class="sidebar-list-item">
                <a href="{{ route('teacher.questions.index') }}" class="sidebar-link text-muted">
                    <i class="o-survey-1 mr-3 text-gray"></i>
                    <span>Ngân hàng câu hỏi</span>
                </a>
            </li>
            <li class="sidebar-list-item">
                <a href="{{ route('leaderboard') }}" class="sidebar-link text-muted">
                    <i class="o-survey-1 mr-3 text-gray"></i>
                    <span>Bảng xếp hạng</span>
                </a>
            </li>
            <li class="sidebar-list-item">
                <a href="login.html" class="sidebar-link text-muted">
                    <i class="o-exit-1 mr-3 text-gray"></i>
                    <span>Login</span>
                </a>
            </li>
    </ul>
    <div class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family">EXTRAS</div>
    <ul class="sidebar-menu list-unstyled">
            <li class="sidebar-list-item">
                <a href="#" class="sidebar-link text-muted">
                    <i class="o-database-1 mr-3 text-gray"></i>
                    <span>Demo</span>
                </a></li>
            <li class="sidebar-list-item">
                <a href="#" class="sidebar-link text-muted">
                    <i class="o-imac-screen-1 mr-3 text-gray"></i><
                        span>Demo</span>
                    </a></li>
            <li class="sidebar-list-item">
                <a href="#" class="sidebar-link text-muted">
                    <i class="o-paperwork-1 mr-3 text-gray"></i>
                    <span>Demo</span>
                </a></li>
            <li class="sidebar-list-item">
                <a href="#" class="sidebar-link text-muted">
                    <i class="o-wireframe-1 mr-3 text-gray"></i>
                    <span>Demo</span>
                </a></li>
    </ul>
</div>
@endsection
