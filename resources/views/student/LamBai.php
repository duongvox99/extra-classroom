<script id="MathJax-script" async src="/ExtraClassroomWebsite/public/js/tex-mml-chtml.js"></script>
<script type='text/javascript' src='/ExtraClassroomWebsite/public/js/LamBai.js'></script>
<div class="container bg-light">
	<form action="" method="POST" id="formLamBai">
		<div id="wrapper" class="row">
			<div id="left" class="col col-lg-3 col-md-12">
				<section id="timer">
					<div class="row">
						<div class=" countdown-wrapper text-center mb20">
							<div class="card border-0 shadow">
								<div class="card-header">
									<p style="text-transform: uppercase;">
										<td><b><?php echo $data["DataDe"]["TenDe"]; ?></b></td>
										<p>
											<p><i class="fas fa-stopwatch fa-2x"></i> Thời gian: <?php echo $data["DataDe"]["ThoiGian"]; ?> phút</p>
											<p>Tổng số câu hỏi: <?php echo ($data["DataDe"]["SoCauDe"] + $data["DataDe"]["SoCauTrungBinh"] + $data["DataDe"]["SoCauKho"]); ?> câu</p>
								</div>
								<?php if (!isset($data["DaLam"])) { ?>
									<div class="card-block">
										<div id="countdown">
											<div class="well">
												<span id="hour" class="timer bg-primary">00</span>
												<span class="dots">:</span>
												<span id="min" class="timer bg-info">00</span>
												<span class="dots">:</span>
												<span id="sec" class="timer bg-primary">00</span>
											</div>
										</div>
									</div>

									<div class="card-footer">
										<input type="submit" name="btnSubmit" value="Nộp bài" class="btn btn-success btn_submit">
									</div>
								<?php } ?>
								<?php if (isset($data["DaLam"])) { ?>
									<div class="card-footer">
										Kết quả kiểm tra: <span class="badge badge-success"><?php echo $data["DiemDe"][0]["Diem"]; ?></span> điểm
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</section>
			</div>
			<div id="right" class="col col-lg-9 ml-auto col-md-12 pt-3">
				<div id="exam-container" class="overflow-auto container " style="height: <?php echo (isset($data["DaLam"])) ? "700" : "550"; ?>px;">
					<?php
					for ($i = 0; $i < count($data["DataAllCauHoi_DapAn"]); $i++) {
						$dataCauHoi = $data["DataAllCauHoi_DapAn"][$i];
						?>
						<div id="question-container_<?php echo $i ?>">
							<div class="question-content-item">
								<h4><i class="fas fa-question-circle"></i> Câu hỏi số <?php echo ($i + 1) ?></h4>
								<?php echo $dataCauHoi["CauHoi"]; ?>
								<hr>
							</div>

							<div>
								<ul id="<?php echo $i ?>" class="answer-select-list">
									<h4><i class="fas fa-check-circle"></i> Trả lời</h4>
									<li>
										<div class='custom-control custom-radio'>
											<input type='radio' class='custom-control-input' id='customRadio_1_<?php echo $i ?>' name='answerOfQuestion_<?php echo $i ?>[]' value='1' <?php echo (isset($data["DaLam"]) && ($dataCauHoi["DapAnDung"] == 1)) ? "checked" : ""; ?>>
											<label class='custom-control-label' for='customRadio_1_<?php echo $i ?>'><?php echo $dataCauHoi["DapAn1"] ?></label>
										</div>
									</li>
									<li>
										<div class='custom-control custom-radio'>
											<input type='radio' class='custom-control-input' id='customRadio_2_<?php echo $i ?>' name='answerOfQuestion_<?php echo $i ?>[]' value='2' <?php echo (isset($data["DaLam"]) && ($dataCauHoi["DapAnDung"] == 2)) ? "checked" : ""; ?>>
											<label class='custom-control-label' for='customRadio_2_<?php echo $i ?>'><?php echo $dataCauHoi["DapAn2"] ?></label>
										</div>
									</li>
									<li>
										<div class='custom-control custom-radio'>
											<input type='radio' class='custom-control-input' id='customRadio_3_<?php echo $i ?>' name='answerOfQuestion_<?php echo $i ?>[]' value='3' <?php echo (isset($data["DaLam"]) && ($dataCauHoi["DapAnDung"] == 3)) ? "checked" : ""; ?>>
											<label class='custom-control-label' for='customRadio_3_<?php echo $i ?>'><?php echo $dataCauHoi["DapAn3"] ?></label>
										</div>
									</li>
									<li>
										<div class='custom-control custom-radio'>
											<input type='radio' class='custom-control-input' id='customRadio_4_<?php echo $i ?>' name='answerOfQuestion_<?php echo $i ?>[]' value='4' <?php echo (isset($data["DaLam"]) && ($dataCauHoi["DapAnDung"] == 4)) ? "checked" : ""; ?>>
											<label class='custom-control-label' for='customRadio_4_<?php echo $i ?>'><?php echo $dataCauHoi["DapAn4"] ?></label>
										</div>
									</li>
								</ul>
							</div>

							<?php if (isset($data["DaLam"])) { ?>
								<hr>
								<div class="question-content-item">
									<h4><i class="fas fa-star"></i> Lời giải</h4>
									<?php echo $dataCauHoi["LoiGiai"]; ?>
									<hr>
								</div>
							<?php } ?>

						</div>
					<?php
					}
					?>
				</div>

				<div id="question-num-list-container justify-content-center" class="row" style="text-align: center;">
					<!-- pre button -->
					<div class="col col-xl-1 col-lg-1 col-md-1 col-sm-1 d-none d-sm-block ">
						<input type="button" class="btn btn-info pre" value="&#10094;">
					</div>

					<div class="col col-xl-10 col-lg-10 col-md-10 col-sm-10 col-12 border">
						<!-- cau hoi button -->
						<ul id="question-num-list" style="text-align: center;">
							<?php
							for ($i = 0; $i < count($data["DataAllCauHoi_DapAn"]); $i++) {
								$dataCauHoi = $data["DataAllCauHoi_DapAn"][$i];
								?>
								<li>
									<?php
										if ($i >= 0 && $i < 9) {
											$numQues = "0" . ($i + 1);
										} else {
											$numQues = ($i + 1);
										}
										echo "<input type='button' id='q_btn_$i' class='btn btn-outline-info boder6' value='Câu $numQues'>";
										?>

								</li>
							<?php
							}
							?>
						</ul>
					</div>

					<!-- next button -->
					<div class="col col-xl-1 col-lg-1 col-md-1 col-sm-1 d-none d-sm-block ">
						<input type="button" class="btn btn-info next" value="&#10095;">
					</div>
				</div>
				<?php if (!isset($data["DaLam"])) { ?>
					<div style="text-align: center;" class="pb-3"><input type="submit" name="btnSubmit" value="Nộp bài" class="mt-4 btn btn-success btn_submit"></div>
				<?php } ?>
			</div>

		</div>
	</form>
</div>
<?php
if (!isset($data["DaLam"])) {
	echo '<script>
		var seconds = 0;
		var minutes = ' . $data["DataDe"]["ThoiGian"] . ';
		var hours = 0;
		const idDe = ' . $data["DataDe"]["IdDe"] . ';
	</script>';
} else {
	echo '<script>
		var seconds = 0;
		var minutes = 9999;
		var hours = 0;
		const idDe = ' . $data["DataDe"]["IdDe"] . ';
	</script>';
}
?>