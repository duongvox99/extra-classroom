<!-- $TenDe = $_POST["TenDe"];
$LoaiDe = $_POST["LoaiDe"];
$SoCauHoi = $_POST["SoCauHoi"];
$HienDapAn = $_POST["HienDapAn"];
$NgayTaoDe = $_POST["NgayTaoDe"];
$Lop = $_POST["Lop"]; -->
<script type="text/javascript" src="/ExtraClassroomWebsite/public/js/DeleteButton.js"></script>

<?php
if (isset($data["result"])) {
    $title = $data["action"] . " " . $data["type"];
    if ($data["result"]) {
        echo
            "<script type='text/javascript'>
                $.confirm({
                    theme: 'modern',
                    columnClass: 'medium',
                    title: '$title thành công',
                    content: 'Bạn có thể xem kết quả ở danh sách đề!',
                    type: 'green',
                    typeAnimated: true,
                    buttons: {
                        OK: {
                            text: 'Đồng ý',
                            btnClass: 'btn-green',
                            action: function(){
                            }
                        }
                    },
                });            
            </script>";
    } else {
        echo
            "<script type='text/javascript'>
                $.confirm({
                    theme: 'modern',
                    columnClass: 'medium',
                    title: '$title thất bại',
                    content: 'Bạn vui lòng kiểm tra lại thông tin nhập vào!',
                    type: 'red',
                    typeAnimated: true,
                    autoClose: 'tryAgain|5000',
                    buttons: {
                        tryAgain: {
                            text: 'Thử lại',
                            btnClass: 'btn-red',
                            action: function(){
                            }
                        }
                    },
                });            
            </script>";
    }
}
?>
<form action="" method="POST">
    <div class="form-group">
        <label for="tende">Tên đề</label>
        <input type="text" class="form-control" id="tende" name="TenDe" placeholder="Tên đề" value="<?php echo (isset($data["DataDeChinhSua"])) ? $data["DataDeChinhSua"]["TenDe"] : ""; ?>">
    </div>

    <div class="form-group">
        <label for="loaide">Loại đề</label>
        <select class="form-control" id="loaide" name="LoaiDe">
            <option value="0" <?php
                                if (isset($data["DataDeChinhSua"])) {
                                    if ($data["DataDeChinhSua"]["LoaiDe"] == 0) {
                                        echo 'selected="selected"';
                                    }
                                };
                                ?>>Đề kiểm tra</option>
            <option value="1" <?php
                                if (isset($data["DataDeChinhSua"])) {
                                    if ($data["DataDeChinhSua"]["LoaiDe"] == 1) {
                                        echo 'selected="selected"';
                                    }
                                };
                                ?>>Đề thi thử</option>
        </select>
    </div>

    <div class="form-group">
        <label for="loaide">Hiện đáp án</label>
        <select class="form-control" id="loaide" name="HienDapAn">
            <option value="1" <?php
                                if (isset($data["DataDeChinhSua"])) {
                                    if ($data["DataDeChinhSua"]["HienDapAn"] == 1) {
                                        echo 'selected="selected"';
                                    }
                                };
                                ?>>Cho phép học sinh xem đáp án sau khi làm bài</option>
            <option value="0" <?php
                                if (isset($data["DataDeChinhSua"])) {
                                    if ($data["DataDeChinhSua"]["HienDapAn"] == 0) {
                                        echo 'selected="selected"';
                                    }
                                };
                                ?>>Không cho phép học sinh xem đáp án sau khi làm bài</option>
        </select>
    </div>

    <div class="form-group">
        <label>Ngày tạo đề</label>
        <div class='input-group date' id='datetimepicker1'>

            <input type='text' class="form-control" name="NgayTaoDe" placeholder="Ngày tạo đề" value="<?php echo (isset($data["DataDeChinhSua"])) ? $data["DataDeChinhSua"]["NgayTaoDe"] : date('Y-m-d H:i:s'); ?>" />
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
            </span>
        </div>
    </div>

    <div class="form-group">
        <label for="lop">Lớp</label>
        <select class="form-control" id="lop" name="Lop">
            <option <?php
                    if (isset($data["DataDeChinhSua"])) {
                        if ($data["DataDeChinhSua"]["Lop"] == 12) {
                            echo 'selected="selected"';
                        }
                    };
                    ?>>12</option>
            <option <?php
                    if (isset($data["DataDeChinhSua"])) {
                        if ($data["DataDeChinhSua"]["Lop"] == 11) {
                            echo 'selected="selected"';
                        }
                    };
                    ?>>11</option>
            <option <?php
                    if (isset($data["DataDeChinhSua"])) {
                        if ($data["DataDeChinhSua"]["Lop"] == 10) {
                            echo 'selected="selected"';
                        }
                    };
                    ?>>10</option>
        </select>
    </div>

    <div class="form-group">
        <label for="tuan">Tuần</label>
        <input type="number" min="1" max="52" class="form-control" id="tuan" name="Tuan" placeholder="Tuần" value="<?php echo (isset($data["DataDeChinhSua"])) ? $data["DataDeChinhSua"]["Tuan"] : (new DateTime())->format("W"); ?>">
    </div>

    <div class="form-group">
        <label for="thoigian">Thời gian</label>
        <input type="number" min="1" max="120" class="form-control" id="thoigian" name="ThoiGian" placeholder="Thời gian" value="<?php echo (isset($data["DataDeChinhSua"])) ? $data["DataDeChinhSua"]["ThoiGian"] : 90; ?>">
    </div>

    <div class="form-group">
        <label for="socaude">Số câu dễ</label>
        <input type="number" min="0" max="100" class="form-control" id="socaude" name="SoCauDe" placeholder="Tuần" value="<?php echo (isset($data["DataDeChinhSua"])) ? $data["DataDeChinhSua"]["SoCauDe"] : "5"; ?>">
    </div>

    <div class="form-group">
        <label for="socautrungbinh">Số câu trung bình</label>
        <input type="number" min="0" max="100" class="form-control" id="socautrungbinh" name="SoCauTrungBinh" placeholder="Tuần" value="<?php echo (isset($data["DataDeChinhSua"])) ? $data["DataDeChinhSua"]["SoCauTrungBinh"] : "3"; ?>">
    </div>

    <div class="form-group">
        <label for="socaukho">Số câu khó</label>
        <input type="number" min="0" max="100" class="form-control" id="socaukho" name="SoCauKho" placeholder="Tuần" value="<?php echo (isset($data["DataDeChinhSua"])) ? $data["DataDeChinhSua"]["SoCauKho"] : "2"; ?>">
    </div>

    <?php if (!isset($data["DataDeChinhSua"])) { ?>
        <div class="form-group">
            <label for="socauhoi">Các câu hỏi sẽ được chọn ngẫu nhiên từ ngân hàng câu hỏi dựa theo mức độ, lớp và tuần hiện tại sau khi tạo đề</label>
        </div>
    <?php } ?>

    <?php if (isset($data["DataDeChinhSua"])) { ?>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Danh sách câu hỏi trong đề kiểm tra</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- responsive table -->
                        <div style="overflow-x:auto;">
                            <table class="table table-striped jambo_table bulk_action">
                                <thead>
                                    <tr class="headings">
                                        <th class="column-title">STT</th>
                                        <th class="column-title">Loại câu hỏi</th>
                                        <th class="column-title">Lớp</th>
                                        <th class="column-title">Tuần</th>
                                        <th class="column-title">Câu hỏi</th>
                                        <th class="column-title">Đáp án 1</th>
                                        <th class="column-title">Đáp án 2</th>
                                        <th class="column-title">Đáp án 3</th>
                                        <th class="column-title">Đáp án 4</th>
                                        <th class="column-title">Đáp án đúng</th>
                                        <th class="column-title">Lời giải</th>
                                        <th class="column-title">#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        for ($i = 0; $i < count($data["DanhSachCauHoi_De"]); $i++) {
                                            if ($data["DanhSachCauHoi_De"][$i]["LoaiCauHoi"] == 1) {
                                                $LoaiCauHoi = "Dễ";
                                            } else if ($data["DanhSachCauHoi_De"][$i]["LoaiCauHoi"] == 2) {
                                                $LoaiCauHoi = "Trung bình";
                                            } else {
                                                $LoaiCauHoi = "Khó";
                                            }
                                            ?>
                                        <tr class="even pointer">
                                            <td class=""><?php echo ($i + 1); ?></td>
                                            <td><?php echo $LoaiCauHoi; ?></td>
                                            <td><?php echo $data["DanhSachCauHoi_De"][$i]["Lop"]; ?></td>
                                            <td><?php echo $data["DanhSachCauHoi_De"][$i]["Tuan"]; ?></td>
                                            <td><?php echo $data["DanhSachCauHoi_De"][$i]["CauHoi"]; ?></td>
                                            <td><?php echo $data["DanhSachCauHoi_De"][$i]["DapAn1"]; ?></td>
                                            <td><?php echo $data["DanhSachCauHoi_De"][$i]["DapAn2"]; ?></td>
                                            <td><?php echo $data["DanhSachCauHoi_De"][$i]["DapAn3"]; ?></td>
                                            <td><?php echo $data["DanhSachCauHoi_De"][$i]["DapAn4"]; ?></td>
                                            <td><?php echo $data["DanhSachCauHoi_De"][$i]["DapAnDung"]; ?></td>
                                            <td><?php echo $data["DanhSachCauHoi_De"][$i]["LoiGiai"]; ?></td>
                                            <td class="last">
                                                <div class="zvn-box-btn-filter">
                                                    <a href="/ExtraClassroomWebsite/GiaoVien/XoaCauHoi_De/<?php echo $data["DanhSachCauHoi_De"][$i]["IdDe"]; ?>/<?php echo $data["DanhSachCauHoi_De"][$i]["IdCauHoi"]; ?>" type="input" class="deleteButton btn btn-icon btn-danger btn-delete" data-toggle="tooltip" data-placement="top" data-original-title="Xóa">
                                                        <i class="fas fa-minus"></i>
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
    <?php } ?>

    <button name="btnSubmit" type="submit" class="btn btn-primary"><?php echo (isset($data["DataDeChinhSua"])) ? "Chỉnh sửa đề kiểm tra" : "Tạo đề kiểm tra mới"; ?></button>
</form>

<script type="text/javascript">
    $(function() {
        $('#datetimepicker1').datetimepicker();
    });
</script>