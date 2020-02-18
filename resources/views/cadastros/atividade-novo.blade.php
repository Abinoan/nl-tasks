@extends('adminlte::page')
@section('title', 'Nova Atividade')
@section('content')
        
    <div class="container">
        <h5 class="form-header">Nova Atividade</h5>
        <hr>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" id="frmcadastro">
            @csrf
            <div class="form-group">
                <label for="idtitulo" class="control-label">Título</label>
                <input 
                    type="text" autofocus class="form-control" id="idtitulo" name="titulo" 
                    placeholder="Título da Atividade" value="{{old('titulo')}}"
                    required maxlength="60"
                >
            </div>   

            <div class="form-group">                
                <div class="green-border-focus">
                    <label for="iddescricao">Descrição da Atividade</label>
                    <textarea 
                        class="form-control" id="iddescricao" name="descricao" rows="3"
                        maxlength="255" placeholder="Detalhes da Atividade" required
                        >{{old('descricao')}}</textarea>
                </div>
            </div>                   
            
            <div class="row">
                <div class="form-group col col-sm-12 col-lg-6">                
                    <label for="projeto_id">Projeto</label>
                    <select name="projeto_id" id="projeto_id" class="form-control">
                        @foreach ($projetos as $projeto)
                            <option value={{$projeto->id}}>{{$projeto->titulo}}</option>
                        @endforeach
                    </select>
                </div>   

                <div class="form-group col-sm-12 col-lg-6">                
                    <label for="situacao_id">Situação</label>
                    <select name="situacao_id" id="situacao_id" class="form-control">
                        @foreach ($situacoes as $situacao)
                            <option value={{$situacao->id}}>{{$situacao->descricao}}</option>
                        @endforeach
                    </select>
                </div>   
            </div>

            <div class="row">
                {{-- Data / hora inicio estimado --}}
                <div class="form-group col col-sm-6 col-lg-3">                
                    <label for="idinicio_estimado" class="control-label" required>Início Estimado</label>
                    <input 
                        type="date" class="form-control" id="idinicio_estimado" name="inicio_estimado" 
                        required value="{{old('inicio_estimado')}}"
                    >
                    <div class="form-group">      
                        <input 
                            type="time" class="form-control" id="idinicio_estimado_hora" name="inicio_estimado_hora" 
                            required style="width: 100px" value="{{old('inicio_estimado_hora')}}"
                        >
                    </div>
                </div> 

                
                {{-- Data/hora inicio real --}}
                <div class="form-group col col-sm-6 col-lg-3">                
                    <label for="idinicio_real" class="control-label">Início Real</label>
                    <input 
                        type="date" class="form-control" id="idinicio_real" name="inicio_real" 
                        value="{{old('inicio_real_hora')}}"
                    >
                    
                    <div class="form-group">                
                        <input 
                            type="time" class="form-control" id="idinicio_real_hora" name="inicio_real_hora" 
                            style="width: 100px" value="{{old('inicio_real_hora')}}"
                        >
                    </div>

                </div>


                {{-- Data/hora termino estimado  --}}
                <div class="form-group col col-sm-6 col-lg-3">                
                    <label for="idtermino_estimado" class="control-label">Término Estimado</label>
                    <input 
                        type="date" class="form-control" id="idtermino_estimado" name="termino_estimado" 
                        value="{{old('termino_estimado')}}"
                    >

                    <div class="form-group">                
                        <input 
                            type="time" class="form-control" id="idtermino_estimado_hora" name="termino_estimado_hora" 
                            style="width: 100px" value="{{old('termino_estimado_hora')}}"
                        >
                    </div>                    
                </div>
                
                {{-- Data/hora termino real  --}}
                <div class="form-group col col-sm-6 col-lg-3">                
                    <label for="idtermino_real" class="control-label">Término Real</label>
                    <input 
                        type="date" class="form-control" id="idtermino_real" name="termino_real" 
                        value="{{old('termino_real')}}"
                    >
                
                    <div class="form-group">                
                        <input 
                            type="time" class="form-control" id="idtermino_real_hora" name="termino_real_horas" 
                            style="width: 100px" value="{{old('inicio_real_hora')}}"
                        >
                    </div>                    
                </div>
            </div>

            <div class='card'>
                {{-- nav-tabs caso nao queira formato links ou nav-pills formato botoes--}}
                <ul class="nav nav-tabs" id="situacao-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="aba_sit_encontrada" data-toggle="pill" href="#content-result-obtido" role="tab" aria-controls="pills-home" aria-selected="true">Resultado Obtido</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="aba-sit-esperada" data-toggle="pill" href="#content-result-esperado" role="tab" aria-controls="pills-profile" aria-selected="false">Resultado Esperado</a>
                    </li>
                </ul>

                <div class="tab-content" id="tab-situacoes">
                    <div class="tab-pane fade show active m-2" id="content-result-obtido" role="tabpanel" aria-labelledby="pills-home-tab">
                        <textarea 
                            class="form-control" id="resultado_encontrado" name="resultado_encontrado" rows="3"
                            maxlength="255" placeholder="Texto que descreve a situação obtida"
                        >{{ old('resultado_encontrado') }}</textarea>
                    </div>
                    <div class="tab-pane fade m-2" id="content-result-esperado" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <textarea 
                            class="form-control" id="resultado_esperado" name="resultado_esperado" rows="3"
                            maxlength="255" placeholder="Texto que descreve a situação esperada"
                        >{{ old('resultado_esperado') }}</textarea>
                    </div>
                </div>            
            </div>


            <br class="my-5">                

        </form>

        <div class="my-2">
            <button type="submit" class="btn btn-primary" form="frmcadastro" formaction="/atividades">Gravar</button>
            <button type="submit" class="btn btn-warning" form="frmcadastro" formaction="/atividades/create">Gravar|Novo</button>
            <button type="cancel" onclick="history.go(-1)" class="btn btn-info">Voltar</button>
        </div>

        <br class="my-5"><br class="my-5">
        
    </div>    
@stop
