<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyect extends Model
{
    protected $table = 'proyects';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name'
    ];

    public function criterios(){
        return $this->hasMany('App\CriteriaProyect', 'idProyect', 'id');
    }
    public function objectives(){
        return $this->hasMany('App\ObjectiveProyect', 'idProyect', 'id');
    }
}
