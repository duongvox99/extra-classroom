
$(document).ready(function () {
	// Số câu hỏi
	var totalQuestion = $(".question-content-item").length;

	var currenQuestion = 0;

	showQuestion(currenQuestion);

	$(window).resize(function () {

		// Lấy thông số
		var width = $(window).width();
		var height = $(window).height();
		console.log(width + " " + height);
		if (width <= 980) {
			$("#question-num-list").addClass("pagination");
			$("#question-num-list").removeClass("justify-content-center");
			$("#question-num-list").addClass("overflow-auto");
		} else {
			$("#question-num-list").removeClass("pagination");
			$("#question-num-list").addClass("justify-content-center");
			$("#question-num-list").removeClass("overflow-auto");
		}
	});

	$("#question-num-list").on("click", "li", function () {
		currenQuestion = $(this).index();
		console.log($(this));
		showQuestion(currenQuestion);
	});


	$(".pre").click(function () {
		if (currenQuestion > 0) {
			currenQuestion = currenQuestion - 1;
		}
		showQuestion(currenQuestion);
	});

	$(".next").click(function () {
		if (currenQuestion < totalQuestion - 1) {
			currenQuestion = currenQuestion + 1;
		}
		showQuestion(currenQuestion);
	});

	//event click answer
	$(".answer-select-list").on("click", "input", function () {
		if ($(this).parent().find("input").is(":checked")) {
			$ul_answer_select_list = $(this).parent().parent().parent();
			completeQuestion($ul_answer_select_list.attr("id"));
		}
	});

	//======================== Show Question and update state of Question Button when click ======
	function showQuestion(numQuestion) {
		for (var i = 0; i < $(".question-content-item").length; i++) {
			$("#question-container_" + i).hide();
			$("#q_btn_" + i).removeClass("active");

		}

		$("#question-container_" + numQuestion).show();
		$("#q_btn_" + numQuestion).addClass("active");
		$("#q_btn_" + numQuestion).focus();
	}

	//======================= Update state of Question Button when the answer is selected ========
	function completeQuestion(numQuestion) {
		$("#q_btn_" + numQuestion).removeClass("btn-outline-info");
		$("#q_btn_" + numQuestion).addClass("btn-success");
		$("#q_btn_" + numQuestion).focus();
	}
});

//=============================================================function of clock
$(document).ready(function () {

	refreshClock();
	countdown();
	function countdown() {
		hasStarted = true
		interval = setInterval(() => {
			// if(hasEnded == false) {
			if (seconds <= 11 && minutes == 0 && hours == 0) {
				$(timer).find("span").addClass("red")
			}

			if (seconds == 0 && minutes == 0 || (hours > 0 && minutes == 0 && seconds == 0)) {
				hours--
				minutes = 59
				seconds = 60
				refreshClock()
			}

			if (seconds > 0) {
				seconds--
				refreshClock()
			}
			else if (seconds == 0) {
				minutes--
				seconds = 59
				refreshClock()
			}
			// }
			//     else {
			//         //restartClock()
			//     }

		}, 1000)
	}

	//======================= update display 0[9] when number of time < 10    
	function pad(d) {
		return (d < 10) ? "0" + d.toString() : d.toString()
	}

	// ====================== Update display clock ========================
	function refreshClock() {
		jQuery("#countdown #hour").html(pad(hours));
		jQuery("#countdown #min").html(pad(minutes));
		jQuery("#countdown #sec").html(pad(seconds));
		if (hours == 0 && minutes == 0 && seconds == 0 && hasStarted == true) {
			console.log("hetgio");
			document.getElementById("formLamBai").submit();
		}
	}
});