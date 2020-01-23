@extends('layouts.admin')

@section('heading')
    <h1 class="m-0 text-dark">
        تیپ های شخصیتی
        <a href="{{ route('questionnaire.persontype.create', ['questionnaire' => $questionnaire]) }}" class="btn btn-success btn-lg">افزودن تیپ شخصیتی</a>
    </h1>
@endsection

@section('content')
    <div class="card-header">
        <h3 class="card-title">فهرست تیپ های شخصیتی</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
        <table class="table table-striped">
            <tbody>
            <tr>
                <th>عنوان</th>
            </tr>
            @forelse($personTypes as $personType)
                <tr>
                    <td>
                        <a href="{{ route('questionnaire.persontype.edit', [$questionnaire, $personType]) }}">{{ $personType->type }}</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="1">هنوز تیپ شخصیتی ثبت نشده است.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
@endsection
