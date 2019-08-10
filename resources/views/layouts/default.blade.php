<!DOCTYPE html>
<html>
  <head>
    <title>创新之城 - 我们一起改变世界</title>
    <link href="/images/logo.png" rel="shortcut icon">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <!--
    <link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/5.10.0-12/css/all.min.css">
    -->
  </head>
  <body>
    <div id="app">
      @include('layouts._header')
      <div class="container">
        @yield('content')
        @include('layouts._footer')
      </div>
    </div>
  </body>
</html>