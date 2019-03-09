<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

namespace Domain\User\Actions;

use Domain\User\DTO\UserData;
use Domain\User\Models\User;

class UpdateUserAction
{
    /**
     * @param UserData $userData
     * @param $id
     *
     * @return User $user
     */
    public function __invoke(UserData $userData, $id)
    {
        $user = User::find($id);

        $user->update([
            'username'       => $userData->username,
            'email'          => $userData->email,
            'telephone'      => $userData->telephone,
            'national_id_no' => $userData->national_id_no,
            'password'       => $userData->password,
        ]);

        return $user;
    }
}
