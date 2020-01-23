@extends('layouts.admin')

@section('heading')
    <h1 class="m-0 text-dark">لیست پرسشنامه های برگزار شده</h1>
@endsection

@section('before-content')
    {{$submits->links()}}
@endsection

@section('after-content')
    {{$submits->links()}}
@endsection

@section('content')
    <div class="card-header">
        <h3 class="card-title">فهرست پرسشنامه های تکمیل شده</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
        <table class="table table-striped">
            <tbody>
            <tr>
                <th>نام کاربر</th>
                <th>پرسشنامه</th>
                <th>تیپ شخصیتی</th>
                <th>نتیجه</th>
            </tr>
            @forelse($submits as $submit)
                <tr>
                    <td>{{ $submit->user->name }}</td>
                    <td>{{ $submit->questionnaire->title }}</td>
                    <td>{{ $submit->person_type}}</td>
                    <td><a href="{{ route('admin.report', $submit) }}" class="btn btn-success">نمایش گزارش</a></td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">هنوز پرسشنامه ای توسط کاربران تکمیل نشده است.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->

    <div class="card-header">
        <h3 class="card-title">دانلود اطلاعات کاربران</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
        <a href="{{ route('admin.users.export') }}" class="btn btn-success">Excel</a>
    </div>
@endsection
