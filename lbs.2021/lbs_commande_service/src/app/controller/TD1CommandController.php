<?php
class TD1CommandController extends Controller{
    private $commands = [
        ["id" => "45RF56TH", "mail_client"=>"g@g.fr", "date_commande"=>"2021-12-01", "montant"=>50.0],
        ["id" => "46RF56TH", "mail_client"=>"a@aa.fr", "date_commande"=>"2022-01-16", "montant"=>45.0],
        ["id" => "57RF56TH", "mail_client"=>"l@l.fr", "date_commande"=>"2021-01-18", "montant"=>27.5],
        ["id" => "01RF56TH", "mail_client"=>"m@m.fr", "date_commande"=>"2021-01-19", "montant"=>30.0]
    ];

    public function listCommands(Request $rq, Response $rs, array $args): Response{
        $data = ["type"=>"collection",
        "count"=>count($this->commands),
        "commandes"=>$this->commands];
        $rs = $rs->withHeader('Content-Type', 'application/json');
    }
/*
public function replaceCommand(){
    $command_data = $rq->getParsed_Body();

    if(!isset($command_data['nom_client'])
    return Writter::json_error($rs,400, "missing data: nom client"));

    if(!isset($command_data['mail_client'])
    return Writter::json_error($rs,400, "missing data: nom client"));
  // ... 

  try{
      $c= Command::Select(['id', 'nom', 'mail', 'livraison'])->findOrFail($args['id'];
      $c->nom=filter_var($command_data['nom_client'], FILTER_SANITIZE_STRING))
      //....
      $c->livraison = \DateTime::createFromFormat('Y-m-d H:i', $command_data['livraison']['data'] . ' ' .
      $command_data['livraison']['heure']);
  }
  $c->save();
  return Writter::json_outpiut($rs, 204, 'commande');
}
catch (ModelNoteFoundException $e){
    return Writter::json_error($rs, 404, 'commande')
}
catch(\Exception ê){
    return Writter::json_error($rs, 500, $e->getMessage)
}
*/
}