@extends('layouts.teacher')

@section('title')
    Thêm nhóm học sinh -
@endsection

@section('nav-teacher-groups')
    style="background-color: green;"
@endsection

@section('content')
    <form action="{{ route('teacher.groups.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Tên nhóm</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Tên nhóm" value="">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="class">Lớp</label>
            <select class="form-control" id="class" name="class">
                <option>12</option>
                <option>11</option>
                <option>10</option>
            </select>
        </div>

        <button name="btnSubmit" type="submit" class="btn btn-primary">Tạo nhóm mới</button>
    </form>
@endsection
