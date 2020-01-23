@extends('layouts.admin')

@section('heading')
    <h1 class="m-0 text-dark">ویژگی های تیپ های شخصیتی</h1>
@endsection

@section('content')
    <form method="post" action="{{ route('questionnaire.persontype.store', $questionnaire) }}">
        @csrf
        <div class="card-header">
            <h3 class="card-title">افزودن تیپ شخصیتی برای «{{ $questionnaire->title }}»</h3>
        </div>

        <div class="card-body">
            <div class="form-group">
                <label for="personType">تیپ شخصیتی</label>
                <select id="personType" name="type" class="form-control  @error('type') is-invalid @enderror">
                    <option selected>انتخاب کنید</option>
                    @foreach($personTypes as $personType)
                        <option value="{{ $personType }}" @if(old('type') == $personType) selected @endif>{{ $personType }}</option>
                    @endforeach
                </select>
                @error('type')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label for="reportType">نوع گزارش</label>
                    <select id="reportType" name="report_type" class="form-control  @error('report_type') is-invalid @enderror">
                        @foreach(\App\PersonType::getReportList() as $key => $report)
                            <option value="{{ $key }}">{{$report}}</option>
                        @endforeach
                    </select>
                    @error('report_type')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            @foreach(config('questionnaire.person_type_details') as $key => $detailItem)
                <div class="form-group">
                    <label>{{ $detailItem }}</label>
                    <input type="hidden" name="item[{{ $key }}][]" value="{{ $key }}">
                    <textarea name="item[{{$key}}][]" class="form-control" rows="3" placeholder="{{ $detailItem }}">{{ old('item')[$key][1] }}</textarea>
                </div>
            @endforeach
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary float-left">ذخیره</button>
        </div>
    </form>
@endsection
