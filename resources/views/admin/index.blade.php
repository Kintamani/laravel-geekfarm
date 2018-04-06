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
                  your login
                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection