<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class EventReceivedNewComment
{
    use Dispatchable, SerializesModels;

    public $comment;

    /**
     * EventReceivedNewComment constructor.
     * @param $comment
     */
    public function __construct($comment)
    {
        $this->comment = $comment;
    }

}
