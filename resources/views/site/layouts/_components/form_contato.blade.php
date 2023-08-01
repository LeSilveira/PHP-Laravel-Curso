
{{--         APLICAÇÃO DE PARAMETRIZAÇÃO EM UM COMPONENTE
                            {{$slot}}
                            {{$num}}--}}

<form action = {{route('site.contato')}} method="post">
    @csrf

    <input name="nome" value = "{{ old("nome") }}" type="text" placeholder="Nome" class="borda-preta">
    <div style="color: red">
        @if ($errors->has('nome'))
            {{$errors->first('nome')}}
        @endif
    </div>    
    <input name="telefone" value = "{{ old("telefone") }}" type="text" placeholder="Telefone" class="borda-preta">
    <div style="color: red">
        @if ($errors->has('telefone'))
            {{$errors->first('telefone')}}
        @endif
    </div>   
    <input name="email" value = "{{ old("email") }}" type="text" placeholder="E-mail" class="borda-preta">
    <div style="color: red">
        @if ($errors->has('email'))
            {{$errors->first('email')}}
        @endif
    </div>   
    <select name="motivo_contatos_id" class="borda-preta">
        <option value="">Qual o motivo do contato?</option>
        @foreach ($indices_motivos_contatos as $indices => $indice)
        <option value="{{$indice->id}}" {{old("motivo_contatos_id") == $indice->id ? 'selected' : ''}}>{{$indice->motivo_contato}}</option>
        @endforeach
    </select>
    <textarea name="mensagem" class="borda-preta">@if(old("mensagem") == "")Preencha aqui a sua mensagem   @else{{old("mensagem")}}@endif</textarea>
    <div style="color: red">
        @if ($errors->has('mensagem'))
            {{$errors->first('mensagem')}}
        @endif
    </div>
    <button type="submit" class="borda-preta">ENVIAR</button>

</form>

{{--Utilizando a variável $errors, que é automaticamente criada para requisições, para serem exibidos no topo da página
@if ($errors->any())
        
    <div style="position:absolute; top:0px; left: 0px; width:100%; background: rgb(255, 145, 0)">
        @foreach ($errors->all() as $error)
            {{$error}}
            <br>
        @endforeach
    </div>
@endif--}}