<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{
    //Utilização de "Trait" (semelhante à extends) para poder utilizar o softdeletes na tabela fornecedor

    protected $table = "fornecedors";

    //Determina quais atributos podem ser determinados pelo método 'Fill', 'Create' etc.
    protected $fillable = ['nome', 'site', 'uf', 'email'];


}
