<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LossType extends Model
{
    protected $table = 'type_of_loss';

    public function loss_calculation()
    {
        return  $this -> belongsTo('App\LossCalculation');
    }

}
