<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
    	'title', 
    	'slug',   
    	'full_text', 
    	'position', 
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'lesson_student', 'user_id', 'lesson_id');
    }

    public function views()
    {
        return $this->hasMany(View::class, 'view_id');
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setCourseIdAttribute($input)
    {
        $this->attributes['course_id'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setPositionAttribute($input)
    {
        $this->attributes['position'] = $input ? $input : null;
    }
}
