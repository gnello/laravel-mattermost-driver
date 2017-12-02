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

use Gnello\Mattermost\Driver as Mattermost;
use Illuminate\Support\Arr;
use Pimple\Container;

/**
 * Class Driver
 *
 * @package Gnello\Mattermost\Laravel
 */
class Driver
{
    /**
     * The application instance.
     *
     * @var \Illuminate\Foundation\Application
     */
    protected $app;

    /**
     * The active server instances.
     *
     * @var array
     */
    protected $servers = [];

    /**
     * Driver constructor.
     *
     * @param $app
     */
    public function __construct($app)
    {
        $this->app = $app;
    }

    /**
     * @param $name
     * @return Mattermost
     */
    public function server($name = null)
    {
        $name = $this->parseServerName($name);

        // If we haven't created this server connection, we'll create it based on
        // the config provided in the application.
        if (!isset($this->servers[$name])) {
            $this->servers[$name] = $this->makeConnection($name);
        }

        return $this->servers[$name];
    }

    /**
     * Parse the server name.
     *
     * @param  string  $name
     * @return string
     */
    protected function parseServerName($name)
    {
        return $name ?: $this->getDefaultServer();
    }

    /**
     * Get the default server name.
     *
     * @return string
     */
    public function getDefaultServer()
    {
        return $this->app['config']['mattermost.default'];
    }

    /**
     * Get the configuration for a server.
     *
     * @param  string  $name
     * @return array
     *
     * @throws \InvalidArgumentException
     */
    protected function configuration($name)
    {
        $name = $name ?: $this->getDefaultServer();

        // To get the server configuration, we will just pull each of the
        // server configurations and get the configurations for the given name.
        // If the configuration doesn't exist, we'll throw an exception and bail.
        $servers = $this->app['config']['mattermost.servers'];

        if (is_null($config = Arr::get($servers, $name))) {
            throw new \InvalidArgumentException("Server [$name] not configured.");
        }

        return $config;
    }

    /**
     * Make the server connection instance.
     *
     * @param $name
     * @return Mattermost
     */
    protected function makeConnection($name)
    {
        $config = $this->configuration($name);

        $container = new Container([
            'driver' => [
                'url' => $config['host'],
                'login_id' => $config['login'],
                'password' => $config['password'],
            ],
            'guzzle' => $config['guzzle']
        ]);

        $driver = new Mattermost($container);
        $driver->authenticate();

        return $driver;
    }

    /**
     * Dynamically pass methods to the default connection.
     *
     * @param  string  $method
     * @param  array   $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        return $this->server()->$method(...$parameters);
    }
}