@extends('layouts.mod_cadastro_listagem')
@section('title', 'Grupos de Atividades')

@section('content-cad')
    @section('route-newrec', '/grupos/create')
    
    @section('fields-table')
        <th>Código</th>
        <th>Descrição do Grupo</th>
    @endsection
    
    @section('table-lines-records')
        @foreach($registros as $registro)
            <tr>
                <td>{{$registro->id}}</td>
                <td>{{$registro->descricao}}</td>

                <td style="width:50px">
                    <form action="/grupos/{{$registro->id}}/edit">
                        <button type="submit" class="btn btn-sm btn-primary">Editar</button>
                    </form>
                </td>
                <td>
                    <form method="post" action="/grupos/{{$registro->id}}">
                        @method('DELETE') @csrf
                        <button type="submit" class="btn btn-sm btn-danger">Apagar</button>
                    </form>
                </td>

                {{-- <td>
                   <a href="/grupos/{{$registro->id}}/edit" class="btn-sm btn-primary">Editar</a>
                   <a href="/grupos/apagar/{{$registro->id}}" class="btn-sm btn-danger">Apagar</a>
                </td> --}}
            </tr>
        @endforeach
    @endsection
@endsection