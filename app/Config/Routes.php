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

//Status
$routes->get('/Cadastros/Status',           'Status::index');
$routes->get('/Status/cadastrar',           'Status::cadastrar');
$routes->post('/Status/addStatus',          'Status::addStatus');
$routes->get('/Status/delStatus/(:num)',    'Status::delStatus/$1');
$routes->post('/Status/editStatus/(:num)',       'Status::editStatus/$1');

//Setores
$routes->get('/Setores',                'Setores::index');
$routes->get('/Setores/cadastrar',      'Setores::cadastrar');
$routes->post('/Setores/salvar',        'Setores::salvar');
$routes->get('/Setores/apagar/(:num)',  'Setores::apagar/$1');
$routes->get('/Setores/editar/(:num)',  'Setores::editar/$1');

//Envolvidos
$routes->get('/Envolvidos',                 'Envolvidos::index');
$routes->get('/Envolvidos/cadastrar',       'Envolvidos::cadastrar');
$routes->post('/Envolvidos/salvar',         'Envolvidos::salvar');
$routes->get('/Envolvidos/apagar/(:num)',   'Envolvidos::apagar/$1');
$routes->get('/Envolvidos/editar/(:num)',   'Envolvidos::editar/$1');
$routes->get('/Envolvidos/modal',           'Envolvidos::modal');

//Empresas
$routes->get('/Empresas',                   'Empresas::index');
$routes->get('/Empresas/editar/(:num)',     'Empresas::editar/$1');
$routes->post('/Empresas/salvar',           'Empresas::salvar');

//Atas
$routes->get('/Atas',               'Atas::index');
$routes->post('/Atas/salvar',       'Atas::salvar');
$routes->get('/Atas/cadastrar',     'Atas::cadastrar');
$routes->get('/Atas/apagar/(:num)', 'Atas::apagar/$1');
$routes->get('/Atas/editar/(:num)', 'Atas::editar/$1');

//Topicos
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

//Cronograma
$routes->get('/Cronograma',                             'Cronograma::index');
$routes->post('/Cronograma/salvaExecucao',              'Cronograma::salvaExecucao');
$routes->post('/Cronograma/desfazExecucao',             'Cronograma::desfazExecucao');
$routes->post('/Cronograma/salvar',                     'Cronograma::salvar');
$routes->get('/Cronograma/acompanhamentoCronograma',    'Cronograma::acompanhamentoCronograma');
$routes->get('/Cronograma/novaCompetencia',             'Cronograma::novaCompetencia');
$routes->get('/Cronograma/apagar/(:num)',               'Cronograma::apagar/$1');

//Legalização
$routes->get('/Legalizacao/Processos',                  'Legalizacao::processos');
$routes->get('/Legalizacao/Finalizados',                'Legalizacao::processosFinalizados');
$routes->post('/Legalizacao/addProcesso',               'Legalizacao::addProcesso');
$routes->get('/Legalizacao/delProcesso/(:num)',         'Legalizacao::delProcesso/$1');
$routes->get('/Legalizacao/processosDetalhes/(:num)',   'Legalizacao::processosDetalhes/$1');
$routes->post('/Legalizacao/editProcesso/(:num)',       'Legalizacao::editProcesso/$1');
$routes->post('/Legalizacao/addDocProcesso/(:num)',     'Legalizacao::addDocProcesso/$1');
$routes->post('/Legalizacao/editStatusProcesso/(:num)', 'Legalizacao::editStatusProcesso/$1');
$routes->post('/Legalizacao/addTramiteProcesso',        'Legalizacao::addTramiteProcesso');
$routes->get('/Legalizacao/delTramiteProcesso/(:num)',  'Legalizacao::delTramiteProcesso/$1');
$routes->get('/Legalizacao/delArqProcesso/(:num)/(:num)',      'Legalizacao::delArqProcesso/$1/$2');

