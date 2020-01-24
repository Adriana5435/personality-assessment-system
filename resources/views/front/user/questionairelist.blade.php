<section class="pricing py-5">
    <div class="container">
        <div class="pricing-title">
            <h3>{{ __('Assessments') }}</h3>
            <p>{{ __("Register for the test by selecting one of the options below and clicking the 'Register' button.") }}</p>
        </div>
        <div class="row">
            @forelse($questionnaires as $quest)
                <div class="col-lg-6">
                    <div class="card mb-5 mb-lg-0">
                        <div class="card-body">
                            <h2 class="text-center">{{ $quest->title }}</h2>
                            <hr>
                            <h6 class="card-price text-center">{{ number_format($quest->price) }}<span class="period">{{ __('Rial') }}</span></h6>
                            <hr>
                            <p class="text-center">{{ $quest->description }}</p>
                            <a href="{{ route('front.payment.factor', [$quest->id]) }}" class="btn btn-block btn-primary">{{ __('Register') }}</a>
                        </div>
                    </div>
                </div>
            @empty
                <h1>{{ __('At the moment, there are no questionnaires available.') }}</h1>
            @endforelse
        </div>
    </div>
</section>
