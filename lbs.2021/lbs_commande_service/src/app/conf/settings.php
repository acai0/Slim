<?php
use Slim\Container;


return [
    'settings' => [
        'displayErrorDetails' => true,

        'dbfile' => __DIR__ . '/commande.db.conf.ini.dist',

        'debug.name' => 'lbs.log',
        'debug.log' => __DIR__ . '/../log/debug.log',
        'debug.level' => \Monolog\Logger::DEBUG, 

        'warning.name' => 'lbs.log',
        'warning.log' => __DIR__ . '/../log/warning.log',
        'warning.level' => \Monolog\Logger::WARNING,

        'error.name' => 'lbs.log',               
        'error.log' => __DIR__ . '/../log/error.log',
        'error.level' => \Monolog\Logger::ERROR,  
    ]
];
