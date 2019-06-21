@extends('layouts.auth')

@section('content')
<router-view></router-view>
@stop

@section('js')
  {{ mix('js/appPersonReg.js') }}
@stop