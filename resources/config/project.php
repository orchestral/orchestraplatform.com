<?php

return [
    'documentation' => [
        'aliases' => [
            'develop' => '3.0',
            'latest'  => '3.0',
            'stable'  => '2.2',
            'lts'     => '2.1',

            '2.3'     => '3.0',
        ],
    ],

    'packages' => [
        [
            'name' => 'asset',
            'description' => 'Managing asset (not asset pipeline) but instead mainly handle asset dependency and handle asset injection.',
            'type' => ['component', 'package', 'required'],
        ],
        [
            'name' => 'auth',
            'description' => 'Authentication and Authorization using Role/Resource based ACL.',
            'type' => ['component', 'package', 'required'],
        ],
        [
            'name' => 'avatar',
            'description' => 'Driver based avatar support for your Laravel, PHP or Orchestra Platform application.',
            'type' => ['component', 'package', 'optional'],
        ],
        [
            'name' => 'config',
            'description' => '',
            'type' => ['component', 'package', 'required'],
        ],
        [
            'name' => 'contracts',
            'description' => '',
            'type' => ['component', 'package', 'required'],
        ],
        [
            'name' => 'debug',
            'description' => 'Debugging and some profilling tool.',
            'type' => ['component', 'package', 'optional'],
        ],
        [
            'name' => 'extension',
            'description' => 'Handling extension (plugins) for Orchestra Platform.',
            'type' => ['component', 'core', 'required'],
        ],
        [
            'name' => 'facile',
            'description' => 'Handling unified responses as either HTML (view), JSON, CSV.',
            'type' => ['component', 'core', 'optional'],
        ],
        [
            'name' => 'foundation',
            'description' => 'The core administration panel that map all other packages together.',
            'type' => ['component', 'core', 'required'],
        ],
        [
            'name' => 'html',
            'description' => 'HTML, Form, Table generator which you can inject additional items from extensions.',
            'type' => ['component', 'package', 'required'],
        ],
        [
            'name' => 'imagine',
            'description' => '',
            'type' => ['component', 'package', 'optional'],
        ],
        [
            'name' => 'installer',
            'description' => '',
            'type' => ['component', 'core', 'optional'],
        ],
        [
            'name' => 'kernel',
            'description' => '',
            'type' => ['component', 'core', 'required'],
        ],
        [
            'name' => 'memory',
            'description' => 'DB configuration that knows your enabled extension, current theme, ACL metrics.',
            'type' => ['component', 'package', 'required'],
        ],
        [
            'name' => 'messages',
            'description' => 'Notification (flash messages).',
            'type' => ['component', 'package', 'required'],
        ],
        [
            'name' => 'model',
            'description' => 'Model for Orchestra Platform usage (users, roles with some observers for ACL usage).',
            'type' => ['component', 'package', 'required'],
        ],
        [
            'name' => 'notifier',
            'description' => '',
            'type' => ['component', 'package', 'required'],
        ],
        [
            'name' => 'optimize',
            'description' => 'Engine to compile most of reusable Orchestra Platform classes.',
            'type' => ['component', 'core', 'required'],
        ],
        [
            'name' => 'parser',
            'description' => '',
            'type' => ['component', 'package', 'optional'],
        ],
        [
            'name' => 'publisher',
            'description' => 'Handle migration and asset publishing for extension.',
            'type' => ['component', 'package', 'required'],
        ],
        [
            'name' => 'resources',
            'description' => 'CRUD routing for extensions, useful for distributed extension.',
            'type' => ['component', 'package', 'optional'],
        ],
        [
            'name' => 'tenanti',
            'description' => '',
            'type' => ['component', 'package', 'optional'],
        ],
        [
            'name' => 'testbench',
            'description' => '',
            'type' => ['component', 'package', 'required'],
        ],
        [
            'name' => 'testing',
            'description' => '',
            'type' => ['component', 'core', 'required'],
        ],
        [
            'name' => 'translation',
            'description' => 'Alternative approach to handle package localization files from external sources.',
            'type' => ['component', 'package', 'required'],
        ],
        [
            'name' => 'support',
            'description' => 'Support Component is basically a basic set of class required by Orchestra Platform.',
            'type' => ['component', 'package', 'required'],
        ],
        [
            'name' => 'view',
            'description' => 'Handle theming for Orchestra Platform and Laravel.',
            'type' => ['component', 'package', 'required'],
        ],
        [
            'name' => 'widget',
            'description' => 'Handle menu and placeholder.',
            'type' => ['component', 'package', 'required'],
        ],
    ],
];
