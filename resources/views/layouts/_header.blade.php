<nav class="navbar navbar-expand-sm bg-light navbar-light border-bottom">
  <div class="container">
    <a class="navbar-brand" href="/">
      <img src="/images/logo.png" alt="logo">
      <strong>创新之城</strong>
    </a>
    <ul class="nav nav-pills justify-content-end">
      @if (Auth::check())
      	<li class="nav-item"><a class="nav-link" href="/logout"><strong>退出</strong></a></li>
      @else
      	<li class="nav-item"><a class="nav-link active" href="/vue#/login"><strong>登录</strong></a></li>
        <li class="nav-item" ><a class="nav-link" href="/vue#/register/person"><strong>注册</strong></a></li>
  	  @endif
   	</ul>
  </div>
</nav>
<!--
  <li class="nav-item"><a class="nav-link active" href="/login"><strong>登录</strong></a></li>
      <li class="nav-item" ><a class="nav-link" href="/register/person"><strong>注册</strong></a></li>
      -->
<!--
  <li class="nav-item">
          <router-link to="/login"><strong>登录</strong></router-link>
        </li>
        <li class="nav-item">
          <router-link to="/register"><strong>注册</strong></router-link>
        </li>
-->