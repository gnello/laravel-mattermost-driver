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
    | Here you may specify which of the servers below you wish
    | to use as your default server for all mattermost work. Of course
    | you may use many servers at once using the Mattermost library.
    |
    */

    'default' => env('MATTERMOST_SERVER', 'default'),

    /*
    |--------------------------------------------------------------------------
    | Mattermost Servers
    |--------------------------------------------------------------------------
    |
    | Here are each of the server setup for your application.
    |
    */

    'servers' => [

        'default' => [
            'auth' => env('MATTERMOST_AUTH', 'default'),
            'host' => env('MATTERMOST_HOST', 'localhost'),
            'login' => env('MATTERMOST_LOGIN', 'gnello'),
            'password' => env('MATTERMOST_PASSWORD', '1234'),
            'guzzle' => []
        ],
        
        'bearer' => [
            'auth' => env('MATTERMOST_AUTH', 'bearer'),
            'host' => env('MATTERMOST_HOST', 'localhost'),
            'token' => env('MATTERMOST_TOKEN', 'bearertoken'),
            'guzzle' => []
        ],

    ],

];
