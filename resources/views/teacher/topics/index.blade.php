@extends('layouts.teacher')

@section('title')
    Danh sách chủ đề câu hỏi
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
                        <h2 class="text-primary mb-0">Danh sách chủ đề câu hỏi</h2>
                        <a href="{{ route('teacher.topics.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus-circle"></i> Thêm chủ đề mới
                        </a>
                    </div>
                    <div class="card-body">
                        <table id="topic-table" class="table card-text hover" style="width: 100%; overflow-x:auto;">
                            <thead>
                            <tr data-toggle="tooltip" title="Nhấn giữ phím Shift và chọn cột để sắp xếp theo nhiều cột">
                                <th width="5%">STT</th>
                                <th width="40%">Tên chủ đề</th>
                                <th width="20%">Lớp</th>
                                <th width="15%">Mô tả</th>
                                <th width="15%">Cập nhật lúc</th>
                                <th width="5%">#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($topics as $topic)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{!! $topic->topicName !!}</td>
                                    <td>{{ $topic->typeClassName }} {{ $topic->class }}</td>
                                    <td>{{ $topic->description }}</td>
                                    <td>{{ $topic->topicUpdatedAt }}</td>

                                    <td>
                                        <div>
                                            <a href="{{ route('teacher.topics.show', $topic->topicId) }}" type="input" class="btn btn-icon btn-secondary" data-toggle="tooltip" data-placement="top" data-original-title="Xem chi tiết">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('teacher.topics.edit', $topic->topicId) }}" type="input" class="btn btn-icon btn-success" data-toggle="tooltip" data-placement="top" data-original-title="Chỉnh sửa">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>

                                            <a href="{{ route('teacher.topics.destroy', $topic->topicId) }}"
                                               type="input"
                                               class="deleteButton btn btn-icon btn-danger btn-delete"
                                               data-toggle="tooltip" data-placement="top" data-original-title="Xóa"
                                               onclick="return confirmDeleteFunction('delete-form-{{ $topic->topicId }}');">
                                                <i class="fas fa-trash"></i>
                                            </a>

                                            <form id="delete-form-{{ $topic->topicId }}" action="{{ route('teacher.topics.destroy', $topic->topicId) }}" method="POST"
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
            let table = $('#topic-table').DataTable({
                "language":
                    {
                        "emptyTable":     "Không tìm thấy dữ liệu",
                        "info":           "Có _TOTAL_ chủ đề câu hỏi trong trang hiện tại",
                        "infoEmpty":      "Số chủ đề câu hỏi trong trang hiện tại: 0",
                        "infoFiltered":   "(đã lọc kết quả tìm kiếm từ _MAX_ chủ đề câu hỏi)",
                        "lengthMenu":     "Hiển thị _MENU_ chủ đề câu hỏi",
                        "loadingRecords": "Đang tải...",
                        "processing":     "Đang xử lý...",
                        "search":         "Tìm kiếm chủ đề câu hỏi:",
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
            addSuccessFunction("chủ đề câu hỏi");
        </script>
    @endif

    @if (Session::has('isUpdated'))
        <script type="text/javascript" defer>
            updateSucessFunction("chủ đề câu hỏi");
        </script>
    @endif

    @if (Session::has('isDestroyed'))
        <script type="text/javascript" defer>
            destroySucessFunction("chủ đề câu hỏi");
        </script>
    @endif
@endsection
