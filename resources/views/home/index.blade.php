@extends('layouts.default')

@section('content')
<div class="row">
  <div class="col-md-2">
    <div class="side-nav list-group">
      <a href="#" class="list-group-item list-group-item-action active"><strong>首页</strong></a>
      <a href="#" class="list-group-item list-group-item-action"><strong>作品</strong></a>
      <a href="#" class="list-group-item list-group-item-action"><strong>团队</strong></a>
      <a href="#" class="list-group-item list-group-item-action"><strong>话题</strong></a>
      <a href="#" class="list-group-item list-group-item-action"><strong>合作</strong></a>
      <a href="#" class="list-group-item list-group-item-action"><strong>城市</strong></a>
    </div>
  </div>
  <div class="col-md-7">
    <h5>动态</h5>
  </div>
  <div class="col-md-3">
    <div class="input-group mb-3">
      <input type="text" class="form-control" placeholder="发现..." aria-label="search" aria-describedby="basic-addon2">
      <div class="input-group-append">
        <button class="btn btn-outline-secondary" type="button">搜</button>
      </div>
    </div>
  </div>
</div>
@stop