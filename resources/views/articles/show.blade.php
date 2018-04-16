@extends("layouts.app")
@section("content")

<div class="row">
    

    <div class="col-md-7 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>{!! $article->title !!}</h1>
                {!! Form::open(['route' => ['articles.destroy', $article->id], 'method' => 'delete']) !!}
                {!! link_to(route('articles.index'), "Back", ['class' => 'btn btn-raised btn-info']) !!}
                {!! link_to(route('articles.edit', $article->id), 'Edit', ['class' => 'btn btn-raised btn-warning']) !!}
                {!! Form::submit('Delete', array('class' => 'btn btn-raised btn-danger', "onclick" => "return confirm('are you sure?')")) !!}
                {!! Form::close() !!}

                
               
                 
               
            </div>

            <div class="panel-body">
             {{--  @include ('admin/create');   --}}
              <p>{!! $article->content !!}</p>
              <i>By {!! $article->author !!}</i>
              
              
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">              
                <h3>Give Comments</h3>
                
                {!! Form::open(['route' => 'comments.store', 'class' => 'formhorizontal','role' => 'form']) !!}
                  <div class="form-group">
                    {!! Form::label('article_id', 'Title', array('class' => 'col-lg-3 control-label')) !!}
                    <div class="clear"></div>  
                    
                  <div class="col-lg-9">
                    {!! Form::text('article_id', $value = $article->id, array('class' => 'form-control', 'readonly')) !!}
                    
                  </div>
                
                  <div class="clear"></div>

                  {!! Form::label('content', 'Content', array('class' => 'col-lg-3 control-label')) !!}
                  <div class="col-lg-9">
                    {!! Form::textarea('content', null, array('class' => 'formcontrol','rows' => 10, 'autofocus' => 'true')) !!}
                    {!! $errors->first('content') !!}
                  </div>
                  
                  <div class="clear"></div>
                  
                  <div class="form-group">
                    {!! Form::label('user', 'User', array('class' => 'col-lg-3 control-label')) !!}
                  
                  <div class="col-lg-9">
                    {!! Form::text('user', null, array('class' => 'form-control'))!!}
                  </div>
                  
                  <div class="clear"></div>
                  {!! Form::submit('Save', array('class' => 'btn btn-primary'))!!}
                  
                  <div class="clear"></div>  
                  
                {!! Form::close() !!}
            </div>

            <div class="panel-body">
             {{--  disini  --}}
            </div>
        </div>
    </div>
</div>

  
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            
                    @foreach($comments as $comment)
                    <div class="panel panel-default">
                      <div class="panel-heading">
                      <h1>{!! $comment->content !!}</h1>
                    </div>
                    <div class="panel-body">
                    <p>{!! $comment->user !!}</p>
                    </div>
                    </div>
                    @endforeach
               
            </div>
        </div>
    </div>
    

    
@stop


  {{-- <form action="{{route('articles.destroy', $article -> id)}}">
      {{csrf_field()}}
      {{ method_field('delete') }}
      <a href="{{route('articles.index')}}" class="btn btn-raised btn-info">Back</a>
      <input type="submit" class="btn btn-raised btn-danger" value="Delete">   
  </form> --}}


