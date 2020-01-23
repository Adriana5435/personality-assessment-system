@extends('layouts.admin')

@section('heading')
    <h1 class="m-0 text-dark">لیست تراکنش ها</h1>
@endsection

@section('before-content')
    {{$submits->links()}}
@endsection

@section('after-content')
    {{$submits->links()}}
@endsection

@section('content')
    <div class="card-header">
        <h3 class="card-title">فهرست تراکنش ها</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
        <table class="table table-striped">
            <tbody>
            <tr>
                <th>نام کاربر</th>
                <th>پرسشنامه</th>
                <th>قیمت</th>
                <th>کد پیگیری</th>
                <th>وضعیت</th>
                <th>شماره کارت</th>
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
                    <td colspan="6">هنوز تراکنشی انجام نشده است.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
@endsection
