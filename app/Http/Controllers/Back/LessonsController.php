<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use Illuminate\Http\Request;
use App\DataTables\LessonsDataTable;
use App\Http\Requests\LessonRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class LessonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(LessonsDataTable $dataTable)
    {
        return $dataTable->render('back.shared.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.lessons.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LessonRequest $request)
    {
        $inputs = $request->all();

        if($request->hasFile('full_text'))
        {
            $destination_path = 'public/lessons/videos';
            $full_text = $request->file('full_text');
            $file_name = $full_text->getClientOriginalName();
            // $file_name = time() . '.' . $request->full_text->extension();
            $path = $request->file('full_text')->storeAs($destination_path, $file_name);

            $inputs['full_text'] = $file_name;
        }

        Lesson::create($inputs);

        return back()->with('alert', config('messages.lessoncreated'));     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        return view('back.lessons.form', ['lesson' => $lesson]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(LessonRequest $request, Lesson $lesson)
    {
        $inputs = $this->getInputs($request);

        if($request->has('full_text')) {
            $this->deleteFile($lesson);        
        }

        $lesson->update($inputs);

        return back()->with('alert', config('messages.lessonupdated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson)
    {
        $lesson->delete();
        
        return redirect(route('lessons.index'));
    }

    public function alert(Lesson $lesson)
    {
        return view('back.lessons.destroy', compact('lesson'));
    }
}
