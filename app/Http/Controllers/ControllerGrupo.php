<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grupo;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Boolean;
use phpDocumentor\Reflection\Types\This;
use PhpParser\Node\Stmt\Return_;

class ControllerGrupo extends Controller
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
        $descricao = $request->input('busca_padrao');
        $registros = Grupo::where('descricao', 'like', "%$descricao%")->paginate(6);
        return view('/grupos', compact('registros') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('cadastros.grupo-novo');
    }

    /**
     * Salva um novo registro ou alteração
     *
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request, Int $id = 0, $addnew=false)
    {
        $strValidacao['descricao'] = 'required|max:60|unique:grupos,descricao,' . ($id>0?$id:'');
        $validacoes = $request->validate( $strValidacao );

        # se não tem um id > 0 então é um um novo registro
        if ($id <=0 )
            $registro = new Grupo();
        else
            $registro = Grupo::find($id);
        
        # iguala os campos aos inputs do form
        $registro->descricao = $request->input('descricao');
        
        if ($registro->save()) {
            if ($addnew)
                return redirect('/grupos/create');
            else    
                return redirect('/grupos');
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
        $registro = Grupo::find($id);
        if(isset($registro)) {
            return view('/cadastros.grupo-editar', compact('registro'));
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
        $registro = Grupo::find($id);
        if(isset($registro)) {
            $registro->delete();
            return redirect('/grupos');
        }    
    }
}
