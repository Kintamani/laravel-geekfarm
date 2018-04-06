@foreach($articles as $article)
<article class="row"> 
  
  <h1 class="col-6 col-md-4">{!!$article->title!!}</h1>
  <p class="col-12 col-md-8"> {!! str_limit($article->content, 250) !!} 
     <a href="{{route('articles.show', $article->id)}}">Read More</a>
  </p>
</article> 
@endforeach