@extends('layouts.admin')

@section('heading')
    <h1 class="m-0 text-dark">
        {{ __('Questionnaire') }}
        <a href="{{ route('questionnaire.create') }}" class="btn btn-success btn-lg">{{ __('Add Questionnaire') }}</a>
    </h1>
@endsection

@section('content')
    <div class="card-header">
        <h3 class="card-title">{{ __('Questionnaires List') }}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
        <table class="table table-striped">
            <tbody>
                <tr>
                    <th>{{ __('Title') }}</th>
                    <th>{{ __('Price') }}</th>
                    <th>{{ __('Type Indicators') }}</th>
                    <th>{{ __('Pairs') }}</th>
                    <th>{{ __('Reports') }}</th>
                    <th>{{ __('Questions') }}</th>
                </tr>
                @forelse($questionnaires as $questionnaire)
                    <tr>
                        <td><a href="{{ route('questionnaire.edit', ['questionnaire' => $questionnaire->id]) }}">{{ $questionnaire->title }}</a></td>
                        <td>{{ number_format($questionnaire->price) }}</td>
                        <td>
                            <a href="{{ route('questionnaire.typeindicator.create', ['questionnaire' => $questionnaire->id]) }}" class="btn btn-success btn-sm">{{ __('Add Type Indicator') }}</a>
                            @if(! $questionnaire->typeindicators->isEmpty())
                                <a href="{{ route('questionnaire.typeindicator.index', ['questionnaire' => $questionnaire->id]) }}" class="btn btn-primary btn-sm">{{ __('Edit Type Indicators') }}</a>
                            @endif
                        </td>
                        <td>
                            @if($questionnaire->typeindicators->count() > 1)
                                <a href="{{ route('questionnaire.pair.create', ['questionnaire' => $questionnaire->id]) }}" class="btn btn-success btn-sm">{{ __('Add Pair') }}</a>
                            @endif
                            @if(! $questionnaire->pairs->isEmpty())
                                <a href="{{ route('questionnaire.pair.index', ['questionnaire' => $questionnaire->id]) }}" class="btn btn-primary btn-sm">{{ __('Edit Pairs') }}</a>
                            @endif
                        </td>
                        <td>
                            @if(! $questionnaire->pairs->isEmpty())
                                <a href="{{ route('questionnaire.persontype.create', ['questionnaire' => $questionnaire->id]) }}" class="btn btn-success btn-sm">{{ __('Generate Report') }}</a>
                            @endif
                            @if(! $questionnaire->personTypes->isEmpty())
                                <a href="{{ route('questionnaire.persontype.index', ['questionnaire' => $questionnaire->id]) }}" class="btn btn-primary btn-sm">{{ __('Edit Reports') }}</a>
                            @endif
                        </td>
                        <td>
                            @if(! $questionnaire->pairs->isEmpty())
                                <a href="{{ route('questionnaire.question.create', ['questionnaire' => $questionnaire->id]) }}" class="btn btn-success btn-sm">{{ __('Add Question') }}</a>
                            @endif
                            @if(! $questionnaire->questions->isEmpty())
                                <a href="{{ route('questionnaire.question.index', ['questionnaire' => $questionnaire->id]) }}" class="btn btn-primary btn-sm">{{ __('Edit Questions') }}</a>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">{{ __('No questionnaires have been submitted yet.') }}</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
@endsection
