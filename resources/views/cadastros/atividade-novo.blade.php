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
                        maxlength="255" placeholder="Detalhes do objetivo da Atividade"
                    ></textarea>
                </div>
            </div>                   
            
            <div class="form-group">                
                <label for="projeto_id">Projeto</label>
                <select name="projeto_id" id="projeto_id" class="form-control">
                    @foreach ($projetos as $projeto)
                        <option value={{$projeto->id}}>{{$projeto->titulo}}</option>
                    @endforeach
                </select>
            </div>   

            <div class="row">
                {{-- Data / hora inicio estimado --}}
                <div class="form-group col col-sm-6 col-lg-3">                
                    <label for="idinicio_estimado" class="control-label">Início Estimado</label>
                    <input 
                        type="date" autofocus class="form-control" id="idinicio_estimado" name="inicio_estimado" 
                        value="{{old('inicio_estimado')}}"
                    >
                    <div class="form-group">      
                        <input 
                            type="time" class="form-control" id="idtermino_estimado_hora" name="termino_estimado_hora" 
                            style="width: 80px" value="{{old('termino_estimado_hora')}}"
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
                            style="width: 80px" value="{{old('inicio_real_hora')}}"
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
                            style="width: 80px" value="{{old('termino_estimado_hora')}}"
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
                            style="width: 80px" value="{{old('inicio_real_hora')}}"
                        >
                    </div>                    
                </div>
                
            </div>
        </form>

        <button type="submit" class="btn btn-primary" form="frmcadastro" formaction="/projetos">Gravar</button>
        <button type="submit" class="btn btn-warning" form="frmcadastro" formaction="/projetos/create">Gravar|Novo</button>
        <button type="cancel" onclick="history.go(-1)" class="btn btn-info">Voltar</button>
    </div>    
@stop
