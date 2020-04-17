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
                        <h2 class="text-primary mb-0">Học sinh nhóm: {{ $group->name}}</h2>
                        <!-- <a href="{{ route('teacher.groups.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus-circle"></i> Tạo nhóm
                        </a> -->
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($group->users() as $user)
                                <div class="col-md-4 my-2">
                                    <p>ten o day</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('body-custom-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.js" integrity="sha256-Ka8obxsHNCz6H9hRpl8X4QV3XmhxWyqBpk/EpHYyj9k=" crossorigin="anonymous"></script>
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
