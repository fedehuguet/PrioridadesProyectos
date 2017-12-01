<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    protected $table = 'criterios';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'peso'
    ];

    public function proyects(){
        return $this->hasMany('App\CriteriaProyect', 'idCriteria', 'id');
    }
}
