@extends('layouts.teacher')

@section('title')
    Danh sách nhóm học sinh
@endsection

@section('extent-style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <style>
        .child-table {
            border: none !important;
        }
        .child-table>tbody>tr:hover {
            background-color: white !important;
        }

    </style>
@endsection

@section('body-scripts)
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
    <script type="text/javascript" id="MathJax-script" async src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/3.0.0/es5/latest?tex-mml-chtml.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.js" integrity="sha256-Ka8obxsHNCz6H9hRpl8X4QV3XmhxWyqBpk/EpHYyj9k=" crossorigin="anonymous"></script>

    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })

        $(document).ready(function() {
            /* Formatting function for row details */
            function format ( d ) {
                // `d` is the original data object for the row
                return '<table class="child-table">' +
                        '<tr>' +
                            '<td>Đáp án:</td>' +
                            '<td>' + d[7] + '</td>' +
                        '</tr>' +
                        '<tr>' +
                            '<td>Chọn câu:</td>' +
                            '<td>' + d[8] + '</td>' +
                        '</tr>' +
                        '<tr>' +
                            '<td>Lời giải:</td>'+
                            '<td>' + d[9] + '</td>'+
                        '</tr>'+
                    '</table>';
            }

            let table = $('#question-table').DataTable({
                "language":
                    {
                        "emptyTable":     "Không tìm thấy dữ liệu",
                        "info":           "Có _TOTAL_ câu hỏi trong trang hiện tại",
                        "infoEmpty":      "Số câu hỏi trong trang hiện tại: 0",
                        "search":         "Tìm kiếm câu hỏi:",
                        "zeroRecords":    "Không tìm thấy kết quả nào",
                        "infoFiltered":   "(đã lọc kết quả tìm kiếm từ _MAX_ câu hỏi)",
                    },
                "paging": false,
                "order": [[ 0, "asc" ]],
                "columnDefs": [ {
                    "targets": 6,
                    "orderable": false
                    },
                    {
                        "targets": [ 7, 8, 9 ],
                        "visible": false
                    }]
            });

            // Add event listener for opening and closing details
            $('#question-table tbody').on('click', 'tr', function () {
                let tr = $(this).closest('tr');
                let row = table.row( tr );

                if ( row.child.isShown() ) {
                    // This row is already open - close it
                    row.child.hide();
                    tr.removeClass('shown');
                }
                else {
                    // Open this row
                    row.child( format(row.data()) ).show();
                    tr.addClass('shown');
                }
            } );
        } );
    </script>

    <script src="{{ asset('js/NotifyFunctions.js') }}"></script>

    @if (Session::has('isStored'))
        <script type="text/javascript" defer>
            addSuccessFunction("câu hỏi");
        </script>
    @endif

    @if (Session::has('isUpdated'))
        <script type="text/javascript" defer>
            updateSucessFunction("câu hỏi");
        </script>
    @endif

    @if (Session::has('isDestroyed'))
        <script type="text/javascript" defer>
            destroySucessFunction("câu hỏi");
        </script>
    @endif
@endsection

@section('section-content')
    <section class="py-5">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2 class="text-primary mb-0">Danh sách câu hỏi - Trang {{ $currentPage }}</h2>
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-plus-circle"></i> Thêm câu hỏi
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a href="{{ route('teacher.questions.create') }}" class="dropdown-item">
                                    Nhập bằng tay
                                </a>
                                <a href="{{ route('teacher.import_from_docx') }}" class="dropdown-item">
                                    Tự nhập từ file docx
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="question-table" class="table card-text hover" style="width: 100%; overflow-x:auto;">
                            <thead>
                                <tr data-toggle="tooltip" title="Nhấn giữ phím Shift và chọn cột để sắp xếp theo nhiều cột">
                                    <th width="5%">STT</th>
                                    <th width="50%">Câu hỏi</th>
                                    <th width="10%">Chủ đề</th>
                                    <th width="10%">Loại câu hỏi</th>
                                    <th width="10%">Lớp</th>
                                    <th width="10%">Cập nhật lúc</th>
                                    <th width="5%"></th>
                                    <th width="0%" style="display:none;">answer</th>
                                    <th width="0%" style="display:none;">true_answer</th>
                                    <th width="0%" style="display:none;">solution</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $index = $from - 1; @endphp
                                @foreach ($questions as $question)
                                    <tr>
                                        <th scope="row">{{ $index += 1 }}</th>
                                        <td data-toggle="tooltip" title="Nhấn để xem các đáp án và lời giải">{!! $question->question !!}</td>
                                        <td>{{ $question->topic_name }}</td>
                                        <td>{{ $question->type_question_name }}</td>
                                        <td>{{ $question->type_class_name }} {{ $question->class }}</td>
                                        <td>{{ $question->question_updated_at }}</td>

                                        <td>
                                            <div>
                                                <a href="{{ route('teacher.questions.show', $question->id) }}" type="input" class="btn btn-icon btn-secondary" data-toggle="tooltip" data-placement="top" data-original-title="Xem chi tiết">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('teacher.questions.edit', $question->id) }}" type="input" class="btn btn-icon btn-success" data-toggle="tooltip" data-placement="top" data-original-title="Chỉnh sửa">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>

                                                <a href="{{ route('teacher.questions.destroy', $question->id) }}"
                                                    type="input"
                                                    class="deleteButton btn btn-icon btn-danger btn-delete"
                                                    data-toggle="tooltip" data-placement="top" data-original-title="Xóa"
                                                    onclick="return confirmDeleteFunction('delete-form-{{ $question->id }}');">
                                                    <i class="fas fa-trash"></i>
                                                </a>

                                                <form id="delete-form-{{ $question->id }}" action="{{ route('teacher.questions.destroy', $question->id) }}" method="POST"
                                                        style="display: none;">
                                                    @method('DELETE') @csrf
                                                </form>

                                            </div>
                                        </td>

                                        <td style="display:none;">{!! $question->answer !!}</td>
                                        <td style="display:none;">{{ $question->true_answer }}</td>
                                        <td style="display:none;">{!! $question->solution !!}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="float-right">
                            <nav aria-label="Questions navigation">
                                <ul class="pagination pagination-lg">
                                    <li class="page-item @if (empty($previousPageUrl)) disabled @endif">
                                        <a class="page-link" href="{{ $previousPageUrl }}" aria-label="Trang trước đó" data-toggle="tooltip" title="Trang trước đó">
                                            <i class="fas fa-arrow-left"></i>
                                        </a>
                                    </li>
                                    <li class="page-item @if (empty($nextPageUrl)) disabled @endif">
                                        <a class="page-link" href="{{ $nextPageUrl }}" aria-label="Trang tiếp theo" data-toggle="tooltip" title="Trang tiếp theo">
                                            <i class="fas fa-arrow-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
            </div>
        </div>
    </section>
@endsection
