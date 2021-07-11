<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{ Category, Course };

class CategoryController extends Controller
{
    public function index()
    {
    	$category = Category::find('category_id');

        $category->courses();
    }

    public function showByCategory(Request $request)
    {
    	if(request()->category)
        {
            $courses = Course::with('category', $request->id)->whereHas('category', function($query){
                $query->where('slug', request()->category);
            })->find();
        }
        else
        {
            $courses = Course::with('category')->find();
        }

        return view('category.show', compact('courses'));
        
        // $category = Category::with('courses')->find('id');

        // $course = $category->courses;

        // return view('category.show', compact('course'));
    }
}
