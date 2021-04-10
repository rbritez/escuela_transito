<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class instructor extends Model
{
    protected $table ="instructor";
    protected $fillable =['id','person_id','status'];
    
    
    public function exam_p()
    {
        return $this->hasmany('App\exam_p');
    }
    public function course(){
        return $this->hasmany('App\course');
    }
    public function person(){
        return $this->BelongsTo('App\person');
    }
    public function scopeSearch($query,$dni)
    {
        return $query->raw("call searchInstructor($dni)");
    }
   
}

