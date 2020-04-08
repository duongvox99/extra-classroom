<script type="text/javascript" src="/ExtraClassroomWebsite/public/js/DeleteButton.js"></script>

<div class="page-header zvn-page-header clearfix">
    <div class="zvn-page-header-title">
        <h3>Danh sách đề</h3>
    </div>
    <div class="zvn-add-new pull-right">
        <a href="/ExtraClassroomWebsite/GiaoVien/ThemDe/" class="btn btn-success"><i class="fas fa-plus-circle"></i> Thêm đề kiểm tra mới</a>
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
                    <div class="col-md-6"><a href="/ExtraClassroomWebsite/GiaoVien/DanhSachDe/TatCa/1" type="input" class="btn <?php echo ($data["Category"] == "TatCa") ? "btn-primary" : "btn-success"; ?>">
                            Tất cả <span class="badge bg-danger"><?php echo ($data["Category"] == "TatCa") ? $data["TongSoDe"] : ""; ?></span>
                        </a><a href="/ExtraClassroomWebsite/GiaoVien/DanhSachDe/Lop10/1" type="input" class="btn <?php echo ($data["Category"] == "Lop10") ? "btn-primary" : "btn-success"; ?>">
                            Lớp 10 <span class="badge bg-danger"><?php echo ($data["Category"] == "Lop10") ? $data["TongSoDe"] : ""; ?></span>
                        </a><a href="/ExtraClassroomWebsite/GiaoVien/DanhSachDe/Lop11/1" type="input" class="btn <?php echo ($data["Category"] == "Lop11") ? "btn-primary" : "btn-success"; ?>">
                            Lớp 11 <span class="badge bg-danger"><?php echo ($data["Category"] == "Lop11") ? $data["TongSoDe"] : ""; ?></span>
                        </a><a href="/ExtraClassroomWebsite/GiaoVien/DanhSachDe/Lop12/1" type="input" class="btn <?php echo ($data["Category"] == "Lop12") ? "btn-primary" : "btn-success"; ?>">
                            Lớp 12 <span class="badge bg-danger"><?php echo ($data["Category"] == "Lop12") ? $data["TongSoDe"] : ""; ?></span>
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
                                <th class="column-title">Tên đề</th>
                                <th class="column-title">Loại đề</th>
                                <th class="column-title">Lớp</th>
                                <th class="column-title">Tuần</th>
                                <th class="column-title">Thời gian</th>
                                <th class="column-title">Dễ</th>
                                <th class="column-title">Trung bình</th>
                                <th class="column-title">Khó</th>
                                <th class="column-title">Cho xem đáp án sau khi làm</th>
                                <th class="column-title">Ngày tạo đề</th>
                                <!-- <th class="column-title">Email</th> -->
                                <!-- <th class="column-title">Loại tài khoản</th> -->
                                <th class="column-title">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            for ($i = 0; $i < count($data["DanhSachDe"]); $i++) {
                                if ($data["DanhSachDe"][$i]["LoaiDe"] == 0) {
                                    $LoaiDe = "Đề kiểm tra";
                                } else {
                                    $LoaiDe = "Đề thi thử";
                                }

                                if ($data["DanhSachDe"][$i]["HienDapAn"] == 1) {
                                    $HienDapAn = "Cho phép";
                                } else {
                                    $HienDapAn = "Không cho phép";
                                }


                                ?>
                                <tr class="even pointer">
                                    <td class=""><?php echo ($i + 50 * ($data["Page"] - 1) + 1); ?></td>
                                    <td><?php echo $data["DanhSachDe"][$i]["TenDe"]; ?></td>
                                    <td><?php echo $LoaiDe; ?></td>
                                    <td><?php echo $data["DanhSachDe"][$i]["Lop"]; ?></td>
                                    <td><?php echo $data["DanhSachDe"][$i]["Tuan"]; ?></td>
                                    <td><?php echo $data["DanhSachDe"][$i]["ThoiGian"]; ?> phút</td>
                                    <td><?php echo $data["DanhSachDe"][$i]["SoCauDe"]; ?></td>
                                    <td><?php echo $data["DanhSachDe"][$i]["SoCauTrungBinh"]; ?></td>
                                    <td><?php echo $data["DanhSachDe"][$i]["SoCauKho"]; ?></td>
                                    <td><?php echo $HienDapAn; ?></td>
                                    <td><?php echo $data["DanhSachDe"][$i]["NgayTaoDe"]; ?></td>
                                    <td class="last">
                                        <div class="zvn-box-btn-filter">
                                            <a href="/ExtraClassroomWebsite/GiaoVien/ChinhSuaDe/<?php echo $data["DanhSachDe"][$i]["IdDe"]; ?>" type="input" class="btn btn-icon btn-success" data-toggle="tooltip" data-placement="top" data-original-title="Chỉnh sửa">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="/ExtraClassroomWebsite/GiaoVien/XoaDe/<?php echo $data["DanhSachDe"][$i]["IdDe"]; ?>" type="input" class="deleteButton btn btn-icon btn-danger btn-delete" data-toggle="tooltip" data-placement="top" data-original-title="Xóa">
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
                <p class="m-b-0">Tổng cộng: <span class="label label-success"><?php echo $data["TongSoDe"] ?></span> đề kiểm tra</p>
            </div>
            <div class="col-md-6">
                <ul class="pagination zvn-pagination">
                    <li class="page-item">
                        <a class="page-link" href="/ExtraClassroomWebsite/GiaoVien/DanhSachDe/<?php echo $data["Category"]; ?>/<?php echo ($data["Page"] - 1 > 0) ? ($data["Page"] - 1) : 1; ?>">«</a>
                    </li>

                    <?php
                    for ($i = 1; $i <= $data["MaxPage"]; $i++) {
                        ?>
                        <li class="page-item <?php echo ($i == $data["Page"]) ? "active" : ""; ?>"><a class="page-link" href="/ExtraClassroomWebsite/GiaoVien/DanhSachDe/<?php echo $data["Category"]; ?>/<?php echo $i ?>"><?php echo $i ?></a></li>
                    <?php
                    }
                    ?>

                    <li class="page-item">
                        <a class="page-link" href="/ExtraClassroomWebsite/GiaoVien/DanhSachDe/<?php echo $data["Category"]; ?>/<?php echo ($data["Page"] + 1 <= $data["MaxPage"]) ? ($data["Page"] + 1) : $data["MaxPage"]; ?>">»</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--end-box-pagination-->