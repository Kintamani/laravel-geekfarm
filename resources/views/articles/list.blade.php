@foreach($articles as $article)
<div class="container">
  <div class="row">
    <div class="panel-default">
      
        <div class="col-md-3">
          <div class="thumbnail">
              <a href="{!! route('articles.show', $article->id) !!}">
                  <img id="myImg" src="{{asset($article->image)}}" class="img-responsive"/>
              </a>
          </div>
        </div> 

        <div class="col-md-9"> 
          <div class="panel-heading">
            {!!$article->title!!}
          </div>
    
          <div class="panel-body">
              <p> 
                {!! str_limit($article->content, 250) !!} 
                <a href="{{route('articles.show', $article->id)}}">Read More</a>
              </p>
          </div>
        </div>   

</div>

@endforeach
<div>
  {!! $articles->links() !!}
</div>