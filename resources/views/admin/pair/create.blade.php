@extends('layouts.admin')

@section('heading')
    <h1 class="m-0 text-dark">دوقطبی</h1>
@endsection

@section('content')
    <form method="post" action="{{ route('questionnaire.pair.store', ['questionnaire' => $questionnaire]) }}">
        @csrf
        <input type="hidden" value="{{ $questionnaire->id }}" name="questionnaire_id">
        <div class="card-header">
            <h3 class="card-title">افزودن دوقطبی برای «{{ $questionnaire->title }}»</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="typeIndicator1">تیپ نمای اول</label>
                        <select id="typeIndicator1" name="type_indicator_1_id" class="form-control  @error('type_indicator_1_id') is-invalid @enderror">
                            <option value="0" selected>انتخاب کنید</option>
                            @foreach($typeindicators as $typeindicator)
                                <option value="{{ $typeindicator->id }}" @if(old('type_indicator_1_id') == $typeindicator->id) selected @endif>{{ $typeindicator->title_fa }} ({{ $typeindicator->symbol }})</option>
                            @endforeach
                        </select>
                        @error('type_indicator_1_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="typeIndicator2">تیپ نمای دوم</label>
                        <select id="typeIndicator2" name="type_indicator_2_id" class="form-control  @error('type_indicator_2_id') is-invalid @enderror">
                            <option value="0" selected>انتخاب کنید</option>
                            @foreach($typeindicators as $typeindicator)
                                <option value="{{ $typeindicator->id }}" @if(old('type_indicator_2_id') == $typeindicator->id) selected @endif>{{ $typeindicator->title_fa }} ({{ $typeindicator->symbol }})</option>
                            @endforeach
                        </select>
                        @error('type_indicator_2_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="typeIndicatorPrefered">اولویت</label>
                        <select id="typeIndicatorPrefered" name="type_indicator_prefered_id" class="form-control  @error('type_indicator_prefered_id') is-invalid @enderror">
                            <option value="0" selected>انتخاب کنید</option>
                            @foreach($typeindicators as $typeindicator)
                                <option value="{{ $typeindicator->id }}" @if(old('type_indicator_prefered_id') == $typeindicator->id) selected @endif>{{ $typeindicator->title_fa }} ({{ $typeindicator->symbol }})</option>
                            @endforeach
                        </select>
                        @error('type_indicator_prefered_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary float-left">ذخیره</button>
        </div>
    </form>
@endsection
