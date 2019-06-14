<nav class="navbar navbar-expand-md fixed-top bg-light">
  	<div class="container">
    	<a class="navbar-brand" href="/"></a>
    	<ul class="navbar-nav justify-content-end">
      		@if (Auth::check())
            <li class="nav-item"><a class="nav-link" href="/logout">退出</a></li>
      		@else
      			<li class="nav-item"><a class="nav-link" href="/login">登录</a></li>
      			<li class="nav-item" ><a class="nav-link" href="/register/person">注册</a></li>
  			@endif
   		</ul>
  	</div>
</nav>