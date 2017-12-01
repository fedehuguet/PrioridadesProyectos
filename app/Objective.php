<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Objective extends Model
{
    protected $table = 'objectives';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'bolCorto'
    ];

    public function proyects(){
        return $this->hasMany('App\ObjectiveProyect', 'idObjective', 'id');
    }
}
