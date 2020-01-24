@extends('layouts.admin')

@section('heading')
    <h1 class="m-0 text-dark">
        {{ __('Type Indicators of') }} «{{ $questionnaire->title }}»
        <a href="{{ route('questionnaire.typeindicator.create', $questionnaire->id) }}" class="btn btn-success btn-lg">{{ __('Add Type Indicator') }}</a>
    </h1>
@endsection

@section('content')
    <div class="card-header">
        <h3 class="card-title">{{ __('List of Type Indicators') }}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
        <table class="table table-striped">
            <tbody>
            <tr>
                <th>{{ __('Persian Title') }}</th>
                <th>{{ __('English Title') }}</th>
                <th>{{ __('Symbol') }}</th>
            </tr>
            @forelse($typeindicators as $typeindicator)
                <tr>
                    <td><a href="{{ route('questionnaire.typeindicator.edit', [$questionnaire->id, $typeindicator->id]) }}">{{ $typeindicator->title_fa }}</a></td>
                    <td>{{ $typeindicator->title_en }}</td>
                    <td>{{ $typeindicator->symbol }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">{{ __('No type indicators have been added yet.') }}</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
@endsection
