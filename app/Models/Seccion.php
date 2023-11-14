<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class seccion extends Model
{
    use HasFactory;
    
    protected $fillable = ['nombre_seccion'];





    // relacion de uno a muchos
    public function users (){
        return $this->belongsToMany(User::class, 'user_seccion');

    }
   
    public function temas(){
        return $this->hasMany('App\Models\tema');
    }
    
    }
    