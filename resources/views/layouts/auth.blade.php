<!DOCTYPE html>
<html>
  <head>
    <title>@yield('app_name', trans('app.name')) - @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{ mix('css/auth.css') }}">
  </head>
  <body class="text-center">
    <div id="app" class="container">
      @yield('content')
    </div>
    <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
  </body>
</html>