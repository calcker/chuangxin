<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <link rel="stylesheet" href="{{ mix('css/vue.css') }}">
    <link href="/images/logo.png" rel="shortcut icon">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
  </head>
  <body class="text-center">
    <div id="app" class="container">
      <router-view></router-view>
    </div>
    <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
  </body>
</html>