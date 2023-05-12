<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
//$routes->get('/', 'Home::index');
$routes->get('/',       'Login::index');
$routes->get('/Home',   'Home::index');

$routes->post('/Login/signIn',  'Login::signIn');
$routes->get('/Login/signOut',  'Login::signOut');

$routes->get('/Status',                 'Status::index');
$routes->get('/Status/cadastrar',       'Status::cadastrar');
$routes->post('/Status/salvar',         'Status::salvar');
$routes->get('/Status/apagar/(:num)',   'Status::apagar/$1');
$routes->get('/Status/editar/(:num)',   'Status::editar/$1');

$routes->get('/Setores',                'Setores::index');
$routes->get('/Setores/cadastrar',      'Setores::cadastrar');
$routes->post('/Setores/salvar',        'Setores::salvar');
$routes->get('/Setores/apagar/(:num)',  'Setores::apagar/$1');
$routes->get('/Setores/editar/(:num)',  'Setores::editar/$1');

$routes->get('/Envolvidos',                 'Envolvidos::index');
$routes->get('/Envolvidos/cadastrar',       'Envolvidos::cadastrar');
$routes->post('/Envolvidos/salvar',         'Envolvidos::salvar');
$routes->get('/Envolvidos/apagar/(:num)',   'Envolvidos::apagar/$1');
$routes->get('/Envolvidos/editar/(:num)',   'Envolvidos::editar/$1');
$routes->get('/Envolvidos/modal',           'Envolvidos::modal');

$routes->get('/Empresas',                   'Empresas::index');
$routes->get('/Empresas/editar/(:num)',     'Empresas::editar/$1');
$routes->post('/Empresas/salvar',           'Empresas::salvar');

$routes->get('/Atas',               'Atas::index');
$routes->post('/Atas/salvar',       'Atas::salvar');
$routes->get('/Atas/cadastrar',     'Atas::cadastrar');
$routes->get('/Atas/apagar/(:num)', 'Atas::apagar/$1');
$routes->get('/Atas/editar/(:num)', 'Atas::editar/$1');

$routes->get('/Topicos',                            'Topicos::index');
$routes->post('/Topicos/salvar',                    'Topicos::salvar');
$routes->post('/Topicos/salvarDetalhes',            'Topicos::salvarDetalhes');
$routes->get('/Topicos/apagar/(:num)',              'Topicos::apagar/$1');
$routes->get('/Topicos/apagarDetalhes/(:num)',      'Topicos::apagarDetalhes/$1');
$routes->get('/Topicos/editar/(:num)',              'Topicos::editar/$1');
$routes->get('/Topicos/finalizar/(:num)',           'Topicos::finalizar/$1');
$routes->get('/Topicos/topicosAudiplanner',         'Topicos::topicosAudiplanner');
$routes->get('/Topicos/topicosComercial',           'Topicos::topicosComercial');
$routes->get('/Topicos/topicosDiretoriaFinanceiro', 'Topicos::topicosDiretoriaFinanceiro');
$routes->get('/Topicos/topicosFiscon',              'Topicos::topicosFiscon');
$routes->get('/Topicos/topicosKronos',              'Topicos::topicosKronos');
$routes->get('/Topicos/topicosLegalizacao',         'Topicos::topicosLegalizacao');
$routes->get('/Topicos/topicosSetPessoal',          'Topicos::topicosSetPessoal');
$routes->get('/Topicos/topicosStartBI',             'Topicos::topicosStartBI');
$routes->get('/Topicos/topicosTecnologia',          'Topicos::topicosTecnologia');
$routes->get('/Topicos/topicosPublicidade',         'Topicos::topicosPublicidade');

///apagar
$routes->get('/Topicos/topicosNew',                 'Topicos::topicosNew');
$routes->get('/Topicos/topicoNew',                  'Topicos::topicoNew');
$routes->get('/Setores/testevalid',                 'Setores::testevalid');
$routes->get('/Empresas/pageSide',                   'Empresas::pageSide');

$routes->get('/Cronograma',                             'Cronograma::index');
$routes->post('/Cronograma/salvaExecucao',              'Cronograma::salvaExecucao');
$routes->post('/Cronograma/desfazExecucao',             'Cronograma::desfazExecucao');
$routes->post('/Cronograma/salvar',                     'Cronograma::salvar');
$routes->get('/Cronograma/acompanhamentoCronograma',    'Cronograma::acompanhamentoCronograma');
$routes->get('/Cronograma/novaCompetencia',             'Cronograma::novaCompetencia');
$routes->get('/Cronograma/apagar/(:num)',               'Cronograma::apagar/$1');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
