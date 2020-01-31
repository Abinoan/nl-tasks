@extends('adminlte::page')
@section('title', 'Novo Grupo de Atividade')
@section('content')
        
    <div class="container">
        <h5 class="form-header">Novo Grupo de Atividade</h5>
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
                <div class="row">
                    <label for="descricao" class="control-label">Descrição</label>
                    <input 
                        type="text" autofocus class="form-control" id="iddescricao" name="descricao" 
                        placeholder="Descrição do Grupo" value="{{old('descricao')}}"
                        required maxlength="60">
                </div>
            </div>
        </form>

        <button type="submit" class="btn btn-primary" form="frmcadastro" formaction="/grupos">Gravar</button>
        <button type="submit" class="btn btn-primary" form="frmcadastro" formaction="/grupos/create">Gravar|Novo</button>
        <button type="cancel" onclick="history.go(-1)" class="btn btn-danger">Voltar</button>
@stop
