@extends('layouts.admin')

@section('heading')
    <h1 class="m-0 text-dark">
        {{ __('Pairs for') }} «{{ $questionnaire->title }}»
        <a href="{{ route('questionnaire.pair.create', $questionnaire->id) }}" class="btn btn-success btn-lg">افزودن دوقطبی</a>
    </h1>
@endsection

@section('content')
    <div class="card-header">
        <h3 class="card-title">{{ __('List of Pairs') }}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
        <table class="table table-striped">
            <tbody>
            <tr>
                <th>{{ __('Title') }}</th>
            </tr>
            @forelse($pairs as $pair)
                <tr>
                    <td><a href="{{ route('questionnaire.pair.edit', [$questionnaire, $pair]) }}">{{ $pair->getPairTitle() }}</a></td>
                </tr>
            @empty
                <tr>
                    <td colspan="1">{{ __('No pairs have been added yet.') }}</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
@endsection
