<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    protected $table ="address";

    protected $fillable =['id','neighborhood','street','nro_house','info_add'];
    
    public function site()
    {
        return $this->hasOne('App\site');
    }
    public function person(){
        return $this->hasMany('App\person');
    }
}
