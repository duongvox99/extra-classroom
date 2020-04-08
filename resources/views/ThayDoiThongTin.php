<!-- <!DOCTYPE html> -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cập nhật tài khoản</title>

    <link rel="icon" href="/ExtraClassroomWebsite/public/img/icon.ico" type="image/ico" />

    <link rel="stylesheet" type="text/css" href="/ExtraClassroomWebsite/public/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/ExtraClassroomWebsite/public/css/jquery-confirm.min.css">
    <link rel="stylesheet" type="text/css" href="/ExtraClassroomWebsite/public/css/DangNhap.css" />

    <script type="text/javascript" src="/ExtraClassroomWebsite/public/js/jquery-3.4.1.js"></script>
    <script type="text/javascript" src="/ExtraClassroomWebsite/public/js/jquery-confirm.min.js"></script>
    <script type="text/javascript" src="/ExtraClassroomWebsite/public/js/ThayDoiThongTin.js"></script>
</head>

<body>
    <?php
    if (isset($data["result"])) {
        if (!$data["result"]) {
            if (isset($data["error"])) {
                echo
                    "<script type='text/javascript'>
                $.confirm({
                    theme: 'modern',
                    title: 'Cập nhật thất bại',
                    content: 'Địa chỉ mail không tồn tại!',
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
            } else {
                echo
                    "<script type='text/javascript'>
                $.confirm({
                    theme: 'modern',
                    title: 'Cập nhật thất bại',
                    content: 'Bạn vui lòng kiểm tra lại các trường!',
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
    }
    ?>
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Login Form -->
            <form action="" method="POST" enctype="multipart/form-data">

                <h5><b>Họ và tên</b></h5>

                <input type="text" id="hoten" class="fadeIn first" name="HoTen" placeholder="Họ tên" value="<?php echo $data["DataNguoiDung"]["HoTen"]; ?>">

                <br><br>
                <h5><b>Năm sinh</b></h5>
                <input type="number" min="1950" max="2019" id="namsinh" class="fadeIn first" name="NamSinh" placeholder="Năm sinh" value="<?php echo $data["DataNguoiDung"]["NamSinh"]; ?>">

                <br><br>
                <h5><b>Ảnh đại diện mới</b></h5>
                <input type="file" id="Avatar" class="fadeIn second" name="Avatar" placeholder="Avatar">

                <br><br>
                <h5><b>Email</b></h5>
                <input type="text" id="email" class="fadeIn third" name="Email" placeholder="Email" value="<?php echo $data["DataNguoiDung"]["Email"]; ?>">

                <br><br>
                <h5><b>Mật khẩu mới</b></h5>
                <input type="password" id="password" class="fadeIn third" name="Password" placeholder="Mật khẩu">

                <input type="submit" id="btnSubmit" class="fadeIn fourth" value="Cập nhật" name="btnSubmit">
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
                <a class="underlineHover" href="/ExtraClassroomWebsite">Quay về trang chủ?</a>
            </div>

        </div>
    </div>
    <div class="footer">
        <p id="copyright">Copyright © <a href="https://www.facebook.com/duongvox" target="_blank">Dương Võ</a> & <a href="https://www.facebook.com/duong.pm.1100011" target="_blank">Dương Phạm</a></p>
    </div>
</body>

</html>