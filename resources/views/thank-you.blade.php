@extends('layouts/layout_common')

@section('space-work')
<div class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-7">
                    <div class="form-input-content text-center error-page">
                        <h1 class="error-text fw-bold">Thank You!</h1>
                        <h4><i class="fa fa-circle-check"></i> Your Exam was submitted successfully!</h4>
                        <p>We will let you know the results via email. Keep a look!</p>
                        <div>
                            <a class="btn btn-primary" href="/">Back to Home</a>
                        </div>
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
@endsection