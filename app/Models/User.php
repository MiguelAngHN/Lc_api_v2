<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Actividad;
use App\Models\Seccion;

use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre_usuario',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    //     'password' => 'hashed',
    // ];


    protected $allowFilter=['id','nombre_usuario','email','password','password_confirmation'];
    protected $allowSort=['id','nombre_usuario','email','password'];

    
public function scopeFilter(Builder $query){

    
    if(empty($this->allowFilter)||empty(request('filter'))){
        return;
    }
    
    $filters =request('filter');
    $allowFilter= collect($this->allowFilter);

    foreach($filters as $filter => $value){

         if($allowFilter->contains($filter)){

            $query->where($filter,'LIKE', '%'.$value.'%');

     
        }

    }

    //http://api.learncartoon/v1/users?filter[name]=user&filter[id]=1

    }

//////////////////////////////////////////////////////////////////////////////////


public function scopeSort(Builder $query){

    
    if(empty($this->allowSort)||empty(request('sort'))){
        return;
    }
    
    
    $sortFields = explode(',', request('sort'));
    $allowSort= collect($this->allowSort);

    foreach($sortFields as $sortField ){

         if($allowSort->contains($sortField)){

            $query->orderBy($sortField,'asc');
     
        }

    }

     //http://api.learncartoon/v1/users?sort=name
    

    }



    public function seccions(){
        return $this->hasMany(Seccion::class,'user_id');
    }
    
   public function actividades(){
      return $this->hasMany(Actividad::class, 'user_id');
   }
}
