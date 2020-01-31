@extends('adminlte::page')
@section('title', 'Editar Cliente')
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
        <h5 class="form-header">Editar Cliente</h5>
        <hr>

        <form id="frmcadastro" method="POST" action="/clientes/{{$registro->id}}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="id" class="control-label">ID</label>
                <input type="text" autofocus class="form-control" id="id" name="id" value = "{{$registro->id}}" disabled>
            </div>

            <div class="form-group">
                <label for="nome" class="control-label">Nome</label>
                <input 
                    type="text" autofocus class="form-control" id="idnome" name="nome" 
                    placeholder="Nome do Cliente" value = "{{$registro->nome}}" 
                    required maxlength="100"
                >
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>

            <div class="form-group">
                <label for="idcpf_cnpj" class="control-label">CPF / CNPJ</label>
                <input type="text" autofocus class="form-control" id="idcpf_cnpj" name="cpf_cnpj" 
                    placeholder="Informe o CPF ou CNPJ" value = "{{$registro->cpf_cnpj}}" 
                    required maxlength="14"
                 >
            </div>
        </form>

        <button type="submit" class="btn btn-primary" form="frmcadastro">Gravar</button>
        <button type="cancel" onclick="history.go(-1)" class="btn btn-danger">Voltar</button>            
</div>      
@stop