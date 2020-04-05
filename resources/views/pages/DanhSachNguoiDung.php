<script type="text/javascript" src="/ExtraClassroomWebsite/public/js/DeleteButton.js"></script>

<div class="page-header zvn-page-header clearfix">
    <div class="zvn-page-header-title">
        <h3>Danh sách người dùng</h3>
    </div>
    <div class="zvn-add-new pull-right">
        <a href="/ExtraClassroomWebsite/GiaoVien/ThemNguoiDung/" class="btn btn-success"><i class="fas fa-plus-circle"></i> Thêm người dùng mới</a>
    </div>
</div>
<?php if (isset($data["Category"])) { ?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Bộ lọc</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-md-6"><a href="/ExtraClassroomWebsite/GiaoVien/DanhSachNguoiDung/TatCa/1" type="input" class="btn <?php echo ($data["Category"] == "TatCa") ? "btn-primary" : "btn-success"; ?>">
                            Tất cả <span class="badge bg-danger"><?php echo ($data["Category"] == "TatCa") ? $data["TongSoNguoiDung"] : ""; ?></span>
                        </a><a href="/ExtraClassroomWebsite/GiaoVien/DanhSachNguoiDung/QuanTriVien/1" type="input" class="btn <?php echo ($data["Category"] == "QuanTriVien") ? "btn-primary" : "btn-success"; ?>">
                            Quản trị viên <span class="badge bg-danger"><?php echo ($data["Category"] == "QuanTriVien") ? $data["TongSoNguoiDung"] : ""; ?></span>
                        </a><a href="/ExtraClassroomWebsite/GiaoVien/DanhSachNguoiDung/Lop10/1" type="input" class="btn <?php echo ($data["Category"] == "Lop10") ? "btn-primary" : "btn-success"; ?>">
                            Lớp 10 <span class="badge bg-danger"><?php echo ($data["Category"] == "Lop10") ? $data["TongSoNguoiDung"] : ""; ?></span>
                        </a><a href="/ExtraClassroomWebsite/GiaoVien/DanhSachNguoiDung/Lop11/1" type="input" class="btn <?php echo ($data["Category"] == "Lop11") ? "btn-primary" : "btn-success"; ?>">
                            Lớp 11 <span class="badge bg-danger"><?php echo ($data["Category"] == "Lop11") ? $data["TongSoNguoiDung"] : ""; ?></span>
                        </a><a href="/ExtraClassroomWebsite/GiaoVien/DanhSachNguoiDung/Lop12/1" type="input" class="btn <?php echo ($data["Category"] == "Lop12") ? "btn-primary" : "btn-success"; ?>">
                            Lớp 12 <span class="badge bg-danger"><?php echo ($data["Category"] == "Lop12") ? $data["TongSoNguoiDung"] : ""; ?></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
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
                                <th class="column-title">Avatar</th>
                                <th class="column-title">Họ và Tên</th>
                                <th class="column-title">Tên đăng nhập</th>
                                <th class="column-title">Năm sinh</th>
                                <th class="column-title">Lớp</th>
                                <th class="column-title">Tên nhóm</th>
                                <th class="column-title">Email</th>
                                <th class="column-title">Loại tài khoản</th>
                                <th class="column-title">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            for ($i = 0; $i < count($data["DanhSachNguoiDung"]); $i++) {
                                if ($data["DanhSachNguoiDung"][$i]["Avatar"] == "") {
                                    $avatar = "/ExtraClassroomWebsite/public/img/no-avatar.png";
                                } else {
                                    $avatar = $data["DanhSachNguoiDung"][$i]["Avatar"];
                                }

                                if ($data["DanhSachNguoiDung"][$i]["LoaiTaiKhoan"] == 0) {
                                    $loaiTaiKhoan = "Quản trị viên";
                                } else {
                                    $loaiTaiKhoan = "Học sinh";
                                }


                                ?>
                                <tr class="even pointer">
                                    <td class=""><?php echo ($i + 50 * ($data["Page"] - 1) + 1); ?></td>
                                    <td width="5%"><img src="<?php echo $avatar; ?>" alt="avatar" class="zvn-thumb"></td>
                                    <td><?php echo $data["DanhSachNguoiDung"][$i]["HoTen"]; ?></td>
                                    <td><?php echo $data["DanhSachNguoiDung"][$i]["Username"]; ?></td>
                                    <td><?php echo $data["DanhSachNguoiDung"][$i]["NamSinh"]; ?></td>
                                    <td><?php echo $data["DanhSachNguoiDung"][$i]["Lop"]; ?></td>
                                    <td><?php echo $data["DanhSachNguoiDung"][$i]["TenNhom"]; ?></td>
                                    <td><?php echo $data["DanhSachNguoiDung"][$i]["Email"]; ?></td>
                                    <td><?php echo $loaiTaiKhoan; ?></td>
                                    <td class="last">
                                        <div class="zvn-box-btn-filter">
                                            <a href="/ExtraClassroomWebsite/GiaoVien/ChinhSuaNguoiDung/<?php echo $data["DanhSachNguoiDung"][$i]["IdNguoiDung"]; ?>" type="input" class="btn btn-icon btn-success" data-toggle="tooltip" data-placement="top" data-original-title="Chỉnh sửa">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a href="/ExtraClassroomWebsite/GiaoVien/XoaNguoiDung/<?php echo $data["DanhSachNguoiDung"][$i]["IdNguoiDung"]; ?>" type="input" class="deleteButton btn btn-icon btn-danger btn-delete" data-toggle="tooltip" data-placement="top" data-original-title="Xóa">
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
<?php if (isset($data["Category"])) { ?>
<div class="x_panel">
    <div class="x_title">
        <h2>Phân trang</h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <div class="row">
            <div class="col-md-6">
                <p class="m-b-0">Tổng cộng: <span class="label label-success"><?php echo $data["TongSoNguoiDung"] ?></span> người dùng</p>
            </div>
            <div class="col-md-6">
                <ul class="pagination zvn-pagination">
                    <li class="page-item">
                        <a class="page-link" href="/ExtraClassroomWebsite/GiaoVien/DanhSachNguoiDung/<?php echo $data["Category"]; ?>/<?php echo ($data["Page"] - 1 > 0) ? ($data["Page"] - 1) : 1; ?>">«</a>
                    </li>

                    <?php
                    for ($i = 1; $i <= $data["MaxPage"]; $i++) {
                        ?>
                        <li class="page-item <?php echo ($i == $data["Page"]) ? "active" : ""; ?>"><a class="page-link" href="/ExtraClassroomWebsite/GiaoVien/DanhSachNguoiDung/<?php echo $data["Category"]; ?>/<?php echo $i ?>"><?php echo $i ?></a></li>
                    <?php
                    }
                    ?>

                    <li class="page-item">
                        <a class="page-link" href="/ExtraClassroomWebsite/GiaoVien/DanhSachNguoiDung/<?php echo $data["Category"]; ?>/<?php echo ($data["Page"] + 1 <= $data["MaxPage"]) ? ($data["Page"] + 1) : $data["MaxPage"]; ?>">»</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<!--end-box-pagination-->