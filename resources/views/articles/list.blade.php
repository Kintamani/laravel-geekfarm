<div class="container">
@foreach($articles as $article)

  <div class="row">
    <div class="panel-default">
      
      <div class="col-md-3  ">
            <a href="{!! route('articles.show', $article->id) !!}">
                <img id="myImg" src="{{asset($article->image)}}" class="img-responsive"/>
            </a>
      </div> 

      <div class="col-xs-12 col-md-8 "> 
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
  </div> 
  <br>


@endforeach
</div>
<div>
  {!! $articles->links() !!}
</div>