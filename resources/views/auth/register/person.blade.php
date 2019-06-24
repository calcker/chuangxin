@extends('layouts.auth')

@section('title', '注册')


@section('content')
<div id="app">
  <router-view/>
</div>
@stop

@section('js')
  {{ mix('js/appPersonReg.js') }}
@stop