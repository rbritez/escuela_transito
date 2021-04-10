<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class coursexpostulante extends Model
{
    protected $table ="coursexpostulante";

    protected $fillable =['id','course_id','postulante_id'];
    public function postulante(){
        return $this->BelongsTo('App\postulante');
    }
    public function course(){
        return $this->BelongsTo('App\course');
    }
    public function assistence(){
        return $this->hasmany('App\form_assistence');
    }
}
