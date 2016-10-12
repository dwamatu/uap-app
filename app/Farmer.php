<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Farmer extends Model
{
    protected $table = 'farmers';
    public function farm()
    {
        $this -> belongsTo('App/Farm');
    }

    public function losscalculation(){
        return $this ->belongsTo('App\LossCalculation');
    }

}
