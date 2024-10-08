
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
   <meta property="og:image" content="{{ isset($seo['image']) ? $seo['image'] : 'https://autoglass.ng/images/logo/autofactor_logo.png' }}" />
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
													<span class="d-flex align-items-center font-weight-medium ws-nowrap text-3 ps-0"><a href="/cdn-cgi/l/email-protection#dbabb4a9afb49bbfb4b6bab2b5f5b8b4b6" class="text-decoration-none text-color-dark text-color-hover-primary"><i class="icons icon-envelope font-weight-bold position-relative text-4 top-3 me-1"></i> <span class="__cf_email__" data-cfemail="9cecf3eee8f3dcf8f3f1fdf5f2b2fff3f1">[email&#160;protected]</span></a></span>
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
													<a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>
												</li>
												<li class="social-icons-twitter">
													<a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fab fa-x-twitter"></i></a>
												</li>
												<li class="social-icons-linkedin">
													<a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a>
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
											<img alt="Autoglass" width="220" height="58" data-sticky-width="82" data-sticky-height="40" data-sticky-top="84" src="/images/logo/Autoglass_logo2.png">
										</a>
									</div>
									
								
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>

			<div role="main"   class="main">
                @yield('content')
			</div> 

			<footer id="footer" class="border-0 mt-0">
				<hr class="bg-light opacity-2 my-0">
				
				<div class="footer-copyright bg-light py-4">
				<div class="col-md-12 text-center">
                <ul class="pull-center">
                    @foreach($footer_info as $info)
                    <li>
                        <a href="/pages/{{ $info->slug }}">
                            {{ Ucfirst($info->title) }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
					<div class="container py-2">
						<div class="row">
							<div class="col">
								<p class="text-center text-3 mb-0">{{ config('app.name') }} Services © 2024. All Rights Reserved.</p>
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
		<script src="/js/app.js"></script>


	</body>
</html>
