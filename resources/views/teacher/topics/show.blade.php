@extends('layouts.teacher')

@section('title')
    Chi tiết chủ đề câu hỏi
@endsection

@section('section-content')
    <section class="py-5">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <div class="card mt-1">
                    <div class="card-header">
                        <a href="{{ url()->previous() }}" class="h2 text-decoration-none text-primary">
                            <i class="fas fa-angle-left"></i>
                            <span> Chi tiết chủ đề câu hỏi</span>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name" class="h5 text-secondary">Tên chủ đề</label>
                            <input type="text" value="{{$topic->name}}"
                                   class="form-control" readonly>
                        </div>

                        <div class="form-group">
                            <label for="class" class="h5 text-secondary">Loại toán</label>
                            @foreach($typeClasses as $typeClass)
                                @if ($topic->type_class_id == $typeClass->id)
                                    <input type="text" value="{{$typeClass->name}}" class="form-control" readonly>
                                @endif
                            @endforeach
                        </div>

                        <div class="form-group">
                            <label for="class" class="h5 text-secondary">Lớp</label>
                            @foreach($typeClasses as $typeClass)
                                @if ($topic->class == 12)
                                    <input type="text" value="12" class="form-control" readonly>
                                    @break
                                @endif
                                @if ($topic->class == 11)
                                    <input type="text" value="11" class="form-control" readonly>
                                    @break
                                @endif
                                @if ($topic->class == 10)
                                    <input type="text" value="10" class="form-control" readonly>
                                    @break
                                @endif
                            @endforeach
                        </div>

                        <div class="form-group">
                            <label for="description" class="h5 text-secondary">Mô tả</label>
                            <textarea row="5" maxlength="254" style="height:100px;" class="form-control text-secondary p-3" readonly>{{$topic->description}}</textarea>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
