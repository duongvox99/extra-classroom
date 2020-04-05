$(document).ready(function(){
	function validateEmail($email) {
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        return emailReg.test( $email );
    }

    $("#btnSubmit").click(function(){
		var username = $("#username").val();
		var email = $("#email").val();
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

    	if (email == "") 
    	{
    	 	event.preventDefault();
    	 	$.confirm({
                    theme: 'modern',
                    title: 'Email rỗng',
                    content: 'Bạn vui lòng kiểm tra lại Email!',
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
    	else if(!validateEmail(email))
        {
            event.preventDefault();
            $.confirm({
                    theme: 'modern',
                    title: 'Email không hợp lệ',
                    content: 'Bạn vui lòng kiểm tra lại Email!',
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