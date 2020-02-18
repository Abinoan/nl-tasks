@extends('layouts.mod_cadastro_listagem')
@section('title', 'Situações das Atividades')
@section('prefixo_rota', 'situacoes')
@section('table-lines-records')
    @include('layouts.mod_tabela_registros', 
    [
        "cabecalhos" => ['Código', 'Descrição'],
        'id' => 'id', 
        "prefixo_rota" => 'situacoes', 
        "campos" => ['id', 'descricao']
    ] )
@endsection
