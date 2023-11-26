@extends('layouts.layout_common')
@section('section-head')
<title>Reset Password | EduTestify OES</title>
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
									{{-- <div class="text-center mb-3">
										<a href="index.html"><img src="images/logo-full.png" alt=""></a>
									</div> --}}
                                    <h3 class="text-center mb-4 fw-bold">Forgot Password</h3>
                                    @if ($errors->any())
                                        @foreach ($errors->all() as $error)
                                            <p style="color:#ff0000;">{{ $error }}</p>
                                        @endforeach
                                    @endif


                                    @if (Session::has('error'))
                                        <p style="color:#ff0000;">{{ Session::get('error') }}</p>
                                    @endif

                                    @if (Session::has('success'))
                                        <p style="color:green;">{{ Session::get('success') }}</p>
                                    @endif
                                    <form action="{{ route('forgotPassword') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label><strong>Email</strong></label>
                                            <input type="email" name="email" class="form-control" placeholder="Enter Email">
                                        </div>
                                        <div class="text-center">
                                            <input type="submit" class="btn btn-primary btn-block" value="Send Link">
                                            {{-- <button type="submit" >SUBMIT</button> --}}
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/dlabnav-init.js"></script>
	<script src="js/styleSwitcher.js"></script>
</body>
</html>
@endsection