<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{ Course, Category, Lesson, User };

class CourseController extends Controller
{
	public function index()
    {
        $courses = Course::latest()->paginate(16);

        $categories = Category::all();

        if(request('category'))
        {
            $courses = Course::where('category_id', request('category'))->simplePaginate(10);

            return view('course', compact('courses', 'categories'));
        }

        return view('course', compact('courses', 'categories'));
    }

    public function show($course_slug)
    {
        $user = User::with('courses')->firstOrFail();

        $course = Course::where('slug', $course_slug)->with('lessons')->firstOrFail();
        
        return view('formation.show', compact('course', 'user'));
    }
}
