@extends('layouts.mod_cadastro_listagem')
@section('title', 'Cadastro de Atividades')
@section('prefixo_rota', 'atividades')
@section('table-lines-records')
    @include('layouts.mod_tabela_registros', 
    [
        "cabecalhos" => ['ID', 'Título', 'Inicio previsto', 'Inicio real', 'Término previsto', 'Termino real'],
        'id' => 'id', 
        "prefixo_rota" => 'atividades', 
        "campos" => ['id', 'titulo', 'inicio_estimado', 'inicio_real', 'termino_estimado', 'termino_real'],
        // 'relacionamentos' => [ ['grupo', 'descricao'] ], //tabela, campo
    ] )
@endsection