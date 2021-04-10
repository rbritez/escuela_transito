<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class exam_p extends Model
{
    protected $table ="exam_p";

    protected $fillable =['id','postulante_id','book','folio','apartado','type_licence','instructor_id','vehicle_id','course_id'];
    
    public function course(){
        return $this->hasmany('App\course');
    }
    
    public function postulante()
    {
        return $this->belongsTo('App\postulante');
    }

    public function instructor()
    {
        return $this->BelongsTo('App\instructor');
    }

    public function vehicle()
    {
        return $this->BelongsTo('App\vehicle');
    }

   
}
