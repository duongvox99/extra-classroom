@extends('layouts.teacher')

@section('title')
    Danh sách tài khoản học sinh
@endsection

@section('head-custom-stylesheet')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">

    <style>
        .avatar{
        /*    need to do */
        }
    </style>
@endsection

@section('section-content')
    <section class="py-5">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2 class="text-primary mb-0">Danh sách tài khoản học sinh</h2>

                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-plus-circle"></i> Thêm tài khoản học sinh mới
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a href="{{ route('teacher.users.mass_create_user') }}" class="dropdown-item">
                                    Thêm hàng loạt vào nhóm
                                </a>
                                <a href="{{ route('teacher.users.create') }}" class="dropdown-item"data-toggle="modal" data-target="#create-student" >
                                    Thêm từng người vào nhóm
                                </a>
                            </div>
                        </div>
                        <div id="create-student"  class="modal fade" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Thêm từng người vào nhóm</h4>
                                    </div>
                                    <div class="modal-body">
                                        <input name="emailStudent" type="email" class="form-control" id="InputEmailStudent" aria-describedby="emailHelp" placeholder="Nhập email">
                                        <select class="selectgroup" id="groupStudent">
                                            <option>Chọn nhóm</option>
                                            @foreach ($groups as $group)
                                                <option value="{{$group->groupId}}">{{$group->groupName}}</option>
                                            @endforeach
                                        </select>
                                        <p class="alert alert-success" id="msg"></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                                        <button type="button" class="btn btn-primary btn-add-student">Lưu</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <table id="user-table" class="table card-text hover" style="width: 100%; overflow-x:auto;">
                            <thead>
                            <tr data-toggle="tooltip" title="Nhấn giữ phím Shift và chọn cột để sắp xếp theo nhiều cột">
                                <th width="5%">STT</th>
                                <th width="5%">#</th>
                                <th width="15%">Họ và tên</th>
                                <th width="15%">Tên đăng nhập</th>
                                <th width="15%">Ngày sinh</th>
                                <th width="5%">Lớp</th>
                                <th width="20%">Nhóm</th>
                                <th width="15%">Cập nhật lúc</th>
                                <th width="5%">#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td><img class="avatar" src="{!! $user->userAvatar !!}" alt="avatar"></td>
                                    <td>{{ $user->userName }}</td>
                                    <td>{{ $user->userEmail }}</td>
                                    <td>{{ $user->userBirthday}}</td>
                                    <td>{{ $user->userClass }}</td>
                                    <td>{{ $user->groupName }}</td>
                                    <td>{{ $user->userUpdatedAt }}</td>

                                    <td>
                                        <div>
                                            <a href="{{ route('teacher.users.show', $user->userId) }}" type="input" class="btn btn-icon btn-secondary" data-toggle="tooltip" data-placement="top" data-original-title="Xem chi tiết">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('teacher.users.edit', $user->userId) }}" type="input" class="btn btn-icon btn-success" data-toggle="tooltip" data-placement="top" data-original-title="Chỉnh sửa">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>

                                            <a href="{{ route('teacher.users.destroy', $user->userId) }}"
                                               type="input"
                                               class="deleteButton btn btn-icon btn-danger btn-delete"
                                               data-toggle="tooltip" data-placement="top" data-original-title="Xóa"
                                               onclick="return confirmDeleteFunction('delete-form-{{ $user->userId }}');">
                                                <i class="fas fa-trash"></i>
                                            </a>

                                            <form id="delete-form-{{ $user->userId }}" action="{{ route('teacher.users.destroy', $user->userId) }}" method="POST"
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

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("#msg").hide();
        $(".btn-add-student").click(function(e){
            $("#msg").show();
            e.preventDefault();

            var value = $("#groupStudent").val();
            var email = $("input[name=emailStudent]").val();
            var url = '{{ route('teacher.users.create') }}';

            $.ajax({
                url:url,
                method:'POST',
                data:{
                    Id:value,
                    Email:email,
                },
                success:function(response){
                    if(response.success){
                        $("#msg").html(response.message);
                    } else {
                        $("#msg").html('Nhập thông tin bị lỗi!!!');
                    }
                },
                error:function(error){
                    console.log(error)
                }
            });
        });

        $(document).ready(function() {
            let table = $('#user-table').DataTable({
                "language":
                    {
                        "emptyTable":     "Không tìm thấy dữ liệu",
                        "info":           "Có _TOTAL_ tài khoản học sinh trong trang hiện tại",
                        "infoEmpty":      "Số tài khoản học sinh trong trang hiện tại: 0",
                        "infoFiltered":   "(đã lọc kết quả tìm kiếm từ _MAX_ tài khoản học sinh)",
                        "lengthMenu":     "Hiển thị _MENU_ tài khoản học sinh",
                        "loadingRecords": "Đang tải...",
                        "processing":     "Đang xử lý...",
                        "search":         "Tìm kiếm tài khoản học sinh:",
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
                    "targets": 1,
                    "orderable": false
                }, {
                    "targets": 8,
                    "orderable": false
                }]
            });
        } );
    </script>

    <script src="{{ asset('js/NotifyFunctions.js') }}"></script>

    @if (Session::has('isStored'))
        <script type="text/javascript" defer>
            addSuccessFunction("tài khoản học sinh");
        </script>
    @endif

    @if (Session::has('isUpdated'))
        <script type="text/javascript" defer>
            updateSucessFunction("tài khoản học sinh");
        </script>
    @endif

    @if (Session::has('isDestroyed'))
        <script type="text/javascript" defer>
            destroySucessFunction("tài khoản học sinh");
        </script>
    @endif
@endsection
