@extends('layouts.mod_cadastro_edicao')
@section('title', 'Editar Projeto')
@section('prefixo-rota', 'projetos')
@section('cadastro-id', $registro->id)

@section('cadastro-inputs')
    <div class="form-group">
        <label for="id" class="control-label">ID</label>
        <input type="text" autofocus class="form-control" id="id" name="id" value = "{{$registro->id}}" disabled>
    </div>

    <div class="form-group">
        <label for="ftitulo" class="control-label">Título</label>
        <input 
            type="text" autofocus class="form-control" id="idtitulo" name="titulo" 
            placeholder="Título do Projeto" value = "{{ old('titulo', $registro->titulo) }}" 
            required maxlength="60"
        >
    </div>

    <div class="form-group">                
        <label for="grupo_id">Grupo do Projeto</label>
        <select name="grupo_id" id="grupo_id" class="form-control">
            @foreach ($grupos as $grupo)
                <option 
                    value="{{$grupo->id}}"
                    @if ($grupo->id == old('grupo_id', $registro->grupo_id) )   
                        selected
                    @endif                
                >{{$grupo->descricao}}</option>
            @endforeach
        </select>
    </div>               

    <div class="form-group">                
        <div class="green-border-focus">
            <label for="iddescricao">Descrição do Projeto</label>
            <textarea 
                class="form-control" id="iddescricao" name="descricao" rows="3"
                maxlength="255" placeholder="Detalhes do objetivo do projeto"
            >{{ old('descricao', $registro->descricao) }}</textarea>
        </div>
    </div>                   
@stop
