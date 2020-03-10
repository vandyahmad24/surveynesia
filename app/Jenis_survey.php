<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenis_survey extends Model
{
    protected $table = "jenis_survey";
    public function survey(){
        return $this->belongsTo('App\Survey');
    }
}
