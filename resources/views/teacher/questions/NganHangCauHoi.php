<script type="text/javascript" src="/ExtraClassroomWebsite/public/js/DeleteButton.js"></script>
<script id="MathJax-script" async src="/ExtraClassroomWebsite/public/js/tex-mml-chtml.js"></script>

<div class="page-header zvn-page-header clearfix">
    <div class="zvn-page-header-title">
        <h3>Danh sách câu hỏi</h3>
    </div>
    <div class="zvn-add-new pull-right">
        <a href="/ExtraClassroomWebsite/GiaoVien/ThemCauHoi/" class="btn btn-success"><i class="fas fa-plus-circle"></i> Thêm câu hỏi mới</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Bộ lọc</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-md-6"><a href="/ExtraClassroomWebsite/GiaoVien/NganHangCauHoi/TatCa/1" type="input" class="btn <?php echo ($data["Category"] == "TatCa") ? "btn-primary" : "btn-success"; ?>">
                            Tất cả <span class="badge bg-danger"><?php echo ($data["Category"] == "TatCa") ? $data["TongSoCauHoi"] : ""; ?></span>
                        </a><a href="/ExtraClassroomWebsite/GiaoVien/NganHangCauHoi/Lop10/1" type="input" class="btn <?php echo ($data["Category"] == "Lop10") ? "btn-primary" : "btn-success"; ?>">
                            Lớp 10 <span class="badge bg-danger"><?php echo ($data["Category"] == "Lop10") ? $data["TongSoCauHoi"] : ""; ?></span>
                        </a><a href="/ExtraClassroomWebsite/GiaoVien/NganHangCauHoi/Lop11/1" type="input" class="btn <?php echo ($data["Category"] == "Lop11") ? "btn-primary" : "btn-success"; ?>">
                            Lớp 11 <span class="badge bg-danger"><?php echo ($data["Category"] == "Lop11") ? $data["TongSoCauHoi"] : ""; ?></span>
                        </a><a href="/ExtraClassroomWebsite/GiaoVien/NganHangCauHoi/Lop12/1" type="input" class="btn <?php echo ($data["Category"] == "Lop12") ? "btn-primary" : "btn-success"; ?>">
                            Lớp 12 <span class="badge bg-danger"><?php echo ($data["Category"] == "Lop12") ? $data["TongSoCauHoi"] : ""; ?></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--box-lists-->
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Danh sách</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <!-- responsive table -->
                <div style="overflow-x:auto;">
                    <table class="table table-striped jambo_table bulk_action">
                        <thead>
                            <tr class="headings">
                                <th class="column-title">STT</th>
                                <th class="column-title">Loại</th>
                                <th class="column-title">Lớp</th>
                                <th class="column-title">Tuần</th>
                                <th class="column-title">Câu hỏi</th>
                                <th class="column-title">Đáp án 1</th>
                                <th class="column-title">Đáp án 2</th>
                                <th class="column-title">Đáp án 3</th>
                                <th class="column-title">Đáp án 4</th>
                                <th class="column-title">ĐA</th>
                                <th class="column-title">Lời giải</th>
                                <th class="column-title">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            for ($i = 0; $i < count($data["DanhSachCauHoi"]); $i++) {
                                if ($data["DanhSachCauHoi"][$i]["LoaiCauHoi"] == 1) {
                                    $LoaiCauHoi = "Dễ";
                                }
                                else if ($data["DanhSachCauHoi"][$i]["LoaiCauHoi"] == 2) {
                                    $LoaiCauHoi = "Trung bình";
                                }
                                else {
                                    $LoaiCauHoi = "Khó";
                                }
                            ?>
                                <tr class="even pointer">
                                    <td class=""><?php echo ($i + 50 * ($data["Page"] - 1) + 1); ?></td>
                                    <td><?php echo $LoaiCauHoi; ?></td>
                                    <td><?php echo $data["DanhSachCauHoi"][$i]["Lop"]; ?></td>
                                    <td><?php echo $data["DanhSachCauHoi"][$i]["Tuan"]; ?></td>
                                    <td><?php echo $data["DanhSachCauHoi"][$i]["CauHoi"]; ?></td>
                                    <td><?php echo $data["DanhSachCauHoi"][$i]["DapAn1"]; ?></td>
                                    <td><?php echo $data["DanhSachCauHoi"][$i]["DapAn2"]; ?></td>
                                    <td><?php echo $data["DanhSachCauHoi"][$i]["DapAn3"]; ?></td>
                                    <td><?php echo $data["DanhSachCauHoi"][$i]["DapAn4"]; ?></td>
                                    <td><?php echo $data["DanhSachCauHoi"][$i]["DapAnDung"]; ?></td>
                                    <td><?php echo $data["DanhSachCauHoi"][$i]["LoiGiai"]; ?></td>
                                    <td class="last">
                                        <div class="zvn-box-btn-filter">
                                            <a href="/ExtraClassroomWebsite/GiaoVien/ChinhSuaCauHoi/<?php echo $data["DanhSachCauHoi"][$i]["IdCauHoi"]; ?>" type="input" class="btn btn-icon btn-success" data-toggle="tooltip" data-placement="top" data-original-title="Chỉnh sửa">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a href="/ExtraClassroomWebsite/GiaoVien/XoaCauHoi/<?php echo $data["DanhSachCauHoi"][$i]["IdCauHoi"]; ?>" type="input" class="deleteButton btn btn-icon btn-danger btn-delete" data-toggle="tooltip" data-placement="top" data-original-title="Xóa">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end-box-lists-->
<!--box-pagination-->
<div class="x_panel">
    <div class="x_title">
        <h2>Phân trang</h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <div class="row">
            <div class="col-md-6">
                <p class="m-b-0">Tổng cộng: <span class="badge badge-success"><?php echo $data["TongSoCauHoi"] ?></span> câu hỏi</p>
            </div>
            <div class="col-md-6">
                <ul class="pagination zvn-pagination">
                    <li class="page-item">
                        <a class="page-link" href="/ExtraClassroomWebsite/GiaoVien/NganHangCauHoi/<?php echo $data["Category"]; ?>/<?php echo ($data["Page"] - 1 > 0) ? ($data["Page"] - 1) : 1; ?>">«</a>
                    </li>

                    <?php
                    for ($i = 1; $i <= $data["MaxPage"]; $i++) {
                        ?>
                        <li class="page-item <?php echo ($i == $data["Page"]) ? "active" : ""; ?>"><a class="page-link" href="/ExtraClassroomWebsite/GiaoVien/NganHangCauHoi/<?php echo $data["Category"]; ?>/<?php echo $i ?>"><?php echo $i ?></a></li>
                    <?php
                    }
                    ?>

                    <li class="page-item">
                        <a class="page-link" href="/ExtraClassroomWebsite/GiaoVien/NganHangCauHoi/<?php echo $data["Category"]; ?>/<?php echo ($data["Page"] + 1 <= $data["MaxPage"]) ? ($data["Page"] + 1) : $data["MaxPage"]; ?>">»</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--end-box-pagination-->