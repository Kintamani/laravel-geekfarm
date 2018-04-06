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
    
    public function index(){
        $article = Article::all();
        return view('articles.index')->with('articles', $article);
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
        $article = Article::find($id);
        return view('articles.show')->with('articles', $article);
    }

    public function edit($id){
        $article = Article::find($id);
        return view('articles.edit')->with('articles', $article);
    }

    public function update(Request $request, $id){
        Article::find($id)->update($request->all());
        Session::flash("notice", "Article success updated");
        return redirect()->route("articles.show", $id);
    }

    public function destroy($id){
        Article::destroy($id);
        Session::flash("notice", "Article success deleted");
        return redirect()->route("articles.index");
    }
}
