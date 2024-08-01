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
        @inertia
    </body>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</html>
