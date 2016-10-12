<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LossCause extends Model
{
    protected $table = 'cause_of_loss';

    public function losscalculation()
    {
        return  $this -> belongsTo('App\LossCalculation');
    }
}
