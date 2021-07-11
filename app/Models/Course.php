<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'user_id',
    	'title',
    	'slug',
    	'description',
    	'price',
    	'image',
    	'published',
    ];

    public function isFree()
    {
        return $this->price == 0;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class)->orderBy('position');
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'course_student', 'course_id', 'user_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'records', 'user_id', 'course_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'comment_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'payment_id');
    }
}
