<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profil_user extends Model
{
   protected $table = "profil_user";
   public function user(){
    	return $this->belongsTo('App\User');
    }
}
