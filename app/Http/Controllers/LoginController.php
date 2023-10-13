<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{

    public function index(Request $request){
        
        $erro = $request->get('erro');
        if($erro == 1){
            $erro = "Usuário/senha incorreto(a)!";
        }
        if($erro == 2){
            $erro = "Necessário login válido para acessar a página!";
        }
        return view('site.login', ['titulo'=>'Login', 'erro'=>$erro]);

    }

    public function autenticar(Request $request){
        $request->validate(
        [
            'usuario' => 'required|email',
            'senha' => 'required'
        ], 
        [
            'usuario.email' => 'O campo usuário deve ser um email',
            'required' => 'O campo :attribute é obrigratório'
        ]);

        // RECUPERANDO PARÂMETROS DE FORMULÁRIO
        $email = $request->get('usuario');
        $password = $request->get('senha');
    

        // UTILIZANDO O MODEL "USER" CRIADO AUTOMATICAMENTE JUNTO COM O PROJETO, PARA VALIDAR A EXISTÊNCIA DE UM USUÁRIO SEGUINDO OS PARÂMETROS DO FORMULÁRIO DE LOGIN
        $user = new User();
        $existe = $user->where('email', $email)->where('password', $password)->get()->first();
        if(isset($existe->email)){
            session_start();
            $_SESSION['nome'] = $existe->name;
            $_SESSION['email'] = $existe->email;

            return redirect()->route('app.cliente');
        }else{
            return redirect()->route('site.login', ['erro' => 1]);
        }
    }

    public function sair(){
        session_destroy();
        return redirect()->route('site.index');
    }
}
