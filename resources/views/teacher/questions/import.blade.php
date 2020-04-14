@extends('layouts.teacher')

@section('title')
    Nhập câu hỏi từ file docx
@endsection

@section('body-custom-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mammoth/1.4.9/mammoth.browser.min.js" integrity="sha256-/NDuOhZQkcBQCtafq3LPOX4MxREBkVBjM9OqGAWkhxw=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ asset('js/custom-convert-docx-html.js')}}"></script>
@endsection

@section('section-content')
    <section class="py-5">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <div class="card mt-1">
                    <div class="card-header">
                        <a href="{{ url()->previous() }}" class="h2 text-decoration-none text-primary">
                            <i class="fas fa-angle-left"></i>
                            <span> Nhập câu hỏi từ file docx</span>
                        </a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('teacher.questions.store_import_from_docx') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="document" class="h5 text-secondary">Chọn tệp tin</label>

                                <input type="file" accept="application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="form-control @error('document') is-invalid @enderror" id="document" name="document">
                                @error('document')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <input type="hidden" id="questions" name="questions" value="">

                                <div id="totalQuestion" class="mt-3">
                                </div>

                            </div>

                            <button id="btnSubmit" name="btnSubmit" type="submit" class="btn btn-primary side-right">Thực hiện</button>
{{--                            <button id="btnSubmit" name="btnSubmit" type="submit" class="btn btn-primary side-right" disabled>Thực hiện</button>--}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
