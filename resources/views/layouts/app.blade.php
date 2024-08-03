
<!DOCTYPE html>
<html lang="en" data-style-switcher-options="{'showBordersStyle': true, 'showLayoutStyle': false, 'showBackgroundColor': false, 'changeLogo': false, 'colorPrimary': '#1c5fa8', 'colorSecondary': '#e36159', 'colorTertiary': '#2baab1', 'colorQuaternary': '#383f48'}">
	<head>
		
		<!-- Basic -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>{{ isset($page_title) ? $page_title .'   '.config('app.name') :  optional($system_settings)->meta_title  }}</title>
		<meta property="og:title" content="{{ isset($seo['page_title']) ? $seo['page_title'] : optional($system_settings)->meta_title }}">
		<meta name="description" content="{{ isset($seo['page_meta_description'])  ? $seo['page_meta_description'] : optional($system_settings)->meta_description }}">
		<meta name="keywords" content="{{  isset($seo['meta_tag_keywords'])  ? $seo['meta_tag_keywords'] : optional($system_settings)->meta_tag_keywords }}" />
		<link rel="canonical" href="{{ Config('app.url') }}">
		<meta name="author" content="Autoglass">

		<!-- Favicon -->
		<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
		<link rel="apple-touch-icon" href="img/apple-touch-icon.png">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

		<!-- Web Fonts  -->		
		 <link id="googleFonts" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800&display=swap" rel="stylesheet" type="text/css">
		<!-- Vendor CSS -->
		<link rel="stylesheet" href="/css/bootstrap.min.css">		
        <link rel="stylesheet" href="/css/all.min.css">		
        <link rel="stylesheet" href="/css/animate.compat.css">		
        <link rel="stylesheet" href="/css/simple-line-icons.min.css">		
        <link rel="stylesheet" href="/css/owl.carousel.min.css">		
        <link rel="stylesheet" href="/css/owl.theme.default.min.css">		
        <link rel="stylesheet" href="/css/magnific-popup.min.css">		
        <link rel="stylesheet" href="/css/star-rating.min.css">		
        <link rel="stylesheet" href="/css/theme.min.css">

		<!-- Theme CSS -->
		<link rel="stylesheet" href="/css/theme.css">
		<link rel="stylesheet" href="/css/theme-elements.css">
		<link rel="stylesheet" href="/css/theme-blog.css">
		<link rel="stylesheet" href="/css/theme-shop.css">

		<!-- Demo CSS -->
		 <link rel="stylesheet" href="/css/demo-auto-services.css">

		<!-- Skin CSS -->
		<link id="skinCSS" rel="stylesheet" href="/css/skin-auto-services.css">

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="/css/custom.css">
		<meta property="og:locale" content="en_US">
		<meta property="og:type" content="{{ isset($seo['type']) ? $seo['type'] : 'website' }}">
		<meta property="og:site_name" content="Autofactorng">
		<meta property="og:url" content="{{ isset($seo['url']) ? $seo['url'] : 'https://autoglass.ng' }}">
		<meta property="og:description" content="{{ isset($seo['page_meta_description']) ? $seo['page_meta_description'] : optional($system_settings)->meta_description }}">
		<meta property="og:image:width" content="720" />
		<meta property="og:image:height" content="700" />
		<meta property="og:image:type" content="image/jpeg" />
		<meta property="og:image" content="{{ isset($seo['image']) ? $seo['image'] : 'https://autoglass.ng/images/logo/Autoglass_logo2.png' }}" />
		<meta name="twitter:site" content="@autofactorng">
		<meta name="twitter:card" content="summary_large_image">
		<meta name="twitter:title" content="{{ isset($seo['title']) ? $seo['title'] : optional($system_settings)->meta_title }}">
		<meta name="twitter:description" content="{{ isset($seo['page_meta_description']) ? $seo['page_meta_description'] : optional($system_settings)->meta_description }}">
		<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">



		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-42715764-11"></script>
		<script>
		  
		</script>

	</head>
	<body>

		<div class="body">
			<div class="notice-top-bar bg-primary" data-sticky-start-at="100">
				<button class="hamburguer-btn hamburguer-btn-light notice-top-bar-close m-0 active" data-set-active="false">
					<span class="close">
						<span></span>
						<span></span>
					</span>
				</button>
				<!-- <div class="container">
					<div class="row justify-content-center py-2">
						<div class="col-9 col-md-12 text-center">
							<p class="text-color-light mb-0"><strong>DEAL OF THE WEEK</strong> - Free Diagnosis & Break Checks - <strong><a href="#" class="text-color-light text-decoration-none custom-text-underline-1">Make an Appointment</a></strong></p>
						</div>
					</div>
				</div> -->
			</div>
			<header id="header" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': false, 'stickyStartAt': 54, 'stickySetTop': '-54px', 'stickyChangeLogo': false}">
				<div class="header-body header-body-bottom-border-fixed box-shadow-none border-top-0">
					<div class="header-top header-top-small-minheight header-top-simple-border-bottom">
						<div class="container py-2">
							<div class="header-row justify-content-between">
								<div class="header-column col-auto px-0">
									<div class="header-row">
										<div class="header-nav-top">
											<ul class="nav nav-pills position-relative">
												<li class="nav-item d-none d-sm-block">
													<span class="d-flex align-items-center font-weight-medium ws-nowrap text-3 ps-0"><a href="/cdn-cgi/l/email-protection#dbabb4a9afb49bbfb4b6bab2b5f5b8b4b6" class="text-decoration-none text-color-dark text-color-hover-primary"><i class="icons icon-envelope font-weight-bold position-relative text-4 top-3 me-1"></i> 
													<span >{{ $system_settings->email }}</span>
												</a></span>
												</li>
												<li class="nav-item nav-item-left-border nav-item-left-border-remove nav-item-left-border-sm-show">
													<span class="d-flex align-items-center font-weight-medium text-color-dark ws-nowrap text-3"><i class="icons icon-clock font-weight-bold position-relative text-3 top-1 me-2"></i> Mon - Sat 9:00am - 6:00pm</span>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="header-column justify-content-end col-auto px-0 d-none d-md-flex">
									<div class="header-row">
										<nav class="header-nav-top">
											<ul class="header-social-icons social-icons social-icons-clean social-icons-icon-gray social-icons-medium custom-social-icons-divider">
												<li class="social-icons-facebook">
													<a href="https://www.facebook.com/autoglasss" target="_blank" title="Facebook">
													<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
														<path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
													</svg>
												</a>
												</li>
											
												<li class="social-icons-linkedin">
													<a href="https://www.instagram.com/autoglass" target="_blank" title="Linkedin">

													<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
														<path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
													</svg>
													</a>
												</li>
											</ul>
										</nav>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="header-container container">
						<div class="header-row">
							<div class="header-column w-100">
								<div class="header-row justify-content-between">
									<div class="header-logo z-index-2 col-lg-2 px-0">
										<a href="/">
											<img alt="Autoglass" width="220" height="48" data-sticky-width="82" data-sticky-height="40" data-sticky-top="84" src="/images/logo/Autoglass_logo2.png">
											
										</a>
									</div>
									<div class="header-nav header-nav-links justify-content-end pe-lg-4 me-lg-3">
										<div class="header-nav-main header-nav-main-arrows header-nav-main-dropdown-no-borders header-nav-main-effect-3 header-nav-main-sub-effect-1">
											<nav class="collapse">
												<ul class="nav nav-pills" id="mainNav">
													<li><a href="/book-appointment" class="nav-link font-weight-bold me-4 text-color-dark">Book Appointment</a></li>
												
													<li><a href="/pages/about-us" class="nav-link font-weight-bold me-4 text-color-dark">About Us</a></li>
													<li><a href="/pages/services" class="nav-link font-weight-bold me-4 text-color-dark">Services</a></li>
													<li><a href="/pages/what-will-it-cost" class="nav-link font-weight-bold me-4 text-color-dark">What will it cost</a></li>
												</ul>
											</nav>
										</div>
									</div>
									<ul class="header-extra-info custom-left-border-1 d-none d-xl-block">
										<li class="d-none d-sm-inline-flex ms-0">
											<div class="header-extra-info-icon">
												<i class="icons icon-phone text-3 text-color-dark position-relative top-3"></i>
											</div>
											<div class="header-extra-info-text line-height-2">
												<span class="text-1 font-weight-semibold text-color-default">CALL US NOW</span>
												<strong class="text-4"><a href="tel:{{ $system_settings->phone }}" class="text-color-hover-primary text-decoration-none">{{ $system_settings->phone }}</a></strong>
											</div>
										</li>
									</ul>
									
									<button class="btn header-btn-collapse-nav ms-4" data-bs-toggle="collapse" data-bs-target=".header-nav-main nav">
										<i class="fas fa-bars"></i>
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>

			<div role="main" id="app"  class="main">
				
                @yield('content')

			</div> 

			

			<footer id="footer" class=" mt-0">
				<div class="container">
				<div class="row ">
			@foreach($footer_info as $info)
			<div class="col-sm-6 col-6 col-lg-6 mt-3">
				<div class="widget">
					<h2 class="widget-title text-white mb-0 font-weight-bold ">{{ Ucfirst($info->name) }}</h2>
					@if($info->children->count())
					<ul class="links text-secondry list-unstyled  text-white">
						@foreach($info->children as $info)
						<li class="py-1  text-white mb-0">
							<a class=" text-white font-weight-bold " href="{{ $info->c_link }}">
								{{ $info->name }}
							</a>
						</li>
						@endforeach
					</ul>
					@endif

				</div><!-- End .widget -->
			</div><!-- End .col-sm-6 -->
			@endforeach


             </div><!-- End .row -->
				</div>
			
				<div id="footer" class="foot text-white  ">
				
					<div class="container py-2">
						<div class="row">
							<div class="col">
								<p class="text-center  text-white  text-3 mb-0">{{ config('app.name') }} Services © 2024. All Rights Reserved.</p>
							</div>
						</div>
					</div>
				</div>
			</footer>

		</div>

				

		<!-- Vendor -->		
         <script data-cfasync="false" src="/js/email-decode.min.js"></script>
        <script src="/js/plugins.min.js"></script>	
        <script src="/js/star-rating.min.js"></script>	
        <script src="/js/theme.min.js"></script>
		<script src="/js/theme.js"></script>
		<script src="/js/views/view.contact.js"></script>
		<script src="/js/views/view.shop.js"></script>
		<script src="/js/demos/demo-auto-services.js"></script>
		<script src="/js/theme.init.js"></script>
	


	</body>
</html>
