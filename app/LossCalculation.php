<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LossCalculation extends Model
{
    protected $table = 'loss_calculation';
    public function farm()
    {
      return  $this -> belongsTo('App\Farm');
    }
    public function farmer()
    {
        return  $this -> belongsTo('App\Farmer');
    }
    public function user()
    {
        return  $this -> belongsTo('App\User');
    }
    public function losscause()
    {
        return  $this -> belongsTo('App\LossCause',' cause_of_loss_id ');
    }
}
