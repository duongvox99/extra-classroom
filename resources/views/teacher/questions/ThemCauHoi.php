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
                    content: 'Bạn có thể xem kết quả ở ngân hàng câu hỏi!',
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
        <label for="editorCauHoi">Câu hỏi</label>
        <textarea name="CauHoi" id="editorCauHoi">
            <?php echo (isset($data["DataCauHoiChinhSua"])) ? $data["DataCauHoiChinhSua"]["CauHoi"] : "";?>
        </textarea>
    </div>

    <div class="form-group">
        <label for="editorDapAn1">Đáp án 1</label>
        <textarea name="DapAn1" id="editorDapAn1">
            <?php echo (isset($data["DataCauHoiChinhSua"])) ? $data["DataCauHoiChinhSua"]["DapAn1"] : "";?>
        </textarea>
    </div>

    <div class="form-group">
        <label for="editorDapAn2">Đáp án 2</label>
        <textarea name="DapAn2" id="editorDapAn2">
            <?php echo (isset($data["DataCauHoiChinhSua"])) ? $data["DataCauHoiChinhSua"]["DapAn2"] : "";?>
        </textarea>
    </div>

    <div class="form-group">
        <label for="editorDapAn3">Đáp án 3</label>
        <textarea name="DapAn3" id="editorDapAn3">
            <?php echo (isset($data["DataCauHoiChinhSua"])) ? $data["DataCauHoiChinhSua"]["DapAn3"] : "";?>
        </textarea>
    </div>

    <div class="form-group">
        <label for="editorDapAn4">Đáp án 4</label>
        <textarea name="DapAn4" id="editorDapAn4">
            <?php echo (isset($data["DataCauHoiChinhSua"])) ? $data["DataCauHoiChinhSua"]["DapAn4"] : "";?>
        </textarea>
    </div>

    <div class="form-group">
        <label for="loaitaikhoan">Đáp án đúng</label>
        <select class="form-control" id="loaitaikhoan" name="DapAnDung">
            <option value="1">Đáp án 1</option>
            <option value="2">Đáp án 2</option>
            <option value="3">Đáp án 3</option>
            <option value="4">Đáp án 4</option>
        </select>
    </div>

    <div class="form-group">
        <label for="editorLoiGiai">Lời giải</label>
        <textarea name="LoiGiai" id="editorLoiGiai">
            <?php echo (isset($data["DataCauHoiChinhSua"])) ? $data["DataCauHoiChinhSua"]["LoiGiai"] : "";?>
        </textarea>
    </div>

    <div class="form-group">
        <label for="loaitaikhoan">Loại câu hỏi</label>
        <select class="form-control" id="loaitaikhoan" name="LoaiCauHoi">
            <option value="1"
                <?php
                if (isset($data["DataCauHoiChinhSua"])) {
                    if ($data["DataCauHoiChinhSua"]["LoaiCauHoi"] == 1) {
                        echo 'selected="selected"';
                    }
                };
                ?>      
            >Dễ</option>
            <option value="2"
                <?php
                if (isset($data["DataCauHoiChinhSua"])) {
                    if ($data["DataCauHoiChinhSua"]["LoaiCauHoi"] == 2) {
                        echo 'selected="selected"';
                    }
                };
                ?>      
            >Trung bình</option>
            <option value="3"
                <?php
                if (isset($data["DataCauHoiChinhSua"])) {
                    if ($data["DataCauHoiChinhSua"]["LoaiCauHoi"] == 3) {
                        echo 'selected="selected"';
                    }
                };
                ?>      
            >Khó</option>
        </select>
    </div>


    <div class="form-group">
        <label for="lop">Lớp</label>
        <select class="form-control" id="lop" name="Lop">
            <option
                <?php
                    if (isset($data["DataCauHoiChinhSua"])) {
                        if ($data["DataCauHoiChinhSua"]["Lop"] == 12) {
                            echo 'selected="selected"';
                        }
                    };
                ?>
            >12</option>
            <option
                <?php
                    if (isset($data["DataCauHoiChinhSua"])) {
                        if ($data["DataCauHoiChinhSua"]["Lop"] == 11) {
                            echo 'selected="selected"';
                        }
                    };
                ?>
            >11</option>
            <option
                <?php
                    if (isset($data["DataCauHoiChinhSua"])) {
                        if ($data["DataCauHoiChinhSua"]["Lop"] == 10) {
                            echo 'selected="selected"';
                        }
                    };
                ?>
            >10</option>
        </select>
    </div>

    <div class="form-group">
        <label for="tuan">Tuần</label>
        <input type="number" min="1" max="52" class="form-control" id="tuan" name="Tuan" placeholder="Tuần" value="<?php echo (isset($data["DataCauHoiChinhSua"])) ? $data["DataCauHoiChinhSua"]["Tuan"] : (new DateTime())->format("W");?>">
    </div>

    <button name="btnSubmit" type="submit" class="btn btn-primary"><?php echo (isset($data["DataCauHoiChinhSua"])) ? "Chỉnh sửa câu hỏi" : "Tạo câu hỏi mới";?></button>
</form>
<script>
    ClassicEditor
        .create(document.querySelector('#editorCauHoi'))
        .catch(error => {
            console.error(error);
        });
    ClassicEditor
        .create(document.querySelector('#editorDapAn1'))
        .catch(error => {
            console.error(error);
        });
    ClassicEditor
        .create(document.querySelector('#editorDapAn2'))
        .catch(error => {
            console.error(error);
        });
    ClassicEditor
        .create(document.querySelector('#editorDapAn3'))
        .catch(error => {
            console.error(error);
        });
    ClassicEditor
        .create(document.querySelector('#editorDapAn4'))
        .catch(error => {
            console.error(error);
        });
    ClassicEditor
        .create(document.querySelector('#editorLoiGiai'))
        .catch(error => {
            console.error(error);
        });
</script>