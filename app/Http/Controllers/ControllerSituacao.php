<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Situacao;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Boolean;
use phpDocumentor\Reflection\Types\This;
use PhpParser\Node\Stmt\Return_;

class ControllerSituacao extends Controller
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
    public function index()
    {
       // $this->gravar_continuar = 1;
        $registros = Situacao::paginate(6);
        return view('/situacoes', compact('registros') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('cadastros.situacao-novo');
    }

    /**
     * Salva um novo registro ou alteração
     *
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request, Int $id = 0, $addnew=false)
    {
        $strValidacao['descricao'] = 'required|max:60|unique:situacoes,descricao,' . ($id>0?$id:'');
        $validacoes = $request->validate( $strValidacao );

        # se não tem um id > 0 então é um um novo registro
        if ($id <=0 )
            $registro = new Situacao();
        else
            $registro = Situacao::find($id);
        
        # iguala os campos aos inputs do form
        $registro->descricao = $request->input('descricao');
        
        if ($registro->save()) {
            if ($addnew)
                return redirect('/situacoes/create');
            else    
                return redirect('/situacoes');
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
        
        $situacao = Situacao::find($id);
        if(isset($situacao)) {
            return view('/cadastros.situacao-editar', compact('situacao'));
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
        $situacao = Situacao::find($id);
        if(isset($situacao)) {
            $situacao->delete();
            return redirect('/situacoes');
        }    
    }
}
