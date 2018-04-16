@extends('layouts/app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1> Hallo {{ Auth::user()->name }} </h1>
                </div>

                <div class="panel-body">
                 {{--  @include ('admin/create');   --}}
                 
                {!! link_to(route('articles.create'), "Create", ['class' => 'btn btn-raised btn-info']) !!}
                {!! link_to(route('articles.index'), "Article", ['class' => 'btn btn-raised btn-info']) !!}
                {!! link_to(route('image.create'), "Image Create", ['class' => 'btn btn-raised btn-info']) !!}
                <button type="button" class="btn btn-info" onclick="location.href = '{{ url('mymail') }}';">Info</button>
                
                </div>
            </div>
        </div>
    </div>
</div>
@stop