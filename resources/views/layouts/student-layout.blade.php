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
	
	<!-- FAVICONS ICON -->
	<link rel="icon" href="{{ asset('favicon/icon.png') }}" type="image/png">
	<link href="{{ asset('vendor/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet">
	<link href="{{ asset('vendor/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('vendor/nouislider/nouislider.min.css') }}">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<link href="{{ asset('vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
	<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
	
	@yield('chart-head')
	
	<!-- Style css -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
	
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
				<svg xmlns="http://www.w3.org/2000/svg" class="logo-abbr" width="5283" height="5246" viewBox="0 0 5283 5246" fill="none">
				  <path fill-rule="evenodd" clip-rule="evenodd" d="M2893.33 3.86714C2881.33 6.93381 225.2 660.534 77.3331 696.8C50.1331 703.467 39.9997 706.667 33.3331 710.267C10.9331 722.4 -1.06695 744 0.266385 769.867C0.933052 782.934 3.99972 791.867 10.9331 802.4C13.0664 805.467 214.933 1008.4 459.6 1253.33L904.4 1698.67L836.133 1988C798.533 2147.07 766.8 2283.73 765.6 2291.6C762.533 2312.4 762.533 2357.2 765.733 2376.67C783.466 2483.47 855.333 2587.33 988 2697.47C1201.47 2874.67 1566.67 3045.47 1984 3163.2C2014.4 3171.73 2088.8 3191.47 2110 3196.53C2251.07 3230.53 2349.47 3250.93 2455.33 3268C2697.33 3307.2 2965.87 3323.87 3162 3312C3281.73 3304.67 3368.67 3292.53 3456.67 3270.53C3591.87 3236.8 3687.73 3189.47 3753.33 3124C3788.67 3088.67 3812.53 3050.8 3825.2 3010C3827.47 3002.67 3842.27 2942 3858.13 2875.33C3874 2808.53 3887.07 2754 3887.2 2753.87C3888.67 2753.07 4193.73 2678.53 4194 2678.93C4194.4 2679.2 4191.6 2688.13 4187.87 2698.8C4164.8 2764.13 4131.07 2867.6 4109.6 2939.33C3984.13 3356.93 3929.6 3712.13 3951.47 3971.33C3960.93 4084.13 3986 4184.4 4022.8 4256.67L4032.13 4275.07L4024.93 4282.53C4009.07 4298.93 3996.13 4322.27 3989.73 4346C3986.53 4358 3986.13 4361.6 3986.13 4382.67C3986.13 4403.73 3986.53 4407.33 3989.73 4419.33C3995.6 4440.93 4005.07 4458.27 4028.27 4490C4039.47 4505.33 4050 4519.87 4051.6 4522.13L4054.53 4526.27L4049.87 4539.47C4043.33 4557.6 4036.53 4584.93 4033.07 4607.33C4029.07 4632.93 4028.67 4689.6 4032.4 4714C4041.6 4773.6 4060.67 4823.47 4092.4 4871.07C4109.07 4896.27 4344.67 5221.07 4350.4 5227.07C4362.13 5239.2 4377.47 5245.33 4395.33 5245.33C4406.93 5245.2 4414.67 5243.6 4424 5238.8C4430.53 5235.6 4600.53 5112.8 4910 4888C4969.07 4844.93 5016.67 4809.47 5020.27 4805.73C5051.47 4772.27 5038 4718.53 4994.27 4701.87C4983.07 4697.6 4951.87 4681.73 4933.47 4671.07C4845.47 4619.6 4770.13 4544.93 4718 4457.33C4702.27 4430.93 4682.13 4406.53 4658.27 4385.2C4586.8 4320.93 4497.73 4286.67 4402.67 4286.67H4383.2L4360 4254.4C4336.53 4222 4324.27 4207.73 4310.67 4197.73C4294.8 4185.87 4272.8 4175.6 4254 4171.2C4239.6 4167.87 4211.07 4167.2 4197.07 4169.87C4177.73 4173.47 4154.13 4182.53 4142.4 4190.8C4140.53 4192.27 4138.4 4193.33 4137.73 4193.33C4136 4193.33 4125.07 4170.13 4118.67 4152.67C4098.53 4098.53 4084.93 4028.53 4078.67 3946.67C4074.67 3896.27 4075.6 3800.27 4080.67 3731.33C4099.47 3477.6 4171.73 3151.6 4283.87 2814.67C4308.67 2740.4 4343.33 2644.13 4346.27 2641.33C4346.8 2640.67 4546.8 2591.2 4790.67 2531.33C5034.53 2471.47 5237.07 2421.33 5240.67 2420.13C5260.67 2413.07 5277.07 2394.4 5281.47 2373.6C5283.6 2363.33 5282.27 2346.53 5278.67 2337.07C5277.07 2332.8 5273.6 2326.4 5270.93 2322.8C5263.6 2313.07 2964.8 17.4671 2956.8 11.8671C2945.07 3.73381 2937.07 1.06714 2922 0.533809C2910.53 0.000475407 2906.53 0.533809 2893.33 3.86714ZM2246.13 1116.67C2470.27 1126.93 2698.13 1170.13 2904.67 1241.6C3211.33 1347.73 3479.87 1510.8 3675.33 1709.47C3795.2 1831.33 3874.13 1956.4 3895.47 2058.13C3899.73 2078.8 3901.33 2113.6 3898.8 2132.53C3897.73 2140.67 3765.33 2706.27 3760.93 2721.73C3760.8 2722.4 3754.8 2715.33 3747.6 2706.13C3712.67 2661.2 3666.4 2614 3615.87 2571.87C3517.6 2490 3394.27 2412.8 3241.2 2337.47C3034.67 2235.73 2802.8 2151.07 2538 2080.67C2504.53 2071.73 2420 2050.93 2366.67 2038.53C2132.67 1984 1892 1954.4 1655.33 1950.8C1530 1948.93 1404.4 1953.33 1309.33 1962.8C1198.93 1973.73 1079.33 2005.73 978 2051.33C967.066 2056.27 956.133 2061.2 953.866 2062.13L949.733 2063.87L951.466 2056.27C952.4 2052.13 983.866 1918.67 1021.2 1759.73C1085.47 1486.53 1089.47 1470 1095.07 1458.27C1131.2 1382 1238.13 1303.47 1389.33 1242.27C1464.93 1211.6 1547.87 1186.27 1631.33 1168.13C1764.13 1139.47 1894.53 1122.8 2037.33 1116.13C2078.93 1114.27 2199.07 1114.53 2246.13 1116.67ZM4229.33 4299.47C4234 4301.33 4242.4 4310.13 4247.07 4318.27C4247.73 4319.2 4242 4322.93 4231.07 4328.67C4198 4346.13 4169.6 4366.67 4143.33 4392.13L4127.33 4407.73L4124.4 4403.6C4122.8 4401.2 4119.6 4396.67 4117.33 4393.33C4113.47 4387.87 4113.2 4386.53 4113.6 4379.6C4114.13 4372.67 4114.67 4371.33 4119.47 4366.8C4124.4 4362 4200.93 4306.13 4210.67 4300.13C4216.27 4296.8 4222 4296.53 4229.33 4299.47ZM4428.67 4424C4487.47 4428.8 4547.47 4456.8 4585.33 4496.93C4603.33 4516.13 4606.8 4520.13 4618.13 4536.8C4657.73 4594.67 4696.53 4640.93 4746.4 4689.6C4773.07 4715.6 4805.07 4743.47 4830.27 4762.67C4838.53 4768.93 4845.2 4774.4 4845.2 4774.8C4845.33 4775.6 4799.6 4809.07 4797.47 4809.6C4795.2 4810.27 4756.8 4775.2 4730.4 4748.13C4715.73 4733.2 4695.6 4711.2 4685.6 4699.33C4665.73 4676.13 4659.87 4670.27 4650.67 4664.93C4632.8 4654.8 4607.87 4654.8 4588.8 4665.07C4574.67 4672.53 4561.6 4689.2 4557.33 4705.2C4553.47 4719.87 4556.67 4742 4564.53 4754.53C4575.33 4771.6 4632.53 4834.27 4665.6 4865.47C4678.27 4877.33 4688.8 4887.47 4688.93 4887.87C4689.07 4888.27 4673.73 4899.87 4654.8 4913.47L4620.27 4938.27L4603.33 4925.2C4526.67 4865.73 4456.4 4795.33 4390.13 4711.47C4372.53 4689.07 4363.73 4682.13 4347.33 4677.87C4339.47 4675.73 4323.07 4675.47 4314.8 4677.47C4297.47 4681.47 4280.67 4695.33 4272.53 4712.67C4268.13 4721.73 4267.47 4724.4 4266.93 4735.87C4265.87 4758 4269.07 4765.6 4290.93 4793.6C4350.27 4869.6 4420.4 4942.53 4494.4 5005.2C4503.33 5012.8 4510.27 5019.6 4509.73 5020.13C4509.2 5020.67 4487.33 5036.53 4461.33 5055.33C4435.33 5074.27 4413.33 5090.13 4412.4 5090.93C4411.33 5091.73 4381.07 5051.07 4308.4 4951.07C4191.73 4790.53 4199.73 4802 4190.93 4785.33C4146.8 4701.73 4155.07 4597.07 4211.87 4521.73C4239.47 4485.07 4280.4 4454.4 4321.47 4439.6C4360.4 4425.47 4391.47 4420.93 4428.67 4424Z" fill="url(#paint0_linear_32_1354)"/>
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
                                Student Dashboard
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
									<a href="/studProfile" class="dropdown-item ai-icon">
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
					
                    <li><a class="" href="/dashboard" aria-expanded="false">
						<i class="fas fa-home"></i>
							<span class="nav-text">Dashboard</span>
						</a>
                    </li>
					
					<li><a class="" href="/studentExams" aria-expanded="false">
						<i class="fas fa-file-alt"></i>
							<span class="nav-text">Free Exam</span>
						</a>
                    </li>
                    
					<li><a class="" href="{{ route('paidExamDashboard') }}" aria-expanded="false">
						<i class="fas fa-file-invoice-dollar"></i>
							<span class="nav-text">Paid Exam</span>
						</a>
                    </li>

					<li><a class="" href="{{ route('paidPackagePlans') }}" aria-expanded="false">
						<i class="fas fa-box-open"></i>
							<span class="nav-text">Paid Package</span>
						</a>
                    </li>

                    <li><a class="" href="{{ route('resultDashboard') }}" aria-expanded="false">
						<i class="fas fa-poll"></i>
							<span class="nav-text">Results</span>
						</a>
                    </li>

                    <li><a class="" href="/logout" aria-expanded="false">
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
        <div class="footer ps-0">
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