@extends('adminlte::page')
@section('title', 'Editar Situação')
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
        <h5 class="form-header">Editar Situação</h5>
        <hr>

        <form id="frmEditarSituacao" method="POST" action="/situacoes/{{$situacao->id}}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="id" class="control-label">ID</label>
                <input type="text" autofocus class="form-control" id="id" name="id" value = "{{$situacao->id}}" disabled>
            </div>
                    
            <div class="form-group">
                <label for="descricao" class="control-label">Descrição</label>
                <input 
                    type="text" autofocus class="form-control" id="iddescricao" name="descricao" 
                    placeholder="Descrição da Situação" value = "{{$situacao->descricao}}" 
                    required maxlength="60"
                >
            </div>
        </form>
        
        <button type="submit" class="btn btn-primary" form="frmEditarSituacao">Gravar</button>
        <button type="cancel" onclick="history.go(-1)" class="btn btn-danger">Voltar</button>            
</div>      
@stop