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
[5]: https://scrutinizer-ci.com/g/gnello/php-mattermost-driver/badges/quality-score.png?b=master
[6]: https://scrutinizer-ci.com/g/gnello/php-mattermost-driver/?branch=master
[7]: https://poser.pugx.org/gnello/php-mattermost-driver/v/stable
[8]: https://packagist.org/packages/gnello/php-mattermost-driver