@extends('layouts.teacher')

@section('title')
    Thêm chủ đề câu hỏi mới
@endsection

@section('section-content')
    <section class="py-5">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <div class="card mt-1">
                    <div class="card-header">
                        <a href="{{ url()->previous() }}" class="h2 text-decoration-none text-primary">
                            <i class="fas fa-angle-left"></i>
                            <span> Tạo chủ đề câu hỏi</span>
                        </a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('teacher.topics.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name" class="h5 text-secondary">Tên chủ đề</label>
                                <input type="text" id="name" name="name" value="{{old('name')}}"
                                       placeholder="Ví dụ: Vectơ không gian"
                                       class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="class" class="h5 text-secondary">Loại toán</label>
                                <select class="form-control" id="typeOfClassId" name="typeOfClassId">
                                    @foreach($typeClasses as $typeClass)
                                    <option @if (old('typeOfClassId') == $typeClass->id) selected @endif value="{{$typeClass->id}}">{{$typeClass->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="class" class="h5 text-secondary">Lớp</label>
                                <select class="form-control" id="class" name="class">
                                    <option @if (old('class') == 12) selected @endif>12</option>
                                    <option @if (old('class') == 11) selected @endif>11</option>
                                    <option @if (old('class') == 10) selected @endif>10</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="description" class="h5 text-secondary">Mô tả</label>
                                <textarea name="description" id="description"
                                          row="5" maxlength="254" style="height:100px;"
                                          class="form-control text-secondary p-3">{{old('description')}}</textarea>
                            </div>

                            <button name="btnSubmit" type="submit" class="btn btn-primary side-right">Hoàn tất</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
