<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Registered;
use App\Mail\Recorded;

class MailController extends Controller
{
    public static function signUpEmail($name, $email, $email_verified_at)
    {
        $data = [
            'name' => $name,
            'email_verified_at' => $email_verified_at,
            'email' => $email,
        ];
    
        Mail::to($email)->send(new Registered($data));
    }


    public static function recordEmail($name, $email, $title, $text)
    {
        $data = [
            'name' => $name,
            'title' => $title,
            'email' => $email,
            'text' => $text,
        ];
    
        Mail::to($email)->send(new Recorded($data));
    }
}
