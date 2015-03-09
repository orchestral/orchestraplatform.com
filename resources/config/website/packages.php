<?php

return [
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
        'description' => 'Configuration packages that support environment based and packages config.',
        'type' => ['component', 'package', 'required'],
    ],
    [
        'name' => 'contracts',
        'description' => 'Interface Collections for Orchestra Platform.',
        'type' => ['component', 'package', 'required'],
        'url' => 'app::docs/latest/components/kernel',
    ],
    [
        'name' => 'control',
        'description' => 'Official Administration Add-on Extension for Orchestra Platform.',
        'type' => ['extension', 'required'],
        'url' => 'https://github.com/orchestral/control',
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
        'description' => 'Image manipulation library integration for Laravel.',
        'type' => ['component', 'package', 'optional'],
    ],
    [
        'name' => 'installer',
        'description' => 'Orchestra Platform Installation.',
        'type' => ['extension', 'core', 'optional'],
    ],
    [
        'name' => 'kernel',
        'description' => 'Core improvements of Laravel.',
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
        'description' => 'Email Notification for Orchestra Platform.',
        'type' => ['component', 'package', 'required'],
    ],
    [
        'name' => 'optimize',
        'description' => 'Engine to compile most of reusable Orchestra Platform classes.',
        'type' => ['component', 'core', 'required'],
    ],
    [
        'name' => 'parser',
        'description' => 'Framework agnostic package that provide a simple way to parse XML to array without having to write a complex logic.',
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
        'name' => 'story',
        'description' => 'Content Management System for Orchestra Platform.',
        'type' => ['extension', 'optional'],
        'url' => 'https://github.com/orchestral/story',
    ],
    [
        'name' => 'tenanti',
        'description' => 'Multi-tenant Database Schema Manager for Laravel.',
        'type' => ['component', 'package', 'optional'],
    ],
    [
        'name' => 'testbench',
        'description' => 'Simple package that is supposed to help you write tests for your Laravel package, especially when there is routing involved.',
        'type' => ['component', 'package', 'required'],
    ],
    [
        'name' => 'testing',
        'description' => 'Testing helper to help you write tests for Orchestra Platform, built on top of Testbench.',
        'type' => ['component', 'core', 'required'],
    ],
    [
        'name' => 'theme-installer',
        'description' => 'Theme Installer for Orchestra Platform using Composer',
        'type' => ['component', 'core', 'optional'],
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
];
