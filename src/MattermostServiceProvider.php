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

namespace Gnello\Mattermost\Laravel;

use Illuminate\Support\ServiceProvider;

/**
 * Class MattermostServiceProvider
 *
 * @package Gnello\Mattermost
 */
class MattermostServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/mattermost.php' => config_path('mattermost.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/mattermost.php', 'mattermost'
        );

        $this->app->singleton('mattermost', function($app) {
            return new Driver($app);
        });

        $this->app->bind('mattermost.server', function ($app) {
            return $app['mattermost']->server();
        });
    }
}
