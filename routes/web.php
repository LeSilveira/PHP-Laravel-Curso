<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\LogAcessoMiddleware;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//                CRIAÇÃO DE ROUTES ATRIBUINDO NOMES À ELAS

Route::// DETERMINANDO DIRETO NA ROTA QUE O MIDDLEWARE SERÁ UTILIZADO ===>>> middleware(LogAcessoMiddleware::class)
    get('/', 'PrincipalController@principal')
    ->name("site.index");

Route::get('/sobre-nos', 'SobreNosController@sobrenos')
    ->name("site.sobre-nos");

Route::get('/contato', 'ContatoController@contato')
    ->name("site.contato")
    ->middleware('log.acesso');

Route::post('/contato', 'ContatoController@salvar')
    ->name("site.contato");

Route::get('/login/{erro?}', 'LoginController@index')
    ->name("site.login");

Route::post('/login', 'LoginController@autenticar')
    ->name("site.login");

//                CRIAÇÃO DE GRUPO DE ROUTES COM PREFIXO / UTILIZAÇÃO DE MIDDLEWARE PARA O GRUPO DE ROTAS COM PASSAGEM DE PARÂMETROS
Route::middleware('autenticacao: padrao')->prefix('/app')->group(function(){

    Route::get('/home', 'HomeController@index')
        ->name("app.home");

    Route::get('/sair', 'LoginController@sair')
        ->name("app.sair");

    Route::get('/cliente', 'ClienteController@index')
        ->name("app.cliente");

    Route::get('/fornecedor', 'FornecedorController@index')
        ->name("app.fornecedor");

    Route::post('/fornecedor/listar', 'FornecedorController@listar')
        ->name("app.fornecedor.listar");

    Route::get('/fornecedor/listar', 'FornecedorController@listar')
    ->name("app.fornecedor.listar");

    Route::get('/fornecedor/editar{id}', 'FornecedorController@editar')
    ->name("app.fornecedor.editar");

    Route::get('/fornecedor/index', 'FornecedorController@index')
    ->name("app.fornecedor.index");

    Route::get('/fornecedor/adicionar', 'FornecedorController@adicionar')
        ->name("app.fornecedor.adicionar");
    
    Route::post('/fornecedor/adicionar', 'FornecedorController@adicionar')
        ->name("app.fornecedor.adicionar");

    Route::get('/produto', 'ProdutoController@index')
        ->name("app.produto");

});

/*               ROUTES DE TESTE
PASSANDO PARÂMETROS NA PRIMEIRA PARA O CONTROLLER */
Route::get('/teste/{p1}/{p2}', 'TesteController@teste')
    ->name('teste');

Route::get('/welcome', 'WelcomeController@controller')
    ->name('welcome');


//                CRIAÇÃO DE ROUTE PARA DEMONSTRAR UTILIZAÇÃO DO REDIRECT()
/* 
Route::get('/rota2', function(){
    return redirect()->route('site.rota1');
})->name("site.rota2");*/

//                CRIAÇÃO DE ROUTE COM A UTILIZAÇÃO DE REDIRECT SEM O RETURN, SENDO REDIRECIONADO DE /ROTA2 PARA /ROTA1
//Route::redirect('/rota2', '/rota1');


//                CRIAÇÃO DE ROUTE PASSANDO PARÂMETRO SEM UTILIZAR CONTROLLER, UTILIZANDO WHERE PARA VALIDAR PARÂMETROS RECEBIDOS
/*Route::get('/contato/{nome}/{categoria_id}',
function(
    string $nome = "nome padrão", 
    int $categoria_id = 1 // 1 - informação

    ){
    echo "Estamos aqui: $nome - $categoria_id"; 
}
)->where('categoria_id', '[0-9]+')->where('nome', '[A-Za-z]+'); */

//                CRIAÇÃO DE ROUTE DE FALLBACK PARA CASO A ROTA SOLICITADA NÃO EXISTA
Route::fallback(function(){
    echo 'A rota não existe. <a href= "'.route('site.index').'"> clique aqui </a> para voltar à página inicial.';
});