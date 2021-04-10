<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class form_assistence extends Model
{
    protected $table ="form_assistences";

    protected $fillable =['id','coursexpostulante_id','date_assistence','assistance'];
    
    public function coursexpostulante()
    {
        return $this->BelongsTo('App\coursexpostulante');
    }
}
