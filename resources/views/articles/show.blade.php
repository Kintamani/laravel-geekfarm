@extends('layouts/app')
@section("content") 
<article class="row">
  <h2>{!! $article->title !!}</h2> 
  <div>{!! $article->content !!}</div> 
</article> 
<div> 
  {!! Form::open(array('route' => array('articles.destroy', $article -> id), 'method' => 'delete')) !!}
  {!! link_to(route('articles.index'), "Back", ['class' => 'btn btn-raised btn-info']) !!}
  {!! link_to(route('articles.edit', $article->id), 'Edit', ['class' => 'btn btn-raised btn-warning']) !!}
  {!! Form::submit('Delete', array('class' => 'btn btn-raised btn-danger', "onclick" => "return confirm('are you sure?')")) !!}
  {!! Form::close() !!}

  {{-- <form action="{{route('articles.destroy', $article -> id)}}">
      {{csrf_field()}}
      {{ method_field('delete') }}
      <a href="{{route('articles.index')}}" class="btn btn-raised btn-info">Back</a>
      <input type="submit" class="btn btn-raised btn-danger" value="Delete">   
  </form> --}}
</div>
@stop

