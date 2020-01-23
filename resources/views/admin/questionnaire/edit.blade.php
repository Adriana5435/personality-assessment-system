@extends('layouts.admin')

@section('heading')
    <h1 class="m-0 text-dark">پرسشنامه</h1>
@endsection

@section('content')
    <form method="post" action="{{ route('questionnaire.update', $questionnaire->id) }}">
        @csrf
        @method('put')
        <div class="card-header">
            <h3 class="card-title">ویرایش پرسشنامه</h3>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="questionnaireTitle">عنوان پرسشنامه</label>
                <input name="title" value="{{ $questionnaire->title }}" type="text" class="form-control @error('title') is-invalid @enderror" id="questionnaireTitle" placeholder="عنوان پرسشنامه را وارد کنید" required>
                @error('title')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label>توضیحات</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="3" placeholder="توضیحات ...">{{ $questionnaire->description }}</textarea>
                @error('description')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="price">قیمت - ریال</label>
                <input name="price" value="{{ old('price') ?: $questionnaire->price }}" type="text" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="قیمت پرسشنامه را وارد کنید" required>
                @error('price')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary float-left">بروزرسانی</button>
        </div>
    </form>
@endsection
