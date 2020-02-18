@extends('adminlte::page')

@section('content')
    <div class="container">

        <div class="text-center mb-3">
            <h5 class="form-header"> @Yield('title', 'Nenhum título informado')</h4>
        </div>

        <div class="card">
            <div id="divcolapsefiltro">
                <div style="background-color: #F2F2F2">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#form-filtro" aria-expanded="true" aria-controls="form-filtro">
                        Filtros
                    </button>
                </div>    
            </div>

            <form action="/@yield('prefixo_rota')"  method="GET" class="form collapse" id="form-filtro">
                <div class="card-header form-group d-flex">
                    @hasSection ('filtros-busca')
                        @yield('filtros-busca')
                    @else
                        <input type="search" name="busca_padrao" id="busca_padrao" class="form-control mt-2" placeholder="Texto a localizar..." autofocus>
                    @endif
                    <div class="d-flex">
                        <input type="submit" value="Pesquisar" class="btn btn-primary my-2 mx-3" >
                    </div>
                </div>
            </form>    
        </div>
        
        @hasSection ('prefixo_rota')
            <a href= "/@yield('prefixo_rota')/create" class="btn btn-sm btn-primary mb-2" role="button">Novo Registro</a>
        @endif
        
        <div class="card">
            <div class="header-adicionais">
                @hasSection ('header-adicionais')
                    @yield('header-adicionais')    
                @endif
            </div>

            @hasSection ('table-lines-records')
                <div class="card-body">
                    @yield('table-lines-records')    
                </div>
            
                <div class="row pagination-sm justify-content-center">
                    <!-- paginação -->
                    {{ $registros->links() }}
                </div>            
            @endif
        </div>    
    </div>
@endsection
