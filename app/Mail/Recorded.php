<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\{School, Record, Page};

class Recorded extends Mailable
{
    use Queueable, SerializesModels;

    public $school;
    public $record;
    public $page;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->email_data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'), 'Hokma')
                    ->subject('Merci de vous inscrire à une formation !')
                    ->view('mail.record', ['email_data' => $this->email_data]);
    }
}
