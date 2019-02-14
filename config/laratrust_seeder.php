<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

return [
    'role_structure'  => [
        'superadmin' => [
            'users'         => 'c,r,u,d',
            'employee-type' => 'c,r,u,d',
            'departments'   => 'c,r,u,d',
            'extensions'    => 'c,r,u,d',
            'employees'     => 'c,r,u,d',
            'minutes'       => 'c,r,u,d',
            'events'        => 'c,r,u,d',
            'memo'          => 'c,r,u,d',
            'acl'           => 'c,r,u,d',
            'comment'       => 'r,u,d',
            'profile'       => 'r,u',
        ],
        'admin'      => [
            'events'     => 'c,r,u,d',
            'memo'       => 'c,r,u,d',
            'extensions' => 'c,r,u,d',
            'profile'    => 'r,u'
        ],
        'user'       => [
            'profile' => 'r,u'
        ],
    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
