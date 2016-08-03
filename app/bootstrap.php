<?php

use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Debug\Debug;
use Slave\Application;

// if you don't want to setup permissions the proper way,
//just uncomment the following PHP line
//umask(0000);

defined('SLAVE_ROOT_DIR') or define('SLAVE_ROOT_DIR', realpath(__DIR__.'/..'));

/** @var \Composer\Autoload\ClassLoader $loader */
$loader = require SLAVE_ROOT_DIR.'/vendor/autoload.php';

// initiate application
$application = new Application();

$input = new ArgvInput();

// define environment parameter
$env = $input->getParameterOption(['--env', '-e'], getenv('SLAVE_ENV') ?: 'dev');
$application->getBag()->setParameter('environment', $env);

// define debug mode
$debug = getenv('SLAVE_DEBUG') !== '0'
    && !$input->hasParameterOption(['--no-debug', ''])
    && $env !== 'prod';
$application->getBag()->setParameter('debug', $debug);
if ($debug) {
    Debug::enable();
}

// register providers
$application->registerProviders();

// register commands
$application->registerCommands();

try {
    $application->run($input);
} catch (\Exception $e) {
    // Catch any exceptions.
    echo $e->getMessage();
}
