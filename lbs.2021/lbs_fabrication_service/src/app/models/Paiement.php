<?php
namespace lbs\fab\models;
class Paiement{
    protected static $table='paiement';
    protected static $idColumn='commande_id';
    public $timestamps = true;
   
    public function commande(){
        return $this->belongsTo('lbs\fab\models\Commande', 'commande_id');
    }

}
?>