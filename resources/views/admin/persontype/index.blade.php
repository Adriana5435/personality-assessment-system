@extends('layouts.admin')

@section('heading')
    <h1 class="m-0 text-dark">
        {{ __('Personality Types') }}
        <a href="{{ route('questionnaire.persontype.create', ['questionnaire' => $questionnaire]) }}" class="btn btn-success btn-lg">{{ __('Add Personality Type') }}</a>
    </h1>
@endsection

@section('content')
    <div class="card-header">
        <h3 class="card-title">{{ __('List of Personality Types') }}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
        <table class="table table-striped">
            <tbody>
            <tr>
                <th>{{ __('Title') }}</th>
            </tr>
            @forelse($personTypes as $personType)
                <tr>
                    <td>
                        <a href="{{ route('questionnaire.persontype.edit', [$questionnaire, $personType]) }}">{{ $personType->type }}</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="1">{{ __('No personality types have been added yet.') }}</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
@endsection
