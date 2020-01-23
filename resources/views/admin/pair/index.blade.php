@extends('layouts.admin')

@section('heading')
    <h1 class="m-0 text-dark">
        دوقطبی های «{{ $questionnaire->title }}»
        <a href="{{ route('questionnaire.pair.create', $questionnaire->id) }}" class="btn btn-success btn-lg">افزودن دوقطبی</a>
    </h1>
@endsection

@section('content')
    <div class="card-header">
        <h3 class="card-title">فهرست دوقطبی ها</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
        <table class="table table-striped">
            <tbody>
            <tr>
                <th>عنوان</th>
            </tr>
            @forelse($pairs as $pair)
                <tr>
                    <td><a href="{{ route('questionnaire.pair.edit', [$questionnaire, $pair]) }}">{{ $pair->getPairTitle() }}</a></td>
                </tr>
            @empty
                <tr>
                    <td colspan="1">هنوز دوقطبی ثبت نشده است.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
@endsection
