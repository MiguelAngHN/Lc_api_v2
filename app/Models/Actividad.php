<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Tipo;
use App\Models\Tema;
use App\Models\User;
use App\Models\Multimedia;

class Actividad extends Model
{
    use HasFactory;

    protected $fillable = ['nombre_actividad','user_id','tema_id','tipo_id'.'multimedia_id'];
    protected $allowIncluded=['user','tema','tipo','multimedia','tema.seccion'];
    protected $allowFilter=['id','nombre_tema','user_id','tema_id','tipo_id'.'multimedia_id'];
    protected $allowSort=['id','nombre_actividad','user_id','tema_id','tipo_id'.'multimedia_id'];

    public function scopeIncluded(Builder $query){
       
        if(empty($this->allowIncluded)||empty(request('included'))){
            return;
        }
        
        $relations = explode(',', request('included'));//['posts','relation2']
       
        $allowIncluded=collect($this->allowIncluded);//colocamos en una colecion lo que tiene $allowIncluded en este caso = ['posts','posts.user']
    
        foreach($relations as $key => $relationship){//recorremos el array de relaciones
            
            if(!$allowIncluded->contains($relationship)){
                unset($relations[$key]);
            }
        
        }
      $query->with($relations);//se ejecuta el query con lo que tiene $relations en ultimas es el valor en la url de included
     
    }
    //return $relations;
// return $this->allowIncluded;

///////////////////////////////////////////////////////////////////////////////////////////



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

    //http://api.learncartoon/v1/actividads?filter[name]=user&filter[id]=1

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

     //http://api.learncartoon/v1/actividads?sort=name
    

    }


    public function tema(){
        return $this->belongsTo(Tema::class);
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tipo(){
        return $this->belongsTo('App\Models\Tipo');
    }

    public function multimedia(){
        return $this->belongsTo(Multimedia::class);
    }

}