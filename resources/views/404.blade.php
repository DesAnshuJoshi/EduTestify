@extends('layouts/layout_common')

@section('section-head')
<title>404 | EduTestify OES</title>
@endsection

@section('space-work')
<div class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-7">
                    <div class="form-input-content text-center error-page">
                        <h1 class="error-text fw-bold">404</h1>
                        <h4><i class="fa fa-exclamation-triangle text-warning"></i> The page you were looking for is not found!</h4>
                        <p>You may have mistyped the address or the page may have moved.</p>
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