<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class person extends Model
{
    protected $table ="persons";

    protected $fillable =['id','name','last_name','dni','date_birth','number_tel','address_id'];
    
    public function instructor(){
        return $this->hasMany('App\instructor');
    }
    public function postulante(){
        return $this->hasMany('App\postulante');
    }
    public function address(){
        return $this->Belongsto('App\address');
    }
}
