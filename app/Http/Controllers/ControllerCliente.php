<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Boolean;
use phpDocumentor\Reflection\Types\This;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Validation\Rule;

class ControllerCliente extends Controller
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
        $registros = Cliente::paginate(6);
        return view('/clientes', compact('registros') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('cadastros.cliente-novo');
    }


    /**
     * Salva um novo registro ou alteração
     *
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request, Int $id = 0, $addnew=false)
    {
        $strValidacao['nome'] = 'required|max:100';
        $strValidacao['cpf_cnpj'] = 'required|max:14|unique:clientes,cpf_cnpj,' . ($id>0?$id:'');
        
        $validacoes = $request->validate( $strValidacao );

        # se não tem um id > 0 então é um um novo registro
        if ($id <=0 )
            $registro = new Cliente();
        else
            $registro = Cliente::find($id);
        
        # iguala os campos aos inputs do form
        $registro->nome = $request->input('nome');
        $registro->cpf_cnpj = $request->input('cpf_cnpj');;
    
        if ($registro->save()) {
            if ($addnew)
                return redirect('/clientes/create');
            else    
                return redirect('/clientes');
        }
    }

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
        
        $registro = Cliente::find($id);
        if(isset($registro)) {
            return view('/cadastros.cliente-editar', compact('registro'));
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
        $registro = Cliente::find($id);
        if(isset($registro)) {
            $registro->delete();
            return redirect('/clientes');
        }    
    }
}
