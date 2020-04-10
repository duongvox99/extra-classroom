@extends('layouts.teacher')

@section('title')
    Nhóm {{ $group->name }}
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

@section('section-content')
    @include('teacher.statusBand')
    
    <section class="pb-5">
        <div class="row">
            <div class="col-md-7 offset-md-3">
                <a href="#" class="message card px-5 py-3 bg-hover-gradient-primary no-anchor-style">
                    <div class="row">
                        <div class="col-md-9 d-flex align-items-center flex-column flex-lg-row text-center text-md-left">
                            <strong class="h5 mb-0">24<sup class="small text-gray font-weight-normal">hs</sup></strong>
                            <img src="https://picsum.photos/50/50" alt="..." style="min-width: 3rem; min-height: 3rem;" class="rounded-circle mx-3 my-2 my-lg-0">
                            <h4 class="mb-0">{{ $group->name }}</h4>
                        </div>
                        <div class="col-md-3 d-flex align-items-center flex-column flex-lg-row text-center text-md-left">
                            <div class="gradient-primary text-light roundy px-4 py-1 mr-0 mr-lg-3 mt-2 mt-lg-0 exclode">Lớp {{ $group->class }}</div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>
    
    <section class="pb-5">
        <div class="row">
            <div class="col-md-7 mb-4 mb-lg-0">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2 class="text-primary mb-0">Danh sách học sinh</h2>
                        <div class="row">
                            <a href="{{ route('teacher.groups.users.index', $group->id) }}" class="btn btn-primary">
                                <i class="fas fa-plus-circle"></i> Xem
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (count($group->notifications))
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
                                    @foreach ($group as $group)
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

            <div class="col-md-5 md-4 mb-lg-0 pl-lg-0">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2 class="text-primary mb-0">Thông báo</h2>
                        <div class="row">
                            <a href="{{ route('teacher.groups.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus-circle"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (count($group->notifications))
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
                                    @foreach ($group as $group)
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
            <div class="col-md mb-4 mb-lg-0">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2 class="text-primary mb-0">Đề kiểm tra</h2>
                        <div class="row">
                            <a href="{{ route('teacher.groups.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus-circle"></i> Thêm đề mới
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (count($group->notifications))
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
                                    @foreach ($group as $group)
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
                            <p class="card-text text-secondary text-center">Chưa có đề</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    {{-- 
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Danh sách thông báo</h2>
                    <div class="zvn-add-new pull-right">
                        <a href="{{ route('teacher.groups.notifications.create', $group->id) }}"
                           class="btn btn-success"><i class="fas fa-plus-circle"></i> Thêm thông báo nhóm mới</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <!-- responsive table -->
                    <div style="overflow-x:auto;">
                        <table class="table table-striped jambo_table bulk_action">
                            <thead>
                            <tr class="headings">
                                <th class="column-title">STT</th>
                                <th class="column-title">Tiêu đề thông báo</th>
                                <th class="column-title">Nội dung thông báo</th>
                                <th class="column-title">Ngày tạo thông báo</th>
                                <th class="column-title">#</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($group->notifications as $notification)
                                <tr class="even pointer">
                                    <td class="">{{$loop->iteration}}</td>
                                    <td>{{$notification->title}}</td>
                                    <td>{{$notification->content}}</td>
                                    <td>{{$notification->created_at}}</td>
                                    <td class="last">
                                        <div class="zvn-box-btn-filter">
                                            <a href="{{ route('teacher.groups.notifications.edit', [$group->id, $notification->id]) }}"
                                               type="input" class="btn btn-icon btn-success" data-toggle="tooltip"
                                               data-placement="top" data-original-title="Chỉnh sửa">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>

                                            <a href="{{ route('teacher.groups.notifications.destroy', [$group->id, $notification->id]) }}"
                                               type="input" class="deleteButton btn btn-icon btn-danger btn-delete"
                                               data-toggle="tooltip" data-placement="top" data-original-title="Xóa">
                                                onclick="return
                                                confirmDeleteFunction('delete-notification-{{$notification->id}}
                                                -form');">
                                                <i class="fa fa-trash"></i>
                                            </a>

                                            <form id="delete-notification-{{$notification->id}}-form"
                                                  action="{{ route('teacher.groups.notifications.destroy', [$group->id, $notification->id]) }}"
                                                  method="POST" style="display: none;">
                                                @method('DELETE')
                                                @csrf
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Danh sách đề kiểm tra</h2>
                    <div class="zvn-add-new pull-right">
                        <a href="{{ route('teacher.groups.exams.create', $group->id) }}"
                           class="btn btn-success"><i class="fas fa-plus-circle"></i> Thêm đề kiểm tra cho nhóm</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <!-- responsive table -->
                    <div style="overflow-x:auto;">
                        <table class="table table-striped jambo_table bulk_action">
                            <thead>
                            <tr class="headings">
                                <th class="column-title">STT</th>
                                <th class="column-title">Tên đề</th>
                                <th class="column-title">Loại đề</th>
                                <th class="column-title">Thời gian mở</th>
                                <th class="column-title">Thời gian đóng</th>
                                <th class="column-title">Lớp</th>
                                <th class="column-title">Dễ</th>
                                <th class="column-title">Trung bình</th>
                                <th class="column-title">Khó</th>
                                <th class="column-title">Cho xem đáp án sau khi làm</th>
                                <th class="column-title">Ngày tạo đề</th>
                                <th class="column-title">#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($group->exams as $exam)
                                <tr class="even pointer">
                                    <td class="">{{$loop->iteration}}</td>

                                    <td>{{ $exam->name }}</td>
                                    <td>@if ($exam->type_exam == 0) Đề kiểm tra @else Đề thi thử @endif</td>
                                    <td>{{ $exam->time_open }}</td>
                                    <td>{{ $exam->time_close }}</td>
                                    <td>{{ $exam->class }}</td>
                                    <td>{{ $exam->number_questions->easy }}</td>
                                    <td>{{ $exam->number_questions->normal }}</td>
                                    <td>{{ $exam->number_questions->hard }}</td>
                                    <td>@if ($exam->is_show_solution == true) Cho phép @else Không cho phép @endif</td>
                                    <td>{{ $exam->number_questions->created_at }}</td>
                                    <td class="last">
                                        <div class="zvn-box-btn-filter">
                                            <a href="{{ route('teacher.groups.exams.edit', [$group->id, $exam->id]) }}"
                                               type="input" class="btn btn-icon btn-success" data-toggle="tooltip"
                                               data-placement="top" data-original-title="Chỉnh sửa">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a href="{{ route('teacher.$exam.notifications.destroy', [$group->id, $exam->id]) }}"
                                               type="input" class="deleteButton btn btn-icon btn-danger btn-delete"
                                               data-toggle="tooltip" data-placement="top" data-original-title="Xóa">
                                                onclick="return confirmDeleteFunction('delete-exam-{{$exam->id}}
                                                -form');">
                                                <i class="fa fa-trash"></i>
                                            </a>

                                            <form id="delete-exam-{{$exam->id}}-form"
                                                  action="{{ route('teacher.groups.exams.destroy', [$group->id, $exam->id]) }}"
                                                  method="POST" style="display: none;">
                                                @method('DELETE')
                                                @csrf
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    --}}
@endsection
