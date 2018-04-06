@extends('layouts/app')
@section("content")
 <h3>Create a Article</h3>
 {!! Form::open(['route' => 'articles.store', 'class' => 'formhorizontal',
'role' => 'form']) !!}
 @include('articles.form')
 {!! Form::close() !!}



{{--  
<div>
  @if (!empty($data))
    @foreach ($data as $key => $value )
        {!! $key.": ".$value. "<br>"!!}
    @endforeach
  @endif
</div>  
--}}

@endsection