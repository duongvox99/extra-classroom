@extends('layouts.teacher')

@section('title')
    Danh sách nhóm học sinh
@endsection

@section('head-custom-stylesheet')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css">
@endsection


@section('section-content')
    @include('teacher.statusBand')
    
    <section class="pb-5">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2 class="text-primary mb-0">Danh sách đề kiểm tra</h2>
                        <a href="{{ route('teacher.exams.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus-circle"></i> Tạo đề mới
                        </a>
                    </div>
                    <div class="card-body">
                        @if(count($exams))
                            <h3>Danh sách đề ở đây</h3>
                            @foreach ($exams as $exam)
                                <p>{{ $exam->id }}</p>
                            @endforeach
                        @else
                            <p class="card-text text-secondary text-center">Chưa có đề</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('head-custom-stylesheet')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css">
@endsection

@section('body-custom-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/2.5.1/jquery-confirm.min.js" integrity="sha256-tAQERQQw9PNRkWys5CowxwNM2Sw0hnZVpNstkq2jbgY=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/NotifyFunctions.js') }}"></script>

    @if (Session::has('isStored'))
        <script type="text/javascript" defer>
            addSuccessFunction("nhóm");
        </script>
    @endif

    @if (Session::has('isUpdated'))
        <script type="text/javascript" defer>
            updateSucessFunction("nhóm");
        </script>
    @endif

    @if (Session::has('isDestroyed'))
        <script type="text/javascript" defer>
            destroySucessFunction("nhóm");
        </script>
    @endif
@endsection