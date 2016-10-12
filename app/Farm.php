<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Farm extends Model
{
    protected $table = 'farms';

public function losscalculation(){
    return $this ->belongsTo('App\LossCalculation');
}
}
