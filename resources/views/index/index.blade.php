@extends('layouts.default')

@section('content')
<div class="row">
  <div class="col-md-2">
    <div class="side-nav list-group">
      <a href="/" class="list-group-item list-group-item-action active"><strong>首页</strong></a>
      <a href="/works" class="list-group-item list-group-item-action"><strong>作品</strong></a>
      <a href="/team" class="list-group-item list-group-item-action"><strong>团队</strong></a>
      <a href="/topic" class="list-group-item list-group-item-action"><strong>话题</strong></a>
      <a href="/hire" class="list-group-item list-group-item-action"><strong>招聘</strong></a>
      <a href="/market" class="list-group-item list-group-item-action"><strong>市场</strong></a>
      <a href="/project" class="list-group-item list-group-item-action"><strong>外包</strong></a>
      <a href="/company" class="list-group-item list-group-item-action"><strong>企业</strong></a>
      <a href="/college" class="list-group-item list-group-item-action"><strong>校园</strong></a>
      <a href="/city" class="list-group-item list-group-item-action"><strong>城市</strong></a>
    </div>
  </div>
  <div class="col-md-7">
  </div>
  <div class="col-md-3">
    <div class="input-group mb-3">
      <input type="text" class="form-control" placeholder="发现..." aria-label="search" aria-describedby="basic-addon2">
      <div class="input-group-append">
        <button class="btn btn-outline-secondary" type="button"><i class="fas fa-search"></i></button>
      </div>
    </div>
  </div>
</div>
@stop

@section('js')
  {{ mix('js/app.js') }}
@stop