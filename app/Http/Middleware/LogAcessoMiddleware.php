<?php

namespace App\Http\Middleware;

use Closure;
use App\LogAcesso;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {


        /* "EMPURRA" A REQUEST PARA A APLICAÇÃO E RETORNA A RESPOSTA PARA O NAVEGADOR
        return $next($request);
        */

        /* INSPECIONA E RETORNA DIVERSAS INFORMAÇÕES DA REQUISIÇÃO
        dd($request);
        */

        // CRIA VARIÁVEIS PARA O IP E PARA A ROTA, USANDO O MÉTODO GET PARA COLETAR AS INFORMAÇÕES NECESSÁRIAS 
        $ip = $request->server->get('REMOTE_ADDR');
        $rota = $request->getRequestUri();
        

        // ARMAZENA AS INFORMAÇÕES EM UMA COLUNA DA TABELA INDICADA
        LogAcesso::create(["log"=>"IP $ip requisitou a rota $rota"]);
        
        // return $next($request);


        // RECUPERA E MANIPULA A RESPOSTA DA APLICAÇÃO PARA A REQUISIÇÃO
        $resposta = $next($request);
        $resposta->setStatusCode(201, "o código de status foi alterado para fins de testes !");
        //dd($resposta);
        return $resposta;

    }
}
