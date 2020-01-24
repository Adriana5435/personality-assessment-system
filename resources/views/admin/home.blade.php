@extends('layouts.admin')

@section('heading')
    <h1 class="m-0 text-dark">{{ __('Completed Questionnaires List') }}</h1>
@endsection

@section('before-content')
    {{$submits->links()}}
@endsection

@section('after-content')
    {{$submits->links()}}
@endsection

@section('content')
    <div class="card-header">
        <h3 class="card-title">{{ __('Completed Questionnaires List') }}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
        <table class="table table-striped">
            <tbody>
            <tr>
                <th>{{ __('User Name') }}</th>
                <th>{{ __('Questionnaire') }}</th>
                <th>{{ __('Personality Type') }}</th>
                <th>{{ __('Result') }}</th>
            </tr>
            @forelse($submits as $submit)
                <tr>
                    <td>{{ $submit->user->name }}</td>
                    <td>{{ $submit->questionnaire->title }}</td>
                    <td>{{ $submit->person_type}}</td>
                    <td><a href="{{ route('admin.report', $submit) }}" class="btn btn-success">نمایش گزارش</a></td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">{{ __('No questionnaires have been completed by users yet.') }}</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->

    <div class="card-header">
        <h3 class="card-title">{{ __('Download User Data') }}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
        <a href="{{ route('admin.users.export') }}" class="btn btn-success">{{ __('Download Excel File') }}</a>
    </div>
@endsection
