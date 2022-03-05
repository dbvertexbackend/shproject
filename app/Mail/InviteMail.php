<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InviteMail extends Mailable
{
    use Queueable, SerializesModels;
    protected  $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($infos)
    {
        $this->data = $infos;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = $this->data;
        return $this->subject($this->data['title'])
                    ->view('Mails.InviteMail', $data);
    }
}
