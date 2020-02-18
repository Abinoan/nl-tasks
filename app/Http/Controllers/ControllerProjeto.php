<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projeto;
use App\Grupo;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Boolean;
use phpDocumentor\Reflection\Types\This;
use PhpParser\Node\Stmt\Return_;
use App\Http\Requests\Cadastros\ProjetoFormRequest;

class ControllerProjeto extends Controller
{
    /**
     *
     * @return array ativar o middleware de autenticação
     */
    public function __construct()
    {
        $this->middleware("auth");
    }

    # retorna o registro de grupo relacionado ao registro do projeto
    public function grupo(){
        return $this->hasOne('App\Grupo');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $titulo = $request->input('busca_padrao');

        // with('grupo') determina que o laravel traga os registros do relacionamento grupo
        $registros = Projeto::where('titulo', 'like', "%$titulo%")->with('grupo')->paginate(6);
       // return $registros;

        return view('/projetos', compact('registros') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $grupos = Grupo::all(); 
       return view('cadastros.projeto-novo', ['grupos' => $grupos] );
    }

    /**
     * Salva um novo registro ou alteração
     *
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request, Int $id = 0, $addnew=false)
    {
        $strValidacao['grupo_id'] = 'required';

        if ($id <= 0) {
        //     $strValidacao['titulo'] = 'required|max:60|unique:projetos,titulo,' . ($id>0?$id:'');
        // } else {
            $strValidacao['titulo'] = 'required|max:60|unique:projetos,titulo' ;
        }

        $validacoes = $request->validate( $strValidacao );

        # se não tem um id > 0 então é um um novo registro
        if ($id <=0 )
            $registro = new Projeto();
        else
            $registro = Projeto::find($id);
        
        # iguala os campos aos inputs do form
        $registro->titulo = $request->input('titulo');
        $registro->descricao = $request->input('descricao');
        $registro->grupo_id = $request->input('grupo_id');

        if ($registro->save()) {
            if ($addnew)
                return redirect('/projetos/create');
            else    
                return redirect('/projetos');
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
        $grupos = Grupo::all();         
        $registro = Projeto::find($id);
        if(isset($registro)) {
            return view('/cadastros.projeto-editar', compact('registro', 'grupos'));
        }    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    //public function update(Request $request, $id)
    public function update(ProjetoFormRequest $request, $id)
    {
        $validated = $request->validated();
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
        $registro = Projeto::find($id);
        if(isset($registro)) {
            $registro->delete();
            return redirect('/projetos');
        }    
    }
}
