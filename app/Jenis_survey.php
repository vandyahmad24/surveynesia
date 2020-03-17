<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenis_survey extends Model
{
    protected $table = "jenis_survey";
    protected $fillable = [
        'nama_survey', 'deskripsi', 'icon','is_active'
    ];
    public function survey(){
        return $this->belongsTo('App\Survey');
    }
}
