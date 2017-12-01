<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CriteriaProyect extends Model
{
    protected $table = 'criterios_proyects';
    protected $primaryKey = 'id';
    protected $fillable = [
        'idCriteria', 'idProyect','valueC'
    ];
    
    public function criteria(){
        return $this->hasOne('App\Criteria', 'id', 'idCriteria');
    }
    public function proyect(){
        return $this->hasOne('App\Proyect', 'id', 'idProyect');
    }
}
