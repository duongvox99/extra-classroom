function confirmDeleteFunction (idDeleteForm) {
    event.preventDefault();

    $.confirm({
        theme: 'modern',
        title: 'Bạn có thực sự muốn xoá hay không?',
        content: 'Lưu ý: Nếu đồng ý thì thao tác xoá này không thể khôi phục được!',
        autoClose: 'cancel|10000',
        type: 'orange',
        typeAnimated: true,
        columnClass: 'medium',
        buttons: {
            cancel: {
                text: 'Huỷ bỏ',
                btnClass: 'btn-orange',
                action: function () {
                }
            },
            ok: {
                text: 'Đồng ý',
                btnClass: 'btn-secondary',
                action: function () {
                    document.getElementById(idDeleteForm).submit();
                }
            }
        },
    });
}

function addSuccessFunction(type) {
    $.confirm({
        theme: 'modern',
        columnClass: 'medium',
        title: 'Thêm ' + type + ' mới thành công',
        content: 'Bạn có thể xem kết quả ở danh sách ' + type + '!',
        type: 'green',
        typeAnimated: true,
        buttons: {
            OK: {
                text: 'Đồng ý',
                btnClass: 'btn-green',
                action: function () {
                }
            }
        },
    });
}

function updateSucessFunction(type) {
    $.confirm({
        theme: 'modern',
        columnClass: 'medium',
        title: 'Chỉnh sửa ' + type + ' thành công',
        content: 'Bạn có thể xem kết quả ở danh sách ' + type + '!',
        type: 'green',
        typeAnimated: true,
        buttons: {
            OK: {
                text: 'Đồng ý',
                btnClass: 'btn-green',
                action: function () {
                }
            }
        },
    });
}

function destroySucessFunction(type) {
    $.confirm({
        theme: 'modern',
        columnClass: 'medium',
        title: 'Xóa ' + type + ' thành công',
        content: 'Bạn có thể xem kết quả ở danh sách ' + type + '!',
        type: 'green',
        typeAnimated: true,
        buttons: {
            OK: {
                text: 'Đồng ý',
                btnClass: 'btn-green',
                action: function () {
                }
            }
        },
    });
}
