@extends('layouts.mod_cadastro_listagem')
@section('title', 'Cadastro de Projetos')
@section('prefixo_rota', 'projetos')
@section('table-lines-records')
    @include('layouts.mod_tabela_registros', 
    [
        "cabecalhos" => ['Código', 'Título', 'Grupo', 'Descrição do Grupo'],
        'id' => 'id', 
        "prefixo_rota" => 'projetos', 
        "campos" => ['id', 'titulo', 'grupo_id'],
        'relacionamentos' => [ ['grupo', 'descricao'] ], //tabela, campo
    ] )
@endsection