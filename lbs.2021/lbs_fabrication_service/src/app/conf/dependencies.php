<?php
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Slim\Container;

return [
    'dbhost' => function(Container $c){
        $config = parse_ini_file($c->settings['dbfile']);
        return $config['host'];
    },

    //Logger debug
    'logger.debug' => function(Container $container) {
        $log = new Logger($container->settings['debug.name']);                  
        $log->pushHandler(new StreamHandler($container->settings['debug.log'],    
                                            $container->settings['debug.level'])); 
        return $log;
    },

    // logger warn
    'logger.warning' => function(Container $container) {
        $log = new Logger($container->settings['warning.name']);                  
        $log->pushHandler(new StreamHandler($container->settings['warning.log'],     
                                            $container->settings['warning.level'])); 
        return $log;
    },

     // logger error
     'logger.error' => function(Container  $container) {
        $log = new Logger($container->settings['error.name']);                  
        $log->pushHandler(new StreamHandler($container->settings['error.log'],     
                                            $container->settings['error.level'])); 
        return $log;
    },

];

