<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{ Record, Course, User, School, Page};
use App\Mail\{ NewRecord, Recorded };
use Illuminate\Support\Facades\Mail;
use App\Notifications\NewRecord as NewRecordNotification;
use App\Http\Controllers\MailController;
use Stripe\Stripe;
use Stripe\PaymentIntent;

use Cart;

class RecordController extends Controller
{
    /**
     * Get record data
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Record  $record
     * @return array
     */
    protected function data($request, $record)
    {
        $school = School::firstOrFail();
        $data = compact('record', 'school');

        return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Client
        $user = $request->user();

        $course = Course::findOrFail($request->id);

        $record = Record::create([
            'user_id' => $user->id,
            'course_id' => $course->id,
            'title' => $course->title,
            'description' => $course->description,
            'price' => $course->price,
            'payment' => $course->payment,
            'reference' => $course->reference,
        ]);

        // Notification à l'administrateur
        $school = School::firstOrFail();
        $admins = User::whereAdmin(true)->get();
        foreach($admins as $admin) {
            Mail::to($admin)->send(new NewRecord($school, $record, $user));
            $admin->notify(new NewRecordNotification($record));
        }        
                
        // Notification au client
        $page = Page::whereSlug('respect-environnement')->first();

        MailController::recordEmail($user->name, $user->email, $record->title, $page->text);

        return redirect()->route('home', compact('course'))->with('success', 'Votre êtes bien inscrit à la formation ' . $record->title . '.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $record = Record::find($id);
        return redirect()->route('home', compact('record'));
    }
}
