<?php

namespace App\Http\Controllers\Article;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use Session;
use Validator;


class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request){
       
        if($request->ajax()) {
            $articles = Article::where('title', 'like', '%'.$request->keywords.'%')->orWhere('content', 'like','%'.$request->keywords.'%')->paginate(3);//versi 5.3
            $view = (String) view('articles.list')->with('articles', $articles)->render();
            return response()->json(['view' => $view, 'status' => 'success']);        
            
        
       } 
       else{ 
            if (empty($request->keyword)) {
                $articles = Article::paginate(3);
                return view('articles.index')->with('articles', $articles);
            }
            else{
                // dd($request);
            $articles = Article::where('title', 'like', '%'.$request->keyword.'%') ->orWhere('content', 'like', '%'.$request->keyword.'%')->paginate(3);
            return view('articles.index')->with('articles', $articles);
            
            }
        }
    }
   
    public function create(){
        return view('articles.create');
    }

    public function store(Request $request){
        // Validation //
        $validation = Validator::make($request->all(), [
        'image' => 'required|min:1|max:250'
        ]);
        // dd($validation);
        // Check if it fails //
        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }
        $image = new Article;
        // upload the image //
        $file = $request->file('image');
        $destination_path = 'uploads/';
        $filename = str_random(6).'_'.$file->getClientOriginalName();
        $file->move($destination_path, $filename);
        
        // save image data into database //
        $image->title= $request->input('title');
        $image->content= $request->input('content');
        $image->image = $destination_path . $filename;
        $image->save();
        
        return redirect('/admin')->with('message','You just uploaded an image!');
        
            // Article::create($request->all());
            // Session::flash("notice", "Article success created");
            // return redirect()->route("articles.index");        
    }

    public function show($id){
        //$article = Article::find($id);
        //$comments = Article::find($id)->comments;
        //return view('articles.show')->with('articles', $article);
        
        $image = Article::findorfail($id);
        $article = Article::find($id);
        $comments = Article::find($id)->comments->sortBy('Comment.created_at');
        return view('articles.show')->with('article', $article)->with('comments', $comments)->with('image', $image);
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
        //dd(id);
        Article::destroy($id);
        Session::flash("notice", "Article success deleted");
        return redirect()->route("articles.index");
    }
    
  
}
