<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Projeto;
use App\Situacao;
use Illuminate\Support\Facades\Log;

class Atividade extends Model
{
    protected $table ='atividades';
    
    public function situacao()
    {
        return $this->hasOne('\App\Situacao','id', 'situacao_id');
    }       

    public function projeto()
    {
        return $this->hasOne('\App\Projeto','id', 'projeto_id');
    }       

    /**
     * formata campo inicio_estimado no formato d-m-a.
     *
     * @param  string  $value
     * @return string
     */
    public function getInicioEstimadoAttribute($value)
    {
        if ( isset($value) ) {
            return date('d-m-Y', strtotime($value))  . ' ' . $this->inicio_estimado_hora;
        }
    }    

    /**
     * formata campo inicio_real no formato d-m-a.
     *
     * @param  string  $value
     * @return string
     */
    public function getInicioRealAttribute($value)
    {
        // $date = date_create($value);
        if ( isset($value) ) {
            return date('d-m-Y', strtotime($value))  . ' ' . $this->inicio_real_hora;
        }
    }    

    /**
     * formata campo termino_estimado no formato d-m-a.
     *
     * @param  string  $value
     * @return string
     */
    public function getTerminoEstimadoAttribute($value)
    {
        if ( isset($value) ) {
            return date('d-m-Y', strtotime($value))  . ' ' . $this->termino_estmado_hora;
        }
     }            


    /**
     * formata campo termino_real no formato d-m-a.
     *
     * @param  string  $value
     * @return string
     */
    public function getTerminoRealAttribute($value)
    {
        if ( isset($value) ) {
            return date('d-m-Y', strtotime($value))  . ' ' . $this->termino_real_hora;
        }
    }                

    # busca de campos
    public function scopeTitulo($qry, $titulo)
    {
        if (isset($titulo)){
            return $qry->where('titulo', 'like', "%$titulo%");
        }    
    }

    public function scopeInicioestimado($qry, $inicio_estimado)
    {
        if (isset($inicio_estimado)){
            Log::info("param recebido: " . $inicio_estimado);
            return $qry->where('inicio_estimado', '=', "$inicio_estimado");
        }
    }
 
    public function scopeSituacao($qry, $situacao_id)
    {
        if (isset($situacao_id)){
            return $qry->where('situacao_id', '=', "$situacao_id");
        }
    }
     
    public function scopeProjeto($qry, $projeto_id)
    {
        if (isset($projeto_id)){
            return $qry->where('projeto_id', '=', "$projeto_id");
        }
    }    
}

