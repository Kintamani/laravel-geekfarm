<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->user()->hasRole('admin')) {
          return redirect('admin');
        }
        elseif ($request->user()->hasRole('user')) {
            return redirect('user');
        }
        else {
            return view('welcome');
         }
    }
}
