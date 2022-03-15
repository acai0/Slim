<?php

namespace lbs\fab\app\models;
class Item extends \Illuminate\Database\Eloquent\Model{
    protected static $table='item';
    protected static $primaryKey='id';
    public $timestamps = true;
   
    public function commande(){
        return $this->belongsTo('lbs\fab\models\Commande', 'command_id');
    }
}
?>