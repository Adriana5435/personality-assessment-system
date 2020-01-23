@extends('layouts.admin')

@section('heading')
    <h1 class="m-0 text-dark">
        سوالات
        <a href="{{ route('questionnaire.question.create', ['questionnaire' => $questionnaire]) }}" class="btn btn-success btn-lg">افزودن سوال</a>
    </h1>
@endsection

@section('content')
    <div class="card-header">
        <h3 class="card-title">فهرست سوالات</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
        <table class="table table-striped">
            <tbody>
            <tr>
                <th>دوقطبی</th>
                <th>عنوان</th>
            </tr>
            @forelse($questions as $question)
                <tr>
                    <td>
                        <div>{{ $question->pair->getPairTitle() }}</div>
                        <div>
                            <span>{{ $question->typeIndicator1->title_fa }} ({{ $question->typeIndicator1->symbol }})</span><br>
                            <span>{{ $question->typeIndicator2->title_fa }} ({{ $question->typeIndicator2->symbol }})</span>
                        </div>
                    </td>
                    <td>
                        <div><a href="{{ route('questionnaire.question.edit', ['questionnaire' => $questionnaire, 'question' => $question]) }}">{{ $question->title }}</a></div>
                        <div>
                            <span>[ {{ $question->point_first }} ] {{ $question->option_first }}</span><br>
                            <span>[ {{ $question->point_second }} ] {{ $question->option_second }}</span>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">هنوز سوالی ثبت نشده است.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
@endsection
