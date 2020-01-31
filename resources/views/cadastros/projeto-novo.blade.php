@extends('adminlte::page')
@section('title', 'Novo Projeto')
@section('content')
        
    <div class="container">
        <h5 class="form-header">Novo Projeto</h5>
        <hr>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" id="frmcadastro">
            @csrf
            <div class="form-group">
                <label for="idtitulo" class="control-label">Título</label>
                <input 
                    type="text" autofocus class="form-control" id="idtitulo" name="titulo" 
                    placeholder="Título do Projeto" value="{{old('titulo')}}"
                    required maxlength="60"
                >
             </div>   
             
            <div class="form-group">                
                <label for="grupo_id">Grupo do Projeto</label>
                <select name="grupo_id" id="grupo_id" class="form-control">
                    @foreach ($grupos as $grupo)
                        <option value={{$grupo->id}}>{{$grupo->descricao}}</option>
                    @endforeach
                </select>
            </div>   
             
            <div class="form-group">                
                <div class="green-border-focus">
                    <label for="iddescricao">Descrição do Projeto</label>
                    <textarea 
                        class="form-control" id="iddescricao" name="descricao" rows="3"
                        maxlength="255" placeholder="Detalhes do objetivo do projeto"
                    ></textarea>
                </div>
            </div>                   
        </form>

        <button type="submit" class="btn btn-primary" form="frmcadastro" formaction="/projetos">Gravar</button>
        <button type="submit" class="btn btn-primary" form="frmcadastro" formaction="/projetos/create">Gravar|Novo</button>
        <button type="cancel" onclick="history.go(-1)" class="btn btn-danger">Voltar</button>
@stop
