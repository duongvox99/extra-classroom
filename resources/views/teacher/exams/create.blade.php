@extends('layouts.teacher')

@section('title')
    Thêm đề kiểm tra
@endsection

@section('head-custom-stylesheet')
    <style>
        table, td, th {
            text-align:center;
        }
    </style>
@endsection

@section('section-content')
    <section class="py-5">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <div class="card mt-1">
                    <div class="card-header">
                        <a href="{{ url()->previous() }}" class="h2 text-decoration-none text-primary">
                            <i class="fas fa-angle-left"></i>
                            <span> Tạo đề kiểm tra tổng hợp</span>
                        </a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('teacher.exams.store') }}" method="POST">
                            @csrf

                            <div class="form-group row">
                                <div class="col-md-7">
                                    <label for="name" class="h5 text-secondary">Tên đề kiểm tra</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Ví dụ: Đề thi thử lần 1 lớp 12 năm 2018-2019" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-5 pl-0">
                                    <label for="timeLimit" class="h5 text-secondary">Thời gian làm bài (phút)</label>
                                    <input type="number" name="timeLimit" id="timeLimit" placeholder="Ví dụ: 120"
                                            value="{{ old('timeLimit') }}" min="5" step="5" list="datalistTimeLimit"
                                            class="form-control @error('timeLimit') is-invalid @enderror">
                                    <datalist id="datalistTimeLimit">
                                        <option>5</option>
                                        <option>15</option>
                                        <option>20</option>
                                        <option>30</option>
                                        <option>40</option>
                                        <option>45</option>
                                        <option>60</option>
                                        <option>90</option>
                                        <option>120</option>
                                    </datalist>
                                    <!-- <input type="number" class="form-control @error('timeLimit') is-invalid @enderror" id="timeLimit" name="timeLimit" placeholder="Ví dụ: 120"  > -->
                                    @error('timeLimit')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            @for ($class = 12; $class >= 10; $class--)
                            <div class="form-group">
                                <label for="numberOfQuestions" class="h5 text-secondary"><span class="badge @if ($class == 12) badge-danger @elseif ($class == 11) badge-warning @elseif ($class == 10) badge-success @endif pt-2">Lớp {{$class}}</span> Số câu hỏi (tính theo câu)</label>
                                <table width="100%">
                                    <thead>
                                    <th></th>
                                    @foreach($typeClasses as $typeClass)
                                        <th>{{$typeClass->name}}</th>
                                    @endforeach
                                    </thead>

                                    <tbody>
                                    @foreach($typeQuestions as $typeQuestion)
                                    <tr>
                                        <td>{{$typeQuestion->name}}</td>
                                        @foreach($typeClasses as $typeClass)
                                            <td>
                                                <input type="number" class="form-control @error('class_' . $class . '_typeClass_' . $typeClass->id . '_typeQuestion_' . $typeQuestion->id) is-invalid @enderror input_class_{{$class}}_typeClass_{{$typeClass->id}}" name="class_{{$class}}_typeClass_{{$typeClass->id}}_typeQuestion_{{$typeQuestion->id}}" min="0" value="{{ old('class_' . $class . '_typeClass_' . $typeClass->id . '_typeQuestion_' . $typeQuestion->id) ? old('class_' . $class . '_typeClass_' . $typeClass->id . '_typeQuestion_' . $typeQuestion->id) : 0}}" style="text-align:center;">
                                                @error('class_' . $class . '_typeClass_' . $typeClass->id . '_typeQuestion_' . $typeQuestion->id)
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </td>
                                        @endforeach

                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td></td>
                                        @foreach($typeClasses as $typeClass)
                                        <td id="class_{{$class}}_totalQuestion_typeClass_{{$typeClass->id}}">0 câu</td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan="{{count($typeClasses)}}" style="border-top: 2px solid black;" id="class_{{$class}}_totalQuestion" name="totalQuestion">0 câu</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            @endfor

                            <button name="btnSubmit" type="submit" class="btn btn-primary side-right">Tạo đề kiểm tra</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('body-custom-scripts')
    <script>
        function refreshTotalQuestion(_class) {
            let total = 0;
            let tmp = 0;
            @foreach($typeClasses as $typeClass)
                tmp = parseInt($('#class_' + _class + '_totalQuestion_typeClass_{{$typeClass->id}}')[0].innerText.slice(0, -4));
                if (Number.isInteger(tmp)) {
                    total += tmp;
                }
            @endforeach
            $('#class_' + _class + '_totalQuestion').html(total + " câu");
        }

        @for ($class = 12; $class >= 10; $class--)
            @foreach($typeClasses as $typeClass)
            $(".input_class_{{$class}}_typeClass_{{$typeClass->id}}").change(function(){
                let tmp = 0;
                let input_typeClass = $(".input_class_{{$class}}_typeClass_{{$typeClass->id}}")

                for (let i = 0; i < {{count($typeQuestions)}}; i++) {
                    let tmpValue = parseInt(input_typeClass[i].value);
                    if (Number.isInteger(tmpValue)) {
                        tmp += tmpValue;
                    }
                }

                $('#class_{{$class}}_totalQuestion_typeClass_{{$typeClass->id}}').html(tmp + " câu");
                refreshTotalQuestion({{$class}});
            });
            @endforeach
        @endfor
        $(document).ready(function() {
            @for ($class = 12; $class >= 10; $class--)
            @foreach($typeClasses as $typeClass)
            $(".input_class_{{$class}}_typeClass_{{$typeClass->id}}").trigger('change');
            @endforeach
            @endfor
        });
    </script>
@endsection
