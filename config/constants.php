<?php

return [
    'user' => [
        'role' => [
            'admin'       => '0',
            'field_owner' => '1',
            'captain'     => '2',
            'player'      => '3',
        ],
        'gender' => [
            'male'   => '0',
            'female' => '1',
            'other'  => '2',
        ],
    ],
    'status' => [
        'success' => '200'
    ],
    'stadium' => [
        'status' => [
            'opened' => '0',
            'closed' => '1',
        ]
    ],
    'field' => [
        'type' => [
            '5'  => '0',
            '7'  => '1',
        ]
    ],
    'promotion' => [
        'type' => [
            'percent'    => '0',
            'discount'   => '1',
            'same_price' => '2',
        ]
    ],
    'booking' => [
        'state' => [
            'pending_approval' => '0',
            'ready'            => '1',
            'finished'         => '2',
            'cancelled'        => '3',
        ]
    ],
    'days_of_week' => [
        'everyday'  => '0:1:2:3:4:5:6',
        'monday'    => '0',
        'tuesday'   => '1',
        'wednesday' => '2',
        'thursday'  => '3',
        'friday'    => '4',
        'saturday'  => '5',
        'sunday'    => '6',
    ],
    'second' => [
        '1_day' => 86400,
        '30_minutes' => 1800,
    ],
];
