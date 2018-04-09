@extends('layouts/app')
@section("content")
<div class="container"> 
<div class="row">
    <div class="panel-heading">
      <h1>List Articles</h1>
      <div class="row">
        <div class="form-group label-floating">
          <div class="col-lg-2 col-md-offset-9">
          <input type="text" class="form-control" id="keywords" placeholder="Type search keywords">
        </div>
        <div class="col-lg-1">
          <button id="search" class="btn btn-info btn-flat" type="button">Search</button>
        </div>
      </div>
      </div>
      
      {{--  NON AJAX
        <form action="{{ route('articles.index') }}">
        <div class="col-md-2 col-md-offset-8 ">       
          <input type="text" name="keyword" class="form-control" placeholder="Search users..."> 
        </div>
          <button type="submit" class="btn btn-primary">Search</button>
        
        </div>
      </form>  
      --}}
      
     
    {{--  {!! link_to(route("articles/create"), "Create", ["class"=>"pull-right btn btn-raised btn-primary"]) !!}   --}}
    {{--  <a  class="btn btn-light float-right" href="{{url('contact')}}">Delete</a>  --}}
    {{--  {!! link_to(route('articles.create'), "Create", ['class' => 'btn btn-raised btn-info col-md-1 col']) !!}  --}}
    <br>
    {{--  lokasi id untuk ajax  --}}
    
    <div id="data-content">
    @include('articles/list') 
    </div>
    
  </div>
</div>
</div>
@stop