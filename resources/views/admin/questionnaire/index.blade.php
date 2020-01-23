@extends('layouts.admin')

@section('heading')
    <h1 class="m-0 text-dark">
        پرسشنامه
        <a href="{{ route('questionnaire.create') }}" class="btn btn-success btn-lg">افزودن پرسشنامه</a>
    </h1>
@endsection

@section('content')
    <div class="card-header">
        <h3 class="card-title">فهرست پرسشنامه ها</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
        <table class="table table-striped">
            <tbody>
                <tr>
                    <th>عنوان</th>
                    <th>قیمت</th>
                    <th>تیپ نماها</th>
                    <th>دوقطبی ها</th>
                    <th>گزارش</th>
                    <th>سوالات</th>
                </tr>
                @forelse($questionnaires as $questionnaire)
                    <tr>
                        <td><a href="{{ route('questionnaire.edit', ['questionnaire' => $questionnaire->id]) }}">{{ $questionnaire->title }}</a></td>
                        <td>{{ number_format($questionnaire->price) }}</td>
                        <td>
                            <a href="{{ route('questionnaire.typeindicator.create', ['questionnaire' => $questionnaire->id]) }}" class="btn btn-success btn-sm">افزودن تیپ نما</a>
                            @if(! $questionnaire->typeindicators->isEmpty())
                                <a href="{{ route('questionnaire.typeindicator.index', ['questionnaire' => $questionnaire->id]) }}" class="btn btn-primary btn-sm">ویرایش تیپ نماها</a>
                            @endif
                        </td>
                        <td>
                            @if($questionnaire->typeindicators->count() > 1)
                                <a href="{{ route('questionnaire.pair.create', ['questionnaire' => $questionnaire->id]) }}" class="btn btn-success btn-sm">افزودن دوقطبی</a>
                            @endif
                            @if(! $questionnaire->pairs->isEmpty())
                                <a href="{{ route('questionnaire.pair.index', ['questionnaire' => $questionnaire->id]) }}" class="btn btn-primary btn-sm">ویرایش دوقطبی ها</a>
                            @endif
                        </td>
                        <td>
                            @if(! $questionnaire->pairs->isEmpty())
                                <a href="{{ route('questionnaire.persontype.create', ['questionnaire' => $questionnaire->id]) }}" class="btn btn-success btn-sm">ساخت گزارش</a>
                            @endif
                            @if(! $questionnaire->personTypes->isEmpty())
                                <a href="{{ route('questionnaire.persontype.index', ['questionnaire' => $questionnaire->id]) }}" class="btn btn-primary btn-sm">ویرایش گزارش ها</a>
                            @endif
                        </td>
                        <td>
                            @if(! $questionnaire->pairs->isEmpty())
                                <a href="{{ route('questionnaire.question.create', ['questionnaire' => $questionnaire->id]) }}" class="btn btn-success btn-sm">افزودن سوال</a>
                            @endif
                            @if(! $questionnaire->questions->isEmpty())
                                <a href="{{ route('questionnaire.question.index', ['questionnaire' => $questionnaire->id]) }}" class="btn btn-primary btn-sm">ویرایش سوالات</a>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">هنوز پرسشنامه ای ثبت نشده است.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
@endsection
