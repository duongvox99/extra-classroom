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
        <label for="de">Chọn đề kiểm tra</label>
        <select class="form-control" id="de" name="IdDe" <?php echo (isset($data["DataDeNhomChinhSua"])) ? "disabled" : "";?>>
            <?php
            for ($i = count($data["DataDe"]) - 1; $i >= 0; $i--) {
                ?>
                <option value="<?php echo $data["DataDe"][$i]["IdDe"]; ?>"
                    <?php
                        if (isset($data["DataDeNhomChinhSua"])) {
                            if ($data["DataDe"][$i]["IdDe"] == $data["DataDeNhomChinhSua"]["IdDe"]) {
                                echo 'selected="selected"';
                            }
                        };
                    ?>
                ><?php echo $data["DataDe"][$i]["TenDe"]; ?></option>
            <?php
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label>Thời gian mở đề kiểm tra</label>
        <div class='input-group date' id='datetimepicker1'>
            <input type='text' class="form-control" name="ThoiGianMo" placeholder="Thời gian mở đề kiểm tra" value="<?php echo (isset($data["DataDeNhomChinhSua"])) ? $data["DataDeNhomChinhSua"]["ThoiGianMo"] : date('Y-m-d H:i:s'); ?>" />
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
            </span>
        </div>
    </div>

    <div class="form-group">
        <label>Thời gian đóng đề kiểm tra</label>
        <div class='input-group date' id='datetimepicker1'>
            <input type='text' class="form-control" name="ThoiGianDong" placeholder="Thời gian đóng đề kiểm tra" value="<?php echo (isset($data["DataDeNhomChinhSua"])) ? $data["DataDeNhomChinhSua"]["ThoiGianDong"] : date('Y-m-d H:i:s'); ?>" />
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
            </span>
        </div>
    </div>

    <button name="btnSubmit" type="submit" class="btn btn-primary"><?php echo (isset($data["DataDeNhomChinhSua"])) ? "Chỉnh sửa đề kiểm tra cho nhóm" : "Tạo đề kiểm tra mới cho nhóm";?></button>
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