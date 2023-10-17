@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')

    <div class="conteudo-pagina">


        <div class="titulo-pagina-2">

            <p> Fornecedor - {{empty($botao) ? "Adicionar" : "Editar"}} </p>
            
        </div>

        <div class = "menu">
            <ul>
                <li> <a href="{{route('app.fornecedor.adicionar')}}">Novo</a> </li> 
                <li> <a href="{{route('app.fornecedor.index')}}">Consulta</a></li>
        </div>

        <div class = "informacao-pagina">
        <div style="width:30%; margin-left:auto; margin-right: auto;">
            <form method="post" action="{{route('app.fornecedor.adicionar')}}">
                @csrf
                <input type = "hidden" name="id" value="{{ $fornecedor->id ?? ''}}">
                <!-- > UTILIZAÇÃO DE COMPARATIVO TERNÁRIO PARA CONFERIR SE IRÁ EXIBIR ALGUMA DELAS (PRIORIDADE PARA A PRIMEIRA) </!-->
                <input type="text" name="nome" value="{{ $fornecedor->nome ?? old('nome')}}" placeholder="Nome" class="borda-preta">
                <div style="color: red">
                {{$errors->has('nome') ? $errors->first('nome') : ' '}}
                </div>
                <input type="text" name="site" value="{{ $fornecedor->site ?? old('site')}}" placeholder="Site" class="borda-preta">
                <div style="color: red">
                {{$errors->has('site')? $errors->first('site') :''}}
                </div>
                <input type="text" name="uf" value="{{ $fornecedor->uf ?? old('uf')}}" placeholder="UF" class="borda-preta">
                <div style="color: red">
                {{$errors->has('uf')? $errors->first('uf') :''}}
                </div>
                <input type="text" name="email" value="{{ $fornecedor->email ?? old('email')}}" placeholder="E-mail" class="borda-preta">
                <div style="color: red">
                {{$errors->has('email')? $errors->first('email') :''}}
                </div>
                <button type="submit" class="borda-preta">{{empty($botao) ? "Cadastrar" : "Editar"}}</button>
            </form>

        </div>

    </div>


@endsection