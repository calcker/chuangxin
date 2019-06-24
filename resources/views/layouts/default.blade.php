<!DOCTYPE html>
<html>
  <head>
    <title>创新之城 - 我们一起改变世界</title>
    <link href="/images/logo.png" rel="shortcut icon">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
  </head>
  <body>
    <div id="app">
      @include('layouts._header')
      <div class="container">
        @yield('content')
        @include('layouts._footer')
      </div>
    </div>
  <!--
   <script type="text/javascript" src="@yield('js')"></script>
  -->
  </body>
</html>