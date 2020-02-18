@extends('adminlte::page')
@section('title', 'Nova Situação')
@section('content')
        
    <div class="container">
        <h5 class="form-header">Nova Situação</h5>
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

        <form method="POST" id="frmNovaSituacao">
            @csrf
            <div class="form-group">
                <label for="descricao" class="control-label">Descrição</label>
                <input 
                    type="text" autofocus class="form-control" id="iddescricao" name="descricao" 
                    placeholder="Descrição da Situação" value="{{old('descricao')}}"  
                    required maxlength="60">
            </div>
        </form>

        <button type="submit" class="btn btn-primary" form="frmNovaSituacao" formaction="/situacoes">Gravar</button>
        <button type="submit" class="btn btn-warning" form="frmNovaSituacao" formaction="/situacoes/create">Gravar|Novo</button>
        <button type="cancel" onclick="history.go(-1)" class="btn btn-info">Voltar</button>
            
@stop
