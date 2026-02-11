<?php

<<<<<<< Updated upstream
use app\controller\Fornecedor;
use app\controller\User;
use app\controller\Cliente;
use app\controller\Empresa;
use app\controller\Home;
use app\controller\Login;
use app\middleware\Middleware;
use Slim\Routing\RouteCollectorProxy;

$app->get('/', Home::class . ':home');//->add(Middleware::authentication());
$app->get('/home', Home::class . ':home');//->add(Middleware::authentication());
=======
use app\controller\User;
use app\controller\cliente;
use app\controller\Empresa;
use app\controller\Home;
use app\controller\PaymentTerms;
use app\controller\Sale;
use app\controller\Fornecedor;
use app\controller\Login;
use Slim\Routing\RouteCollectorProxy;


$app->get('/', Home::class . ':home');
$app->get('/home', Home::class . ':home');
>>>>>>> Stashed changes
$app->get('/login', Login::class . ':login');

$app->group('/login', function (RouteCollectorProxy $group) {
    $group->post('/precadastro', Login::class . ':precadastro');
    $group->post('/autenticar', Login::class . ':autenticar');
<<<<<<< Updated upstream
});
$app->group('/usuario', function (RouteCollectorProxy $group) {
    $group->get('/lista', User::class . ':lista');//->add(Middleware::authentication());
    $group->get('/cadastro', User::class . ':cadastro');//->add(Middleware::authentication());
    $group->get('/alterar/{id}', User::class . ':alterar');//->add(Middleware::authentication());
    $group->post('/print', User::class . ':print');
    $group->post('/insert', User::class . ':insert');
    $group->post('/delete', User::class . ':delete');
    $group->post('/listuser', User::class . ':listuser');

});
$app->group('/cliente', function (RouteCollectorProxy $group) {
    $group->get('/lista', Cliente::class . ':lista');//->add(Middleware::authentication());
    $group->get('/cadastro', Cliente::class . ':cadastro');//->add(Middleware::authentication());
    $group->post('/insert', Cliente::class . ':insert');
    $group->post('/delete', Cliente::class . ':delete');
    $group->post('/listacliente', Cliente::class . ':listacliente');
});
$app->group('/fornecedor', function (RouteCollectorProxy $group) {
    $group->get('/lista', Fornecedor::class . ':lista');//->add(Middleware::authentication());
    $group->get('/cadastro', Fornecedor::class . ':cadastro');//->add(Middleware::authentication());
    $group->post('/insert', Fornecedor::class . ':insert');
    $group->post('/delete', Fornecedor::class . ':delete');
    $group->post('/listafornecedor', Fornecedor::class . ':listafornecedor');
});
$app->group('/empresa', function (RouteCollectorProxy $group) {
    $group->get('/lista', Empresa::class . ':lista');//->add(Middleware::authentication());
    $group->get('/cadastro', Empresa::class . ':cadastro');//->add(Middleware::authentication());
    $group->post('/insert', Empresa::class . ':insert');
    $group->post('/delete', Empresa::class . ':delete');
    $group->post('/listaempresa', Empresa::class . ':listaempresa');
=======
    $group->post('/recuperar', Login::class . ':recuperar');
    $group->post('/verificarCodigo', Login::class . ':verificarCodigo');
    $group->post('/atualizarSenha', Login::class . ':atualizarSenha');
});

$app->group('/venda', function (RouteCollectorProxy $group) {
    $group->get('/lista', Sale::class . ':lista');
    $group->get('/cadastro', Sale::class . ':cadastro');
    $group->post('/insert', Sale::class . ':insert');
    $group->post('/update', Sale::class . ':update');
});

$app->group('/usuario', function (RouteCollectorProxy $group) {
    $group->get('/lista', User::class . ':lista'); #->add(Auth::route());
    $group->get('/cadastro', User::class . ':cadastro'); #->add(Auth::route());
    $group->post('/listuser', User::class . ':listuser');
    $group->post('/update', User::class . ':update');
    $group->post('/insert', User::class . ':insert');
    $group->get('/alterar/{id}', User::class . ':alterar'); #->add(Auth::route());
    $group->post('/delete', User::class . ':delete');
    $group->get('/print', User::class . ':print'); #->add(Auth::route());
});
$app->group('/cliente', function (RouteCollectorProxy $group) {
    $group->get('/lista', cliente::class . ':lista'); #->add(Auth::route());
    $group->get('/cadastro', cliente::class . ':cadastro'); #->add(Auth::route());
    $group->post('/listcliente', cliente::class . ':listcliente');
    $group->post('/update', cliente::class . ':update');
    $group->post('/insert', cliente::class . ':insert');
    $group->get('/alterar/{id}', cliente::class . ':alterar'); #->add(Auth::route());
    $group->post('/delete', cliente::class . ':delete');
});
$app->group('/produto', function (RouteCollectorProxy $group) {
    $group->get('/lista', app\controller\Produto::class . ':lista'); #->add(Auth::route());
    $group->get('/cadastro', app\controller\Produto::class . ':cadastro'); #->add(Auth::route());
    $group->post('/listproductdata', app\controller\Produto::class . ':listproductdata');
    $group->post('/update', app\controller\Produto::class . ':update');
    $group->post('/insert', app\controller\Produto::class . ':insert');
    $group->get('/alterar/{id}', app\controller\Produto::class . ':alterar'); #->add(Auth::route());
    $group->post('/delete', app\controller\Produto::class . ':delete');
});

$app->group('/empresa', function (RouteCollectorProxy $group) {
    $group->get('/lista', Empresa::class . ':lista'); #->add(Auth::route());
    $group->get('/cadastro', Empresa::class . ':cadastro'); #->add(Auth::route());
    $group->post('/listempresa', Empresa::class . ':listempresa');
    $group->post('/update', Empresa::class . ':update');
    $group->post('/insert', Empresa::class . ':insert');
    $group->get('/alterar/{id}', Empresa::class . ':alterar'); #->add(Auth::route());
    $group->post('/delete', Empresa::class . ':delete');
});
$app->group('/fornecedor', function (RouteCollectorProxy $group) {
    $group->get('/lista', Fornecedor::class . ':lista'); #->add(Auth::route());
    $group->get('/cadastro', Fornecedor::class . ':cadastro'); #->add(Auth::route());
    $group->post('/listfornecedor', Fornecedor::class . ':listfornecedor');
    $group->post('/update', Fornecedor::class . ':update');
    $group->post('/insert', Fornecedor::class . ':insert');
    $group->get('/alterar/{id}', Fornecedor::class . ':alterar'); #->add(Auth::route());
    $group->post('/delete', Fornecedor::class . ':delete');
});
$app->group('/pagamento', function (RouteCollectorProxy $group) {
    $group->get('/lista', PaymentTerms::class . ':lista');
    $group->get('/cadastro', PaymentTerms::class . ':cadastro');
    $group->get('/alterar/{id}', PaymentTerms::class . ':alterar');
    $group->post('/insert', PaymentTerms::class . ':insert');
    $group->post('/update', PaymentTerms::class . ':update');
    $group->post('/insertinstallment', PaymentTerms::class . ':insertInstallment');
    $group->post('/loaddatainstallments', PaymentTerms::class . ':loaddatainstallments');
    $group->post('/deleteinstallment', PaymentTerms::class . ':deleteinstallment');
    $group->post('/listaPaymentTerms', PaymentTerms::class . ':listaPaymentTerms');
>>>>>>> Stashed changes
});
