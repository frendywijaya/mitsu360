<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-139229815-1"></script>
    <script>window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);}gtag('js', new Date());gtag('config', 'UA-139229815-1');</script>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#000000">
    <meta name="msapplication-navbutton-color" content="#000000">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <title>Mitsubishi Showcase</title>
    <link rel="shortcut icon" href="{{ asset('website_assets/images/favicon.jpg') }}">
    <link rel="stylesheet" href="{{ asset('website_assets/css/preflight.min.css') }}">
    <link rel="stylesheet" href="{{ asset('website_assets/css/utilities.min.css') }}">
    <link rel="stylesheet" href="{{ asset('website_assets/fonts/montserrat/montserrat.css') }}">
    <link rel="stylesheet" href="{{ asset('website_assets/css/style.css') }}">
    @yield('style')
  </head>
  <body class="hide-scrollbar relative font-montserrat bg-black-1">
    <div class="bg-black-1 h-8 sm:h-8 md:h-8 lg:h-16 xl:h-16">
      <a href="{{ route('website.index') }}">
        <img class="absolute pin-t pin-r pin-l mx-auto h-16 sm:h-16 md:h-16 lg:h-32 xl:h-32" src="{{ asset('website_assets/images/logo.png') }}">
      </a>
    </div>
    <div class="">
      @yield('content')
    </div>
  </body>
  <script src="{{ asset('website_assets/js/jquery.min.js') }}"></script>
  <script>
  document.addEventListener('contextmenu', event => event.preventDefault());
  var base_url = '{{ url('/') }}';
  (function($){
    $.event.special.destroyed = {
      remove: function(o) {
        if (o.handler) {
          o.handler()
        }
      }
    }
  })(jQuery)
  </script>
  @yield('script')
</html>
