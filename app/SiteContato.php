<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteContato extends Model
{
    //Determina nome da tabela no banco de dados, para evitar erros já que o eloquent apenas adiciona um 's' para pesquisar
    protected $table = "site_contatos";
    protected $fillable = ['nome', 'telefone', 'email', 'motivo_contatos_id', 'mensagem'];
    
}
