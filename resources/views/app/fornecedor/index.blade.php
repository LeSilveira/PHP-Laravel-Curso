<h3>Fornecedores</h3>


@php
/*                  USO DE PHP PURO
if(){

}else if(){

}else
*/
@endphp

{{--                USO DO IF EM BLADE
@if(count($fornecedores) > 0 && count($fornecedores) < 10)
    <h3> Existem algumas pessoas cadastradas </h3>
@endif
--}}

{{--                USO DO UNLESS EM BLADE
{{$fornecedores[1]['nome'].": ".$fornecedores[1]['idade']}}
@unless($fornecedores[0]['idade'] > 30)
    Esta pessoa é mais nova que 30 anos
@endunless
--}}

{{--RO ESTÁ DECLARADO, JUNTO COM O EMPTY PARA VERIFICAR SE HÁ DADOS NA MATRIZ
@isset($fornecedores)
    @unless(@empty($fornecedores)==true)
    Fornecedor: {{$fornecedores[0]["nome"]}}
    <br>
    Idade: {{$fornecedores[0]["idade"]}}
    <br>
    @endunless    
@endisset
--}}

{{--                USO DO SWITCH EM BLADE
@switch($fornecedores[3]['nome'])
    @case("Leandro Silveira")
        Opa
        @break

    @case("Jorge Machado")
        jorgin
        @break

    @default
        Não sou eu ou o Jorgin
@endswitch
--}}

{{--                USO DO FOR EM BLADE
@for ($i = 0; count($fornecedores)>$i; $i++)
    <h4>Nome: {{$fornecedores[$i]["nome"]}} 
    <br>
        Idade: {{$fornecedores[$i]["idade"]}}  </h4>
    <hr>
@endfor
--}}

{{--                USO DO FOREACH EM BLADE
@foreach ($fornecedores as $fornecedor)
    {{$loop}} //VARIÁVEL CRIADA NO FOREACH E FORELSE PARA CONTROLE DA REPETIÇÃO
    <h4>Nome: {{$fornecedor["nome"]}} 
    <br>
        Idade: {{$fornecedor["idade"]}}  </h4>
    <hr>
@endforeach
--}}

{{--                USO DO FOREACH EM BLADE
@forelse ($fornecedores as $fornecedor)
    {{$loop}} //VARIÁVEL CRIADA NO FORELSE E FOREACH PARA CONTROLE DA REPETIÇÃO
    h4>Nome: {{$fornecedor["nome"]}} 
    <br>
        Idade: {{$fornecedor["idade"]}}  </h4>
    <hr>
@empty
    Não há fornecedores cadastrados!
@endforelse
--}}
