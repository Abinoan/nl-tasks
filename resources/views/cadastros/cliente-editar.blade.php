@extends('layouts.mod_cadastro_edicao')
@section('title', 'Editar Cliente')
@section('prefixo-rota', 'clientes')
@section('cadastro-id', $registro->id)

@section('cadastro-inputs')
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
        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
    </div>

    <div class="form-group">
        <label for="idcpf_cnpj" class="control-label">CPF / CNPJ</label>
        <input type="text" autofocus class="form-control" id="idcpf_cnpj" name="cpf_cnpj" 
            placeholder="Informe o CPF ou CNPJ" value = "{{$registro->cpf_cnpj}}" 
            required maxlength="14"
        >
    </div>     

@stop


