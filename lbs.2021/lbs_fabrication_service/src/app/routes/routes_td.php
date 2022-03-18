<?php
use \lbs\fab\app\controller\CommandeController;
use \lbs\fab\app\middleware\Middleware;
require __DIR__ .'/../controller/CommandeController.php';
require __DIR__ .'/../Middleware/Middleware.php';
$app->get('/commandes/{id}[/]', CommandeController::class. ':getCommande')->setName('getCommande')->add(middleware::class. ':putIntoJson');
$app->get('/commandes[/]', CommandeController::class. ':getAllCommande')->setName('getAllCommande')->add(middleware::class. ':putIntoJson');
//$app->get('/commands[/]', CommandeController::class. ':getCommandeStatus')->setName('getCommandeStatus')->add(middleware::class. ':putIntoJson')->add(CommandeController::class. ':check');