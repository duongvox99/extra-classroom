(function () {
    document.getElementById("btnSubmit").disabled = true;

    document.getElementById("document")
        .addEventListener("change", handleFileSelect, false);

    function handleFileSelect(event) {
        readFileInputEventAsArrayBuffer(event, function (arrayBuffer) {
            let options = {
                styleMap: [
                    "comment-reference => sup"
                ]
            };
            try {
                mammoth.convertToHtml({ arrayBuffer: arrayBuffer }, options)
                    .then(displayResult)
                    .done();
            }
            catch(err) {
                let outputMessage = "<div class=\"alert alert-danger\" role=\"alert\">\n" +
                    "  <h4 class=\"alert-heading\">Cảnh báo!</h4>\n" +
                    "  <p>Không tìm thấy câu hỏi trong tệp vừa tải lên</p>\n" +
                    "  <hr>\n" +
                    "  <p class=\"mb-0\">Vui lòng chọn tệp tin khác</p>\n" +
                    "</div>";
                document.getElementById("totalQuestion").innerHTML = outputMessage;
            }

        });
    }

    function tidy(html) {
        let d = document.createElement('div');
        d.innerHTML = html;
        return d.innerHTML;
    }

    function displayResult(result) {
        try {
            let tmp = result.value.split("<dl>");
            if (tmp.length != 2) {
                alert("Split comment and exam error");
                return false;
            }

            let output = [];
            let list_comment = tmp[1];

            let list_question_answer_true_solution = tmp[0].split("<p><strong>Câu ");
            let i;
            for (i = 1; i < list_question_answer_true_solution.length; i++) {
                let tmp = list_question_answer_true_solution[i].split("<p><strong>Lời giải</strong></p>");

                let question_comment_answer = tmp[0];
                let array_question_comment_answer = question_comment_answer.split("<strong>A.");

                let question_comment = array_question_comment_answer[0];
                let array_question_comment = question_comment.split("</sup>");

                let question_num = 1;
                if ((m = /.*?([0-9]+):/.exec(array_question_comment[0])) !== null) {
                    question_num = m[1];
                }

                let comment = "comment-1";
                if ((m = /href="#(.*?)"/.exec(array_question_comment[0])) !== null) {
                    comment = m[1];
                }

                let type_question_id = 1;
                if ((m = /.C\d.(\d)./.exec(array_question_comment[0])) !== null) {
                    type_question_id = m[1];
                }
                if (type_question_id > 4) {
                    type_question_id = 4
                }

                let type_class_name = "Đại số";
                let _class = 10;
                if ((m = /\[([A-Z]{2})([0-9]+)\./.exec(array_question_comment[0])) !== null) {
                    if (m[1] == "HH") {
                        type_class_name = "Hình học";
                    }
                    _class = m[2];
                }

                let question = tidy(array_question_comment[1].trim());

                let A_B_C_D_answer = array_question_comment_answer[1];
                let A_B_C_D_array_answer = A_B_C_D_answer.split("<strong>D.");

                let A_B_C_answer = A_B_C_D_array_answer[0];
                let A_B_C_array_answer = A_B_C_answer.split("<strong>C.");

                let A_B_answer = A_B_C_array_answer[0];
                let A_B_array_answer = A_B_answer.split("<strong>B.");

                let answer_A = tidy(A_B_array_answer[0].trim());
                let answer_B = tidy(A_B_array_answer[1].trim());
                let answer_C = tidy(A_B_C_array_answer[1].trim());
                let answer_D = tidy(A_B_C_D_array_answer[1].trim());

                let true_solution = tmp[1];
                let index_true_answer = 1;
                if ((m = /<p><strong>Chọn ([A-Z]{1})<\/strong><\/p>/.exec(true_solution)) !== null) {
                    if (m[1] == "B") {
                        index_true_answer = 2;
                    }
                    else if (m[1] == "C") {
                        index_true_answer = 3;
                    }
                    else if (m[1] == "D") {
                        index_true_answer = 4;
                    }
                }
                let solution = tidy(true_solution.replace(/Chọn [A-D]{1}/, "").trim());

                let topic_name = "All";
                if ((m = new RegExp('id="' + comment + '">.*?Chuyên đề: (.*?)<\/').exec(list_comment)) !== null) {
                    topic_name = m[1];
                }
                topic_name = topic_name[0].toUpperCase() + topic_name.slice(1).toLowerCase();

                output.push({
                    "topic_name": topic_name,
                    "type_class_name": type_class_name,
                    "class": _class,
                    "question_number": question_num,
                    "question": { "answer": ["<p>" + answer_A + "</p>", "<p>" + answer_B + "</p>", "<p>" + answer_C + "</p>", "<p>" + answer_D + "</p>"], "content": "<p>" + question + "</p>", },
                    "true_answer": index_true_answer,
                    "type_question_id": type_question_id,
                    "solution": "<p>" + solution + "</p>",

                });
            }

            // console.log(output);

            document.getElementById("questions").value = JSON.stringify(output);
            document.getElementById("btnSubmit").disabled = false;
            let outputMessage = "<div class=\"alert alert-success\" role=\"alert\">\n" +
                "  <h4 class=\"alert-heading\">Thông báo!</h4>\n" +
                "  <p>Phát hiện có " + output.length + " câu hỏi trong tệp vừa tải lên</p>\n" +
                "  <hr>\n" +
                "  <p class=\"mb-0\">Nhấn thực hiện để bắt đầu nhập vào ngân hàng câu hỏi</p>\n" +
                "</div>";
            document.getElementById("totalQuestion").innerHTML = outputMessage;
        }
        catch(err) {
            let outputMessage = "<div class=\"alert alert-danger\" role=\"alert\">\n" +
                "  <h4 class=\"alert-heading\">Cảnh báo!</h4>\n" +
                "  <p>Cấu trúc câu hỏi trong tệp tin sai</p>\n" +
                "  <hr>\n" +
                "  <p class=\"mb-0\">Vui lòng chọn tệp tin khác</p>\n" +
                "</div>";
            document.getElementById("totalQuestion").innerHTML = outputMessage;
        }
    }

    function readFileInputEventAsArrayBuffer(event, callback) {
        let file = event.target.files[0];

        let reader = new FileReader();

        reader.onload = function (loadEvent) {
            let arrayBuffer = loadEvent.target.result;
            callback(arrayBuffer);
        };

        reader.readAsArrayBuffer(file);
    }
})();
