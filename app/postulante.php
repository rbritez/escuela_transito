<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class postulante extends Model
{
    protected $table ="postulante";
    protected $fillable=['id','tipo_licencia','person_id','autorizado','codigo_teorico'];

    public function exam_p(){
        return $this->hasmany('App\exam_p');
    }

    public function person(){
        return $this->BelongsTo('App\person');
    }
    public function coursexpostulante(){
        return $this->hasMany('App\coursexpostulante');
    }
    
}
