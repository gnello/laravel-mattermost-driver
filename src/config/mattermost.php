<?php

/**
 * This Driver is a Laravel integration for the package php-mattermost-driver
 * (https://github.com/gnello/php-mattermost-driver)
 *
 * For the full copyright and license information, please read the LICENSE.txt
 * file that was distributed with this source code. For the full list of
 * contributors, visit https://github.com/gnello/laravel-mattermost-driver/contributors
 *
 * God bless this mess too.
 *
 * @author Luca Agnello <luca@gnello.com>
 * @link https://api.mattermost.com/
 */

return [

    /*
    |--------------------------------------------------------------------------
    | Default Mattermost Server Name
    |--------------------------------------------------------------------------
    |
    | Here you cam specify which server you wish to use as your
    | default Mattermost server.
    |
    */

    'default' => env('MATTERMOST_SERVER', 'default'),

    /*
    |--------------------------------------------------------------------------
    | Mattermost Servers
    |--------------------------------------------------------------------------
    |
    | Here you can configure a list of different Mattermost servers
    | to use within your application.
    |
    | You can authenticate in two ways: passing a Bearer Token or
    | passing Username and Password. The allowed values for the "auth"
    | option are: "default", "bearer".
    |
    */

    'servers' => [

        'default' => [
            'auth' => env('MATTERMOST_AUTH', 'default'),
            'host' => env('MATTERMOST_HOST', 'localhost'),
            'login' => env('MATTERMOST_LOGIN', 'gnello'),
            'password' => env('MATTERMOST_PASSWORD', '1234'),
            'scheme' => env('MATTERMOST_SCHEME', 'https'),
            'guzzle' => []
        ],
        
        'bearer' => [
            'auth' => env('MATTERMOST_AUTH', 'bearer'),
            'host' => env('MATTERMOST_HOST', 'localhost'),
            'token' => env('MATTERMOST_TOKEN', 'bearertoken'),
            'scheme' => env('MATTERMOST_SCHEME', 'https'),
            'guzzle' => []
        ],

    ],

];
