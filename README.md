# laravel-mattermost-driver

[![Latest Stable Version][7]][8] [![Scrutinizer Code Quality][5]][6]

A Laravel integration for the package [php-mattermost-driver][4].  

Please referer to the [php-mattermost-driver][4] package for further information on using this application.

## Installation
### Composer
The best way to install php-mattermost-driver is to use Composer:

```
composer require gnello/laravel-mattermost-driver
```

Read more about how to install and use Composer on your local machine [here][3].

### Laravel
After installation launch the command:
```
 php artisan vendor:publish
```
to publish the configuration file. You'll find it at config/mattermost.php

If you're on Laravel 5.5 or higher you can wipe the sweat on your forehead: you're done here! 

### Laravel 5.4 or lower
Otherwise don't give up, you're almost there! Do this:  
Add the `Gnello\Mattermost\Laravel\MattermostServiceProvider` provider to the providers array in config/app.php:  
```
'providers' => [
  //..
  Gnello\Mattermost\Laravel\MattermostServiceProvider::class,
],
```  
Then add the facade to your aliases array:
```
'aliases' => [
  //..
  'Mattermost' => Gnello\Mattermost\Laravel\Facades\Mattermost::class,
],
```
You did it! Now consider updating your version of Laravel!

## Configuration
Edit the file `config/mattermost.php` as you prefer.

## Usage

```php
 use \Gnello\Mattermost\Laravel\Facades\Mattermost;
 
 //Retrieve the driver
 $driver = Mattermost::server('default');
 
 //Retrieve the User Model
 $userModel = $driver->getUserModel();
 
 //Retrieve the User Model directly (on the default server)
 $userModel = Mattermost::getUserModel();
 ```

## Contact
- luca@gnello.com

[3]: https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx
[4]: https://github.com/gnello/php-mattermost-driver
[5]: https://scrutinizer-ci.com/g/gnello/laravel-mattermost-driver/badges/quality-score.png?b=master
[6]: https://scrutinizer-ci.com/g/gnello/laravel-mattermost-driver/?branch=master
[7]: https://poser.pugx.org/gnello/laravel-mattermost-driver/v/stable
[8]: https://packagist.org/packages/gnello/laravel-mattermost-driver
