<?php
/**
 * Project: MEWA Hospital Intranet
 * Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 * Last Modified: 10/29/18 11:43 PM.
 *
 * Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0
 * (https://opensource.org/licenses/AGPL-3.0).
 */

/*
|--------------------------------------------------------------------------
| Default Password
|--------------------------------------------------------------------------
|
| The default password for new account. This value is used when a new
| user account is created in storage (database)
*/

return [
    'default_password' => env('DEFAULT_ACCOUNT_PASSWORD', 'secret')
];