<?php
namespace lbs\fab\app\middleware;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Slim\Container;
use lbs\fab\app\errors\Writer;
use lbs\fab\app\models\Commande;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Token{

    private $c;

    public function __construct(Container $c){
        $this->c = $c;
    }

    public function check(Request $rq, Response $rs, callable $next){

        $token = null;
        $token = $rq->getQueryParam('token', null);

        if(is_null($token)){
            $api_header = $rq->getHeader('X-lbs-token');
            $token = (isset($api_header[0])? $api_header[0] : null);
        }


        if(empty($token)){
            ($this->c->get('logger.error')->error("Missing token in Commande route"));
            return Writer::json_error($rs,403,"Missing token");
        }
        $commande_id = $rq->getAttribute('route')->getArgument('id');

        $commande = null;
        try{
            $commande = Commande::where('id', '=', $commande_id)->firstOrFail();
            if($commande->token !== $token){
                ($this->c->get('logger.error'))->error("Invalid token in commande route($token)",[$commande->token]);
                return Writer::json_error($rs, 403, "Token invalid");
            }
        
        }
        catch(ModelNotFoundException $e){
            ($this->c->get('logger.error'))->error("Unknown commande");
            return Writer::json_error($rs, 404, "Commande inconnue");
        }

        $rq = $rq->withAttribute('command',$commande);
        return $next($rq,$rs);
    }
}