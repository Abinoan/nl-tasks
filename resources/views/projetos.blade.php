@extends('layouts.mod_cadastro_listagem')
@section('title', 'Cadastro de Projetos')
@section('prefixo_rota', 'projetos')
@section('table-lines-records')
    @include('layouts.mod_tabela_registros', 
    [
        "cabecalhos" => ['Código', 'Título do Projeto', 'Grupo', 'Descrição do Grupo'],
        'id' => 'id', 
        "prefixo_rota" => 'projetos', 
        "campos" => ['id', 'titulo', 'grupo_id'],
        "config" => ['table_tam_fixo' => "600px"],
        'relacionamentos' => [ ['grupo', 'descricao'] ], //tabela, campo
    ] )
@endsection