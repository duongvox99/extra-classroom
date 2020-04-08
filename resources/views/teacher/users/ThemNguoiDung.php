<!-- $Username = $_POST["Username"];
$Password = $_POST["Password"];
$HoTen = $_POST["HoTen"];
$NamSinh = $_POST["NamSinh"];
$Avatar = "";
$Lop = $_POST["Lop"];
$IdNhom = $_POST["IdNhom"];
$LoaiTaiKhoan = $_POST["LoaiTaiKhoan"];
$RandomCode = "";
$Email = $_POST["Email"]; -->
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
                    content: 'Bạn có thể xem kết quả ở danh sách người dùng!',
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
        <label for="loaitaikhoan">Loại tài khoản</label>
        <select class="form-control" id="loaitaikhoan" name="LoaiTaiKhoan">
            <option value="1"
                <?php
                if (isset($data["DataNguoiDungChinhSua"])) {
                    if ($data["DataNguoiDungChinhSua"]["LoaiTaiKhoan"] == 1) {
                        echo 'selected="selected"';
                    }
                };
                ?>      
            >Học sinh</option>
            <option value="0"
                <?php
                if (isset($data["DataNguoiDungChinhSua"])) {
                    if ($data["DataNguoiDungChinhSua"]["LoaiTaiKhoan"] == 0) {
                        echo 'selected="selected"';
                    }
                };
                ?>      
            >Quản trị viên</option>
        </select>
    </div>

    <div class="form-group">
        <label for="hoten">Họ và tên</label>
        <input type="text" class="form-control" id="hoten" name="HoTen" placeholder="Họ và tên" value="<?php echo (isset($data["DataNguoiDungChinhSua"])) ? $data["DataNguoiDungChinhSua"]["HoTen"] : "";?>">
    </div>

    <div class="form-group">
        <label for="username">Tên đăng nhập</label>
        <input type="text" class="form-control" id="username" name="Username" placeholder="Tên đăng nhập" value="<?php echo (isset($data["DataNguoiDungChinhSua"])) ? $data["DataNguoiDungChinhSua"]["Username"] : "";?>">
    </div>

    <div class="form-group">
        <label for="password">Mật khẩu</label>
        <input type="text" class="form-control" id="password" name="Password" placeholder="Mật khẩu">
    </div>

    <div class="form-group">
        <label for="namsinh">Năm sinh</label>
        <input type="number" min="1900" max="2019" class="form-control" id="namsinh" name="NamSinh" placeholder="Năm sinh" value="<?php echo (isset($data["DataNguoiDungChinhSua"])) ? $data["DataNguoiDungChinhSua"]["NamSinh"] : "";?>">
    </div>

    <div class="form-group">
        <label for="nhom">Nhóm</label>
        <select class="form-control" id="nhom" name="IdNhom">
            <?php
            for ($i = count($data["DataNhom"]) - 1; $i >= 0; $i--) {
                ?>
                <option value="<?php echo $data["DataNhom"][$i]["IdNhom"]; ?>"
                    <?php
                        if (isset($data["DataNguoiDungChinhSua"])) {
                            if ($data["DataNhom"][$i]["IdNhom"] == $data["DataNguoiDungChinhSua"]["IdNhom"]) {
                                echo 'selected="selected"';
                            }
                        };
                    ?>
                ><?php echo $data["DataNhom"][$i]["TenNhom"]; ?></option>
            <?php
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="lop">Lớp</label>
        <select class="form-control" id="lop" name="Lop">
            <option
                <?php
                    if (isset($data["DataNguoiDungChinhSua"])) {
                        if ($data["DataNguoiDungChinhSua"]["Lop"] == 12) {
                            echo 'selected="selected"';
                        }
                    };
                ?>
            >12</option>
            <option
                <?php
                    if (isset($data["DataNguoiDungChinhSua"])) {
                        if ($data["DataNguoiDungChinhSua"]["Lop"] == 11) {
                            echo 'selected="selected"';
                        }
                    };
                ?>
            >11</option>
            <option
                <?php
                    if (isset($data["DataNguoiDungChinhSua"])) {
                        if ($data["DataNguoiDungChinhSua"]["Lop"] == 10) {
                            echo 'selected="selected"';
                        }
                    };
                ?>
            >10</option>
            <option
                <?php
                    if (isset($data["DataNguoiDungChinhSua"])) {
                        if ($data["DataNguoiDungChinhSua"]["Lop"] == 0) {
                            echo 'selected="selected"';
                        }
                    };
                ?>
            >0</option>
        </select>
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" name="Email" aria-describedby="emailHelp" placeholder="Email"value="<?php echo (isset($data["DataNguoiDungChinhSua"])) ? $data["DataNguoiDungChinhSua"]["Email"] : "";?>">
        <small id="emailHelp" class="form-text text-muted">Nhập email người dùng.</small>
    </div>

    <button name="btnSubmit" type="submit" class="btn btn-primary"><?php echo (isset($data["DataNguoiDungChinhSua"])) ? "Chỉnh sửa người dùng" : "Tạo người dùng mới";?></button>
</form>