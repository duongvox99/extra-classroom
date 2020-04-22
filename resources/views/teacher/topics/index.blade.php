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
                        <h2 class="text-primary mb-0">Chủ đề câu hỏi</h2>
                        <a href="{{ route('teacher.topics.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus-circle"></i> Tạo mới
                        </a>
                    </div>
                    <div class="card-body">
                            @if (count($topics ?? []))
                                <table id="topic-table" class="table card-text hover" style="width: 100%; overflow-x:auto;">
                                    <thead>
                                        <tr data-toggle="tooltip" title="Nhấn giữ phím Shift và chọn cột để sắp xếp theo nhiều cột">
                                            <th width="5%">STT</th>
                                            <th width="40%">Tên chủ đề câu hỏi</th>
                                            <th width="20%">Mô tả</th>
                                            <th width="15%">Số câu của chủ đề</th>
                                            <th width="20%">#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($topics as $topic)
                                            <tr>
                                                <th scope="row">{{$loop->iteration}}</th>
                                                <td>{!! $topic->name !!}</td>
                                                <td>{{ $topic->description }}</td>
                                                <td>{{ $topic->time_limit }}</td>
                                                <td>{{ $topic->exam_updated_at }}</td>

                                                <td>
                                                    <div>
                                                        <a href="{{ route('teacher.exams.show', $exam->id) }}" type="input" class="btn btn-icon btn-secondary" data-toggle="tooltip" data-placement="top" data-original-title="Xem chi tiết">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <a href="{{ route('teacher.exams.edit', $exam->id) }}" type="input" class="btn btn-icon btn-success" data-toggle="tooltip" data-placement="top" data-original-title="Chỉnh sửa">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>

                                                        <a href="{{ route('teacher.exams.destroy', $exam->id) }}"
                                                            type="input"
                                                            class="deleteButton btn btn-icon btn-danger btn-delete"
                                                            data-toggle="tooltip" data-placement="top" data-original-title="Xóa"
                                                            onclick="return confirmDeleteFunction('delete-form-{{ $exam->id }}');">
                                                            <i class="fas fa-trash"></i>
                                                        </a>

                                                        <form id="delete-form-{{ $exam->id }}" action="{{ route('teacher.exams.destroy', $exam->id) }}" method="POST"
                                                                style="display: none;">
                                                            @method('DELETE') @csrf
                                                        </form>

                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p class="card-text text-secondary text-center">Chưa có chủ đề nào</p>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('body-custom-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.js" integrity="sha256-Ka8obxsHNCz6H9hRpl8X4QV3XmhxWyqBpk/EpHYyj9k=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/NotifyFunctions.js') }}"></script>

    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })

        $(document).ready(function() {
            let table = $('#topic-table').DataTable({
                "language":
                    {
                        "emptyTable":     "Không tìm thấy dữ liệu",
                        "info":           "Có _TOTAL_ đề kiểm tra trong trang hiện tại",
                        "infoEmpty":      "Số đề kiểm tra trong trang hiện tại: 0",
                        "infoFiltered":   "(đã lọc kết quả tìm kiếm từ _MAX_ đề kiểm tra)",
                        "lengthMenu":     "Hiển thị _MENU_ đề kiểm tra",
                        "loadingRecords": "Đang tải...",
                        "processing":     "Đang xử lý...",
                        "search":         "Tìm kiếm đề kiểm tra:",
                        "zeroRecords":    "Không tìm thấy kết quả nào",
                        "paginate": {
                            "first":      "Đầu tiên",
                            "last":       "Cuối cùng",
                            "next":       "Trang tiếp theo",
                            "previous":   "Trang trước đó"
                        }
                    },
                "paging": true,
                "pageLength": 25,
                "order": [[ 0, "asc" ]],
                "columnDefs": [{
                    "targets": 5,
                    "orderable": false
                    }]
            });
        } );
    </script>

    <script src="{{ asset('js/NotifyFunctions.js') }}"></script>

    @if (Session::has('isStored'))
        <script type="text/javascript" defer>
            addSuccessFunction("đề kiểm tra");
        </script>
    @endif

    @if (Session::has('isUpdated'))
        <script type="text/javascript" defer>
            updateSucessFunction("đề kiểm tra");
        </script>
    @endif

    @if (Session::has('isDestroyed'))
        <script type="text/javascript" defer>
            destroySucessFunction("đề kiểm tra");
        </script>
    @endifipt>
    @endif
@endsection
