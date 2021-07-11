<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{ Course, User, Page };

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $course = Course::orderByDesc('created_at')->take(8)->get();

        return view('index', compact('course'));
    }

    public function show($course_slug)
    {
        $course = Course::where('slug', $course_slug)->firstOrFail();

        return view('formation.show', compact('course'));
    }

    public function page(Page $page)
    {
        return view('page', compact('page'));
    }
}
