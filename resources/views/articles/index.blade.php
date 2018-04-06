@extends('layouts/app')
@section("content") 
  <div class="row"> 
    <h2 class="pull-left">List Articles</h2> 
    {{--  {!! link_to(route("articles/create"), "Create", ["class"=>"pull-right btn btn-raised btn-primary"]) !!}   --}}
  </div>
  <div class="row">
    <p>
        {{--  <a  class="btn btn-light float-right" href="{{url('contact')}}">Delete</a>  --}}
        <a  class="btn btn-light float-right" href="{{url('articles/create')}}" style="margin-left:5px;">Create</a>
    </p>
    <hr>
  </div>
@include('articles/list') 
@stop