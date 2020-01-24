@extends('layouts.admin')

@section('heading')
    <h1 class="m-0 text-dark">{{ __('Edit Type Indicator') }}</h1>
@endsection

@section('content')
    <form method="post" action="{{ route('questionnaire.typeindicator.update', ['questionnaire' => $questionnaire, 'typeindicator' => $typeindicator]) }}">
        @csrf
        @method('put')
        <input type="hidden" value="{{ $questionnaire->id }}" name="questionnaire_id">
        <div class="card-header">
            <h3 class="card-title">{{ __('Edit Type Indicator for') }} «{{ $questionnaire->title }}»</h3>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="typeIndicatorTitleFa">{{ __('Persian Title for Type Indicator') }}</label>
                <input name="title_fa" value="{{ $typeindicator->title_fa }}" type="text" class="form-control @error('title_fa') is-invalid @enderror" id="typeIndicatorTitleFa" placeholder="{{ __('Enter Persian Title for Type Indicator') }}" required>
                @error('title_fa')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="typeIndicatorTitleEn">{{ __('English Title for Type Indicator') }}</label>
                <input name="title_en" value="{{ $typeindicator->title_en }}" type="text" class="form-control @error('title_en') is-invalid @enderror" id="typeIndicatorTitleEn" placeholder="{{ __('Enter English Title for Type Indicator') }}" required>
                @error('title_en')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="typeIndicatorSymbol">{{ __('Symbol for Type Indicator') }}</label>
                <input name="symbol" value="{{ $typeindicator->symbol }}" type="text" class="form-control @error('symbol') is-invalid @enderror" id="typeIndicatorSymbol" placeholder="{{ __('Enter Symbol for Type Indicator') }}" required>
                @error('symbol')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary float-left">{{ __('Update') }}</button>
        </div>
    </form>
@endsection
