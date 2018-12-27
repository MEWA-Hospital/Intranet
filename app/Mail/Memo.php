<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Memo extends Mailable
{
    use Queueable, SerializesModels;

    public $memo;

    /**
     * Create a new message instance.
     *
     * @param $memo
     */
    public function __construct($memo)
    {
        $this->memo = $memo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('Mail.memo')
            ->from(config('mail.from.address'), str_replace(config('mail.from.name'), '_', ' '))
            ->subject('MEMO: ' . $this->memo->title);
    }
}
