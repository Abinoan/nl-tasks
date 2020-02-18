<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Grupo;

class Projeto extends Model
{
    protected $table ='projetos';

    public function grupo()
    {
        return $this->hasOne('\App\Grupo','id', 'grupo_id');
    }       
}
