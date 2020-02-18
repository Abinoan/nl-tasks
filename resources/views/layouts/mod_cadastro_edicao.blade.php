@extends('adminlte::page')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container">
        <h5 class="form-header"> @yield('title', 'Editar Cadastro') </h5>
        <hr>

        <form id="frmcadastro" method="POST" action="/@yield('prefixo-rota')/@yield('cadastro-id')" >
            @csrf
            @method('PUT')
            @hasSection ('cadastro-inputs')
                @yield('cadastro-inputs')                
            @endif
        </form>

        <button type="submit" class="btn btn-primary" form="frmcadastro">Gravar</button>
        <button type="submit" form="frmcadastro"  formmethod="GET" formaction="/@yield('prefixo-rota')/" class="btn btn-info">Voltar</button>            
</div>      
@stop