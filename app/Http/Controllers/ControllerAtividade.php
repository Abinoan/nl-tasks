<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Atividade;
use App\Projeto;
use App\Situacao;
use Illuminate\Support\Facades\Auth;

class ControllerAtividade extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $situacoes = Situacao::all();         
        $projetos = Projeto::all();         

        $titulo = $request->input('busca_titulo');
        $inicio_estimado = $request->input('busca_inicio_estimado');
        $situacao_id = $request->input('busca_situacao_id');
        $projeto_id = $request->input('busca_projeto_id');

        $registros = Atividade::titulo($titulo)
                                ->inicioestimado($inicio_estimado)
                                ->situacao($situacao_id)
                                ->projeto($projeto_id)
                                ->with('situacao')
                                ->with('projeto')->paginate(6);
        // $registros = Atividade::where('titulo', 'like', "%$titulo%")->with('situacao')->with('projeto')->paginate(6);
        // $registros = Atividade::where('situacao_id', '=', "$idSituacao")->with('situacao')->with('projeto')->paginate(6);
        return view('/atividades', compact('registros', 'projetos', 'situacoes') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projetos = Projeto::all(); 
        $situacoes = Situacao::all(); 
        return view('cadastros.atividade-novo', ['projetos' => $projetos, 'situacoes' => $situacoes] );    
    }

        /**
     * Salva um novo registro ou alteração
     *
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request, Int $id = 0, $addnew=false)
    {
        $strValidacao['projeto_id'] = 'required';
        $strValidacao['titulo'] = 'required|max:100|unique:atividades,titulo,' . ($id>0?$id:'');
        $strValidacao['descricao'] = 'required';

        $validacoes = $request->validate( $strValidacao );

        # se não tem um id > 0 então é um um novo registro

        if ($id <=0 )
            $registro = new Atividade();
        else
            $registro = Atividade::find($id);
        
        # iguala os campos aos inputs do form
        $registro->titulo = $request->input('titulo');
        $registro->descricao = $request->input('descricao');
        $registro->resultado_encontrado = $request->input('resultado_encontrado');
        $registro->resultado_esperado = $request->input('resultado_esperado');
        $registro->projeto_id = $request->input('projeto_id');
        $registro->situacao_id = $request->input('situacao_id');
        $registro->inicio_estimado = $request->input('inicio_estimado');
        $registro->inicio_estimado_hora = $request->input('inicio_estimado_hora');
        $registro->inicio_real = $request->input('inicio_real');
        $registro->inicio_real_hora = $request->input('inicio_real_hora');

        if ($registro->save()) {
            if ($addnew)
                return redirect('/atividades/create');
            else    
                return redirect('/atividades');
        }
    }

    # salva um registro alterado ou um novo registro
    public function save_new(Request $request)
    {
        return $this->save($request, 0, true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->save($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $situacoes = Situacao::all();         
        $projetos = Projeto::all();         
        $registro = Atividade::find($id);
        if(isset($registro)) {
            return view('/cadastros.atividade-editar', compact('registro', 'projetos', 'situacoes'));
        }    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $validated = $request->validated();
        return $this->save($request, $id, false);
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $registro = Atividade::find($id);
        if(isset($registro)) {
            $registro->delete();
            return redirect('/atividades');
        }    
    }
}
