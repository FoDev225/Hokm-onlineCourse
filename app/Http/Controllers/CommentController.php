<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{ Comment, Lesson };
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'user_id' => 'required',
            'course_id' => 'required',
            'lesson_id' => 'required',
            'body' => 'required|min:5|max:2000',
        ));

        $lesson = Lesson::find($lesson_id);

        $comment = new Comment();

        $comment->user_id = Auth::user()->id;
        $comment->course_id = $lesson->courses->id;
        $comment->lesson_id = $lesson->id;
        $comment->body = $request->body;

        $comment->lesson()->associate($lesson);
        $comment->save();

        return redirect()->back()->with('success', 'Votre commentaire a été ajouté !')
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::find($id);
        // return view('comments.edit')->withComment($comment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comment = Comment::find($id);

        $this->validate($request, array('body' => 'required'));

        $comment->body = $request->body;
        $comment->save();

        return redirect()->back()->with('success', 'Commentaire mis à jour !');
    }

    public function delete()
    {
        $comment = Comment::find($id);

        // return view('comments.delete')->withComment($comment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $lesson_id = $comment->lesson->id;
        
        $comment->delete();

        return redirect()->back()->with('success', 'Commentaire supprimé !');
    }
}
