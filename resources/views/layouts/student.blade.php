@extends('layouts.dashboardLayout')

@section('role')
    Student
@endsection

@section('section-sidebar')
    <div id="sidebar" class="sidebar py-3">
        <div class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family">MAIN</div>
        <ul class="sidebar-menu list-unstyled">
            <li class="sidebar-list-item">
                <a href="/" class="sidebar-link text-muted {{ request()->is('student') ? 'active' : '' }}">
                    <i class="o-home-1 mr-3 text-gray"></i>
                    <span>Home</span>
                </a>
            </li>
            <li class="sidebar-list-item">
                <a href="{{ route('student.exams.index') }}"
                   class="sidebar-link text-muted {{ request()->is('student/exams*') ? 'active' : '' }}">
                    <i class="o-sales-up-1 mr-3 text-gray"></i>
                    <span>Đề kiểm tra</span>
                </a>
            </li>
            <li class="sidebar-list-item">
                <a href="{{ route('leaderboard') }}" class="sidebar-link text-muted">
                    <i class="o-survey-1 mr-3 text-gray"></i>
                    <span>Bảng xếp hạng</span>
                </a>
            </li>
        </ul>
    </div>
@endsection
