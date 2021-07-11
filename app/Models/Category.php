<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    public $timestamps = false;

    public function courses()
    {
    	return $this->hasMany(Course::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'payment_id');
    }
}
