@extends('layouts.auth')

@section('title', trans('auth.person_register'))
@section('person_name', trans('auth.person_name'))
@section('email', trans('auth.email'))
@section('password', trans('auth.password'))
@section('register', trans('auth.register'))
@section('company_register', trans('auth.company_register'))
@section('org_register', trans('auth.org_register'))
@section('gov_register', trans('auth.gov_register'))

@section('content')
<form class="form-auth form-reg-person" @submit.prevent="createPost" method="POST">
  <h1 class="h3 mb-3 font-weight-normal">@yield('title')</h1>
  <label for="inputPersonName" class="sr-only">@yield('person_name')</label>
  <input type="text" id="inputPersonName" class="form-control" placeholder="@yield('person_name')" required>
  <label for="inputEmail" class="sr-only">@yield('email')</label>
  <input type="email" id="inputEmail" class="form-control" placeholder="@yield('email')" required>
  <label for="inputPassword" class="sr-only">@yield('password')</label>
  <input type="password" id="inputPassword" class="form-control" placeholder="@yield('password')" required>
  {!! csrf_field() !!}
  <button class="btn btn-lg btn-primary btn-block" type="submit">@yield('register')</button>
  <div class="row mt-2">
    <div class="col"><a href="/register/company" class="btn btn-sm btn-link">@yield('company_register')</a></div>
    <div class="col"><a href="/register/org" class="btn btn-sm btn-link">@yield('org_register')</a></div>
  </div>
  <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
</form>
@stop