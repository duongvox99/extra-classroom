@extends('layouts.teacher')

@section('title')
    Thêm nhóm học sinh
@endsection

@section('section-content')
    <section class="py-5">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <div class="card mt-1">
                    <div class="card-header">
                        <a href="{{ url()->previous() }}" class="h2 text-decoration-none text-primary">
                            <i class="fas fa-angle-left"></i>
                            <span> Tạo nhóm</span>
                        </a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('teacher.groups.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name" class="h5 text-secondary">Tên nhóm</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Ví dụ: Đội tuyển chuyên Toán 12" value="{{old('name')}}">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
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
                                <label for="description" class="h5 text-secondary">Ghi chú</label>
                                <textarea name="description" id="description"
                                          row="5" maxlength="254" style="height:100px;"
                                          class="form-control text-secondary p-3"></textarea>
                            </div>

                            <button name="btnSubmit" type="submit" class="btn btn-primary side-right">Tạo nhóm</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
