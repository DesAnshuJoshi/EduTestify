@extends('layouts/layout_common')

@section('space-work')
<div class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-7">
                    <div class="form-input-content text-center error-page">
                        @if ($message == '0')
                        <h1 class="error-text fw-bold">Thank You!</h1>
                        <h4><i class="fa fa-thumbs-up text-success"></i> Your payment completed successfully!</h4>
                        @else
                        <h1 class="error-text fw-bold">Ruh Oh!</h1>
                        <h4><i class="fa fa-thumbs-down text-danger"></i> Your payment has failed.</h4>
                        @endif
                        
                        <p id="countdown">
                            If not redirected in <span id="timer">3</span> seconds.&nbsp;<a class="badge light badge-primary" href="/">Click Here</a>
                        </p>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Required vendors -->
<script src="{{ asset('vendor/global/global.min.js') }}"></script>
<script src="{{ asset('js/custom.min.js') }}"></script>
<script src="{{ asset('js/dlabnav-init.js') }}"></script>
<script src="{{ asset('js/styleSwitcher.js') }}"></script>
<script>
    let timeLeft = 3;
    const countdown = document.getElementById('timer');
    
    function updateTimer() {
        countdown.textContent = timeLeft;
        if (timeLeft === 0) {
            window.open("{{URL::to('/')}}/paid-exams", '_self');
        } else {
            timeLeft--;
            setTimeout(updateTimer, 1000);
        }
    }
    
    setTimeout(updateTimer, 1000);
</script>
@endsection