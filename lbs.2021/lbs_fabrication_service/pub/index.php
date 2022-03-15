<?php
require_once  __DIR__ . '/../src/vendor/autoload.php';
use lbs\fab\app\bootstrap\lbsBootstrap as lbsBootstrap;
require_once __DIR__ .'/../src/app/bootstrap/LbsBootstrap.php';

$config = require_once __DIR__ . '/../src/app/conf/settings.php';
$dependencies = require_once __DIR__ . '/../src/app/conf/dependencies.php';
$errors = require_once __DIR__ . '/../src/app/conf/error.php';

$c = new \Slim\Container(array_merge($config,$dependencies,$errors));
$app = new \Slim\App($c);
lbsBootstrap::startEloquent($c->settings['dbfile']);

require_once __DIR__ . '/../src/app/routes/routes_td.php';
$app->run();

?>