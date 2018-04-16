@extends('layouts/app')
@section("content")
 

 <div class="container">
  <div class="row">
      <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
              <div class="panel-heading">
                <h3>Upload image</h3>
              </div>

              <div class="panel-body">
                {!! Form::open(['url'=>'/image', 'method'=>'POST','files'=>'true']) !!}
                  <div class="form-group">
                    <label for="userfile">Image File</label>
                    <input type="file" class="formcontrol" name="userfile" id="userfile">
                  </div>
                  <div class="form-group">
                    <label for="caption">Caption</label>
                    <input type="text" class="formcontrol" name="caption" value="">
                  </div>
                  <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="formcontrol"
                    name="description"></textarea>
                  </div>
                  <button type="submit" class="btn btnprimary">Upload</button>
                  <a href="{{ url('/image') }}" class="btn btnwarning">Cancel</a>
                {!! Form::close() !!}
              </div>
          </div>
      </div>
  </div>
</div>
 

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
