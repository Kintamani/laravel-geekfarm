@foreach($articles as $article)
<div class="container">
  <div class="row">
    <div class="panel panel-default">
         <div class="panel-heading">
            {!!$article->title!!}
          </div>
    
    <div class="panel-body">
        <p> 
          {!! str_limit($article->content, 250) !!} 
          <a href="{{route('articles.show', $article->id)}}">Read More</a>
        </p>
    {{--  </div>  --}}
  </div>  
</div>

@endforeach