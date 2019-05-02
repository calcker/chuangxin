<!DOCTYPE html>
<html>
  <head>
    <title>@yield('app_name', trans('app.name')) - @yield('title')</title>
    <link rel="stylesheet" href="{{ mix('css/auth.css') }}">
  </head>
  <body class="text-center">
    <div class="container">
      @yield('content')
    </div>
  </body>
</html>