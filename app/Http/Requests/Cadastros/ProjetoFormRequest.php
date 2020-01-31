<?php

namespace App\Http\Requests\Cadastros;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Unique;

class ProjetoFormRequest extends FormRequest
{
     
    // public function __construct()
    // {
    //     return $this->post->id;
    // }
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        #parametro $this->projeto
        $id_projeto = $this->projeto;
        
        If ( isset($id_projeto) )
            $rule=['titulo' => 'unique:projetos,titulo,' . $id_projeto];
        else
            $rule=['titulo' => 'unique:projetos,titulo'];
    
        return $rule;
    }
}
