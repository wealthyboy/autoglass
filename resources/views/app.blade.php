<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>{{ isset($page_title) ? $page_title .'   '.config('app.name') :  optional($system_settings)->meta_title  }}</title>
        <meta property="og:title" content="{{ isset($seo['page_title']) ? $seo['page_title'] : optional($system_settings)->meta_title }}">
        <meta name="description" content="{{ isset($seo['page_meta_description'])  ? $seo['page_meta_description'] : optional($system_settings)->meta_description }}">
        <meta name="keywords" content="{{  isset($seo['meta_tag_keywords'])  ? $seo['meta_tag_keywords'] : optional($system_settings)->meta_tag_keywords }}" />
        <link rel="canonical" href="{{ Config('app.url') }}">
        <meta name="author" content="AuofactorNG">

        <link rel="preload" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" as="style" onload="this.onload=null;this.rel='stylesheet'">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="/images/favicon_io/favicon-32x32.png">
        <link rel="shortcut icon" type="image/x-icon" href="/images/favicon_io/favicon.ico">
        <link rel="icon" href="/images/favicon_io/favicon.ico" type="image/x-icon">
        <link rel="apple-touch-icon" href="/images/favicon_io/favicon-96x96.png">
        <!-- Main CSS File -->
 
        
        <meta property="og:locale" content="en_US">
        <meta property="og:type" content="{{ isset($seo['type']) ? $seo['type'] : 'website' }}">
        <meta property="og:site_name" content="Autoglass">
        <meta property="og:url" content="{{ isset($seo['url']) ? $seo['url'] : 'https://autoglass.ng' }}">
        <meta property="og:description" content="{{ isset($seo['page_meta_description']) ? $seo['page_meta_description'] : optional($system_settings)->meta_description }}">
        <meta property="og:image:width" content="720" />
        <meta property="og:image:height" content="700" />
        <meta property="og:image:type" content="image/jpeg" />
        <meta property="og:image" content="{{ isset($seo['image']) ? $seo['image'] : 'https://autoglass.ng/images/logo/autofactor_logo.png' }}" />
        <meta name="twitter:site" content="@autofactorng">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{ isset($seo['title']) ? $seo['title'] : optional( $system_settings)->meta_title }}">
        <meta name="twitter:description" content="{{ isset($seo['page_meta_description']) ? $seo['page_meta_description'] : optional($system_settings)->meta_description }}">
        <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        <header class="  ">
            <nav class="navbar navbar-expand-md fixed-to">
                <div class="container-fluid p-3">
                    <a class="navbar-brand" href="/">
                        <img
                            alt="Autocglass"
                            width="220"
                            height="48"
                            data-sticky-width="82"
                            data-sticky-height="40"
                            data-sticky-top="84"
                            src="/images/logo/Autoglass_logo2.png"
                        />
                    </a>
                
                </div>
            </nav>
        </header>

        <div class="main  bg-grey">
           @inertia
        </div>

        <footer id="footer2" class=" mt-0  w-100 shadow-sm p-3">
            <div class="container">
                <div class="row ">
                    @foreach($footer_info as $info)
                    <div class="col-sm-6 col-6 col-lg-6 mt-3">
                        <div class="widget">
                            @if($info->children->count())
                                <div class="links text-secondry d-flex text-black">
                                    @foreach($info->children as $info)
                                    <div class="py-1 text-black mb-0">
                                        <a class=" text-black font-weight-bold " href="{{ $info->c_link }}">
                                            {{ $info->name }}
                                        </a>
                                    </div>
                                    @endforeach
                                </div>
                            @endif

                        </div><!-- End .widget -->
                    </div><!-- End .col-sm-6 -->
                    @endforeach
                </div><!-- End .row -->
            </div>
        
            <div id="footer" class="foot text-black  ">
            
                <div class="container py-2">
                    <div class="row">
                        <div class="col">
                            <p class="text-left  text-black  text-3 mb-0">{{ config('app.name') }} Services © 2024. All Rights Reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </body>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</html>
