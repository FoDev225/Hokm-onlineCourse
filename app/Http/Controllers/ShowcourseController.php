<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{ Course, Lesson };

class ShowcourseController extends Controller
{
    public function show($course_slug)
    {
        $course = Course::where('slug', $course_slug)->with('lessons')->firstOrFail();

        return view('cours.show', compact('course'));
    }
}
