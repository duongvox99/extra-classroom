$(document).ready(function(){
	function validateEmail($email) {
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        return emailReg.test( $email );
    }

    $("#btnSubmit").click(function(){
		var fullname = $("#hoten").val();
		var email = $("#email").val();
        var birthyear =$("#namsinh").val();
    	// alert(password+" "+ username);
    	
    	if (fullname == "") 
    	{
    	 	event.preventDefault();
    	 	$.confirm({
                    theme: 'modern',
                    title: 'Họ và tên rỗng',
                    content: 'Bạn vui lòng kiểm tra lại Họ và tên!',
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

        if (birthyear == "") 
        {
            event.preventDefault();
            $.confirm({
                    theme: 'modern',
                    title: 'Năm sinh rỗng',
                    content: 'Bạn vui lòng kiểm tra Năm sinh!',
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