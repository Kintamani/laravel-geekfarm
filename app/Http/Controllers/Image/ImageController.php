<?php

namespace App\Http\Controllers\Image;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Image;
use App\Article;
use Validator;


class ImageController extends Controller
{
    /**
     * 
     */
    public function index()
    {
        return view('articles.list')->with('image', $image);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('image.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation //
        $validation = Validator::make($request->all(), [
            'caption' => 'required|regex:/^[A-Za-z ]+$/',
            'description' => 'required',
            'userfile' => 'required|image|mimes:jpeg,png|min:1|max:250'
            ]);
        // Check if it fails //
        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }
        $image = new Image;

        // upload the image //
        $file = $request->file('userfile');
        $destination_path = 'uploads/';
        $filename = str_random(6).'_'.$file->getClientOriginalName();
        $file->move($destination_path, $filename);

        // save image data into database //
        $image->file = $destination_path . $filename;
        $image->caption = $request->input('caption');
        $image->description = $request->input('description');
        $image->save();
        return redirect('/')->with('message','You just uploaded an image!');


    
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $image = Image::findorfail($id);
        return view('image_upload.image-detail')->with('image', $image);
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $image = Image::find($id);
        return view('image_upload.edit-image')->with('image', $image);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validation //
        $validation = Validator::make($request->all(), [
            'caption' => 'required|regex:/^[A-Za-z ]+$/',
            'description' => 'required',
            'userfile' => 'sometimes|image|mimes:jpeg,png|min:1|max:250'
            ]);

            // Check if it fails //
            if( $validation->fails() ){
                return redirect()->back()->withInput()->with('errors', $validation->errors() );
            }

            // Process valid data & go to success page //
            $image = Image::find($id);
            
            // if user choose a file, replace the old one //
            if( $request->hasFile('userfile') ){
                $file = $request->file('userfile');
                $destination_path = 'uploads/';
                $filename = str_random(6).'_'.$file->getClientOriginalName();
                $file->move($destination_path, $filename);
                $image->file = $destination_path . $filename;
            }
            
            // replace old data with new data from the submitted form //
            $image->caption = $request->input('caption');
            $image->description = $request->input('description');
            $image->save();
            return redirect('/')->with('message','You just updated an image!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
