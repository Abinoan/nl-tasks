@extends('layouts.mod_cadastro_listagem')
@section('title', 'Grupos de Atividades')
@section('prefixo_rota', 'grupos')
@section('table-lines-records')
    @include('layouts.mod_tabela_registros', 
    [
        "cabecalhos" => ['Código', 'Descrição do Grupo'],
        'id' => 'id', "prefixo_rota" => 'grupos', "campos" => ['id', 'descricao']
    ] )
@endsection
