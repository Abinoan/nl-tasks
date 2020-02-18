@extends('layouts.mod_cadastro_listagem')
@section('title', 'Cadastro de Atividades')
@section('prefixo_rota', 'atividades')

@section('table-lines-records')
    @section('filtros-busca')

        <div class="form-group mx-2">
            <label for="busca_titulo">Título</label>
            <input type="search" name="busca_titulo" placeholder="Título da Atividade" class="form-control" autofocus>    
        </div>

        <div class="form-group mx-2">
            <label for="busca_inicio_estimado">Inicio Estimado</label>
            <input type="date" id="busca_inicio_estimado" name="busca_inicio_estimado" class='form-control'>    
        </div>

        <div class="form-group mx-2">
            <label for="busca_situacao_id">Situação</label>
                <select name="busca_situacao_id" id="busca_situacao_id" class="form-control">
                    <option></option>
                    @foreach ($situacoes as $situacao)
                        <option value={{$situacao->id}}>{{$situacao->descricao}}</option>
                    @endforeach
                </select>
            </label>
        </div>

        <div class="form-group mx-2">
            <label for="busca_projeto_id">Projeto</label>
            <select name="busca_projeto_id" id="busca_projeto_id" class="form-control">
                <option></option>
                @foreach ($projetos as $projeto)
                    <option value={{$projeto->id}}>{{$projeto->titulo}}</option>
                @endforeach
            </select>
        </div>
    @endsection

    @include('layouts.mod_tabela_registros', 
    [
        "cabecalhos" => ['ID', 'Título da Atividade', 'Inicio previsto', 'Inicio real', 'Término previsto', 'Termino real', 'Situação', 'Projeto'],
        'id' => 'id', 
        "prefixo_rota" => 'atividades', 
        "campos" => ['id', 'titulo', 'inicio_estimado', 'inicio_real', 'termino_estimado', 'termino_real'],
        "config" => ['table_tam_fixo' => "950px"],
        'relacionamentos' => [ ['situacao', 'descricao'], ['projeto', 'titulo'] ], //tabela, campo
    ] )
@endsection