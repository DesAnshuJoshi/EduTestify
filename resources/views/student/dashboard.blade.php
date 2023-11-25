@extends('layouts/student-layout')
@section('chart-head')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
@endsection
@section('space-work')
    <!--**********************************
            Content body start
        ***********************************-->
            <!-- row -->
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-12">
						<div class="row">
                            <div class="col-xl-12">
                                <div class="card tryal-gradient">
                                    <div class="card-body tryal row pt-3 pb-3">
                                        <div class="col-xl-8 col-sm-6">
                                            <h2>Streamline Your Online Examinations with EduTestify</h2>
                                            <span class="mt-2 mb-2">Empower EduTestify to Automatically Manage Your Online Examinations with Cutting-Edge Technology</span>
                                        </div>
                                        <div class="col-xl-4 col-sm-6 text-right d-flex align-items-center justify-content-end"> <!-- Use 'text-right' to align content to the right and 'd-flex align-items-center' to vertically center the button -->
                                            <a href="javascript:void(0);" class="btn btn-rounded fs-18 font-w500">Explore Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-xl-12">
								<div class="row">
                                    {{-- Counters --}}
									<div class="col-xl-12">
										<div class="row">
											<div class="col-xl-3 col-sm-6">
												<div class="card">
													<div class="card-body d-flex justify-content-between align-items-center">
														<div>
															<h2 class="fs-32 font-w700">{{ $freeExam }}</h2>
															<span class="fs-18 font-w500 d-block">Total Free Exams</span>
														</div>
														<div>
															<i class="fas fa-file-alt text-primary" style="font-size: 3rem;"></i>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-3 col-sm-6">
												<div class="card">
													<div class="card-body d-flex justify-content-between align-items-center">
														<div>
															<h2 class="fs-32 font-w700">{{ $paidExam }}</h2>
															<span class="fs-18 font-w500 d-block">Total Paid Exams</span>
														</div>
														<div>
															<i class="fas fa-file-invoice-dollar text-primary" style="font-size: 3rem;"></i>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-3 col-sm-6">
												<div class="card">
													<div class="card-body d-flex justify-content-between align-items-center">
														<div>
															<h2 class="fs-32 font-w700">{{ $attemptedExamsCount }}</h2>
															<span class="fs-18 font-w500 d-block">Total Exams Attempted</span>
														</div>
														<div>
															<i class="fas fa-clipboard-check text-primary" style="font-size: 3rem;"></i>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-3 col-sm-6">
												<div class="card">
													<div class="card-body d-flex justify-content-between align-items-center">
														<div>
															<h2 class="fs-32 font-w700">{{ $package }}</h2>
															<span class="fs-18 font-w500 d-block">Total Packages</span>
														</div>
														<div>
															<i class="fas fa-box-open text-primary" style="font-size: 3rem;"></i>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-3 col-sm-6">
												<div class="card">
													<div class="card-body d-flex justify-content-between align-items-center">
														<div>
															<h2 class="fs-32 font-w700">{{ $topScore }}</h2>
															<span class="fs-18 font-w500 d-block">Best Score</span>
														</div>
														<div>
															<i class="fas fa-award text-primary" style="font-size: 3rem;"></i>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="col-xl-12">
								<div class="row">
									<div class="col-xl-12 col-lg-12 col-sm-12">
										<div class="card">
											<div class="card-header">
												<h4 class="card-title">Exam wise marks</h4>
											</div>
											<div class="card-body">
												<div id="examMarks"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-6 col-lg-12">
								<div class="card">
									<div class="card-header border-0">
										<div>
											<h4 class="fs-20 font-w700">Last Transaction</h4>
											<span>This list shows last 5 transaction of yours</span>
										</div>
									</div>
									<div class="card-body px-0">
									@foreach($paymentData as $payment)
										<div class="msg-bx d-flex justify-content-between align-items-center">
											<div class="msg d-flex align-items-center w-100 ps-2">
												<div class="rounded-circle bg-primary d-flex align-items-center justify-content-center" style="width: 55px; height: 50px;">
													<i style="color: #fff; font-size: 20px;" class="fas fa-shopping-bag"></i>
												</div>

												<div class="ms-3 w-100">
													<h4 class="fs-18 font-w600">{{ $payment['exam_name'] }}</h4>
													<div class="d-flex justify-content-between">
														<span class="me-auto">{{ $payment['transaction_id'] }}</span>
														<span class="me-4 fs-12">{{ $payment['time_ago'] }}</span>
													</div>
												</div>
											</div>
										</div>
									@endforeach
									</div>
								</div>
							</div>
							<div class="col-xl-6">
								<div class="row">
									<div class="col-xl-12 col-lg-12 col-sm-12">
										<div class="card">
											<div class="card-header">
												<h4 class="card-title">Exam wise Attempts</h4>
											</div>
											<div class="card-body">
												<div id="examAttempts"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							

					</div>
				</div>
			</div>
        <!--**********************************
            Content body end
        ***********************************-->
	<script>
		document.addEventListener("DOMContentLoaded", function () {
		// Chart options
		var exams = @json($examNames);
		var marks = @json($examMarks);
		var options = {
          series: [{
          name: 'Exam Marks',
          data: marks
        }],
          chart: {
          type: 'bar',
          height: 350
        },
        plotOptions: {
          bar: {
			borderRadius: 15,
            horizontal: false,
            columnWidth: '55%',
            endingShape: 'rounded'
          },
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          show: true,
          width: 2,
          colors: ['transparent']
        },
        xaxis: {
          categories: exams,
        },
        yaxis: {
          title: {
            text: 'Marks'
          }
        },
        fill: {
          opacity: 1
        },
        };

		// Render the chart
		var chart = new ApexCharts(document.querySelector("#examMarks"), options);
		chart.render();
		
		
		//CHART TWO | EXAM WISE ATTEMPT COUNT
		var exam_names = @json($examNames);
		var exam_attempts = @json($attemptCounts);
		
		// Function to generate a random color
		function getRandomColor() {
			var letters = '0123456789ABCDEF';
			var color = '#';
			for (var i = 0; i < 6; i++) {
				color += letters[Math.floor(Math.random() * 16)];
			}
			return color;
		}

		// Generate an array of random colors for each slice
		var randomColors = exam_names.map(function () {
			return getRandomColor();
		});
		
		var options = {
			series: exam_attempts,
			chart: {
				width: 600,
				height: 600, // Set the height of the chart
				type: 'pie',
			},
			labels: exam_names,
			colors: randomColors,
			responsive: [{
				breakpoint: 480,
				options: {
					chart: {
						width: 300,
						height: 300, // Set the height for responsive mode
					},
					legend: {
						position: 'bottom',
					},
					plotOptions: {
						pie: {
							customScale: 2.0,
						},
					},
				},
			}],
		};

		var chart = new ApexCharts(document.querySelector("#examAttempts"), options);
		chart.render();

	});
	</script>
@endsection

		