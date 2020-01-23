@extends('layouts.admin')

@section('heading')
    <h1 class="m-0 text-dark">
        تیپ نماهای «{{ $questionnaire->title }}»
        <a href="{{ route('questionnaire.typeindicator.create', $questionnaire->id) }}" class="btn btn-success btn-lg">افزودن تیپ نما</a>
    </h1>
@endsection

@section('content')
    <div class="card-header">
        <h3 class="card-title">فهرست تیپ نماها</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
        <table class="table table-striped">
            <tbody>
            <tr>
                <th>عنوان فارسی</th>
                <th>عنوان انگلیسی</th>
                <th>نماد</th>
            </tr>
            @forelse($typeindicators as $typeindicator)
                <tr>
                    <td><a href="{{ route('questionnaire.typeindicator.edit', [$questionnaire->id, $typeindicator->id]) }}">{{ $typeindicator->title_fa }}</a></td>
                    <td>{{ $typeindicator->title_en }}</td>
                    <td>{{ $typeindicator->symbol }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">هنوز تیپ نمایی ثبت نشده است.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
@endsection
