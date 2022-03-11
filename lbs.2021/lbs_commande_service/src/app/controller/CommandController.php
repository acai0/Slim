<?php
Class CommandController{
public function getCommandItems(Requests $rq, Response $rs, array $args): Response{
    $id = $args[id];
    try{
        $c= Commande::select(['id'])
        ->findOrFail($id);
        $items= $c->items()
       // ->select(['id', 'libelle'...])
        ->get();
        $data=[
            'type'=>'collection',
            'count'=>count($items),
            'items'=>$items
        ];
        return Writer::json_output($rs, 200, $data);
    } catch (ModelNotFoundException $e){
        ($this->c->get('logger.error'))->error("command $id not found");
    }
}
public function getCommand(Requests $rq, Response $rs, array $args): Response{
    $embedItems=false;
    $id = $args[id];
    $embed =$rq->getQueryParam('embed', null);
    if ($embed ==='items') $embedItems=true;
    try{
        $c= Commande::select(['id', 'livraison'])
        ->where ('id',$id);
        $items= $c->items()
        ->select(['id', 'libelle']);
        if($embedItems) $query->with('items');
        $c=$query->firstOrFail();
        $links=[
            //'items'
            'self'=>['href'=>$this->c->router->pathFor('commande', [id=>$id])]
        ];
        $data=[
            'type'=>'ressource',
            'count'=>$$c->toArray,
            'items'=>$links
        ];
        return Writer::json_output($rs, 200, $data);
    } catch (ModelNotFoundException $e){
        ($this->c->get('logger.error'))->error("command $id not found", [404]);
        return Writer::json_error($rs, 404);
    }
}
}
/*
$app->get('/commands/{id}/items[/]',
\lbs\command\...CommandControler::class
->add(\lbscommand\app\middlewares\Token::class .':check')
->SetName ('CommandeItems');
*/
/* /commands/{id}[/]
:getCommand
->setName('commande')

->post v1/commands[/]
:addCommand

->add (new Validator(cv::payment_validator()))

->put('/commands/{id}[/])
*/
/*
public function addCommand(rq, rs, args){
    $command_data= $rq->getParsedBody();
    if(!isset($command_data['nom_client']))
    return Writer::json_error($rs, 400, "missing data :nom_client")
    //....
    try{
        $c= new Command();
        $c->id = Uuid::uuid4();
        $c->nom = filter_var($command_data[nom_client])

        $c->status= CREATED
        $c->token=bind2hex(random_bytes(32));
        $c->montant=0;;
        $c->save();

        return Writer::json_output ($rs, 201,[
            'type'=>'ressource',
            "commande"=>$c,
        ])
    }
}
*/