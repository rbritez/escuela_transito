<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class site extends Model
{
    protected $table ="sites";

    protected $fillable =['id','name','address_id','status'];

    public function course(){
        return $this->hasmany('App\course');
    }
    
    public function address()
    {
        return $this->belongsTo('App\address');
    }
}
