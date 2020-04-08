<script type="text/javascript" src="/ExtraClassroomWebsite/public/js/ckeditor.js"></script>
<script id="MathJax-script" async src="/ExtraClassroomWebsite/public/js/tex-mml-chtml.js"></script>

<?php
if (isset($data["result"])) {
    $title = $data["action"] . " " . $data["type"];
    if ($data["result"]) {
        echo
            "<script type='text/javascript'>
                $.confirm({
                    theme: 'modern',
                    columnClass: 'medium',
                    title: '$title thành công',
                    content: 'Bạn có thể xem kết quả ở thông báo của nhóm!',
                    type: 'green',
                    typeAnimated: true,
                    buttons: {
                        OK: {
                            text: 'Đồng ý',
                            btnClass: 'btn-green',
                            action: function(){
                            }
                        }
                    },
                });            
            </script>";
    } else {
        echo
            "<script type='text/javascript'>
                $.confirm({
                    theme: 'modern',
                    columnClass: 'medium',
                    title: '$title thất bại',
                    content: 'Bạn vui lòng kiểm tra lại thông tin nhập vào!',
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
            </script>";
    }
}
?>
<form action="" method="POST">
    <div class="form-group">
        <label for="editorTieuDe">Tiêu đề</label>
        <textarea name="TieuDe" id="editorTieuDe">
            <?php echo (isset($data["DataThongBaoNhomChinhSua"])) ? $data["DataThongBaoNhomChinhSua"]["TieuDe"] : "";?>
        </textarea>
    </div>

    <div class="form-group">
        <label for="editorNoiDung">Nội dung</label>
        <textarea name="NoiDung" id="editorNoiDung">
            <?php echo (isset($data["DataThongBaoNhomChinhSua"])) ? $data["DataThongBaoNhomChinhSua"]["NoiDung"] : "";?>
        </textarea>
    </div>

    <div class="form-group">
        <label>Ngày tạo thông báo</label>
        <div class='input-group date' id='datetimepicker1'>

            <input type='text' class="form-control" name="NgayTao" placeholder="Ngày tạo thông báo" value="<?php echo (isset($data["DataThongBaoNhomChinhSua"])) ? $data["DataThongBaoNhomChinhSua"]["NgayTao"] : date('Y-m-d H:i:s'); ?>" />
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
            </span>
        </div>
    </div>

    <button name="btnSubmit" type="submit" class="btn btn-primary"><?php echo (isset($data["DataThongBaoNhomChinhSua"])) ? "Chỉnh sửa thông báo" : "Tạo thông báo mới";?></button>
</form>
<script>
    ClassicEditor
        .create(document.querySelector('#editorTieuDe'))
        .catch(error => {
            console.error(error);
        });
    ClassicEditor
        .create(document.querySelector('#editorNoiDung'))
        .catch(error => {
            console.error(error);
        });
</script>