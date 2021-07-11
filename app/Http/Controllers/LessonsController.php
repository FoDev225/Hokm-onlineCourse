<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;

class LessonsController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($lesson_slug)
    {
        $lesson = Lesson::where('slug', $lesson_slug)->with('comments')->firstOrFail();

        return view('lesson.show', compact('lesson'));
    }
}
