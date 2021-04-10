<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vehicle extends Model
{
    protected $table ="vehicles";

    protected $fillable =['id','brand','patent','type_vehicle','cc'];
    
    public function exam_p()
    {
        return $this->hasmany('App\exam_p');
    }
}
