<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>
  <title>@isset($title) {{ $title }} | @endisset TrendItAll</title>
</head>
<body>
  @include('partials.navbar')

  <div class="mx-10 my-8">
    @yield('container')
  </div>
</body>
</html>