//Cadastro - Clientes
$routes->get('/Cadastros/Clientes', 'Clientes::index');
$routes->post('/Clientes/addCliente', 'Clientes::addCliente');
$routes->post('/Clientes/editCliente/(:num)', 'Clientes::editCliente/$1');
$routes->get('/Clientes/delCliente/(:num)', 'Clientes::delCliente/$1');

//Serviços
$routes->get('/Cadastros/Servicos', 'Servicos::index');
$routes->post('/Servicos/addServico', 'Servicos::addServico');
$routes->post('/Servicos/editServico/(:num)', 'Servicos::editServico/$1');
$routes->get('/Servicos/delServico/(:num)', 'Servicos::delServico/$1');

//FisCon - Crono Fiscal
$routes->get('/Fiscon/Empresas',            'Empresas::index');
$routes->post('/Fiscon/editEmpresa/(:num)', 'Empresas::editEmpresa/$1');
$routes->post('/Fiscon/addEmpresa',         'Empresas::addEmpresa');
$routes->get('/Fiscon/CronoFiscal',          'Cronograma::cronoFiscal');
$routes->post('/Fiscon/setExecCronoFiscal/(:num)', 'Cronograma::setExecCronoFiscal/$1');
$routes->post('/Fiscon/unsetExecCronoFiscal/(:num)', 'Cronograma::unsetExecCronoFiscal/$1');
$routes->get('/Fiscon/Acompanhamentos/CronoFiscal',  'Cronograma::acompCronoFiscal');

//Utilitários
$routes->get('/Utilitarios/arqAntaqMensais', 'Utilitarios::arqAntaqMensais');
$routes->post('/Utilitarios/arqAntaqMensais', 'Utilitarios::arqAntaqMensais');
$routes->post('/Utilitarios/expAntaqMensais', 'Utilitarios::expAntaqMensais');
$routes->get('/Utilitarios/arqAntaqAnuais', 'Utilitarios::arqAntaqAnuais');
$routes->post('/Utilitarios/arqAntaqAnuais', 'Utilitarios::arqAntaqAnuais');
$routes->post('/Utilitarios/expAntaqAnuais', 'Utilitarios::expAntaqAnuais');

$routes->get('/Utilitarios/leitorXMLComercio', 'Utilitarios::leitorXMLComercio');
$routes->post('/Utilitarios/leitorXMLComercio', 'Utilitarios::leitorXMLComercio');
$routes->post('/Utilitarios/expXMLComercio', 'Utilitarios::expXMLComercio');

$routes->get('/Utilitarios/leitorXMLServico', 'Utilitarios::leitorXMLServico');
$routes->post('/Utilitarios/leitorXMLServico', 'Utilitarios::leitorXMLServico');
$routes->post('/Utilitarios/expXMLServico', 'Utilitarios::expXMLServico');

//Usuários
$routes->get('/Cadastros/Usuarios',        'Usuarios::index');
$routes->post('/Usuarios/AlterarSenha',    'Usuarios::editSenha');
$routes->post('/Usuarios/addUser',         'Usuarios::addUser');

//T.I.
$routes->get('/TI/Solicitacoes',                'TI::index');
$routes->post('/TI/Novo',                       'TI::novoChamado');
$routes->post('/TI/definirResponsavel',         'TI::definirResponsavel'); 
$routes->post('/TI/editarChamado',              'TI::editarChamado');
$routes->get('/TI/deletarChamado/(:num)',       'TI::deletarChamado/$1');
$routes->get('/TI/finalizarChamado/(:num)',     'TI::finalizarChamado/$1');
$routes->get('/TI/Finalizados',                 'TI::chamadosFinalizados');
$routes->post('/TI/mudarPrioridade',            'TI::mudarPrioridade');
$routes->post('/TI/mudarStatus',                'TI::mudarStatus');

//GPI
$routes->get('/GPI/Documentos/Fiscon',              'GPI::gpiDocsFiscon');
$routes->post('/GPI/Documentos/Fiscon/addDocumento', 'GPI::addDocumento');

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
