<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LessonRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'course_id' => 'required|numeric',
            'title' => 'required|max:255',
            'slug' => 'required|max:255',
            'full_text' => 'required|mimes:avi,mp4,mpeg,oga,3gp',
            'position' => 'required|numeric',
            // 'mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts|max:100040'
        ];
    }
}
