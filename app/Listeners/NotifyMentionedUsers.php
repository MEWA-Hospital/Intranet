<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

namespace App\Listeners;

use App\Events\EventReceivedNewComment;
use App\Models\User;
use App\Notifications\YouWereMentioned;

class NotifyMentionedUsers
{
    /**
     * Handle the event.
     *
     * @param  EventReceivedNewComment $event
     * @return void
     */
    public function handle(EventReceivedNewComment $event)
    {
        collect($event->comment->mentionedUsers())
            ->map(function ($username) {
                return User::where('username', $username)->first();
            })
            ->filter()
            ->each(function ($user) use ($event) {
                $user->notify(new YouWereMentioned($event->comment));
            });
    }
}
