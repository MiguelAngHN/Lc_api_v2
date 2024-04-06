<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Actividad;
use Laravel\Sanctum\HasApiTokens;

class Multimedia extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = ['url'];
    protected $allowFilter=['id','url'];
    protected $allowSort=['id','url'];

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
    
         //http://api.learncartoon/v1/multimedia?sort=name
        
    
        }

    

    public function actividads(){
        return $this->hasMany(Actividad::class);
    }


}