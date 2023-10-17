<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fornecedor;

class FornecedorController extends Controller
{

    public function index(){
        return view('app.fornecedor.index');
    }

    public function listar (Request $request){
   
        $fornecedores = Fornecedor::where('nome', 'like', '%'.$request->input('nome').'%')
        ->where('site', 'like', '%'.$request->input('site').'%')
        ->where('uf', 'like', '%'.$request->input('uf').'%')
        ->where('email', 'like', '%'.$request->input('email').'%')
        ->get();

        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores]);
    }

    public function adicionar(Request $request){


        // VALIDAÇÃO DOS DADOS INSERIDOS NO FORMULÁRIO PARA EXIBIÇÃO DO FORMULÁRIO DE INSERÇÃO
        if($request->input("_token") != "" && $request->input("id") == ""){
            $request->validate([
                'nome'=>'required|min:3|max:40',
                'site'=>'required',
                'uf'=>'required|min:2|max:2',
                'email'=>'email|required'
            ],
            [
                'nome.required' => 'O campo :attribute é obrigatório',
                'nome.min' => 'O nome deve ter no mínimo 3 letras',
                'nome.max' => 'O nome deve ter no máximo 40 letras',
                'uf.required' => 'O campo :attribute é obrigatório',
                'uf.min' => 'O UF deve ter no mínimo 2 letras',
                'uf.max' => 'O UF deve ter no máximo 2 letras',
                'email.email' => 'O e-mail inserido não é valido',
                'email.required' => 'O campo :attribute é obrigatório',
                'site.required' => 'O campo :attribute é obrigatório',
            ]);
    
            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());
        }

        // VALIDAÇÃO DO DADO "ID" PARA EXIBIÇÃO DO FORMULÁRIO DE EDIÇÃO
        if ($request->input("id") != ""){
            $fornecedor = Fornecedor::find($request->input("id"));
            $fornecedor->update($request->all());

            return redirect()->route('app.fornecedor.editar', ['id'=>$fornecedor->id]);
        }
        
        return view('app.fornecedor.adicionar');
    }

        public function editar($id){
            $fornecedor = Fornecedor::find($id);
            return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor, 'botao'=>"editar"]);
        }
    /*
    public function index(){
        //                CRIAÇÃO DE MATRIZ ASSOCIATIVA
        $fornecedores = [
            ['nome' => 'Leandro Silveira', 'idade' => '22'],
            ['nome' => 'Jorge Machado', 'idade' => '35'],
            ['nome' => 'Hugo Teodoro', 'idade' => '13'],
            ['nome' => 'Fernanda Lopes', 'idade' => '27']
        ];

                        USO DE OPERADOR CONDICIONAL TERNÁRIO
        echo empty($fornecedores) ? 'Não há fornecedores cadastrados' : 'Há fornecedores cadastrados';
        
        
                        USO DE OPERADOR CONDICIONAL COM VALOR DEFAULT, CHECA SE É DEFINIDO IGUAL AO ISSET
        echo $fornecedores[1]['nome'] ?? 'Fornecedor 1: Não há um nome cadastrado para este fornecedor!';
        

        return view('app.fornecedor.index', compact('fornecedores'));
    }*/
}
