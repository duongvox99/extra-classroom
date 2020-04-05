// alert("true")
$(document).ready(function(){
	$("#btnSubmit").click(function(){
		var password = $("#password").val();
		var username = $("#username").val();
		// var email = $("#email").val();
    	// alert(password+" "+ username);
    	
    	if (username == "") 
    	{
    	 	event.preventDefault();
    	 	$.confirm({
                    theme: 'modern',
                    title: 'Tên đăng nhập rỗng',
                    content: 'Bạn vui lòng kiểm tra lại tên đăng nhập!',
                    type: 'red',
                    typeAnimated: true,
                    autoClose: 'tryAgain|5000',
                    buttons: {
                        tryAgain: {
                            text: 'Thử lại',
                            btnClass: 'btn-red',
                            action: function(){
                            }
                        }
                    },
                });
    	}

    	if (password == "") 
    	{
    	 	event.preventDefault();
    	 	$.confirm({
                    theme: 'modern',
                    title: 'Mật khẩu rỗng',
                    content: 'Bạn vui lòng kiểm tra lại Mật khẩu!',
                    type: 'red',
                    typeAnimated: true,
                    autoClose: 'tryAgain|5000',
                    buttons: {
                        tryAgain: {
                            text: 'Thử lại',
                            btnClass: 'btn-red',
                            action: function(){
                            }
                        }
                    },
                });
    	}
    	 
	});
});