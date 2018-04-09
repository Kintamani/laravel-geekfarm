<?php

namespace App\Http\Controllers\Article;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use Session;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request){
        
        if (empty($request->keyword)) {
            $articles = Article::all();
            return view('articles.index')->with('articles', $articles);
        }
        else{
            // dd($request);
        $articles = Article::where('title', 'like', '%'.$request->keyword.'%') ->orWhere('content', 'like', '%'.$request->keyword.'%')->get();
        return view('articles.index')->with('articles', $articles);
        }
    }
   
    public function create(){
        return view('articles.create');
    }

    public function store(Request $request){
        Article::create($request->all());
        Session::flash("notice", "Article success created");
        return redirect()->route("articles.index");        
    }

    public function show($id){
        //$article = Article::find($id);
        //$comments = Article::find($id)->comments;
        //return view('articles.show')->with('articles', $article);
        
        $article = Article::find($id);
        $comments = Article::find($id)->comments->sortBy('Comment.created_at');
        return view('articles.show')->with('article', $article)->with('comments', $comments);
    }

    public function edit($id){
        $article = Article::find($id);
        return view('articles.edit')->with('article', $article);
    }

    public function update(Request $request, $id){
        Article::find($id)->update($request->all());
        Session::flash("notice", "Article success updated");
        return redirect()->route("articles.show", $id);
    }

    public function destroy($id){
        dd(id);
        Article::destroy($id);
        Session::flash("notice", "Article success deleted");
        return redirect()->route("articles.index");
    }
    
  
}
