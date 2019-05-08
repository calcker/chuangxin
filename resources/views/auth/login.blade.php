@extends('layouts.auth')

@section('title', trans('auth.login'))

@section('content')
<form class="form-auth form-login">
  <h1 class="h3 mb-3 font-weight-normal">@yield('title')</h1>
  <label for="inputEmail" class="sr-only">@yield('email', trans('auth.email'))</label>
  <input type="email" id="inputEmail" class="form-control" placeholder="@yield('email', trans('auth.email'))" required autofocus>
  <label for="inputPassword" class="sr-only">@yield('email', trans('auth.password'))</label>
  <input type="password" id="inputPassword" class="form-control" placeholder="@yield('password', trans('auth.password'))" required>
  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me"> @yield('remember', trans('auth.remember'))
    </label>
  </div>
  <button class="btn btn-lg btn-primary btn-block" type="submit">@yield('title')</button>
  <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
</form>
@stop
