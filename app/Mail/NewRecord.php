<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\{ Record, School, User };

class NewRecord extends Mailable
{
    use Queueable, SerializesModels;

    public $school;
    public $record;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(School $school, Record $record, User $user)
    {
        $this->school = $school;
        $this->record = $record;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->school->email, $this->school->name)
                    ->subject('Nouvelle commande')
                    ->view('mail.newrecord');
    }
}
