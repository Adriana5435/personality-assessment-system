@extends('layouts.admin')

@section('heading')
    <h1 class="m-0 text-dark">{{ __('Transactions List') }}</h1>
@endsection

@section('before-content')
    {{$submits->links()}}
@endsection

@section('after-content')
    {{$submits->links()}}
@endsection

@section('content')
    <div class="card-header">
        <h3 class="card-title">{{ __('Transactions List') }}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
        <table class="table table-striped">
            <tbody>
            <tr>
                <th>{{ __('User Name') }}</th>
                <th>{{ __('Questionnaire') }}</th>
                <th>{{ __('Price') }}</th>
                <th>{{ __('Tracking Code') }}</th>
                <th>{{ __('Status') }}</th>
                <th>{{ __('Card Number') }}</th>
            </tr>
            @forelse($submits as $submit)
                <tr>
                    <td>{{ $submit->user->name }}</td>
                    <td>{{ $submit->questionnaire->title }}</td>
                    <td>{{ $submit->price }}</td>
                    <td>{{ $submit->tracking_code }}</td>
                    <td>{{ $submit->status }}</td>
                    <td>{{ $submit->card_number }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">{{ __('No transactions have been performed yet.') }}</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
@endsection
