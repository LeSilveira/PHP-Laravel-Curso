<?php

namespace App\Http\Controllers;
use App\SiteContato;
use App\MotivoContato;

use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function contato (Request $request){

        /* 
        Exemplo de recuperação de dados de formulário utilizado POST e Request
        var_dump($_POST);
        echo '<br>';
        echo $request['telefone'];
        echo '<br>';
        echo '<br>';
        */

        /*
        Exemplo de inserção de dados no banco utilizando o método create
        SiteContato::create(['nome' => $request['nome'], 'telefone' => $request['telefone'], 'email' => $request['email'], 'motivo_contato' => $request['motivo_contato'], 'mensagem' => $request['mensagem']]);
        
        Exemplo de inserção de dados no banco utilizando o método fill(preenche os atributos) e all(recupera os dados da request por meio de um array associativo)
        SiteContato::fill($request->all());
        */
        $indices_motivos_contatos = MotivoContato::all();
        $titulo = 'Fale Conosco';
        return view('site.contato', compact('titulo', 'indices_motivos_contatos'));
    }

    public function salvar(Request $request){

        
        /*
        Exemplo de utilização da função validate (informação obrigatória, mínimo e máximo de carac., nome único 
        E especificação dos feedbacks)dos dados preenchidos via formulário no método POST
        */
        $request->validate([
            'nome'=>'required|min:3|max:50|unique:site_contatos',
            'telefone'=>'required',
            'email'=>'email',
            'motivo_contatos_id'=>'required',
            'mensagem'=>'required'
        ], 
        // Exemplo de especificação de mensagens de feedback para validações
        [
        // Especificação direta (é aplicada apenas para o atributo e validação especificado)
            'nome.required' => 'O campo :attribute é obrigatório',
            'nome.min' => 'O nome deve ter no mínimo 3 letras',
            'nome.max' => 'O nome deve ter no máximo 50 letras',
            'nome.unique' => 'O nome inserido já está sendo utilizado',

        // Espeificação genérica (é aplicada para todos os casos dessa validação)
            'required' => 'O campo :attribute é obrigatório',
            'email' => 'O e-mail inserido não é valido',
        ]);

        SiteContato::create([
            'nome' => $request['nome'], 
            'telefone' => $request['telefone'], 
            'email' => $request['email'], 
            'motivo_contatos_id' => $request['motivo_contatos_id'], 
            'mensagem' => $request['mensagem']]);
            return redirect()->route('site.index');

    }
}
