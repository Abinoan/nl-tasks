<td style="width:50px">
    <form method="POST" action={{$action}}>
        @csrf
        <button type="submit"  style="font-family: 'Open Sans', sans-serif; font-size: 0.75em" class="btn btn-sm {{$tipobtn}}">{{$caption_botao}}</button>
        @isset($metodo)
            @method($metodo)
        @endisset
    </form>
</td>
