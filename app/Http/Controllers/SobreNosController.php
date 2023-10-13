<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\LogAcessoMiddleware;


class SobreNosController extends Controller
{
    
    public function __construct(){
       /* UTILIZANDO O CONSTRUTOR DO CONTROLLER PARA DETERMINAR QUE O MIDDLEWARE SERÁ UTILIZADO QUANDO O CONTROLLER FOR INSTANCIADO
        $this->middleware(LogAcessoMiddleware::class);
        */
    }

    public function sobreNos (){
        $titulo = 'Sobre Nós';
        return view('site.sobre-nos', compact('titulo'));
    }
}
