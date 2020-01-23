<section class="pricing py-5">
    <div class="container">
        <div class="pricing-title">
            <h3>آزمون ها</h3>
            <p>برای شرکت در آزمون یکی از گزینه های زیر را انتخاب و بر روی دکمه ثبت نام کلیک کنید.</p>
        </div>
        <div class="row">
            @forelse($questionnaires as $quest)
                <div class="col-lg-6">
                    <div class="card mb-5 mb-lg-0">
                        <div class="card-body">
                            <h2 class="text-center">{{ $quest->title }}</h2>
                            <hr>
                            <h6 class="card-price text-center">{{ number_format($quest->price) }}<span class="period">ریال</span></h6>
                            <hr>
                            <p class="text-center">{{ $quest->description }}</p>
                            <a href="{{ route('front.payment.factor', [$quest->id]) }}" class="btn btn-block btn-primary">ثبت نام</a>
                        </div>
                    </div>
                </div>
            @empty
                <h1>در حال حاضر پرسشنامه ای وجود ندارد.</h1>
            @endforelse
        </div>
    </div>
</section>
