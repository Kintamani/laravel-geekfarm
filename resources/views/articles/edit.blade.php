@extends('layouts/app')
@section("content")



<div class="container">
  <div class="row">
      <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
              <div class="panel-heading">
                <h3>Edit Article</h3>
              </div>

              <div class="panel-body">
               {!! Form::model($article, ['route' => ['articles.update', $article-> id],'method' => 'put', 'class' => 'form-horizontal', 'role' =>'form']) !!}
                @include('articles.form')
               {!! Form::close() !!}
              </div>
          </div>
      </div>
  </div>
</div>
@stop

