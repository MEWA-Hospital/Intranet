<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

namespace App\Domain\Department\Actions;

use Domain\Department\DTO\EventData;
use Domain\Department\Models\Event;

class CreateEventAction
{
    public function __invoke(EventData $eventData): void
    {
        Event::create([
            'name'          => $eventData->name,
            'body'          => $eventData->body,
            'venue'         => $eventData->venue,
            'start_date'    => $eventData->start_date,
            'end_date'      => $eventData->end_date,
            'department_id' =>  $eventData->department_id,
        ]);
    }
}
