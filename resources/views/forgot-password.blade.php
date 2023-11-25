@extends('layouts.layout_common')
@section('space-work')
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="robots" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
	<meta property="og:title" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
	<meta property="og:description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
	<meta property="og:image" content="https://fillow.dexignlab.com/xhtml/social-image.png">
	<meta name="format-detection" content="telephone=no">
	
	<!-- PAGE TITLE HERE -->
	<title>Admin Dashboard</title>
	
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="images/favicon.png">
    <link href="css/style.css" rel="stylesheet">

</head>
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