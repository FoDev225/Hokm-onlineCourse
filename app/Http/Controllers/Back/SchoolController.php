<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\School;
use App\Http\Requests\SchoolRequest;

class SchoolController extends Controller
{
    public function edit()
    {
        $school = School::firstOrFail();
        return view('back.school.edit', compact('school'));
    }

    public function update(SchoolRequest $request)
	{
	    $request->merge([
	        'invoice' => $request->has('invoice'),
	        'card' => $request->has('card'),
	        'transfer' => $request->has('transfer'),
	        'check' => $request->has('check'),
	        'mandat' => $request->has('mandat'),
	    ]); 

	    School::firstOrFail()->update($request->all());

	    return back()->with('alert', config('messages.schoolupdated'));
	}
}