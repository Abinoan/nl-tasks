@extends('adminlte::page')
@section('title', 'Editar Grupo de Atividade')
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
        <h5 class="form-header">Editar Grupo de Atividade</h5>
        <hr>

        <form id="frmcadastro" method="POST" action="/grupos/{{$registro->id}}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="id" class="control-label">ID</label>
                <input type="text" autofocus class="form-control" id="id" name="id" value = "{{$registro->id}}" disabled>
            </div>
                    
            <div class="form-group">
                <label for="iddescricao" class="control-label">Descrição</label>
                <input 
                    type="text" autofocus class="form-control" id="iddescricao" name="descricao" 
                    placeholder="Descrição do Grupo" value = "{{$registro->descricao}}" 
                    required maxlength="60"
                >
            </div>
        </form>
        
        <button type="submit" class="btn btn-primary" form="frmcadastro">Gravar</button>
        <button type="cancel" onclick="history.go(-1)" class="btn btn-danger">Voltar</button>            
</div>      
@stop