<?php

echo '<script>
$(document).ready(function () {
	$.ajax({
		type: "POST",
		url: "http://localhost/ExtraClassroomWebsite/HocSinh/AddDaXemThongBao/",
		data: { "IdNguoiDung" : "'. $data["DataNguoiDung"]["IdNguoiDung"] .'", "IdThongBao" : "' . $data["DataThongBaoNhom"]["IdThongBao"] . '" }
	   });
});
</script>';

?>
<script id="MathJax-script" async src="/ExtraClassroomWebsite/public/js/tex-mml-chtml.js"></script>
<div class="container bg-light">
		<div class="card-body p-5">
			<h1 class="font-weight-light"><b><?php echo $data["DataThongBaoNhom"]["TieuDe"]; ?></b></h1>
			<p class="lead"><?php echo $data["DataThongBaoNhom"]["NoiDung"]; ?></p>	
			<p class="lead mb-0"><i>Ngày tạo: <?php echo $data["DataThongBaoNhom"]["NgayTao"]; ?></i></p>
		</div>
</div>