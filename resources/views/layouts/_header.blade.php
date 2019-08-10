<nav class="navbar navbar-expand-sm bg-light navbar-light border-bottom">
  <div class="container">
    <a class="navbar-brand" href="/">
      <img src="/images/logo.png" alt="logo">
      <strong>创新之城</strong>
    </a>
    <ul class="nav nav-pills justify-content-end">
      @if (Auth::check())
        <li class="nav-item"><a class="nav-link" href="/router#/home"><strong>我的空间</strong></a></li>
      	<li class="nav-item"><a class="nav-link" href="/logout"><strong>退出</strong></a></li>
      @else
      	<li class="nav-item"><a class="nav-link active" href="{{ config('app.vue_router').'/login' }}"><strong>登录</strong></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ config('app.vue_router').'/register/email/person' }}"><strong>注册</strong></a></li>
  	  @endif
   	</ul>
  </div>
</nav>