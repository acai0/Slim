<?php
namespace lbs\command\app\models;
class Commande extends \Illuminate\Database\Eloquent\Model{
    public $table='commande';
    public $primaryKey='id';
    public $incrementing = false;
    public $keyType='String';
    public $timestamps = true;
   
    public function items(){
        return $this->hasMany('lbs\command\models\Item', 'command_id');
    }
}
?>