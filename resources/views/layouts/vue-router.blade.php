<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <link rel="stylesheet" href="{{ mix('css/vue-router.css') }}">
    <link href="/images/logo.png" rel="shortcut icon">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="api-token" content="{{ Auth::check() ? 'Bearer '.Auth::user()->api_token : 'Bearer ' }}">
  </head>
  <body>
    <!--
    <nav class="navbar navbar-expand-sm bg-light navbar-light border-bottom">
      <a class="navbar-brand" href="/">
        <img src="/images/logo.png" alt="logo">
        <strong>创新之城</strong>
      </a>
    </nav>
  -->
    <div id="app">
      <router-view></router-view>
    </div>
    <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
  </body>
</html>