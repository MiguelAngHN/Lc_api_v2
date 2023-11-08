<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipo extends Model
{
    use HasFactory;

    public function actividads(){
        return $this->hasMany('App\Models\actividad');
       }

}
