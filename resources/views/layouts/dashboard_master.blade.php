<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{env('APP_NAME')}}</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('dashboard-link')}}/images/favicon.png">
	<link rel="stylesheet" href="{{asset('dashboard-link')}}/vendor/chartist/css/chartist.min.css">
    <link href="{{asset('dashboard-link')}}/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
	<link href="{{asset('dashboard-link')}}/vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
	<link href="{{asset('dashboard-link')}}/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="{{asset('dashboard-link')}}/css/style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
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
            <a href="{{route('home')}}" class="brand-logo">
                <img class="logo-abbr" src="{{asset('dashboard-link')}}/images/logo.png" alt="">
                <img class="logo-compact" src="{{asset('dashboard-link')}}/images/logo-text.png" alt="">
                {{-- <img class="brand-title" src="{{asset('dashboard-link')}}/images/logo-text.png" alt=""> --}}
                <h5 class="brand-title">{{env('APP_NAME')}}</h5>
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
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="dashboard_bar">
                            {{-- dashboard_title content start here --}}
                                @yield('dashboard_title')
                            {{-- dashboard_title content end here --}}
                            </div>
                        </div>
                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="javascript:void(0)" role="button" data-toggle="dropdown">
                                    <img src="{{asset('dashboard-link')}}/images/profile/17.jpg" width="20" alt=""/>
									<div class="header-info">
										<span class="text-black"><strong>{{auth()->user()->name}}</strong></span>
										<p class="fs-12 mb-0">Admin</p>
									</div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{asset('dashboard-link')}}/app-profile.html" class="dropdown-item ai-icon">
                                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                    <a href="{{asset('dashboard-link')}}/page-login.html" class="dropdown-item ai-icon"  onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
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
        <div class="deznav">
            <div class="deznav-scroll">
				<ul class="metismenu" id="menu">
                    <li><a class="ai-icon" href="{{route('home')}}" aria-expanded="false">
							<i class="flaticon-381-networking"></i>
							<span class="nav-text">Dashboard</span>
						</a>
                    </li>
                    <li><a class="ai-icon" href="{{route('todo-list.index')}}" aria-expanded="false">
                            <i class="fa fa-list" aria-hidden="true"></i>
							<span class="nav-text">Todo List</span>
						</a>
                    </li>
                    <li><a class="has-arrow" href="#" aria-expanded="false">
                            <i class="fa fa-snowflake-o" aria-hidden="true"></i>
                            <span class="nav-text">Expense Category</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{route('expense.create')}}">Create category</a></li>
                            <li><a href="{{route('expense.index')}}">List</a></li>
                        </ul>
                    </li>
                    <li><a class="ai-icon" href="{{route('wise.expense')}}" aria-expanded="false">
                        <i class="fa fa-sort-amount-asc" aria-hidden="true"></i>
                        <span class="nav-text">Category Wise Expense </span>
                    </a>
                </li>
                </ul>
			</div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
           {{-- main content start here --}}
                @yield('content')
           {{-- main content end here --}}
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="http://dexignzone.com/" target="_blank">DexignZone</a> {{date('Y')}}</p>
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
    <script src="{{asset('dashboard-link')}}/vendor/global/global.min.js"></script>
	<script src="{{asset('dashboard-link')}}/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<script src="{{asset('dashboard-link')}}/vendor/chart.js/Chart.bundle.min.js"></script>
    <script src="{{asset('dashboard-link')}}/js/custom.min.js"></script>
	<script src="{{asset('dashboard-link')}}/js/deznav-init.js"></script>
	<script src="{{asset('dashboard-link')}}/vendor/owl-carousel/owl.carousel.js"></script>
	<script src="{{asset('dashboard-link')}}/vendor/datatables/js/jquery.dataTables.min.js"></script>

	<!-- Chart piety plugin files -->
    <script src="{{asset('dashboard-link')}}/vendor/peity/jquery.peity.min.js"></script>

	<!-- Apex Chart -->
	<script src="{{asset('dashboard-link')}}/vendor/apexchart/apexchart.js"></script>

	<!-- Dashboard 1 -->
	<script src="{{asset('dashboard-link')}}/js/dashboard/dashboard-1.js"></script>
	<script>
		function carouselReview(){
			/*  testimonial one function by = owl.carousel.js */
			jQuery('.testimonial-one').owlCarousel({
				loop:true,
				autoplay:true,
				margin:30,
				nav:false,
				dots: false,
				left:true,
				navText: ['<i class="fa fa-chevron-left" aria-hidden="true"></i>', '<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
				responsive:{
					0:{
						items:1
					},
					484:{
						items:2
					},
					882:{
						items:3
					},
					1200:{
						items:2
					},

					1540:{
						items:3
					},
					1740:{
						items:4
					}
				}
			})
		}
		jQuery(window).on('load',function(){
			setTimeout(function(){
				carouselReview();
			}, 1000);
		});
	</script>
    {{-- dataTable_script start here --}}
    @yield('dataTable_script')
    {{-- dataTable_script end here --}}
</body>
</html>
