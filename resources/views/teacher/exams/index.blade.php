@extends('layouts.teacher')

@section('title')
    Danh sách đề kiểm tra
@endsection

@section('head-custom-stylesheet')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
@endsection


@section('section-content')
    <section class="py-5">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2 class="text-primary mb-0">Danh sách đề kiểm tra</h2>

                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-plus-circle"></i> Tạo đề kiểm tra mới
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a href="{{ route('teacher.exams.create_custom_by_topic') }}" class="dropdown-item">
                                    Đề thi/kiểm tra thường
                                </a>
                                <a href="{{ route('teacher.exams.create') }}" class="dropdown-item">
                                    Đề thi (THPT) tổng hợp
                                </a>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <table id="exam-table" class="table card-text hover" style="width: 100%; overflow-x:auto;">
                            <thead>
                                <tr data-toggle="tooltip" title="Nhấn giữ phím Shift và chọn cột để sắp xếp theo nhiều cột">
                                    <th width="5%">STT</th>
                                    <th width="50%">Tên đề</th>
                                    <th width="10%">Số câu hỏi</th>
                                    <th width="15%">Thời gian (phút)</th>
                                    <th width="15%">Cập nhật lúc</th>
                                    <th width="5%">#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($exams as $exam)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>{!! $exam->name !!}</td>
                                        <td>{{ $exam->totalQuestion }}</td>
                                        <td>{{ $exam->time_limit }}</td>
                                        <td>{{ $exam->exam_updated_at }}</td>

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
                    </div>
            </div>
        </div>
    </section>
@endsection

@section('body-custom-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.js" integrity="sha256-Ka8obxsHNCz6H9hRpl8X4QV3XmhxWyqBpk/EpHYyj9k=" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })

        $(document).ready(function() {
            let table = $('#exam-table').DataTable({
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
    @endif
@endsection
