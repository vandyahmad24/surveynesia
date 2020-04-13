<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Konfigurasi extends Model
{
    protected $table = "konfigurasi";
    public function SurveyKonfigurasi(){
    	return $this->hasMany('App\Survey');
    }
}
