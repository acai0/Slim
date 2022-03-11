<?php
/* // FONCTIONNE
require_once  __DIR__ . '/../src/vendor/autoload.php';
$config = require_once  __DIR__ . '/../src/app/conf/settings.php';
$errors = require_once __DIR__ . '/../src/app/conf/error.php';
$dependencies = require_once __DIR__ . '/../src/app/conf/dependencies.php';

//$commande = require_once __DIR__. '/..src/app/controller/TD1CommandController.php';

use \Psr\Http\Message\ServerRequestInterface as Request ;
use \Psr\Http\Message\ResponseInterface as Response ;
use lbs\command\app\models\Commande as Commande;
use lbs\command\app\models\Item as Item;
use lbs\command\models\Paiement as Paiement;
use lbs\command\conf\error as Errors;
use lbs\command\app\controller\DemoController as DemoController;



$db = new Illuminate\Database\Capsule\Manager();
$db->addConnection($config ['settings']['dbfile']); 
$db->setAsGlobal();           
$db->bootEloquent();       
*/
/*
$container = new \Slim\Container(array_merge($config, $dependencies, $errors));
*/
/* // FONCTIONNE
$container = new \Slim\Container(array_merge($config));
$app= new \Slim\App($container);


$app = new \Slim\App;
$app->get('/hello/{name}', function (Request $req, Response $resp, $args) {
 $name = $args['name'];
 $resp->getBody()->write("Hello, $name");
 return $resp;
 }
);


$commandes = new \Slim\App;
$commandes->get('/commandes',
function (Request $req, Response $resp, $args){
$commandes = $args['commandes'];
$resp->getBody()->write ("Hello, $commandes");
}
);
*/ 
/*
$app->get('/commandes/{id}', function (Request $req, Response $resp, $args) {
 $id = $args['id'];
 $resp->getBody()->write("Hello $id");
 return $resp;
 }
);
$app->run();
*/
/*
$app->get('/commandes/{id}/items',function (Request $req, Response $resp, $args) {
 $id = $args['id'];
 $resp->getBody()->write("Hello $id");
 return $resp;
 }
);
$app->run();
*/
/* // FONCTIONNE
$app->get('/commands/{id}/items',
lbs\command\app\controller\CommandController::class, function (Request $req, Response $resp, $args) {
    $id = $args['id'];
    $resp->getBody()->write("Hello $id");
    $resp = $resp->withHeader('Content-Type', 'application/json');
    return $resp;
}
    )
    ->add(\lbscommand\app\controller\CommandController::class .':getCommandItems')
//->add(\lbscommand\app\middlewares\Token::class .':check')
->SetName ('CommandeItems')
*/


/*
$u=new lbs\command\app\models\Commande;
$requete = Commande::select('*'); 
$lignesU = $requete->get();  

foreach ($lignesU as $u)     
    echo "$u->id" ;
*/


/*
$app->get('hello/{name}[/]', DemoController::class.':sayHello')
->setName('hello');
$app->get('/home', DemoController::class.':welcome');
$app->run();
*/

/*
$app->get('/', function(Request $rq, Response $rs, array $args):Response{
    $hots=$this->dbhost;
    $rs->getBody()->write(($this->md2html)('# '. $host));
    return $rs;
});

$commande = new \Slim\App;
$commande->get('/commande/{id}', function (Request $req, Response $resp, $args) {
 $id = $args['id'];
 $resp->getBody()->write("Commande, $id");
 return $resp;
 }
);
/*
$app = new \Slim\App;
$app->get('/hello/{name}', function (Request $req, Response $resp, $args) {
 $name = $args['name'];
 $resp->getBody()->write("Hello, $name");
 return $resp;
 }
);
*/
/*
$config = require_once __DIR__ . '/../src/app/conf/settings.php';
$c = new \Slim\App($config);
$app = new \Slim\App($c);
$app->get('/hello/{name}[/]', DemoController::class.':sayHello')
->setName('hello');
$app->get('/home', DemoController::class.':welcome');
$app->run();
*/
/*
$app1 = new \Slim\App;
$app1->get('/hello/{name}', function (Request $req, Response $resp, $args) {
 $name = $args['name'];
 $resp->getBody()->write("Hello, $name");
 return $resp;
 }
);
*/


/*
$app->post ('/hello/{name}[/]', function(Request $rq, Response $rs, array $args): Response{
    $data['args']=$args['name'];
    $data['method']=$rq->getMethod();
    $data['accept']=$rq->getHeader('Accept');
    $data['query param']=$rq->getQueryParam('p', 'p est absent');

    $data ['content-type']=$rq->getContentType();
    $data['body']=$rq->getParsedBody();

    $rs =$rs->withStatus(202);
    $rs= $rs->withHeader('application-header', 'some value');
    $rs->getBody()->write(json_encode($data));
    return $rs;
});
*/

require_once  __DIR__ . '/../src/vendor/autoload.php';


use lbs\command\app\bootstrap\lbsBootstrap;


// Les fichiers contenant les dépendance de l'application
$config = require_once __DIR__ . '/../src/app/conf/settings.php';
$dependencies = require_once __DIR__ . '/../src/app/conf/dependencies.php';
$errors = require_once __DIR__ . '/../src/app/conf/error.php';


//Une instance du conteneur de dépendance
$c = new \Slim\Container(array_merge($config,$dependencies,$errors));
$app = new \Slim\App($c);
lbsBootstrap::startEloquent($c->settings['dbfile']);
//Les routes de l'application
require_once __DIR__ . '/../src/app/routes/routes_td.php';
$app->run();

?>