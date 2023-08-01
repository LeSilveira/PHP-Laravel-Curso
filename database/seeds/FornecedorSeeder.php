<?php

use Illuminate\Database\Seeder;
use App\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Exemplo de criação e atribuição de valores para os atributos em linhas separadas
        
        $fornecedor = new Fornecedor();
        $fornecedor->nome = ' ';
        $fornecedor->site = ' ';
        $fornecedor->uf = ' ';
        $fornecedor->email = ' ';
        $fornecedor->save();

           Exemplo utilizando o método create
        Fornecedor::create(['nome' => ' ', 'site' => ' ', 'uf' => ' ', 'email' => ' ']);
        

           Exemplo utilizando o método 'insert' (deste modo não passa pelo tratamento do Eloquent, logo não registra 'created at' e 'updated at'):
           Selecionando a table antes
        DB::table('fornecedors')->insert(['nome' => ' ', 'site' => ' ', 'uf' => ' ', 'email' => ' ']);
        
           Utilizando o método insert diretamente e passando o comando SQL completo
        DB::insert('insert into fornecedors (nome, site, uf, email) values (?, ?, ?, ?)', ['teste1', 'teste1.com.br', 't1', 'teste1@teste.com.br']);
        */
    }
}
