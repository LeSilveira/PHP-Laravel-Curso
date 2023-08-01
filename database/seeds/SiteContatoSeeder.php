<?php

use Illuminate\Database\Seeder;
use App\SiteContato;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        SiteContato::create([
            'nome' => 'testeSite1', 
            'telefone' => '(51) 91234-5678', 
            'email' => 'testeSite1@teste.com.br', 
            'motivo_contato' => '1', 
            'mensagem' => 'mensagemTesteSite1']);
        */

        factory (SiteContato::class, 100)->create();
    }
}
