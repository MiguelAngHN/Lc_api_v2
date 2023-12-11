<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Tipo extends Model
{
    use HasFactory;

    protected $fillable = ['nombre_tipo','url'];
    protected $allowFilter=['id','nombre_tipo','url'];
    protected $allowSort=['id','nombre_tipo','url'];


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

        //http://api.learncartoon/v1/tipos?filter[name]=user&filter[id]=1

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
    
         //http://api.learncartoon/v1/tipos?sort=name
        
    
        }

    

public function actividads(){
    return $this->hasMany('App\Models\actividad');
   }

}
