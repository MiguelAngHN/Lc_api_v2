<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    use HasFactory;
    
    protected $fillable = ['nombre_seccion'];





    // relacion de uno a muchos
    public function users (){
        return $this->belongsTo('App\Models\seccion');
    }
   
    public function temas(){
        return $this->hasMany('App\Models\tema');
    }
    
    }
    