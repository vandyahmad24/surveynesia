<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Konfigurasi extends Model
{
    protected $table = "Konfigurasi";
    public function SurveyKonfigurasi(){
    	return $this->hasMany('App\Survey');
    }
}
