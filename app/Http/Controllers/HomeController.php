<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{ Course, Record, User, Lesson, Page};

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {   
        $course = Record::all();

        $course = $request->user()->courses()->get();
        
        return view('home', compact('course'));
    }
}
