@extends('adminlte::page')

@section('content')
{{-- <div class="card border"> --}}
    <div class="container">
        <h4 class="text-center form-header"> @Yield('title', 'Nenhum título informado')</h4>
    </div>
            
    <div class="card-body">
        @if ( @isset($registros) )

            <table class="table table-sm table-ordered table-hover ">
                <thead>
                    <tr>
                        @yield('fields-table')
                        <th>Editar</th>
                        <th>Apagar</th>
                    </tr>
                </thead>
                <tbody>
                    @yield('table-lines-records')
                </tbody>
            </table>

            <div class="row card-footer">
                @hasSection ('route-newrec')
                    <a href= @yield("route-newrec") class="btn btn-sm btn-primary" role="button">Novo Registro</a>
                @endif
            </div>

            <div style = "margin-top: 20px" class="row pagination-sm justify-content-center">
                {{ $registros->links() }}
            </div>

            @else
                <h6>Nenhum registro encontrado</h6>            
            @endif
        </div>   
    </div>
{{-- </div> --}}
@endsection
