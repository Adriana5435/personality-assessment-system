@extends('layouts.front')

@section('header')
    <h1>پنل کاربری</h1>
@endsection

@section('content')
    <div class="welcome-intro">
        <div class="container">
            <div>
                <img src="{{ auth()->user()->avatar_url }}" alt="" class="user-pic">
                <p>{{ auth()->user()->name }}</p>
            </div>
            <div class="card-header">
                <h3 class="card-title">فهرست آزمون ها</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <th>نام آزمون</th>
                        <th>وضعیت پرداخت</th>
                        <th>وضعیت آزمون</th>
                        <th>تیپ شخصیتی</th>
                        <th>دریافت نتیجه</th>
                    </tr>
                    @forelse($submits as $submit)
                    <tr>
                        <td>{{ $submit->questionnaire->title }}</td>
                        <td>
                            <span class="text-success">{{ $submit->statusName }}</span>
                        </td>
                        <td>
                            @if($submit->isSubmited())
                                <span class="text-primary">{{ $submit->submitedName }}</span>
                            @else
                                <a href="{{ route('front.questionnaire.show', [$submit->questionnaire, $submit]) }}" class="btn btn-success">شروع آزمون</a>
                            @endif
                        </td>
                        <td>
                            @if($submit->isSubmited())
                                {{ $submit->person_type }}
                            @else
                                <span class="text-danger">-</span>
                            @endif
                        </td>
                        <td>
                            @if($submit->isSubmited())
                                <a href="{{ route('front.questionnaire.report', [$submit->questionnaire, $submit]) }}" class="btn btn-success">نمایش نتیجه</a>
                            @else
                                <span class="text-danger">-</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="5">شما هنوز در هیچ آزمونی شرکت نکرده اید.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @yield('questionnairelist', View::make('front.user.questionairelist', ['questionnaires' => $questionnaires]))
@endsection

