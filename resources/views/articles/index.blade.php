@extends('layouts/app')
@section("content")
<div class="container"> 
<div class="row">
  <div class="panel panel-default"> 
    <div class="panel-heading">
      <h1>List Articles</h1>
      <form action="{{ route('articles.index') }}">
        <div class="col-md-2 col-md-offset-8 ">       
          <input type="text" name="keyword" class="form-control" placeholder="Search users..."> 
        </div>
          <button type="submit" class="btn btn-primary">Search</button>
        
        </div>
      </form>
    </div> 
    {{--  {!! link_to(route("articles/create"), "Create", ["class"=>"pull-right btn btn-raised btn-primary"]) !!}   --}}
    {{--  <a  class="btn btn-light float-right" href="{{url('contact')}}">Delete</a>  --}}
    {!! link_to(route('articles.create'), "Create", ['class' => 'btn btn-raised btn-info col-md-offset-11']) !!}
    @include('articles/list') 
  </div>
</div>
</div>
@stop