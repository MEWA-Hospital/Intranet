<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

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
