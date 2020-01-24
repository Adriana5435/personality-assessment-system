@extends('layouts.admin')

@section('heading')
    <h1 class="m-0 text-dark">{{ __('Edit Pair') }}</h1>
@endsection

@section('content')
    <form method="post" action="{{ route('questionnaire.pair.update', ['questionnaire' => $questionnaire, 'pair' => $pair]) }}">
        @csrf
        @method('put')
        <input type="hidden" value="{{ $questionnaire->id }}" name="questionnaire_id">
        <div class="card-header">
            <h3 class="card-title">{{ __('Edit Pair for') }} «{{ $questionnaire->title }}»</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="typeIndicator1">{{ __('First Type Indicator') }}</label>
                        <select id="typeIndicator1" name="type_indicator_1_id" class="form-control  @error('type_indicator_1_id') is-invalid @enderror">
                            @foreach($questionnaire->typeIndicators as $typeindicator)
                                <option value="{{ $typeindicator->id }}" @if($pair->type_indicator_1_id == $typeindicator->id) selected @endif>{{ $typeindicator->title_fa }} ({{ $typeindicator->symbol }})</option>
                            @endforeach
                        </select>
                        @error('type_indicator_1_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="typeIndicator2">{{ __('Second Type Indicator') }}</label>
                        <select id="typeIndicator2" name="type_indicator_2_id" class="form-control  @error('type_indicator_2_id') is-invalid @enderror">
                            @foreach($questionnaire->typeIndicators as $typeindicator)
                                <option value="{{ $typeindicator->id }}" @if($pair->type_indicator_2_id == $typeindicator->id) selected @endif>{{ $typeindicator->title_fa }} ({{ $typeindicator->symbol }})</option>
                            @endforeach
                        </select>
                        @error('type_indicator_2_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="typeIndicatorPrefered">{{ __('Priority') }}</label>
                        <select id="typeIndicatorPrefered" name="type_indicator_prefered_id" class="form-control  @error('type_indicator_prefered_id') is-invalid @enderror">
                            @foreach($questionnaire->typeIndicators as $typeindicator)
                                <option value="{{ $typeindicator->id }}" @if($pair->type_indicator_prefered_id == $typeindicator->id) selected @endif>{{ $typeindicator->title_fa }} ({{ $typeindicator->symbol }})</option>
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
            <button type="submit" class="btn btn-primary float-left">{{ __('Update') }}</button>
        </div>
    </form>
@endsection
