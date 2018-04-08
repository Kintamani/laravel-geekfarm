@extends('layouts/app')
@section("content") 
<div class="row">
  <div class="panel panel-default"> 
    <h2 class="panel-heading">List Articles</h2> 
    {{--  {!! link_to(route("articles/create"), "Create", ["class"=>"pull-right btn btn-raised btn-primary"]) !!}   --}}
    {{--  <a  class="btn btn-light float-right" href="{{url('contact')}}">Delete</a>  --}}
    <button type="button" onclick="window.location.href='{{url('articles/create')}}'" style="margin:0 93%;">Create </button>
  </div>
</div>
@include('articles/list') 
@stop