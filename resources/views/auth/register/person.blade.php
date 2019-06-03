@extends('layouts.auth')

@section('title', trans('auth.person.register'))
@section('name', trans('auth.person.name'))
@section('email', trans('auth.email'))
@section('password', trans('auth.password'))
@section('register', trans('auth.register'))
@section('company_register', trans('auth.company.register'))
@section('org_register', trans('auth.org.register'))

@section('content')
<form id="app-person-reg" class="form-auth form-reg-person" @submit.prevent="createPost" method="POST">
  <h1 class="h3 mb-3 font-weight-normal">@yield('title')</h1>
  <div v-if="errors" class="alert alert-danger" role="alert">
    <h5 class="alert-heading">出错了!</h5>
    <p>@{{ errors }}</p>
  </div>
  <label for="name" class="sr-only">@yield('person_name')</label>
  <input type="text" name="name" class="form-control" v-model="post.name" placeholder="@yield('name')" value="{{ old('name') }}" required>
  <label for="email" class="sr-only">@yield('email')</label>
  <input type="email" name="email" class="form-control" v-model="post.email" placeholder="@yield('email')" value="{{ old('email') }}" required>
  <label for="password" class="sr-only">@yield('password')</label>
  <input type="password" name="password" class="form-control" v-model="post.password" placeholder="@yield('password')" value="{{ old('password') }}" required>
  {!! csrf_field() !!}
  <button class="btn btn-lg btn-primary btn-block" type="submit">@yield('register')</button>
  <div class="row mt-2">
    <div class="col"><a href="/register/company" class="btn btn-sm btn-link">@yield('company_register')</a></div>
    <div class="col"><a href="/register/org" class="btn btn-sm btn-link">@yield('org_register')</a></div>
  </div>
  <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
</form>
@stop

@section('js')
  {{ mix('js/appPersonReg.js') }}
@stop