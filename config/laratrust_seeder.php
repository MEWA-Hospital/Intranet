<?php

return [
    'role_structure'  => [
        'superadmin' => [
            'users'         => 'c,r,u,d',
            'employee-type' => 'c,r,u,d',
            'events'        => 'c,r,u,d',
            'departments'   => 'c,r,u,d',
            'memo'          => 'c,r,u,d',
            'extensions'    => 'c,r,u,d',
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
