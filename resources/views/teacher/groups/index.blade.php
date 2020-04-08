@extends('layouts.teacher')

@section('title')
    Danh sách nhóm học sinh
@endsection

@section('extend-script')
    <script src="{{ asset('js/NotifyFunctions.js') }}"></script>

    @if (Session::has('isStored'))
        <script type='text/javascript' defer>
            addSuccessFunction('nhóm');
        </script>
    @endif

    @if (Session::has('isUpdated'))
        <script type='text/javascript' defer>
            updateSucessFunction('nhóm');
        </script>
    @endif

    @if (Session::has('isDestroyed'))
        <script type='text/javascript' defer>
            destroySucessFunction('nhóm');
        </script>
    @endif
@endsection

@section('content')
    <div class="page-header zvn-page-header clearfix">
        <div class="zvn-page-header-title">
            <h3>Danh sách nhóm</h3>
        </div>
        <div class="zvn-add-new pull-right">
            <a href="{{ route('teacher.groups.create') }}" class="btn btn-success"><i class="fas fa-plus-circle"></i>
                Thêm nhóm mới</a>
        </div>
    </div>

    <div class="row">
        @foreach ($groups as $group)
            <div class="col col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
                <div class="card h-100
                    @if ($group->class == 10) text-success border-success @elseif ($group->class == 11) text-warning border-warning @else text-danger border-danger @endif">
                    <div class="card-header">
                        <span
                            class="badge badge-primary">Lớp {{ $group->class }}</span>
                    </div>
                    <div class="card-body">
                        <h2 class="card-title">
                            {{ $group->name }}
                        </h2>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-success"
                           href="{{ route('teacher.groups.show', $group->id) }}">Chi tiết</a>

                        <a href="{{ route('teacher.groups.destroy', $group->id) }}" class="deleteButton btn btn-danger float-right" style="margin-left: 10px"
                           onclick="return confirmDeleteFunction('delete-form');">
                            <i class="fas fa-trash"></i>
                        </a>

                        <form id="delete-form" action="{{ route('teacher.groups.destroy', $group->id) }}" method="POST" style="display: none;">
                            @method('DELETE')
                            @csrf
                        </form>

                        <a href="{{ route('teacher.groups.edit', $group->id) }}"
                           class="btn btn-secondary float-right">
                            <i class="fas fa-pencil-alt"></i>
                        </a>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
