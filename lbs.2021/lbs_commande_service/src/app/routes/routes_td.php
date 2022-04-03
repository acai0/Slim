<?php
use \lbs\command\app\controller\CommandeController;
use \lbs\command\app\controller\Commande_Item_Controller;
use \lbs\command\app\middleware\Middleware;
use \lbs\command\app\middleware\CommandeValidator as CommandeValidator;
use \lbs\command\app\middleware\Token;
use \DavidePastore\Slim\Validation\Validation as Validation ;

$validators = CommandeValidator::create_validators();

//Retourner le détail d'une commande
$app->get('/commandes/{id}[/]',CommandeController::class. ':getCommande')->setName('getCommande')->add(middleware::class. ':putIntoJson')->add(Token::class. ':check');


//Retourner le détail de toutes les commandes
$app->get('/commandes[/]',CommandeController::class. ':getAllCommande')->setName('getAllCommande')->add(middleware::class. ':putIntoJson')->add(Token::class. ':check');


//Modifier le contenu d'une commande
$app->put('/commandes/{id}[/]',CommandeController::class. ':putCommande')->setName('putCommande')->add(middleware::class. ':putIntoJson');


//Lister les items d'une commande
$app->get('/commandes/{id}/items',Commande_Item_Controller::class.':getItems')->setName('getItems')->add(middleware::class. ':putIntoJson')->add(Token::class. ':check');


//Nouvelle commande (insert)
$app->post('/commandes[/]',CommandeController::class. ':insertCommande')->setName('insertCommande')->add(middleware::class. ':putIntoJson')->add(new Validation($validators));
