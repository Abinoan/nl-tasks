@extends('layouts.mod_cadastro_listagem')
@section('title', 'Listagem de Projetos')

@section('content-cad')
    @section('route-newrec', '/projetos/create')
    
    @section('fields-table')
        <th>Código</th>
        <th>Título</th>
    @endsection
    
    @section('table-lines-records')
        @foreach($registros as $registro)
            <tr>
                <td>{{$registro->id}}</td>
                <td>{{$registro->titulo}}</td>

                <td style="width:50px">
                    <form action="/projetos/{{$registro->id}}/edit">
                        <button type="submit" class="btn btn-sm btn-primary">Editar</button>
                    </form>
                </td>
                <td>
                    <form method="post" action="/projetos/{{$registro->id}}">
                        @method('DELETE') @csrf
                        <button type="submit" class="btn btn-sm btn-danger">Apagar</button>
                    </form>
                </td>

                {{-- <td>
                   <a href="/projetos/{{$registro->id}}/edit" class="btn-sm btn-primary">Editar</a>
                   <a href="/projetos/apagar/{{$registro->id}}" class="btn-sm btn-danger">Apagar</a>
                </td> --}}
            </tr>
        @endforeach
    @endsection
@endsection