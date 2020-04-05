<div class="container border border-dark bg-light">
	<div class="row">
		<div class="col col-lg-8 col-md-12 col-sm-12 col-12">

			<?php
			for ($i = 0; $i < count($data["DanhSachDeNhom"]); $i++) {
				?>
				<div class="card border-0 shadow my-5 new-banner position-relative">
					<div class="card-body p-5">
						<h1 class="font-weight-light"><b><?php echo $data["DanhSachDeNhom"][$i]["TenDe"]; ?></b></h1>
						<p class="lead mb-0"><i>Thời gian mở: <?php echo $data["DanhSachDeNhom"][$i]["ThoiGianMo"]; ?></i></p>
						<p class="lead mb-0"><i>Thời gian đóng: <?php echo $data["DanhSachDeNhom"][$i]["ThoiGianDong"]; ?></i></p>
						<p></p>
						<a href="/ExtraClassroomWebsite/HocSinh/LamBai/<?php echo $data["DanhSachDeNhom"][$i]["IdDe"]; ?>" class="btn btn-success" role="button">Làm bài kiểm tra</a>
						<a href="/ExtraClassroomWebsite/HocSinh/BangXepHang/De/<?php echo $data["DanhSachDeNhom"][$i]["IdDe"]; ?>" class="btn btn-warning" role="button">Xem kết quả xếp hạng</a>
					</div>
				</div>
			<?php
			}
			?>
		</div>
		<div class="col col-lg-4 col-md-12 col-sm-12 col-12 ">
			<div class="card border-0 shadow ml-auto my-5 custom-collapse">
				<div class="card-header bg-success" id="headingOne" data-parent="custom-collapse">
					<h5 class="mb-0">
						<a class="collapse-toggle visible-xs" data-toggle="collapse" aria-expanded="true" aria-controls="side-menu-collapse" data-target="#side-menu-collapse">
							Loại đề kiểm tra
						</a>
					</h5>
				</div>
				<div class="card-body">
					<div class="list-group cusstom-listgroup" role="tablist" class="list-group collapse" id="side-menu-collapse">
						<a class="list-group-item list-group-item-action" href="/ExtraClassroomWebsite/HocSinh/DeKiemTra/TatCa" role="tab" aria-controls="" <?php echo ($data["Category"] == "TatCa") ? 'style="background-color: green;"' : "";?>>Tất cả</a>
						<a class="list-group-item list-group-item-action" href="/ExtraClassroomWebsite/HocSinh/DeKiemTra/ChuaLam" role="tab" aria-controls="" <?php echo ($data["Category"] == "ChuaLam") ? 'style="background-color: green;"' : "";?>>Chưa làm</a>
						<a class="list-group-item list-group-item-action" href="/ExtraClassroomWebsite/HocSinh/DeKiemTra/DaLam" role="tab" aria-controls="" <?php echo ($data["Category"] == "DaLam") ? 'style="background-color: green;"' : "";?>>Đã làm</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>