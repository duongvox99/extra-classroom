	<!-- Header of web -->
	<div id="header">
		<!-- Banner of web -->
		<div id="banner" class="overflow-hidden">
			<img src="/ExtraClassroomWebsite/public/img/banner.jpg" style="margin: auto;">
		</div>

		<!-- Navigation Bar my-nav-->
		<nav class="navbar navbar-default navbar-expand-md my-nav">
			<div class="container">
				<a class="navbar-brand" href="/ExtraClassroomWebsite"><img src="/ExtraClassroomWebsite/public/img/math-logo.png" alt="Logo" style="width:40px;"></a>
				<!-- Toggler/collapsibe Button -->
				<button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="collapsibleNavbar">
					<ul class="navbar-nav my-nav-menu">
						<li class="nav-item">
							<a class="nav-link <?php echo ($data["SubView"] == "DeKiemTra") ? 'my-active' : ""; ?>" href="/ExtraClassroomWebsite/HocSinh/DeKiemTra/TatCa">Đề kiểm tra</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php echo ($data["SubView"] == "ThongBao") ? 'my-active' : ""; ?>" href="/ExtraClassroomWebsite/HocSinh/ThongBao/TatCa">Thông báo</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php echo ($data["SubView"] == "KenhThaoLuanChung") ? 'my-active' : ""; ?>" href="/ExtraClassroomWebsite/HocSinh/KenhThaoLuanChung">Kênh thảo luận chung</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php echo ($data["SubView"] == "BangXepHang") ? 'my-active' : ""; ?>" href="/ExtraClassroomWebsite/HocSinh/BangXepHang/Nhom/1">Bảng xếp hạng</a>
						</li>
					</ul>
					<!-- Search -->
					<div class="ml-auto">
						<?php if (isset($data["Category"])) {?>
						<form class="form-inline  my-2 my-lg-0" action="/ExtraClassroomWebsite/HocSinh/<?php echo ($data["SubView"]); ?>/<?php echo ($data["Category"]); ?>" method="GET">

							<span><input class="form-control mr-sm-2" type="text" placeholder="Tìm kiếm" name="search"></span>
							<button class="btn btn-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
						</form>
						<?php }?>
					</div>

					<ul class="navbar-nav ml-1 account">
						<!-- Dropdown -->
						<li class="nav-item dropdown ">

							<a class="nav-link dropdown-toggle account" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<img src="
								<?php
								if ($data["DataNguoiDung"]["Avatar"] != "") {
									echo $data["DataNguoiDung"]["Avatar"];
								} else {
									echo "/ExtraClassroomWebsite/public/img/no-avatar.png";
								}
								?>" alt="Avatar" class="avatar">

								<span><?php echo $data["DataNguoiDung"]["HoTen"]; ?></span>
							</a>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-custom" aria-labelledby="navbarDropdownMenuLink">
								<a class="dropdown-item" href="/ExtraClassroomWebsite/TrangChu/ThayDoiThongTin/<?php echo $data["DataNguoiDung"]["IdNguoiDung"] ?>">Thay đổi thông tin</a>
								<a class="dropdown-item" href="/ExtraClassroomWebsite/TrangChu/DangXuat">Đăng xuất</a>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</div>