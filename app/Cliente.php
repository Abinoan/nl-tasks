<?php

namespace App;

use Encore\Admin\Grid\Filter\Like;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table ='clientes';
    public function scopeNome($qry, $nome)
    {
        return $qry->where('nome', 'like', "%$nome%");
    }

    public function scopeCpf_cnpj($qry, $cpf_cnpj)
    {
        return $qry->where('cpf_cnpj', 'like', "%$cpf_cnpj%");
    }
}
