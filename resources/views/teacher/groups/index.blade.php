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
                        <h2 class="text-primary mb-0">Danh sách nhóm</h2>
                        <a href="{{ route('teacher.groups.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus-circle"></i> Tạo nhóm
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($groups as $group)
                                <div class="col-md-4 my-2">
                                    <div class="card">
                                        <div class="card-header p-3 bg-hover-gradient-primary">
                                            <a href="{{ route('teacher.groups.show', $group->id) }}" class="message no-anchor-style">
                                                <div class="row">
                                                    <img src="https://picsum.photos/90/90" alt="..."
                                                        style="min-width: 3.5rem; max-width: 3.5rem; min-height:3.5rem;"
                                                        class="rounded-circle mx-3">
                                                        
                                                    <div class="ml-2">
                                                        <div class="row d-flex align-items-center ">
                                                            <div class="text-light smaller roundy px-3 py-1 mr-1 exclode
                                                            @if ($group->class == 10) gradient-blue @elseif ($group->class == 11) gradient-violet @else gradient-red @endif">Lớp {{ $group->class }}</div>
                                                            <strong class="h5 mb-0 py-1 text-gray-500">{{ $group->totalStudent }}<sup class="small text-gray font-weight-normal">hs</sup></strong>
                                                        </div>
                                                        <div class="row">
                                                            <h4 class="mb-0 text-secondary">{{ $group->name }}</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="card-footer" style="min-height: 5.5rem;">
                                        <p class="text-secondary">
                                            Description
                                        </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
            </div>
        </div>
    </section>

    <!-- <section class="pb-5">
        <div class="row">
            @foreach ($groups as $group)
            <div class="col col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
                <div
                    class="card h-100 @if ($group->class == 10) text-success border-success @elseif ($group->class == 11) text-warning border-warning @else text-danger border-danger @endif">
                    <div class="card-header">
                        <span class="badge badge-primary">Lớp {{ $group->class }}</span>
                    </div>
                    <div class="card-body">
                        <h2 class="card-title">
                            {{ $group->name }}
                        </h2>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-success" href="{{ route('teacher.groups.show', $group->id) }}">Chi tiết</a>

                        <a href="{{ route('teacher.groups.destroy', $group->id) }}"
                            class="deleteButton btn btn-danger float-right" style="margin-left: 10px;"
                            onclick="return confirmDeleteFunction('delete-form');">
                            <i class="fas fa-trash"></i>
                        </a>

                        <form id="delete-form" action="{{ route('teacher.groups.destroy', $group->id) }}" method="POST"
                            style="display: none;">
                            @method('DELETE') @csrf
                        </form>

                        <a href="{{ route('teacher.groups.edit', $group->id) }}" class="btn btn-secondary float-right">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section> -->
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