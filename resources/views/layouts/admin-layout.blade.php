<!DOCTYPE html>
<html lang="en">
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
	<meta property="og:image" content="https:/fillow.dexignlab.com/xhtml/social-image.png">
	<meta name="format-detection" content="telephone=no">
	
	<!-- PAGE TITLE HERE -->
	<title>Edutestify | Online Examination System</title>
	
	<!-- FAVICONS ICON -->
	{{-- <link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon.png') }}"> --}}
	<link href="{{ asset('vendor/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet">
	<link href="{{ asset('vendor/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('vendor/nouislider/nouislider.min.css') }}">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<link href="{{ asset('vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/multiselect-dropdown.js') }}"></script>
	
	@yield('chart-head')

	<!-- Style css -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <style>
        .multiselect-dropdown{
            width: 100% !important;
        }
    </style>
	
</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
		<div class="lds-ripple">
			<div></div>
			<div></div>
		</div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
		<div class="nav-header">
            <a href="index.html" class="brand-logo">
				<svg class="logo-abbr" width="55" height="55" viewbox="0 0 55 55" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" clip-rule="evenodd" d="M27.5 0C12.3122 0 0 12.3122 0 27.5C0 42.6878 12.3122 55 27.5 55C42.6878 55 55 42.6878 55 27.5C55 12.3122 42.6878 0 27.5 0ZM28.0092 46H19L19.0001 34.9784L19 27.5803V24.4779C19 14.3752 24.0922 10 35.3733 10V17.5571C29.8894 17.5571 28.0092 19.4663 28.0092 24.4779V27.5803H36V34.9784H28.0092V46Z" fill="url(#paint0_linear)"></path>
					<defs>
					</defs>
				</svg>
				<div class="brand-title">
					<h2 class="">EduTestify</h2>
					<span class="brand-sub-title">@&nbsp;{{ Auth::user()->name }}</span>
				</div>
            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->
		
		<!--**********************************
            Header start
        ***********************************-->
        <div class="header border-bottom">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
							<div class="dashboard_bar">
                                Admin Dashboard
                            </div>
                        </div>
                        <ul class="navbar-nav header-right">
							
							<li class="nav-item dropdown  header-profile">
								<a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
									@if(Auth::user()->profile_pic)
										<img src="{{ asset('storage/' . Auth::user()->profile_pic) }}" alt="User Profile Image" style="max-width: 100%; object-fit: cover;">
									@else
										<img src="{{ asset('profile/default.png') }}" alt="Default User Image" style="max-width: 100%;">
									@endif
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<a href="/admin/profile" class="dropdown-item ai-icon">
										<svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
										<span class="ms-2">Profile </span>
									</a>
									<a href="/logout" class="dropdown-item ai-icon">
										<svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
										<span class="ms-2">Logout</a></span>
									</a>
								</div>
							</li>
                        </ul>
                    </div>
				</nav>
			</div>
		</div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="dlabnav">
            <div class="dlabnav-scroll">
				<ul class="metismenu" id="menu">
					
					<li>
						<a class="" href="/admin/dashboard" aria-expanded="false">
							<i class="fas fa-home"></i>
							<span class="nav-text">Dashboard</span>
						</a>
					</li>

                    <li>
						<a class="" href="/admin/subjects" aria-expanded="false">
							<i class="fas fa-book"></i>
							<span class="nav-text">Subject</span>
						</a>
                    </li>
					
                    <li>
						<a class="" href="/admin/exam" aria-expanded="false">
							<i class="fas fa-clipboard-check"></i>
							<span class="nav-text">Exam</span>
						</a>
                    </li>

					<li>
						<a class="" href="{{ route('packageDashboard') }}" aria-expanded="false">
							<i class="fas fa-box-open"></i>
							<span class="nav-text">Exam Package</span>
						</a>
                    </li>

					<li>
						<a class="" href="/admin/marks" aria-expanded="false">
							<i class="fas fa-check"></i>
							<span class="nav-text">Marks</span>
						</a>
                    </li>

                    <li>
						<a class="" href="/admin/qna" aria-expanded="false">
							<i class="fas fa-clipboard-list"></i>
							<span class="nav-text">Questions</span>
						</a>
                    </li>

					<li>
						<a class="" href="/admin/review-exams" aria-expanded="false">
							<i class="fas fa-eye"></i>
							<span class="nav-text">Review Exams</span>
						</a>
                    </li>

                    <li>
						<a class="" href="/admin/students" aria-expanded="false">
							<i class="fas fa-graduation-cap"></i>
							<span class="nav-text">Students</span>
						</a>
                    </li>

					<li>
						<a class="" href="{{ route('paymentDetails') }}" aria-expanded="false">
							<i class="fas fa-rupee-sign"></i>
							<span class="nav-text">Payments</span>
						</a>
                    </li>

                    <li>
						<a class="" href="/logout" aria-expanded="false">
							<i class="fas fa-sign-out-alt"></i>
							<span class="nav-text">Logout</span>
						</a>
                    </li>


                    
                </ul>
			</div>
        </div>
		
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			@yield('space-work')
        </div>

        <!--**********************************
            Content body end
        ***********************************-->
		


		
        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © 2023 EduTestify Education System LLP</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

		<!--**********************************
           Support ticket button start
        ***********************************-->
		
        <!--**********************************
           Support ticket button end
        ***********************************-->

</div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('vendor/global/global.min.js') }}"></script>
	<script src="{{ asset('vendor/chart.js/Chart.bundle.min.js') }}"></script>
	<script src="{{ asset('vendor/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>
	
	<!-- Apex Chart -->
	<script src="{{ asset('vendor/apexchart/apexchart.js') }}"></script>
	
	<script src="{{ asset('vendor/chart.js/Chart.bundle.min.js') }}"></script>
	
	<!-- Chart piety plugin files -->
    <script src="{{ asset('vendor/peity/jquery.peity.min.js') }}"></script>
	<!-- Dashboard 1 -->
	<script src="{{ asset('js/dashboard/dashboard-1.js') }}"></script>
	
	<script src="{{ asset('vendor/owl-carousel/owl.carousel.js') }}"></script>

	<script src="{{ asset('js/apexcharts.min.js') }}"></script>
	
    <script src="{{ asset('js/custom.min.js') }}"></script>
	<script src="{{ asset('js/dlabnav-init.js') }}"></script>
	<script src="{{ asset('js/demo.js') }}"></script>
    <script src="{{ asset('js/styleSwitcher.js') }}"></script>
	<script>
		function cardsCenter()
		{
			
			/*  testimonial one function by = owl.carousel.js */
			
	
			
			jQuery('.card-slider').owlCarousel({
				loop:true,
				margin:0,
				nav:true,
				//center:true,
				slideSpeed: 3000,
				paginationSpeed: 3000,
				dots: true,
				navText: ['<i class="fas fa-arrow-left"></i>', '<i class="fas fa-arrow-right"></i>'],
				responsive:{
					0:{
						items:1
					},
					576:{
						items:1
					},	
					800:{
						items:1
					},			
					991:{
						items:1
					},
					1200:{
						items:1
					},
					1600:{
						items:1
					}
				}
			})
		}
		
		jQuery(window).on('load',function(){
			setTimeout(function(){
				cardsCenter();
			}, 1000); 
		});
		
	</script>

</body>
</html>