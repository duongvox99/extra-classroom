@extends('layouts.teacher')

@section('title')
    Thêm nhóm học sinh
@endsection

@section('section-content')
    <section class="py-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
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
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Ví dụ: Đội tuyển chuyên Toán 12">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="class" class="h5 text-secondary">Lớp</label>
                                <select class="form-control" id="class" name="class">
                                    <option>12</option>
                                    <option>11</option>
                                    <option>10</option>
                                </select>
                            </div>
                            
                            <button name="btnSubmit" type="submit" class="btn btn-primary side-right">Tạo nhóm</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
