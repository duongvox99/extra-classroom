@extends('layouts.teacher')

@section('title')
    Thêm câu hỏi vào ngân hàng
@endsection

@section('body-custom-scripts')
    <script type="text/javascript" src="{{ asset('js/ckeditor.js')}}"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#editorQuestion'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#editorAnswer1'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#editorAnswer2'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#editorAnswer3'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#editorAnswer4'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#editorSolution'))
            .catch(error => {
                console.error(error);
            });
    </script>

@endsection

@section('section-content')
    <section class="py-5">
        <div class="row justify-content-center">
            <div class="col col-lg-7 col-md-12 col-sm-12">
                <div class="card mt-1">
                    <div class="card-header">
                        <a href="{{ url()->previous() }}" class="h2 text-decoration-none text-primary">
                            <i class="fas fa-angle-left"></i>
                            <span> Thêm câu hỏi vào ngân hàng</span>
                        </a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('teacher.questions.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="editorQuestion" class="h5 text-secondary">Nội dung câu hỏi</label>
                                <textarea class="form-control @error('name') is-invalid @enderror" name="question" id="editorQuestion"></textarea>
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="editorAnswer1" class="h5 text-secondary">Đáp án 1</label>
                                <textarea class="form-control @error('answer1') is-invalid @enderror" name="answer1" id="editorAnswer1"></textarea>
                                @error('answer1')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="editorAnswer1" class="h5 text-secondary">Đáp án 2</label>
                                <textarea class="form-control @error('answer2') is-invalid @enderror" name="answer2" id="editorAnswer2"></textarea>
                                @error('answer2')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="editorAnswer1" class="h5 text-secondary">Đáp án 3</label>
                                <textarea class="form-control @error('answer3') is-invalid @enderror" name="answer3" id="editorAnswer3"></textarea>
                                @error('answer3')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="editorAnswer1" class="h5 text-secondary">Đáp án 4</label>
                                <textarea class="form-control @error('answer4') is-invalid @enderror" name="answer4" id="editorAnswer4"></textarea>
                                @error('answer4')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="trueAnswer" class="h5 text-secondary">Đáp án đúng</label>
                                <select class="form-control" id="trueAnswer" name="trueAnswer">
                                    <option value="1">Đáp án 1</option>
                                    <option value="2">Đáp án 2</option>
                                    <option value="3">Đáp án 3</option>
                                    <option value="4">Đáp án 4</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="editorSolution" class="h5 text-secondary">Lời giải</label>
                                <textarea class="form-control @error('solution') is-invalid @enderror" name="solution" id="editorSolution"></textarea>
                                @error('solution')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="typeQuestion" class="h5 text-secondary">Loại câu hỏi</label>
                                <select class="form-control" id="typeQuestion" name="typeQuestion">
                                    @foreach( $typeQuestions as $typeQuestion )
                                        <option value="{{$typeQuestion->id}}">{{$typeQuestion->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="topic" class="h5 text-secondary">Chủ đề câu hỏi</label>
                                <select class="form-control" id="typeClass" name="topic">
                                    @foreach( $topics as $topic )
                                        <option value="{{$topic->topicId}}">{{$topic->topicName}} - {{$topic->typeClassName}} {{$topic->class}}</option>
                                    @endforeach
                                </select>
                            </div>

{{--                            <div class="form-group">--}}
{{--                                <label for="typeClass" class="h5 text-secondary">Lớp</label>--}}
{{--                                <select class="form-control" id="typeClass" name="typeClass">--}}
{{--                                    @foreach( $typeClasses as $typeClass )--}}
{{--                                        <option value="{{$typeClass->id}}">{{$typeClass->name}}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}

{{--                            <div class="form-group">--}}
{{--                                <label for="class" class="h5 text-secondary">Lớp</label>--}}
{{--                                <select class="form-control" id="class" name="class">--}}
{{--                                    <option value="12">12</option>--}}
{{--                                    <option value="11">11</option>--}}
{{--                                    <option value="10">10</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}

                            <div class="form-group">
                                <label for="note" class="h5 text-secondary">Ghi chú</label>
                                <input type="text" class="form-control" id="note" name="note" placeholder="Có thể rỗng">
                            </div>

                            <button name="btnSubmit" type="submit" class="btn btn-primary side-right">Thêm câu hỏi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
