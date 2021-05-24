<?php
use core\Router;
use src\controllers\HomeController;

$router = new Router();

$router->get('/', 'HomeController@index');
$router->get('/home', 'HomeController@index');

$router->get('/novocliente', 'ClientePFController@add');
$router->post('/novocliente', 'ClientePFController@addAction');

$router->get('/clientepj', 'ClientePJController@add');
$router->post('/clientepj', 'ClientePJController@addAction');

$router->get('/imovel', 'ImovelController@add');
$router->post('/imovel', 'ImovelController@addAction');

$router->get('/processo', 'ProcessoController@index');
$router->post('/processo', 'ProcessoController@addAction');

$router->post('/compradorajax', 'CompradorAjaxController@index');
$router->post('/procuradorcompradorajax', 'ProcuradorCompradorAjaxController@index');
$router->post('/vendedorajax', 'VendedorAjaxController@index');
$router->post('/procuradorvendedorajax', 'ProcuradorVendedorAjaxController@index');
$router->post('/imovelajax', 'imovelAjaxController@index');

$router->get('/pesquisa', 'PesquisaController@index');
$router->post('/pesquisaclienteajax', 'PesquisaClienteAjaxController@index');
$router->post('/pesquisaimovelajax', 'PesquisaImovelAjaxController@index');
$router->post('/pesquisaprocessoajax', 'PesquisaProcessoAjaxController@index');

$router->get('/documentos', 'DocumentosController@index');
$router->post('/documentos', 'DocumentosController@addAction');

$router->post('/editacliente', 'EditaClienteController@index');
$router->post('/editaimovel', 'EditaImovelController@index');
$router->post('/editaprocesso', 'EditaProcessoController@index');
$router->post('/editaprocuradorcompradorajax', 'EditaProcuradorCompradorAjaxController@index');
$router->post('/editaprocuradorvendedorajax', 'EditaProcuradorVendedorAjaxController@index');

$router->get('/tarefas', 'TarefaController@index');
$router->get('/nova_tarefa', 'TarefaController@novaTarefa');
$router->post('/nova_tarefa', 'TarefaController@addNovaTarefa');
$router->get('/todas_tarefas', 'TarefaController@todasTarefas');
$router->post('/edita_tarefa', 'TarefaController@editaTarefa');
$router->post('/deletatarefaajax', 'DeletaTarefaAjaxController@index');
$router->post('/realizadaajax', 'RealizadaAjaxController@index');

$router->get('/espelho', 'EspelhoController@index');
$router->post('/novoespelho', 'EspelhoController@addEspelho');

$router->get('/itbi', 'ITBIController@index');
$router->post('/novoitbi', 'ITBIController@addITBI');