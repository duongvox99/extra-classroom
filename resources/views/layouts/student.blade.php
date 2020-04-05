<!DOCTYPE html>
<html lang="vi">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<link rel="icon" href="/ExtraClassroomWebsite/public/img/icon.ico" type="image/ico" />
	
	<title>
		<?php
		if (isset($data["Title"])) {
			echo $data["Title"] . " | ";
		}
		?>Bảng điều khiển học sinh</title>

	<link rel="stylesheet" type="text/css" href="/ExtraClassroomWebsite/public/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="/ExtraClassroomWebsite/public/font-awesome/css/all.css" />
	<link rel="stylesheet" type="text/css" href="/ExtraClassroomWebsite/public/css/KenhThaoLuanChung.css">
	<link rel="stylesheet" type="text/css" href="/ExtraClassroomWebsite/public/css/HocSinh.css" />
	
	<script type='text/javascript' src='/ExtraClassroomWebsite/public/js/jquery-3.4.1.js'></script>
	<script type='text/javascript' src='/ExtraClassroomWebsite/public/js/bootstrap.js'></script>
</head>

<body >
	<?php 
		// Header
		require("pages/headerHocSinh.php");

		if (isset($data["SubView"])) {
			require("pages/" .$data["SubView"] . ".php");
		}
		else {
			require("pages/ThongBao.php");
		}

		// Footer
		require("pages/footerHocSinh.php");
	?>
</body>
</html>