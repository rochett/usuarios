<?php

namespace Users;

return [
    'router' => [
        'routes' => [
            'user' => [
                'type' => 'segment',
                'options' => [
                    'route' => '/users[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\UsersController::class,
                        'action' => 'index'
                    ]
                ]
            ],

        ]

    ],
    'view_manager' => [
        'template_path_stack'=> [
            'users'=>__DIR__."/../view"
        ]

    ],

];