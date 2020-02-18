@extends('layouts.mod_cadastro_listagem')
@section('title', 'Cadastro de Clientes')
@section('prefixo_rota', 'clientes') 

@section('table-lines-records')
    @section('filtros-busca')
        <input type="serch" name="busca_nome" placeholder="Nome do Cliente" class="form-control mx-2" autofocus>    
        <input type="search" name="busca_cpfcnpj" placeholder="CNPJ/CPF" class='form-control mx-2'>    
    @endsection

    @include('layouts.mod_tabela_registros', 
    [
        "cabecalhos" => ['Código', 'Nome', "CPF/CNPJ"],
        'id' => 'id', 
        "prefixo_rota" => 'clientes', "campos" => ['id', 'nome', 'cpf_cnpj']
    ] )
@endsection
