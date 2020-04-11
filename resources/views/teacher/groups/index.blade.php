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
                        <div class="row">
                            <a href="{{ route('teacher.groups.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus-circle"></i> Quản lý
                            </a>
                            <a href="{{ route('teacher.groups.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus-circle"></i> Tạo nhóm
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (count($groups))
                            <table class="table table-striped card-text">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Tên nhóm</th>
                                        <th>Lớp</th>
                                        <th>Số học viên</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($groups as $group)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $group->name }}</td>
                                            <td>Lớp {{ $group->class }}</td>
                                            <td>help{{-- (count($group->users())) --}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p class="card-text text-secondary text-center">Không có nhóm nào</p>
                        @endif
                    </div>
            </div>
        </div>
    </section>

    <section class="pb-5">
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