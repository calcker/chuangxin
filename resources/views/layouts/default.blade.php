<!DOCTYPE html>
<html>
  <head>
    <title>创新之城 - 我们一起改变世界</title>
    <link href="/images/logo.png" rel="shortcut icon">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div id="app">
      @include('layouts._header')
      <div class="container">
        @yield('content')
        @include('layouts._footer')
      </div>
    </div>
     <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  <!--
   <script type="text/javascript" src="@yield('js')"></script>
  -->
  </body>
</html>