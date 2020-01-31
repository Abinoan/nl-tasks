@extends('layouts.mod_cadastro_listagem')
@section('title', 'Listagem de Clientes')

@section('content-cad')
    @section('route-newrec', '/clientes/create')

    @section('fields-table')
        <th>Código</th>
        <th>Nome do Cliente</th>
        <th>CPF/CNPJ</th>
    @endsection
    
    @section('table-lines-records')
    
        @foreach($registros as $registro)
            <tr>
                <td>{{$registro->id}}</td>
                <td>{{$registro->nome}}</td>
                <td>{{$registro->cpf_cnpj}}</td>

                <td style="width: 50px">
                    <form action="/clientes/{{$registro->id}}/edit">
                        <button type="submit" class="btn btn-sm btn-primary">Editar</button>
                    </form>
                </td>
                <td>
                    <form method="post" action="/clientes/{{$registro->id}}">
                        @method('DELETE') @csrf
                        <button type="submit" class="btn btn-sm btn-danger">Apagar</button>
                    </form>
                </td>
            </tr>
        @endforeach

    @endsection
@endsection

{{-- <td>
    <a href="/clientes/{{$registro->id}}/edit" class="btn-sm btn-primary">Editar</a>
    <a href="/clientes/apagar/{{$registro->id}}" class="btn-sm btn-danger">Apagar</a>
</td> --}}
