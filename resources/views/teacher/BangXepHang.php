<div class="container border border-dark bg-light">
    <div class="row">

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Xếp hạng theo</label>
            </div>
            <select class="custom-select" id="inputGroupSelect01" onchange="location = this.value;">
                <option value="/ExtraClassroomWebsite/HocSinh/BangXepHang/Nhom/1" <?php echo ($data["KieuXepHang"] == "Nhom") ? "selected" : ""; ?>>Nhóm hiện tại</option>
                <option value="/ExtraClassroomWebsite/HocSinh/BangXepHang/Lop/1" <?php echo ($data["KieuXepHang"] == "Lop") ? "selected" : ""; ?>>Lớp hiện tại</option>
                <?php if ($data["KieuXepHang"] == "De") { ?>
                    <option selected><?= $data["TenDe"]?></option>
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