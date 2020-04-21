@extends('layouts.teacher')

@section('title')
    Thêm đề kiểm tra
@endsection

@section('head-custom-stylesheet')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

    <style>
        table, td, th {
            text-align:center;
        }
    </style>
@endsection

@section('body-custom-scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script>
        const topics = {!! $topics !!};
        const typeQuestions = {!! $typeQuestions !!};

        function getAllTypeQuestionInputs(selectedTopicIndex) {
            let topicID = topics[selectedTopicIndex]['topicId'];
            let output = '';
            for (typeQuestion of typeQuestions) {
                let maxValue = 0;
                if (topics[selectedTopicIndex]['totalQuestion'][typeQuestion['id']] > 0) {
                     maxValue = topics[selectedTopicIndex]['totalQuestion'][typeQuestion['id']];
                }
                output += '<td><input type="number" class="form-control inputTypeQuestion" name="topicId_' + topicID + '_typeQuestionId_' + typeQuestion['id'] + '" min="0" max="' + maxValue + '" value="0" style="text-align:center;"></td>';
            }
            return output;
        }

        $(document).ready(function() {
            // $('[data-toggle="tooltip"]').tooltip();

            $('.topicSelector').val(null).trigger('change');

            $('.topicSelector').select2({
                allowClear: true,
                placeholder: "Chọn chủ đề để thêm vào",
            });

            $('#btnAddCustomTopic').click(function(){
                event.preventDefault();

                let selectedTopicIndex = $('.topicSelector').val();
                if (selectedTopicIndex != null) {
                    $('#trAllDetailTopicQuestion').append(
                        '<tr id="' + selectedTopicIndex + '">' +
                        '<td>' +
                        topics[selectedTopicIndex]['typeClassName'] + ' ' + topics[selectedTopicIndex]['class']  + ' - ' + topics[selectedTopicIndex]['topicName'] +
                        '</td>' +
                        '<td>:</td>' +
                        getAllTypeQuestionInputs(selectedTopicIndex) +
                        '<td width="5%">' +
                        '<a class="deleteCustomTopicOutOfTable" href="" onclick="return false;" style="font-size: 2rem;" data-toggle="tooltip" title="Xóa tùy chỉnh chủ đề">' +
                        '<i class="fas fa-minus-circle" style="color: red;"></i>' +
                        '</a>' +
                        '</td>' +
                        '</tr>'
                    );

                    $('.topicSelector').val(null).trigger('change');
                    $(".topicSelector>option[value=" + selectedTopicIndex + "]").attr('disabled','disabled');
                }
            });

            $('table').on('click', 'a[class="deleteCustomTopicOutOfTable"]', function(){
                $(".topicSelector>option[value=" + $(this).closest('tr').attr('id') + "]").removeAttr('disabled');
                $(this).closest('tr').remove();
                if ($(".inputTypeQuestion")['length'] == 0) {
                    $('#totalQuestion').html("0 câu");
                } else {
                    $(".inputTypeQuestion").trigger('change');
                }
            })

            $('table').on('change', 'input[class="form-control inputTypeQuestion"]', function(){
                let total = 0;
                let inputTypeQuestion = $('.inputTypeQuestion');
                for (let i = 0; i < Object.keys(inputTypeQuestion).length - 2; i++) {
                    let tmp = parseInt(inputTypeQuestion[i].value);
                    if (Number.isInteger(tmp)) {
                        total += tmp;
                    }
                }
                $('#totalQuestion').html(total + " câu");
            });
        });
    </script>
@endsection

@section('section-content')
    <section class="py-5">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-7 col-sm-12">
                <div class="card mt-1">
                    <div class="card-header">
                        <a href="{{ url()->previous() }}" class="h2 text-decoration-none text-primary">
                            <i class="fas fa-angle-left"></i>
                            <span> Tạo đề kiểm tra mới</span>
                        </a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('teacher.exams.store_custom_by_topic') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="name" class="h5 text-secondary">Tên đề kiểm tra</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Ví dụ: Đề kiểm tra 45 phút lớp 11 năm 2018-2019" value="{{ old('name') }}">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="timeLimit" class="h5 text-secondary">Thời gian làm bài (tính theo phút)</label>
                                <input type="number" class="form-control @error('timeLimit') is-invalid @enderror" id="timeLimit" name="timeLimit" placeholder="Ví dụ: 120" min="1" value="{{ old('timeLimit') }}">
                                @error('timeLimit')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <table width="100%">
                                    <thead>
                                    <th width="35%">Chủ đề câu hỏi</th>
                                    <th></th>
                                    @foreach($typeQuestions as $typeQuestion)
                                        <th>{{$typeQuestion->name}}</th>
                                    @endforeach
                                    <th>#</th>
                                    </thead>

                                    <tbody id="trAllDetailTopicQuestion">
                                    </tbody>

                                    <tfoot>
                                        <tr style="border-top: 2px solid black;">
                                            <td width="30%">
                                                <select class="form-control topicSelector">
                                                    @foreach( $topics as $topic )
{{--                                                        <option value="{{$topic->topicId}}">{{$topic->typeClassName}} {{$topic->class}} - {{$topic->topicName}}</option>--}}
                                                        <option value="{{$loop->index}}">{{$topic->typeClassName}} {{$topic->class}} - {{$topic->topicName}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td width="5%">
                                                <a id="btnAddCustomTopic" href="" style="font-size: 2rem;" data-toggle="tooltip" title="Thêm tùy chỉnh chủ đề">
                                                    <i class="fas fa-plus-circle"></i>
                                                </a>
                                            </td>
                                            <td colspan="{{count($typeQuestions) - 1}}" style="text-align: right; font-weight:bold">Tổng cộng: </td>
                                            <td id="totalQuestion" style="text-align: left; font-weight:bold">0 câu</td>
                                        </tr>
                                    </tfoot>
                                </table>

                            </div>

                            <button name="btnSubmit" type="submit" class="btn btn-primary side-right">Tạo đề kiểm tra</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
