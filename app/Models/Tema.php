<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tema extends Model
{
    use HasFactory;
    public function seccion(){
        return $this->belongsTo('App\Models\seccion');
    }
    public function actividads(){
        return $this->belongsTo('App\Models\actividad');
    }
}
