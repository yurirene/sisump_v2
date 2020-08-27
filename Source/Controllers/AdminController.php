<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Source\Controllers;

use Source\Models\Diretoria;
use Source\Models\Sinodal;
use Source\Models\Usuario;
use function flash;

/**
 * Description of AdminController
 *
 * @author Yuri
 */
class AdminController extends Controller {
    
    public function __construct($router) {
        parent::__construct($router);
    }
    
    
    public function login(): void
    {
        if(isset($_SESSION['usuario']['admin'])){
            $this->router->redirect("admin.sinodais");
            return;
        }
        echo $this->view->render("admin/login", ["title"=>"Login"]);
        
    }
    
    /**
     * 
     * @param type $dados
     * @return void
     */
    
    public function logar($dados): void
    {
        
        $dados = filter_var_array($dados, FILTER_SANITIZE_STRIPPED);
        $model = new Usuario();
        $usuario = $model->find("usuario = '{$dados['usuario']}'")->fetch();

        if(!$usuario){
            flash("danger","Usuário ou Senha incorreto!");
            $this->router->redirect("admin.login");
            return;
        }
        if (!password_verify($dados['senha'], $usuario->senha)) {
            flash("danger","Usuário ou Senha incorreto!");
            $this->router->redirect("admin.login");
            return;
        }
        
        $_SESSION['usuario']['id']=$usuario->id;
        $_SESSION['usuario']['restricao']=$usuario->restricao;
        $_SESSION['usuario']['admin']=true;
        $this->router->redirect("admin.sinodais");
        return;
        
        
    }
    
    /**
     * 
     * @return void
     */
    public function logout(): void
    {
        unset($_SESSION['usuario']);
        $this->router->redirect("admin.login");  
        return;
    }
    
    /**
     * ================== HELPERS ========================
     */
    public function acesso($restricao): void
    {
        
        /**
         * VERIFICA SE EXISTE A SESSAO DO USUARIO E SE NÃO ESTA VAZIA
         * SE FALSO VAI PARA O LOGIN
         */
        if(!$_SESSION['usuario']['admin'] || empty($_SESSION['usuario']['admin'])){
            flash("danger", "Faça o Login primeiro");
            $this->router->redirect("admin.logout");
            return;
        }
        
        if($restricao!=null &&($restricao != intval($_SESSION['usuario']['restricao']))){
            flash("danger", "Você não tem permissão para acessar essa página");
            $this->router->redirect("admin.logout");
            return;
        }
        
        
    }
    
    public function sinodais(): void
    {
        
        $this->acesso(10);
        
        $model = new Sinodal();
        $listaSinodais = $model->find()->fetch(true);
        
        $modelUsuario = new Usuario();
        $listaUsuarios = $modelUsuario->find("restricao=3")->fetch(true);
        
        echo $this->view->render("admin/sinodais", ["title"=>"Sinodais", "listaSinodais"=>$listaSinodais, "listaUsuarios"=>$listaUsuarios]);
        return;
        
        
    }
    
    public function diretorias(): void
    {
        
        $this->acesso(10);
        $model = new Diretoria();
        $model->changeEntity("diretoria_sinodal");
        $lista = $model->dadosSinodais()->fetch(true);
        echo $this->view->render("admin/diretorias", ["title"=>"Diretorias das Sinodais", "lista"=>$lista]);
        return;
    }
    
    
    /**
     * 
     * @param type $dados
     * @return void
     */
    public function novaSinodal($dados):void
    {
        $this->acesso(10);
        
        $dados = filter_var_array($dados, FILTER_DEFAULT);
        
        $model = new Sinodal();
        $model->nome = $dados['nome'];
        $model->sigla = $dados['sigla'];
        $model->localidade = $dados['localidade'];
        $model->responsavel = $dados['responsavel'];
        
        if(!$model->save()){
            flash("danger", "Erro ao Cadastrar Sinodal");
            $this->router->redirect("admin.sinodais");
            return;
        }
        
        $modelDiretoria = new Diretoria();
        $modelDiretoria->id_sinodal = $model->id;
        
        $modelDiretoria->changeEntity("diretoria_sinodal");
        
        if(!$modelDiretoria->save()){
            flash("warning", "Sinodal Cadastrada com Sucesso! - Erro ao Cadastrar Diretoria");
            $this->router->redirect("admin.sinodais");
            return;
        }
        
        flash("success", "Sinodal Cadastrada com Sucesso!");
        $this->router->redirect("admin.sinodais");
        return;
    }
    
    /**
     * 
     * @param type $dados
     * @return void
     */
    public function atualizarSinodal($dados):void
    {
        $this->acesso(10);
        
        $model = new Sinodal();
        
        $sinodal = $model->findById(intval($dados['id']));
        $sinodal->nome = $dados['nome'];
        $sinodal->sigla = $dados['sigla'];
        $sinodal->responsavel = $dados['responsavel'];
        $sinodal->localidade = $dados['localidade'];
        
        if(!$sinodal->save()){
            flash("danger", "Erro ao Atualizar Sinodal");
            $this->router->redirect("admin.sinodais");
            return;
        }
        flash("success", "Sinodal Atualizada com Sucesso!");
        $this->router->redirect("admin.sinodais");
        return;
    }
    
    /**
     * 
     * @param type $dados
     * @return void
     */
    
    public function novoUsuario($dados):void
    {
        $this->acesso(10);
        $dados = filter_var_array($dados, FILTER_SANITIZE_STRIPPED);
        
        
        $model = new Usuario();
        $model->usuario=$dados['usuario'];
        $model->senha = $dados['senha'];
        $model->restricao = 3;
        $model->id_ump = null;
        $model->id_federacao = null;
        $model->id_sinodal = $dados['sinodal'];
        
        if(!$model->save()){
            flash("danger", "Erro ao Cadastrar Usuário");
            $this->router->redirect("admin.sinodais");
            return;
        }
        flash("success", "Usuário Cadastrado com Sucesso!");
        $this->router->redirect("admin.sinodais");
        return;
        
    }
    /**
     * 
     * @param type $dados
     * @return void
     */
    public function atualizarUsuario($dados):void
    {
        $dados = filter_var_array($dados, FILTER_SANITIZE_STRIPPED);
        
        $model = new Usuario();
        $usuario = $model->findById(intval($dados['id']));
        $usuario->usuario = $dados['usuario'];
        $usuario->senha = $dados['senha'];
        
        
        if(!$usuario->save()){
            flash("danger", "Erro ao Atualizar Usuário");
            $this->router->redirect("admin.sinodais");
            return;
        }
        flash("success", "Usuário Atualizado com Sucesso!");
        $this->router->redirect("admin.sinodais");
        return;
        
    }
    /**
     * 
     * @param type $dados
     * @return void
     */
    public function deletarUsuario($dados): void
    {
        $dados = filter_var_array($dados, FILTER_DEFAULT);
        
        $model = new Usuario();
        $usuario = $model->findById(intval($dados['id']));
       
        
        if(!$usuario->destroy()){
            flash("danger", "Erro ao Remover Usuário");
            $this->router->redirect("admin.sinodais");
            return;
        }
        flash("success", "Usuário Removido com Sucesso!");
        $this->router->redirect("admin.sinodais");
        return;
        
    }
    
}
