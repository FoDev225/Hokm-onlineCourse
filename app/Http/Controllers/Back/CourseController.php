<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use App\DataTables\CoursesDataTable;
use Intervention\Image\Facades\Image as InterventionImage;
use App\Http\Requests\CourseRequest;
use Illuminate\Support\Facades\File;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CoursesDataTable $dataTable)
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
        return view('back.courses.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {
        $inputs = $this->getInputs($request);

        Course::create($inputs);
        // Course::create($request->all());

        return back()->with('alert', config('messages.coursecreated'));
    }
    
    protected function saveImages($request)
    {
        $image = $request->file('image');
        $name = time() . '.' . $image->extension();
        $img = InterventionImage::make($image->path());
        $img->widen(800)->encode()->save(public_path('/images/courses/') . $name);
        $img->widen(400)->encode()->save(public_path('/images/courses/thumbs/') . $name);

        return $name;
    }
    
    protected function getInputs($request)
    {
        $inputs = $request->except(['image']);
        $inputs['published'] = $request->has('published');
        
        if($request->image) {
            $inputs['image'] = $this->saveImages($request);
        }
        
        return $inputs;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return view('back.courses.form', ['course' => $course]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(CourseRequest $request, Course $course)
    {
        $inputs = $this->getInputs($request);

        if($request->has('image')) {
            $this->deleteImages($course);        
        }

        $course->update($inputs);

        return back()->with('alert', config('messages.courseupdated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $this->deleteImages($course);

        $course->delete();
        
        return redirect(route('courses.index'));
    }

    protected function deleteImages($course)
    {
        File::delete([
            public_path('/images/courses/') . $course->image, 
            public_path('/images/courses/thumbs/') . $course->image,
        ]);    
    }

    public function alert(Course $course)
    {
        return view('back.courses.destroy', compact('course'));
    }
}
