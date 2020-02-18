@extends('layouts.mod_cadastro_listagem')
@section('title', 'Cadastro de Clientes')
@section('prefixo_rota', 'clientes') 

@section('table-lines-records')
    @section('filtros-busca')
        <input type="search" name="busca_nome" id="busca_nome" class="form-control mt-2" placeholder="Nome do Cliente" autofocus>
        <input type="search" name="busca_cpfcnpj" id="busca_cpfcnpj" class="form-control mt-2 ml-2" placeholder="CPF/CNPJ do Cliente">
    @endsection

    @include('layouts.mod_tabela_registros', 
    [
        "cabecalhos" => ['Código', 'Nome', "CPF/CNPJ"],
        'id' => 'id', 
        "prefixo_rota" => 'clientes', "campos" => ['id', 'nome', 'cpf_cnpj'],
        "tam_colunas" => [20, 100, 100]
    ] )
@endsection
