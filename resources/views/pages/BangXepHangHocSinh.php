<div class="container-fluid">
    <div class="row">

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Xếp hạng theo</label>
            </div>
            <select class="custom-select" id="inputGroupSelect01" onchange="location = this.value;">
                <option value="/ExtraClassroomWebsite/GiaoVien/BangXepHangHocSinh/Lop/10" <?php echo (($data["KieuXepHang"] == "Lop") && ($data["Id"] == "10")) ? "selected" : ""; ?>>Lớp 10</option>
                <option value="/ExtraClassroomWebsite/GiaoVien/BangXepHangHocSinh/Lop/11" <?php echo (($data["KieuXepHang"] == "Lop") && ($data["Id"] == "11")) ? "selected" : ""; ?>>Lớp 11</option>
                <option value="/ExtraClassroomWebsite/GiaoVien/BangXepHangHocSinh/Lop/12" <?php echo (($data["KieuXepHang"] == "Lop") && ($data["Id"] == "12")) ? "selected" : ""; ?>>Lớp 12</option>

                <?php for ($i = 0; $i < count($data["DataNhom"]); $i++) { ?>
                    <option value="/ExtraClassroomWebsite/GiaoVien/BangXepHangHocSinh/Nhom/<?= $data["DataNhom"][$i]["IdNhom"]?>" <?php echo (($data["KieuXepHang"] == "Nhom") && ($data["DataNhom"][$i]["IdNhom"] == $data["Id"])) ? "selected" : ""; ?>><?= $data["DataNhom"][$i]["TenNhom"] ?></option>
                <?php  } ?>

                <?php for ($i = 0; $i < count($data["DataDe"]); $i++) { ?>
                    <option value="/ExtraClassroomWebsite/GiaoVien/BangXepHangHocSinh/De/<?= $data["DataDe"][$i]["IdDe"]?>" <?php echo (($data["KieuXepHang"] == "De") && ($data["DataDe"][$i]["IdDe"] == $data["Id"])) ? "selected" : ""; ?>><?= $data["DataDe"][$i]["TenDe"] ?></option>
                <?php  } ?>
            </select>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Rank</th>
                    <th scope="col">Avatar</th>
                    <th scope="col">Họ và tên</th>
                    <th scope="col">Lớp</th>
                    <th scope="col">Nhóm</th>
                    <th scope="col">Điểm</th>
                </tr>
            </thead>
            <tbody>
                <?php
                for ($i = 0; $i < count($data["DataRank"]); $i++) {
                    if ($data["DataRank"][$i]["Avatar"] == "") {
                        $avatar = "/ExtraClassroomWebsite/public/img/no-avatar.png";
                    } else {
                        $avatar = $data["DataRank"][$i]["Avatar"];
                    }
                    ?>
                    <tr>
                        <td scope="col"><?= ($i + 1) ?></td>
                        <td><img style="width: 40px" src="<?php echo $avatar; ?>" alt="avatar"></td>
                        <td scope="col"><?= ($data["DataRank"][$i]["HoTen"]) ?></td>
                        <td scope="col"><?= ($data["DataRank"][$i]["Lop"]) ?></td>
                        <td scope="col"><?= ($data["DataRank"][$i]["TenNhom"]) ?></td>
                        <td scope="col"><?= ($data["DataRank"][$i]["DiemTong"]) ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>