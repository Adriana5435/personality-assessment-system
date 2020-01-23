@extends('layouts.admin')

@section('heading')
    <h1 class="m-0 text-dark">سوالات</h1>
@endsection

@section('footerScript')
    <script type="text/javascript">
        jQuery(document).ready(function () {
            var pairs = [@foreach($pairs as $pair) {{ $pair->id }}, @endforeach];
            @foreach($pairs as $pair)
                pairs[{{ $pair->id }}] = [{{ $pair->type_indicator_1_id }}, {{ $pair->type_indicator_2_id }}];
            @endforeach

            jQuery('#pairId').change(function () {
                var selectedPair = jQuery('#pairId').val();
                jQuery('#typeIndicator1, #typeIndicator2').each(function () {
                    jQuery(this).find('option').each(function () {
                        jQuery(this).prop('disabled', false);
                        if(parseInt(jQuery(this).val()) !== pairs[selectedPair][0] && parseInt(jQuery(this).val()) !== pairs[selectedPair][1]) {
                            jQuery(this).prop('disabled', true);
                        }
                    });
                });
            });
            $('#pairId').trigger("change");
        });
    </script>
@endsection

@section('content')
    <form method="post" action="{{ route('questionnaire.question.update', ['questionnaire' => $questionnaire, 'question' => $question]) }}">
        @csrf
        @method('put')
        <input type="hidden" value="{{ $questionnaire->id }}" name="questionnaire_id">
        <div class="card-header">
            <h3 class="card-title">افزودن سوال برای «{{ $questionnaire->title }}»</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="pairId">انتخاب دوقطبی مربوط به این سوال</label>
                        <select id="pairId" name="pair_id" class="form-control  @error('pair_id') is-invalid @enderror">
                            @foreach($pairs as $pair)
                                <option value="{{ $pair->id }}" @if($question->pair_id == $pair->id) selected @endif>{{ $pair->getPairTitle() }}</option>
                            @endforeach
                        </select>
                        @error('pair_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-8">
                    <label for="title">متن سوال</label>
                    <input id="title" type="text" name="title" value="{{ $question->title }}" class="form-control  @error('title') is-invalid @enderror" placeholder="متن سوال را وارد کنید">
                    @error('title')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label for="typeIndicator1">تیپ نمای گزینه اول</label>
                        <select id="typeIndicator1" name="type_indicator_1_id" class="form-control  @error('type_indicator_1_id') is-invalid @enderror">
                            @foreach($typeindicators as $typeindicator)
                                <option value="{{ $typeindicator->id }}" @if($question->type_indicator_1_id == $typeindicator->id) selected @endif>{{ $typeindicator->title_fa }}</option>
                            @endforeach
                        </select>
                        @error('type_indicator_1_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="point1">امتیاز گزینه اول</label>
                        <input id="point1" type="number" name="point_first" value="{{ $question->point_first }}" class="form-control  @error('point_first') is-invalid @enderror" placeholder="امتیاز گزینه اول را وارد کنید">
                        @error('point_first')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="option1">متن گزینه اول</label>
                        <input id="option1" type="text" name="option_first" value="{{ $question->option_first }}" class="form-control  @error('option_first') is-invalid @enderror" placeholder="متن گزینه اول را وارد کنید">
                        @error('option_first')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label for="typeIndicator2">تیپ نمای گزینه دوم</label>
                        <select id="typeIndicator2" name="type_indicator_2_id" class="form-control  @error('type_indicator_2_id') is-invalid @enderror">
                            @foreach($typeindicators as $typeindicator)
                                <option value="{{ $typeindicator->id }}" @if($question->type_indicator_2_id == $typeindicator->id) selected @endif>{{ $typeindicator->title_fa }}</option>
                            @endforeach
                        </select>
                        @error('type_indicator_2_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="point2">امتیاز گزینه دوم</label>
                        <input id="point2" type="number" name="point_second" value="{{ $question->point_second }}" class="form-control  @error('point_second') is-invalid @enderror" placeholder="امتیاز گزینه دوم را وارد کنید">
                        @error('point_second')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="option2">متن گزینه دوم</label>
                        <input id="option2" type="text" name="option_second" value="{{ $question->option_second }}" class="form-control  @error('option_second') is-invalid @enderror" placeholder="متن گزینه دوم را وارد کنید">
                        @error('option_second')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary float-left">بروزرسانی</button>
        </div>
    </form>
@endsection
