@extends('layouts.admin')

@section('heading')
    <h1 class="m-0 text-dark">تیپ نما</h1>
@endsection

@section('content')
    <form method="post" action="{{ route('questionnaire.typeindicator.store', ['questionnaire' => $questionnaire]) }}">
        @csrf
        <div class="card-header">
            <h3 class="card-title">افزودن تیپ نما برای «{{ $questionnaire->title }}»</h3>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="typeIndicatorTitleFa">عنوان فارسی تیپ نما</label>
                <input name="title_fa" value="{{ old('title_fa') }}" type="text" class="form-control @error('title_fa') is-invalid @enderror" id="typeIndicatorTitleFa" placeholder="عنوان فارسی تیپ نما را وارد کنید" required>
                @error('title_fa')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="typeIndicatorTitleEn">عنوان انگلیسی تیپ نما</label>
                <input name="title_en" value="{{ old('title_en') }}" type="text" class="form-control @error('title_en') is-invalid @enderror" id="typeIndicatorTitleEn" placeholder="عنوان انگلیسی تیپ نما را وارد کنید" required>
                @error('title_en')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="typeIndicatorSymbol">نماد تیپ نما</label>
                <input name="symbol" value="{{ old('symbol') }}" type="text" class="form-control @error('symbol') is-invalid @enderror" id="typeIndicatorSymbol" placeholder="نماد تیپ نما را وارد کنید" required>
                @error('symbol')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary float-left">ذخیره</button>
        </div>
    </form>
@endsection
