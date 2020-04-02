<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $table = "survey";

    public function Jenis(){
        return $this->belongsTo('App\Jenis_survey');
    }
    public function Konfigurasi(){
        return $this->belongsTo('App\Konfigurasi');
    }
    public function Surveyor()
    {
    	return $this->belongsTo('App\User');
    }
}
