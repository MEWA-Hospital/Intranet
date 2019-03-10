<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

namespace Domain\User\DTO;


use App\Http\Requests\UserRequest;
use Spatie\DataTransferObject\DataTransferObject;

class UserData extends DataTransferObject
{

    /** @var string */
    public $username;

    /** @var string */
    public $email;

    /** @var string */
    public $telephone;

    /** @var string */
    public $slug;

    /** @var string */
    public $national_id_no;

    /** @var string */
    public $password;

    public static function fromRequest(UserRequest $request): self
    {
        return new self([
            'username'       => $request->get('username'),
            'email'          => $request->get('email'),
            'telephone'      => $request->get('telephone'),
            'slug'           => $request->get('slug'),
            'national_id_no' => $request->get('national_id_no'),
            'password'       => bcrypt('intranet')
        ]);
    }

}
