@extends('layouts.mod_cadastro_listagem')
@section('title', 'Relação de Situações')

@section('content-cad')
    @section('route-newrec', '/situacoes/create')

    @section('fields-table')
        <th>Código</th>
        <th>Descrição da Situação</th>
    @endsection
    
    @section('table-lines-records')
        @foreach($registros as $registro)
            <tr>
                <td>{{$registro->id}}</td>
                <td>{{$registro->descricao}}</td>

                <td style="width:50px">
                    <form action="/situacoes/{{$registro->id}}/edit">
                        <button type="submit" class="btn btn-sm btn-primary">Editar</button>
                    </form>
                </td>
                <td>
                    <form method="post" action="/situacoes/{{$registro->id}}">
                        @method('DELETE') @csrf
                        <button type="submit" class="btn btn-sm btn-danger">Apagar</button>
                    </form>
                </td>

                {{-- <td>
                    <a href="/situacoes/{{$registro->id}}/edit" class="btn-sm btn-primary">Editar</a>
                   <a href="/situacoes/apagar/{{$registro->id}}" class="btn-sm btn-danger">Apagar</a>
                </td> --}}
            </tr>
        @endforeach
    @endsection
@endsection