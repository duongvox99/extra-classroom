<script type="text/javascript" src="/ExtraClassroomWebsite/public/js/ckeditor.js"></script>
<script id="MathJax-script" async src="/ExtraClassroomWebsite/public/js/tex-mml-chtml.js"></script>

<?php
echo "<script> var idUser = " . $data["DataNguoiDung"]["IdNguoiDung"] . "; </script>";
echo "<script> var nameUser = '" . $data["DataNguoiDung"]["HoTen"] . "'; </script>";
if ($data["DataNguoiDung"]["Avatar"] != "") {
	echo "<script> var avatarUser = '" . $data["DataNguoiDung"]["Avatar"] . "'; </script>";
} else {
	echo "<script> var avatarUser = '/ExtraClassroomWebsite/public/img/no-avatar.png'; </script>";
}
?>

<div class="<?php echo (isset($data["GiaoVien"])) ? "container-fluid" : "container"; ?> bg-light">
	<div class="h-100">
		<div class="row justify-content-center h-100">
			<div class="col-md-12 col-xl-12 chat">
				<div class="card chat-card">
					<div class="card-header msg_head">
						<div class="d-flex bd-highlight">
							<div class="img_cont">
								<img src="/ExtraClassroomWebsite/public/img/math-logo.png" class="rounded-circle user_img">
								<span class="online_icon"></span>
							</div>
							<div class="user_info">
								<span>Kênh chat tổng</span>
								<!-- <p>1767 Messages</p> -->
							</div>
						</div>
					</div>

					<div class="card-body msg_card_body" id="messageWrapper">

					</div>

					<div class="card-footer">
						<textarea id="editorInputMessage"></textarea>
						<button class="btn btn-success ml-auto btn-block" onclick="pushMessage()">Gửi tin nhắn <i class="fas fa-location-arrow"></i></button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	ClassicEditor
		.create(document.querySelector('#editorInputMessage'))
		.then(editor => {
			inputMessage = editor;
		})
		.catch(error => {
			console.error(error);
		});
</script>

<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/7.5.0/firebase-app.js"></script>

<script src="https://www.gstatic.com/firebasejs/7.5.0/firebase-firestore.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="https://www.gstatic.com/firebasejs/7.5.0/firebase-analytics.js"></script>

<script>
	// Your web app's Firebase configuration
	var firebaseConfig = {
		apiKey: "AIzaSyDXfzYiJDArkPeZ4m5184VuD3GzFQBK9DQ",
		authDomain: "extraclassroomwebsite.firebaseapp.com",
		databaseURL: "https://extraclassroomwebsite.firebaseio.com",
		projectId: "extraclassroomwebsite",
		storageBucket: "extraclassroomwebsite.appspot.com",
		messagingSenderId: "143656346318",
		appId: "1:143656346318:web:68e946be657f5e6ceea69f",
		measurementId: "G-QKJJNL1VBJ"
	};
	// Initialize Firebase
	firebase.initializeApp(firebaseConfig);
	firebase.analytics();

	nameUser = nameUser.split(" ");
	newNameUser = "";
	for (i = 0; i < nameUser.length - 1; i++) {
	  newNameUser += nameUser[i][0] + ".";
	}
	newNameUser += nameUser[i];
	nameUser = newNameUser;

	// console.log(idUser, nameUser);

	var oldData = [];

	var db = firebase.firestore();

	function pushMessage() {
		let message = inputMessage.getData();

		if (message != "") {
			let today = new Date();
			let date = today.getDate() + '/' + (today.getMonth() + 1) + '/' + today.getFullYear();
			let time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
			let currentDateTime = time + ' ' + date;

			db.collection("kenhthaoluanchung").add({
					currentDateTime: currentDateTime,
					idUser: idUser,
					nameUser: nameUser,
					avatarUser: avatarUser,
					message: message,
					sort: firebase.firestore.FieldValue.serverTimestamp(),
				})
				.then(function(docRef) {
					inputMessage.setData("");
					return true;
				})
				.catch(function(error) {
					console.error("Error pushMessage: ", error);
					return false;
				});
		} else {
			return false;
		}
	}

	setInterval(() => {
		db.collection("kenhthaoluanchung").orderBy("sort").get()
			.then((querySnapshot) => {
				let tmp = [];
				querySnapshot.forEach((doc) => {
					tmp.push(doc.data());
				});
				// console.log(JSON.stringify(oldData));
				// console.log(JSON.stringify(tmp));

				if (JSON.stringify(oldData) != JSON.stringify(tmp)) {
					document.getElementById("messageWrapper").innerHTML = "";
					oldData = tmp;

					querySnapshot.forEach((doc) => {
						$data = doc.data();

						// console.log($data);

						if ($data["idUser"] == idUser) {
							let htmlCurrentUserMessage =
								'<div class="d-flex justify-content-end mb-4">\n' +
								'<div class="msg_cotainer_send">\n' +
								$data["message"] + '\n' +
								'<span class="msg_time_send">' + $data["currentDateTime"] + '</span>\n' +
								'</div>\n' +
								'<div class="img_cont_msg">\n' +
								'<img src="' + $data["avatarUser"] + '" class="rounded-circle user_img_msg">\n' +
								'<p class="name">' + $data["nameUser"] + '</p>\n' +
								'</div>\n' +
								'</div>';

							document.getElementById("messageWrapper").innerHTML += htmlCurrentUserMessage;
						} else {
							let htmlOtherUserMessage =
								'<div class="d-flex justify-content-start mb-4">\n' +
								'<div class="img_cont_msg">\n' +
								'<img src="' + $data["avatarUser"] + '" class="rounded-circle user_img_msg">\n' +
								'<p class="name">' + $data["nameUser"] + '</p>\n' +
								'</div>\n' +
								'<div class="msg_cotainer">\n' +
								$data["message"] + '\n' +
								'<span class="msg_time">' + $data["currentDateTime"] + '</span>\n' +
								'</div>\n' +
								'</div>';

							document.getElementById("messageWrapper").innerHTML += htmlOtherUserMessage;
						}
					});

					var objDiv = document.getElementById("messageWrapper");
					objDiv.scrollTop = objDiv.scrollHeight;

				}
			})
			.catch(function(error) {
				console.error("Error refreshMessages: ", error);
				return false;
			});
	}, 2000);
</script>