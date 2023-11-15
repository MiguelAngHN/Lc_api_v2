<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
    use HasFactory;

    protected $fillable = ['nombre_tema','seccion_id'];



    public function seccion(){
        return $this->belongsTo('App\Models\seccion');
    }
    public function actividads(){
        return $this->belongsTo('App\Models\actividad');
    }
}
