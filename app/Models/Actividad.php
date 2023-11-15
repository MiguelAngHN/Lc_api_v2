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

    protected $fillable = ['nombre_actividad','user_id','tema_id','tipo_id'];

    protected $allowIncluded=['user','tema','tipo','multimedia','tema.seccion'];

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

    public function tema(){
        return $this->belongsTo(Tema::class);
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tipo(){
        return $this->belongsTo(Tipo::class);
    }

    public function multimedia(){
        return $this->belongsTo(Multimedia::class);
    }

}