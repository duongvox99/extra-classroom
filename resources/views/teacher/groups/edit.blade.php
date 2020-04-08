@extends('layouts.teacher')

@section('title')
    Chỉnh sửa nhóm học sinh
@endsection

@section('nav-teacher-groups')
    style="background-color: green;"
@endsection

@section('content')
    <form action="{{ route('teacher.groups.update', $group->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="name">Tên nhóm</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Tên nhóm" value="{{ $group->name }}">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="class">Lớp</label>
            <select class="form-control" id="class" name="class">
                <option @if ($group->class == 12) selected @endif>12</option>
                <option @if ($group->class == 11) selected @endif>11</option>
                <option @if ($group->class == 10) selected @endif>10</option>
            </select>
        </div>

        <button name="btnSubmit" type="submit" class="btn btn-primary">Chỉnh sửa nhóm</button>
    </form>
@endsection
