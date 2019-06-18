<!DOCTYPE html>
<html>
  <head>
    <title>@yield('app_name', trans('app.name')) - @yield('title')</title>
    <link rel="stylesheet" href="{{ mix('css/auth.css') }}">
    <link href="/images/logo.png" rel="shortcut icon">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
  </head>
  <body class="text-center">
    <div class="container">
      @yield('content')
    </div>
    <script type="text/javascript" src="@yield('js')"></script>
  </body>
</html>