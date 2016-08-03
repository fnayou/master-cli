# MasterCli

minimalistic cli tool made with [Slave] (based on symfony/console). it offer :

  - auto registration of commands
  - auto load of parameters/configuration from `app\config.yml` 
  - full working logging system using `Monolog`

> MasterCli offer all that you want to start a quick and small console based project.

### Version
  - 08/2016 : v1.0.0

### Tech

MasterCli uses a number of open source projects to work properly:

* [Slave] - Slave is a minimalistic application base on symfony/console.
* [Symfony Components] - bunch of Symfony components.
* [Pimple] - PHP Dependency Injection Container.
* [Monolog] - Logging for PHP.

### Installation

You need composer:

```sh
$ php composer install
```

and next, all you have to do is :

```sh
$ php slave list
```

### Todos

 - lot of things

License
----

MIT


© 2015 [Aymen Fnayou Inc.]

   [Aymen Fnayou Inc.]: <https://aymen-fnayou.com>
   [Slave]: <https://gitlab.com/fnayou/slave>
   [Symfony Components]: <http://symfony.com/fr/components>
   [Pimple]: <http://pimple.sensiolabs.org/>
   [Monolog]: <https://github.com/Seldaek/monolog>
