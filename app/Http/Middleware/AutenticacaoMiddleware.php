<?php

namespace App\Http\Middleware;

use Closure;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

                                                //  RECEBENDO VARIÁVEL DA REQUISIÇÃO
    public function handle($request, Closure $next)
    {
        session_start();

        if(isset($_SESSION['email']) && $_SESSION['email'] != ""){
            return $next($request);
        }else{
            return redirect()->route('site.login', ['erro'=>2]);
        }

        /*
        // EXIBIR A VARIÁVEL RECEBIDA COMO PARÂMETRO PELA ROTA
        echo $teste;
        
        //return $next($request);
        if(false){
            return $next($request);
        }
        else{
            return Response("acesso negado");
        }*/
    }
}
