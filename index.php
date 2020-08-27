<?php

ob_start();
session_start();

require_once(__DIR__.'/vendor/autoload.php');

use CoffeeCode\Router\Router;

$router = new Router(site());

$router->namespace("Source\Controllers");

$router->group(null);
$router->get("/", "SiteController:index", "site.index");




/**
* ROTAS SISUMP
*
*/
$router->group("SISUMP");
$router->get("/", "AppController:index", "app.index");
$router->get("/Login", "AppController:login", "app.login");
$router->get("/Socios", "AppController:socios", "app.socios");
$router->get("/Programacoes", "AppController:programacoes", "app.programacoes");
$router->get("/Calendario-Federacoes", "AppController:calendarioFederacoes", "app.calendariofederacoes");
$router->get("/Calendario-Federacoes/{filtro}", "AppController:calendarioFederacoes", "app.calendariofederacoes");
$router->get("/Participacoes", "AppController:participacoes", "app.participacoes");
$router->get("/UMPs", "AppController:umps", "app.umps");
$router->get("/Igrejas", "AppController:igrejas", "app.igrejas");
$router->get("/Federacoes", "AppController:federacoes", "app.federacoes");
$router->get("/Presbiterios", "AppController:presbiterios", "app.presbiterios");
$router->get("/Diretoria", "AppController:diretoria", "app.diretoria");
$router->get("/Secretarios", "AppController:secretarios", "app.secretarios");
$router->get("/Alterar-Senha", "AppController:alterarSenha", "app.alterarsenha");
$router->get("/Logout", "AppController:logout", "app.logout");

$router->post("/logar", "AppController:logar", "app.logar");

$router->post("/Novo-Socio", "AppController:novoSocio", "app.novosocio");
$router->post("/Atualizar-Socio", "AppController:atualizarSocio", "app.atualizarsocio");
$router->post("/Deletar-Socio", "AppController:deletarSocio", "app.deletarsocio");

$router->post("/Atualizar-Diretoria", "AppController:atualizarDiretoria", "app.atualizadiretoria");

$router->post("/Nova-Participacao", "AppController:novaParticipacao", "app.novaparticipacao");
$router->post("/Deletar-Participacao", "AppController:deletarParticipacao", "app.deletarparticipacao");
$router->post("/Reset-Participacao", "AppController:resetParticipacao", "app.resetparticipacao");

$router->post("/Nova-Programacao", "AppController:novaProgramacao", "app.novaprogramacao");
$router->post("/Atualizar-Programacao", "AppController:atualizarProgramacao", "app.atualizarprogramacao");
$router->post("/Deletar-Programacao", "AppController:deletarProgramacao", "app.deletarprogramacao");

$router->post("/Nova-Igreja", "AppController:novaIgreja", "app.novaigreja");
$router->post("/Atualizar-Igreja", "AppController:atualizarIgreja", "app.atualizarigreja");
$router->post("/Deletar-Igreja", "AppController:deletarIgreja", "app.deletarigreja");

$router->post("/Nova-UMP", "AppController:novaUMP", "app.novaump");
$router->post("/Atualizar-UMP", "AppController:atualizarUMP", "app.atualizarump");
$router->post("/Deletar-UMP", "AppController:deletarUMP", "app.deletarump");

$router->post("/Novo-Usuario", "AppController:novoUsuario", "app.novousuario");
$router->post("/Atualizar-Usuario", "AppController:atualizarUsuario", "app.atualizarusuario");
$router->post("/Deletar-Usuario", "AppController:deletarUsuario", "app.deletarusuario");

$router->post("/Novo-Secretario", "AppController:novoSecretario", "app.novosecretario");
$router->post("/Atualizar-Secretario", "AppController:atualizarSecretario", "app.atualizarsecretario");
$router->post("/Deletar-Secretario", "AppController:deletarSecretario", "app.deletarsecretario");

$router->post("/Nova-Federacao", "AppController:novaFederacao", "app.novafederacao");
$router->post("/Atualizar-Federacao", "AppController:atualizarFederacao", "app.atualizarfederacao");
$router->post("/Deletar-Federacao", "AppController:deletarFederacao", "app.deletarfederacao");

$router->post("/Novo-Presbiterio", "AppController:novoPresbiterio", "app.novopresbiterio");
$router->post("/Atualizar-Presbiterio", "AppController:atualizarPresbiterio", "app.atualizarpresbiterio");
$router->post("/Deletar-Presbiterio", "AppController:deletarPresbiterio", "app.deletarpresbiterio");

$router->post("/Atualizar-Senha", "AppController:atualizarSenha", "app.atualizarsenha");

/**
 * ROTAS ADMINISTRADOR
 */

$router->group("Admin");
$router->get("/Login", "AdminController:login", "admin.login");
$router->get("/Sinodais", "AdminController:sinodais", "admin.sinodais");
$router->get("/Diretorias", "AdminController:diretorias", "admin.diretorias");
$router->get("/Alterar-Senha", "AdminController:alterarSenha", "admin.alterarsenha");
$router->get("/Logout", "AdminController:logout", "admin.logout");


$router->post("/Logar", "AdminController:logar", "admin.logar");
$router->post("/Atualizar-Senha", "AdminController:atualizarSenha", "admin.atualizarsenha");
$router->post("/Nova-Sinodal", "AdminController:novaSinodal", "admin.novasinodal");
$router->post("/Atualizar-Sinodal", "AdminController:atualizarSinodal", "admin.atualizarsinodal");
$router->post("/Novo-Usuario", "AdminController:novoUsuario", "admin.novousuario");
$router->post("/Atualizar-Usuario", "AdminController:atualizarUsuario", "admin.atualizarusuario");
$router->post("/Deletar-Usuario", "AdminController:deletarUsuario", "admin.deletarusuario");


/**
* ERRO
*/

$router->group("Ops");
$router->get("/{errcode}", "SiteController:erro","site.erro");

/**
 * Executa a Rota
 */
$router->dispatch();

/*
 * Redireciona os Erros
 */


if ($router->error()) {

    $router->redirect("Ops/{$router->error()}");
}


ob_end_flush();
