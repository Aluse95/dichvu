 <!-- Stylesheets ============================================= -->
 
 <link rel="stylesheet" href="{{ asset('themes/frontend/f4web/css/bootstrap.min.css') }}" type="text/css" />
 <link rel="stylesheet" href="{{ asset('themes/frontend/f4web/css/swiper.min.css') }}" type="text/css" />
 <link rel="stylesheet" href="{{ asset('themes/frontend/f4web/css/swiper-bundle.css') }}" type="text/css" />

 <link
 rel="stylesheet"
 href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
 integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
 crossorigin="anonymous"
 referrerpolicy="no-referrer"
/>

<link rel="stylesheet" href="{{ asset('themes/frontend/f4web/css/all.min.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ asset('themes/frontend/f4web/css/style.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ asset('themes/frontend/f4web/css/introduce.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ asset('themes/frontend/f4web/css/responsive.css') }}" type="text/css" />

@isset($web_information->source_code->header)
  {!! $web_information->source_code->header !!}
@endisset