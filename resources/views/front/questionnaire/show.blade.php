@extends('layouts.front')

@section('header')
    <h1>{{ $questionnaire->title }}</h1>
    <p>{{ $questionnaire->description }}</p>
@endsection

@section('content')
    <div class="container welcome-questions">
        <form action="{{ route('front.questionnaire.submit', [$questionnaire->id, $submit->id]) }}" method="post">
            @csrf
            @foreach($questionnaire->questions as $question)
                <div>
                    <h3>{{ $question->title }}</h3>
                    <div class="radio">
                        <label><input type="radio" name="q{{ $question->id }}" value="1" @if(old('q' . $question->id) == 1) checked @endif> {{ $question->option_first }}</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="q{{ $question->id }}" value="2" @if(old('q' . $question->id) == 2) checked @endif> {{ $question->option_second }}</label>
                    </div>
                    @error('q' . $question->id)
                    <span class="text-danger">{{ __('Please choose one of two options.') }}</span>
                    @enderror
                </div>
                <hr>
            @endforeach
            <div class="row">
                <input type="submit" value="{{ __('Submit') }}">
            </div>
        </form>
    </div>

@endsection
