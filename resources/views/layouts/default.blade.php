<!DOCTYPE html>
<html>
  <head>
    <title>创新之城 - 我们一起改变世界</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
  </head>
  <body>
    @include('layouts._header')

    <div class="container">
      @yield('content')
      @include('layouts._footer')
    </div>
  </body>
</html>