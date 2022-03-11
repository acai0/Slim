<?php
/*
class Token{
public function check ($rq,$rs, callable $next){
    $token=null;
    $token = $rq->getQueryParam('token', null);
    if (is_null($token)) {
$api_header = $rq->getHeader('X-commande_api-token');
$token = (isset($api_header[0])? $api_header[0]: null);
    }
    if (empty($token)){
        ($this->c->get('logger error'))->error("Missing..")
    }
    $c_id = $rq->getAttribute
    try{
        $c= Command::where('id'= $c_id)
        ->firstOrFail();
        if ($c->token !==$token){
            ($this->c...)
        }
    }catch (ModelFoundException...)
}
$rq= $rq->withAttribute('commmand', $c)
return $next ($rq, $rs);
}
*/