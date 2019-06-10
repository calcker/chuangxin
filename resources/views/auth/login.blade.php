@extends('layouts.auth')

@section('title', trans('auth.login'))

@section('content')
<form id="app-login" class="form-auth form-login" @submit.prevent="createPost" method="POST">
  <h1 class="h3 mb-3 font-weight-normal">@yield('title')</h1>
  <alert-box v-if="errors" :errors="errors"></alert-box>
  <label for="username" class="sr-only">@yield('email', trans('auth.email'))</label>
  <input type="text" id="username" class="form-control" v-model="post.username"placeholder="@yield('email', trans('auth.email'))" required autofocus>
  <label for="password" class="sr-only">@yield('email', trans('auth.password'))</label>
  <input type="password" id="password" class="form-control" v-model="post.password" placeholder="@yield('password', trans('auth.password'))" required>
  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me"> @yield('remember', trans('auth.remember'))
    </label>
  </div>
  <button class="btn btn-lg btn-primary btn-block" type="submit">@yield('title')</button>
  <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
</form>
@stop

@section('js')
  {{ mix('js/appLogin.js') }}
@stop