<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ObjectiveProyect extends Model
{
    protected $table = 'objectives_proyects';
    protected $primaryKey = 'id';
    protected $fillable = [
        'idObjective', 'idProyect'
    ];
    
    public function objective(){
        return $this->hasOne('App\Objective', 'id', 'idObjective');
    }
    public function proyect(){
        return $this->hasOne('App\Proyect', 'id', 'idProyect');
    }
}
