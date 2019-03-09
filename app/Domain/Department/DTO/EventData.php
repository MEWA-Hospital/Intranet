<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

namespace Domain\Department\DTO;


use App\Http\Requests\EventRequest;
use Carbon\Carbon;
use Domain\Department\Models\Department;
use Spatie\DataTransferObject\DataTransferObject;

class EventData extends DataTransferObject
{
    /* @var string */
    public $name;

    /* @var string */
    public $venue;

    /* @var string */
    public $body;

    /* @var string */
    public $start_date;

    /* @var string */
    public $end_date;

    /* @var integer */
    public $department_id;

    public static function fromRequest(EventRequest $eventRequest): self
    {
        return new self([
            'name'          => $eventRequest->get('name'),
            'body'          => $eventRequest->get('body'),
            'venue'         => $eventRequest->get('venue'),
            'start_date'    => Carbon::parse($eventRequest->get('start_date')),
            'end_date'      => Carbon::parse($eventRequest->get('end_date')),
            'department_id' => Department::find($eventRequest->get('department_id')) ?: null,
        ]);
    }
}
