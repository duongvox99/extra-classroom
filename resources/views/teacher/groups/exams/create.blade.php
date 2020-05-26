@extends('layouts.teacher')

@section('title')
    Giao đề cho nhóm
@endsection

@section('head-custom-stylesheet')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />
    <style>

    </style>
@endsection

@section('body-custom-scripts')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>

    <script type="text/javascript">
        $(function () {
            $('#datetimepicker1').datetimepicker({
                defaultDate: moment(),
                format: 'DD/MM/YYYY HH:mm:ss'
            });
            $('#datetimepicker2').datetimepicker({
                format: 'DD/MM/YYYY HH:mm:ss'
            });
        });
    </script>
@endsection

@section('section-content')
    <section class="py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card mt-1">
                    <div class="card-header">
                        <a href="{{ url()->previous() }}" class="h2 text-decoration-none text-primary">
                            <i class="fas fa-angle-left"></i>
                            <span> Giao đề cho nhóm {{$group->name}}</span>
                        </a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('teacher.groups.exams.store', $group->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="examId" class="h5 text-secondary">Chọn đề kiểm tra</label>
                                <select class="form-control" id="examId" name="examId">
                                    @foreach($exams as $exam)
                                        <option @if (old('examId') == $exam->id) selected @endif value="{{$exam->id}}">{{$exam->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="numberOfSubmit" class="h5 text-secondary">Số lần làm bài</label>
                                <input type="number" class="form-control @error('numberOfSubmit') is-invalid @enderror" id="numberOfSubmit" name="numberOfSubmit" min="1" placeholder="Ví dụ: 1" value="{{old('numberOfSubmit') ? old('numberOfSubmit') : 1}}">
                                @error('numberOfSubmit')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="timeOpen" class="h5 text-secondary">Thời gian mở</label>

                                <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                                    <input type="text" class="form-control @error('timeOpen') is-invalid @enderror datetimepicker-input" data-target="#datetimepicker1" id="timeOpen" name="timeOpen"/>
                                    @error('timeOpen')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="timeClose" class="h5 text-secondary">Thời gian đóng</label>
                                <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                                    <input type="text" class="form-control @error('timeClose') is-invalid @enderror datetimepicker-input" data-target="#datetimepicker2" id="timeClose" name="timeClose"/>
                                    @error('timeClose')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="isShowSolution" class="h5 text-secondary">Tùy chọn sau khi học xong làm xong</label>
                                <select class="form-control" id="isShowSolution" name="isShowSolution">
                                    <option @if (old('isShowSolution') == true) selected @endif value="True">Cho phép xem đáp án</option>
                                    <option @if (old('isShowSolution') == false) selected @endif value="False">Không cho phép xem đáp án</option>
                                </select>
                            </div>

                            <button name="btnSubmit" type="submit" class="btn btn-primary side-right">Hoàn tất</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
