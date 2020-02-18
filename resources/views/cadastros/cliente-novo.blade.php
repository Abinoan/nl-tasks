@extends('adminlte::page')
@section('title', 'Novo Cliente')
@section('content')
        
    <div class="container">
        <h5 class="form-header">Novo Cliente</h5>
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
                <label for="nome" class="control-label">Nome</label>
                <input 
                    type="text" autofocus class="form-control" id="idnome" name="nome" 
                    placeholder="Nome do Cliente" value="{{old('nome')}}"
                    required maxlength="100">
            </div>   

            <div class="form-group">
                <label for="cnpj" class="control-label">CPF/CPNJ</label>
                <input 
                    type="text" autofocus class="form-control" id="idcpf_cnpj" name="cpf_cnpj" 
                    placeholder="Informe o CPF ou CNPJ" value="{{old('cpf_cnpj')}}"
                    required maxlength="14"
                    >
            </div>
        </form>

        <button type="submit" class="btn btn-primary" form="frmcadastro" formaction="/clientes">Gravar</button>
        <button type="submit" class="btn btn-warning" form="frmcadastro" formaction="/clientes/create">Gravar|Novo</button>
        <button type="cancel" onclick="history.go(-1)" class="btn btn-info">Voltar</button>
            
@stop
