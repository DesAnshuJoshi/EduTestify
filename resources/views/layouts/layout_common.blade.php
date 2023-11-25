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
	
	<!-- Style css -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    @yield('space-work')


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('vendor/global/global.min.js') }}"></script>
	<script src="{{ asset('vendor/chart.js/Chart.bundle.min.js') }}"></script>
	<script src="{{ asset('vendor/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>
	
	<!-- Apex Chart -->
	<script src="{{ asset('vendor/apexchart/apexchart.js') }}"></script>
	<script src="{{ asset('js/apexcharts.min.js') }}"></script>
	
	<script src="{{ asset('vendor/chart.js/Chart.bundle.min.js') }}"></script>
	
	<!-- Chart piety plugin files -->
    <script src="{{ asset('vendor/peity/jquery.peity.min.js') }}"></script>
	<!-- Dashboard 1 -->
	<script src="{{ asset('js/dashboard/dashboard-1.js') }}"></script>
	
	<script src="{{ asset('vendor/owl-carousel/owl.carousel.js') }}"></script>
	
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