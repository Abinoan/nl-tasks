@isset($registros)
<div class="row">
    <div class="table-responsive">
        <table  style="table-layout: fixed;" class="table table-sm table-ordered table-hover">
            <thead>
                <tr>
                    @foreach ($cabecalhos as $item)
                        <th>{{$item}}</th>
                    @endforeach
                    <th>Editar</th>
                    <th>Apagar</th>
                </tr>
            </thead>

            <tbody>
                @foreach($registros as $registro)
                    <tr style="font-family: 'Open Sans', sans-serif; font-size: 0.75em">
                    @foreach ($campos as $campo)
                        <td> {{ $registro[$campo] }} </td>  
                    @endforeach

                    @isset($relacionamentos)
                        @foreach ($relacionamentos as $relacao)
                            <td> {{ $registro[ $relacao [0] ] [$relacao[1]] }} </td>
                        @endforeach
                    @endisset

                    @include('layouts.btn-submit', 
                        [
                            "action" => url('/' . $prefixo_rota . '/' . $registro[$id] . "/edit"),
                            "caption_botao" => 'Editar', 
                            "tipobtn" => "btn-success",
                            "metodo" => "GET"
                        ]
                    )

                    @include('layouts.btn-submit',
                        [
                            "action" => url('/' . $prefixo_rota . '/' . $registro->id), 
                            "caption_botao" => "Apagar", 
                            "tipobtn" => "btn-danger",
                            "metodo" => "DELETE"
                        ]
                    )
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endisset