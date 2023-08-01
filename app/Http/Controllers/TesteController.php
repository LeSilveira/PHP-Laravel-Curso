<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function teste(int $p1, int $p2){

        //                USO DE ECHO PARA EXIBIR INFORMAÇÃO
        //echo "A soma de $p1 e $p2 é: ".($p1+$p2);

        //                USO DE PASSAGEM DE PARÂMETROS MANUAL PARA A VIEW
        //return view('site.teste', ['p1' => $p1, 'p2' => $p2, 'p3' => ($p1+$p2)]);

        //                USO DE PASSAGEM DE PARÂMETROS COM COMPACT PARA A VIEW
        //return view('site.teste', compact('p1', 'p2'));

        //                USO DE PASSAGEM DE PARÂMETROS COM WITH PARA A VIEW
        return view('site.teste')
        ->with('p1', $p1)
        ->with('p2', $p2)
        ->with('p3', $p2+$p1);
    }
}
