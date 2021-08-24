<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfessionModel2 extends Model
{
    protected $table = 'profession';
    public $timestamps = false;

    //Relacion 1 profesion tiene muchos usuarios
    public function users(){
        return $this->hasMany(User::class);
    }
}
