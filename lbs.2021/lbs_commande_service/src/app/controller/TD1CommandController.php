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
}