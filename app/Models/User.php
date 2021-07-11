<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'phone',
        'email',
        'password',
        'photo',
        'newsletter',
        'last_seen',
    ];

    public function lessons()
    {
        return $this->belongsTo(Lesson::class, 'lesson_student', 'user_id', 'lesson_id');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'records', 'user_id', 'course_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'comment_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'payment_id');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
