@extends('layouts.layout_common')

@section('section-head')
<link rel="icon" href="{{ asset('favicon/icon.png') }}" type="image/png">
<title>Login | EduTestify OES</title>
@endsection

@section('space-work')
<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									<div class="text-center mb-3">
										<a href="index.html" class="h1">EduTestify | Login</a>
									</div>
                                    <h4 class="text-center mb-4">Sign in your account</h4>

                                        @if ($errors->any())
                                            @foreach ($errors->all() as $error)
                                                <p style="color:#ff0000;">{{ $error }}</p>
                                            @endforeach
                                        @endif

                                        @if (Session::has('error'))
                                            <p style="color:#ff0000;">{{ Session::get('error') }}</p>
                                        @endif

                                        <form action="{{ route('userLogin') }}" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label class="mb-1"><strong>Email</strong></label>
                                                <input type="email" name="email" class="form-control" placeholder="Enter Email">
                                            </div>
                                            <div class="mb-3">
                                                <label class="mb-1"><strong>Password</strong></label>
                                                <input type="password" name="password" class="form-control" placeholder="Enter Password">
                                            </div>
                                            <div class="row d-flex justify-content-between mt-4 mb-2">
                                                {{-- <div class="mb-3">
                                                   <div class="form-check custom-checkbox ms-1">
                                                        <input type="checkbox" class="form-check-input" id="basic_checkbox_1">
                                                        <label class="form-check-label" for="basic_checkbox_1">Agree to </label>
                                                    </div>
                                                </div> --}}
                                                <div class="mb-3">
                                                    <a href="/forgot-password">Forgot Password?</a>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <input type="submit" class="btn btn-primary btn-block" value="Login"><br><br>
                                            </div>
                                        </form>
                                    <div class="new-account mt-3">
                                        <p>Don't have an account? <a class="text-primary" href="/register">Sign up</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

    <!--**********************************
        Scripts
    ***********************************-->
    
    <script src="{{ asset('vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('js/custom.min.js') }}"></script>
    <script src="{{ asset('js/dlabnav-init.js') }}"></script>
	<script src="{{ asset('js/styleSwitcher.js') }}"></script>
</body>
</html>