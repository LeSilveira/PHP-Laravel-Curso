<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{

    public function index(){
        return view('app.fornecedor');
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
