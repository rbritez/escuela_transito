<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    protected $table ="courses";

    protected $fillable =['id','start_date','finish_date','time','type_course','instructor_id','site_id','status'];  
    
    public function instructor()
    {
        return $this->BelongsTo('App\instructor');
    }
    public function site()
    {
        return $this->BelongsTo('App\site');
    }

    public function exam_p()
    {
        return $this->hasmany('App\instructor');
    }
    public function coursexpostulante(){
        return $this->hasMany('App\coursexpostulante');
    }
   
}
