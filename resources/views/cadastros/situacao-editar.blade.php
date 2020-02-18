@extends('layouts.mod_cadastro_edicao')
@section('title', 'Editar Situação')
@section('prefixo-rota', 'situacoes')
@section('cadastro-id', $registro->id)

@section('cadastro-inputs')
    <div class="form-group">
        <label for="id" class="control-label">ID</label>
        <input type="text" autofocus class="form-control" id="id" name="id" value = "{{$registro->id}}" disabled>
    </div>
            
    <div class="form-group">
        <label for="descricao" class="control-label">Descrição</label>
        <input 
            type="text" autofocus class="form-control" id="iddescricao" name="descricao" 
            placeholder="Descrição da Situação" value = "{{$registro->descricao}}" 
            required maxlength="60"
        >
    </div>
@stop
