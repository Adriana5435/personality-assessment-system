@extends('layouts.front')

@section('header')
    <h1>{{ __('Personality Assessment System') }}</h1>
    <p>{{ __('The Personality Assessment System is a web application designed to facilitate the personality assessment process based on questionnaires. This application allows users to submit their responses, receive a personality type assessment, and generate various reports, including the Myers-Briggs Type Indicator (MBTI) assessment. We have utilized modern software development tools and the Laravel framework in this project to enhance the user experience.') }}</p>
    <img src="{{ asset('assets/images/head.png') }}" alt="" class="img-fluid">
@endsection

@section('content')
    <div class="welcome-intro">
        <div class="container">
            <p>{{ __('Welcome to the Personality Assessment System project! This website contains a web application designed to facilitate the personality assessment process based on questionnaires. This application allows users to submit their responses, receive a personality type assessment, and generate various reports, including the Myers-Briggs Type Indicator (MBTI) assessment. We have utilized modern software development tools and Laravel framework in this project to enhance the user experience.') }}</p>
        </div>
    </div>

    @yield('questionnairelist', View::make('front.user.questionairelist', ['questionnaires' => $questionnaires]))
@endsection
