<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-139229815-1"></script>
    <script>window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);}gtag('js', new Date());gtag('config', 'UA-139229815-1');</script>
    <meta charset="utf-8">
    <title>Brosur</title>
    <link rel="shortcut icon" href="{{ asset('website_assets/images/favicon.jpg') }}">
  </head>
  <body style="text-align:center">
    @for($i = 1; $i <= 16; $i++)
    <img src="{{ asset('website_assets/brosur/') }}/S{{ $i }}.JPG">
    @endfor
    <iframe width="1260" height="700" src="https://www.youtube.com/embed/gEhg6ZlJX5E" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  </body>
</html>
