@extends('adminlte::page')
@section('title', 'Editar Projeto')
@section('content')
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container">
        <h5 class="form-header">Editar Projeto</h5>
        <hr>

        <form id="frmcadastro" method="POST" action="/projetos/{{$registro->id}}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="id" class="control-label">ID</label>
                <input type="text" autofocus class="form-control" id="id" name="id" value = "{{$registro->id}}" disabled>
            </div>
            
            <div class="form-group">
                <label for="ftitulo" class="control-label">Título</label>
                <input 
                    type="text" autofocus class="form-control" id="idtitulo" name="titulo" 
                    placeholder="Título do Projeto" value = "{{$registro->titulo}}" 
                    required maxlength="60"
                >
            </div>

            <div class="form-group">                
                <label for="grupo_id">Grupo do Projeto</label>
                <select name="grupo_id" id="grupo_id" class="form-control">
                    @foreach ($grupos as $grupo)
                        <option 
                            value="{{$grupo->id}}"
                            @if ($grupo->id == $registro->grupo_id)
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
                    >{{$registro->descricao}}</textarea>
                </div>
            </div>                   
        </form>
        
        <button type="submit" class="btn btn-primary" form="frmcadastro">Gravar</button>
        <button type="cancel" onclick="history.go(-1)" class="btn btn-danger">Voltar</button>            
</div>      
@stop