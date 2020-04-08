<div class="container border border-dark bg-light">
	<div class="row">
		<div class="col col-lg-8 col-md-12 col-sm-12 col-12">

			<?php
			for ($i = 0; $i < count($data["DanhSachThongBaoNhom"]); $i++) {
				?>
				<div class="card border-0 shadow my-5 new-banner position-relative">
					<div class="card-body p-5">
						<h1 class="font-weight-light"><b><?php echo $data["DanhSachThongBaoNhom"][$i]["TieuDe"]; ?></b></h1>
						<p class="lead mb-0"><i>Ngày tạo: <?php echo $data["DanhSachThongBaoNhom"][$i]["NgayTao"]; ?></i></p>
						<p></p>
						<a href="/ExtraClassroomWebsite/HocSinh/XemThongBao/<?php echo $data["DanhSachThongBaoNhom"][$i]["IdThongBao"]; ?>" class="btn btn-success" role="button">Xem thông báo</a>
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
							Loại thông báo
						</a>
					</h5>
				</div>
				<div class="card-body">
					<div class="list-group cusstom-listgroup" role="tablist" class="list-group collapse" id="side-menu-collapse">
						<a class="list-group-item list-group-item-action" href="/ExtraClassroomWebsite/HocSinh/ThongBao/TatCa" role="tab" aria-controls="" <?php echo ($data["Category"] == "TatCa") ? 'style="background-color: green;"' : "";?>>Tất cả</a>
						<a class="list-group-item list-group-item-action" href="/ExtraClassroomWebsite/HocSinh/ThongBao/ChuaXem" role="tab" aria-controls="" <?php echo ($data["Category"] == "ChuaXem") ? 'style="background-color: green;"' : "";?>>Chưa xem</a>
						<a class="list-group-item list-group-item-action" href="/ExtraClassroomWebsite/HocSinh/ThongBao/DaXem" role="tab" aria-controls="" <?php echo ($data["Category"] == "DaXem") ? 'style="background-color: green;"' : "";?>>Đã xem</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>