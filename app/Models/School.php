<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $fillable = [
	    'name',  
	    'email',
	    'tel',
	    'facebook',
	    'home',
	    'home_infos',
	];

	public $timestamps = false;
}
