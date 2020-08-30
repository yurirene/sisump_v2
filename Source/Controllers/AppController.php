<?php
namespace Source\Controllers;

use Source\Models\Diretoria;
use Source\Models\Federacao;
use Source\Models\Igreja;
use Source\Models\Participacao;
use Source\Models\Presbiterio;
use Source\Models\Programacao;
use Source\Models\Relatorio;
use Source\Models\Secretario;
use Source\Models\Sinodal;
use Source\Models\Socio;
use Source\Models\UMP;
use Source\Models\Usuario;
use function flash;

class AppController extends Controller
{
    public function __construct($router)
    {
        parent::__construct($router);
    }
    
    /**
     * 
     * @return void
     */
    public function login(): void
    {
        if(isset($_SESSION['usuario'])){
            $this->router->redirect("app.index");
            return;
        }
        echo $this->view->render("sisump/login", ["title"=>"Login"]);
        
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
            $this->router->redirect("app.login");
            return;
        }
        if(!$usuario->senha == $dados['senha']){
            flash("danger","Usuário ou Senha incorreto!");
            $this->router->redirect("app.login");
            return;
        }
        
        $_SESSION['usuario']['id']=$usuario->id;
        $_SESSION['usuario']['ump']=$usuario->id_ump;
        $_SESSION['usuario']['federacao']=$usuario->id_federacao;
        $_SESSION['usuario']['sinodal']=$usuario->id_sinodal;
        $_SESSION['usuario']['restricao']=$usuario->restricao;
        $_SESSION['usuario']['menu'] =  $this->menu($usuario->restricao);
        $this->router->redirect("app.index");
        return;
        
        
    }
    
    /**
     * 
     * @return void
     */
    public function logout(): void
    {
        unset($_SESSION['usuario']);
        $this->router->redirect("app.login");  
        return;
    }
    
    /**
     * 
     * @param type $restricao
     * @param bool|null $maior
     * @param string|null $caminho
     * @return void
     */
    
    /**
     * ================== HELPERS ========================
     */
    private function acesso($restricao = null, ?bool $maior =false, ?string $caminho = "app.index"): void
    {
        
        /**
         * VERIFICA SE EXISTE A SESSAO DO USUARIO E SE NÃO ESTA VAZIA
         * SE FALSO VAI PARA O LOGIN
         */
        if(!$_SESSION['usuario'] || empty($_SESSION['usuario'])){
            flash("danger", "Faça o Login primeiro");
            $this->router->redirect("app.login");
            return;
        }
        
        /**
         * SE O PARAMETRO 'MAIOR' FOR TRUE, VERIFICA SE A RESTRICAO ENVIADA EH MAIOR OU IGUAL
         * OU IGUAL A RESTRICAO DA SESSAO
         * SE FOR TRUE BLOQUEIA O ACESSO
         */
        
        if($maior){
            
            if($restricao!=null &&($restricao >=  intval($_SESSION['usuario']['restricao']))){
                flash("danger", "Você não tem permissão para acessar essa página");
                $this->router->redirect($caminho);
                return;
            }
        }else{
            
            /**
             * SE NAO EXISTE 'MAIOR', VERIFICA SE EXISTE A RESTRICAO 
             * E SE EH DIFERENTE DA RESTRICAO DA SESSAO
             * SE FOR DIFERENTE BLOQUEIA O ACESSO
             */
            if($restricao!=null &&($restricao != intval($_SESSION['usuario']['restricao']))){
                flash("danger", "Você não tem permissão para acessar essa página");
                $this->router->redirect($caminho);
                return;
            }
        }
        
        
    }
    /**
     * RETORNA O MENU PARA A VIEW
     * @param type $restricao
     * @return string
     */
    private function menu($restricao): string
    {
        $this->acesso();
        $restricao= intval($restricao);
        switch($restricao){
            case 1:
                return "_local";
                break;
            case 2:
                return "_federacao";
                break;
            case 3:
                return "_sinodal";
                break;
                
        }
    }
    /**
     * RETORNA O 'WHERE' DE UMA CONSULTA (EX: WHERE 'ID_UMP')
     * @return string
     */
     private function paramBusca(): string
    {
        $this->acesso();
         
        if($_SESSION['usuario']['restricao'] == 1){
            $param = "id_ump={$_SESSION['usuario']['ump']}";
        }
        if($_SESSION['usuario']['restricao'] == 2){
            $param = "id_federacao={$_SESSION['usuario']['federacao']}";
        }
        if($_SESSION['usuario']['restricao'] == 3){
            $param = "id_sinodal={$_SESSION['usuario']['sinodal']}";
        }
        return $param;
    }
    
    /**
     * RETORNA O COMPLEMENTO DE UMA TABELA (EX: DIRETORIA'_LOCAL')
     * @param string $tabela
     * @return string
     */
    private function entity(string $tabela, int $restricao): string
    {
        $this->acesso();
        switch($restricao){
            case 1:
                $entity = $tabela."_local";
                break;
            case 2:
                $entity = $tabela."_federacao";
                break;
            case 3:
                $entity = $tabela."_sinodal";
                break;
        }
        
        return $entity;
    }
    
    /**
     * ================== INICIO ========================
     */
    
    /**
     * 
     * @return void
     */
    public function index(): void
    {
        $this->acesso();
        echo $this->view->render("sisump/index", ["title"=>"Início",]);
        
        return;
    }
    
    
    
    /**
     * ================== SOCIOS ========================
     */
    
    
    /**
     * 
     * @return void
     */
    public function socios(): void
    {
        $this->acesso(1);
        $model = new Socio();
        $lista = $model->find($this->paramBusca())->fetch(true);
        echo $this->view->render("sisump/socios", ["title"=>"Sócios", "lista"=>$lista]);

        return;
    }
    /**
     * 
     * @param type $dados
     * @return void
     */
    public function novoSocio($dados): void
    {
        
        $this->acesso(1);
        $dados = filter_var_array($dados, FILTER_DEFAULT);
        
        if(!$dados['doacoes']){
            $doacao = "";
        }else{
            $doacao = ''.implode(",",$dados['doacoes']);
        }
        if(!$dados['doador']){
            $doador="";
        }else{
            $doador = ''.implode(",",$dados['doador']);
        }
        
        $socio = new Socio();
        
        $socio->nome = $dados['nome'];
        $socio->idade = $dados['idade'];
        $socio->sexo = $dados['sexo'];
        $socio->estadoCivil = $dados['estadoCivil'];
        $socio->escolaridade = $dados['escolaridade'];
        $socio->filho = $dados['filhos'];
        $socio->deficiencia = $dados['deficiencia'];
        $socio->doacao = $doacao;
        $socio->cadastroDoacao = $doador;
        $socio->tipo = $dados['tipo'];
        $socio->id_ump = $_SESSION['usuario']['ump'];
        $socio->id_federacao = $_SESSION['usuario']['federacao'];
        $socio->id_sinodal = $_SESSION['usuario']['sinodal'];
        
        
        $resultado = $socio->save();
        
        
        if(!$resultado){
            flash("danger","Não foi possível cadastrar.");
            $this->router->redirect("app.socios");
            return;
        }
        

        $qtd = $socio->find($this->paramBusca())->count();

        $model = new UMP();
        
        $model = $model->findById($socio->id_ump);
        $model->n_socios = $qtd;
        $atualizacao = $model->save();
        if(!$atualizacao){

            flash("warning","Erro ao atualizar número de Sócios.");
            $this->router->redirect("app.socios");
            return;
        }
        
        flash("success", "Usuário Cadastrado com Sucesso!");
        $this->router->redirect("app.socios");
        return;
    }
    
    /**
     * 
     * @param type $dados
     * @return void
     */
    public function atualizarSocio($dados): void
    {
        $this->acesso(1);
        $dados = filter_var_array($dados, FILTER_DEFAULT);
        
        if(!isset($dados['doacoes'])){
            
            $doacao = "";
        }else{
            $doacao = ''.implode(",",$dados['doacoes']);
        }
        if(!isset($dados['doador'])){
            $doador="";
        }else{
            $doador = ''.implode(",",$dados['doador']);
        }


        $socio = new Socio();
        $socio = $socio->findById($dados['id']);

        $socio->nome = $dados['nome'];
        $socio->idade = $dados['idade'];
        $socio->sexo = $dados['sexo'];
        $socio->estadoCivil = $dados['estadoCivil'];
        $socio->escolaridade = $dados['escolaridade'];
        $socio->filho = $dados['filhos'];
        $socio->deficiencia = $dados['deficiencia'];
        $socio->doacao = $doacao;
        $socio->cadastroDoacao = $doador;
        $socio->tipo = $dados['tipo'];
        $socio->id_ump = $_SESSION['usuario']['ump'];
        $socio->id_federacao = $_SESSION['usuario']['federacao'];
        $socio->id_sinodal = $_SESSION['usuario']['sinodal'];
        
        $resultado = $socio->save();


        if(!$resultado){
            flash("danger","Não foi possível Atualizar.".$socio->fail()->getMessage());
            $this->router->redirect("app.socios");
            return;
        }

        flash("success", "Sócio Atualizado com Sucesso!");
        $this->router->redirect("app.socios");
        return;
    }
    /**
     * 
     * @param type $dados
     * @return void
     */
    public function deletarSocio($dados): void
    {
        $this->acesso(1);
        $dados = filter_var_array($dados, FILTER_DEFAULT);
        
        $socio = new Socio();
        $socio = $socio->findById($dados['id']);
        
        if(!$socio){
            flash("danger", "Sócio não encontrado");
            $this->router->redirect("app.socios");
            return;
        }
        
        $resultado=$socio->destroy();
        if(!$resultado){
            flash("danger", "Erro ao Excluir");
            $this->router->redirect("app.socios");
            return;
        }
        
        $qtd = $socio->find($this->paramBusca())->count();

        $model = new UMP();

        $model = $model->findById($socio->id_ump);
        $model->n_socios = $qtd;
        $atualizacao = $model->save();
        if(!$atualizacao){

            flash("warning","Erro ao atualizar número de Sócios.");
            $this->router->redirect("app.socios");
            return;
        }
        
        flash("success", "Sócio Excluído com Sucesso!");
        $this->router->redirect("app.socios");
        return;
    }
    
    /**
     * ================== DIRETORIA ========================
     */
    
    
    /**
     * 
     * @return void
     */
    public function diretoria(): void
    {
        $listaDiretorias= array();
        
        $model = new Diretoria();
        $model->changeEntity($this->entity("diretoria", intval($_SESSION['usuario']['restricao'])));
        $diretoria = $model->find($this->paramBusca())->fetch(false);
        if(intval($_SESSION['usuario']['restricao'])>1){
            $model->changeEntity($this->entity("diretoria", intval($_SESSION['usuario']['restricao'])-1));
            $listaDiretorias = $model->dadosDiretoria($this->paramBusca())->fetch(true);
        }
        
        

        echo $this->view->render("sisump/diretoria", ["title"=>"Diretorias", "diretoria"=>$diretoria, "listaDiretorias"=>$listaDiretorias]);
        
        return;
    }
    /**
     * 
     * @param type $dados
     * @return void
     */
    public function atualizarDiretoria($dados):void
    {
        $dados = filter_var_array($dados, FILTER_DEFAULT);
        
        $tabela = $this->entity("diretoria",intval($_SESSION['usuario']['restricao']));
        $model = new Diretoria();
        $model->changeEntity($tabela);
        $diretoria = $model->find($this->paramBusca())->fetch(false);
        $diretoria->changeEntity($tabela);
        
        
        $cargo = $dados['cargo'];
        
        $diretoria->$cargo = $dados['nome'].",".$dados['telefone'].",".$dados['email'];
        
        
        
        if(!$diretoria->save()){
            flash("danger", "Erro ao Atualizar");
            $this->router->redirect("app.diretoria");
            return;
        }
        
        flash("success", "Atualização realizada com Sucesso!");
        $this->router->redirect("app.diretoria");
        return;
        
    }
    
    /**
     * ================== PARTICIPACOES ========================
     */
    
    /**
     * 
     * @return void
     */
    public function participacoes(): void
    {
        $param = $this->paramBusca();
        $model = new Participacao();
        echo $this->view->render("sisump/participacoes", $model->dadosParticipaco($param) );
        return;
    }
    
    /**
     * 
     * @param type $dados
     * @return void
     */
    public function novaParticipacao($dados): void
    {
        $this->acesso(1, false, "app.participacoes");
        $dados = filter_var_array($dados, FILTER_DEFAULT);
        
        foreach($dados['socios'] as $socio){
            $model = new Participacao();
            $model->nome = $dados['programacao'];
            $model->id_socio = $socio;
            $model->id_ump = $_SESSION['usuario']['ump'];
            $model->instancia = $dados['instancia'];
            $model->ano = $dados['ano'];
            $model->id_federacao = $_SESSION['usuario']['federacao'];
            $model->id_sinodal = $_SESSION['usuario']['sinodal'];
            
            
            if(!$model->save()){
                flash("danger", "Erro ao cadastrar Participação");
                $this->router->redirect("app.participacoes");
                return;
            }
        }
        
        
        flash("success", "Participação cadastrada com Sucesso!");
        $this->router->redirect("app.participacoes");
        return;
    }
    
    /**
     * 
     * @param type $dados
     * @return void
     */
    
    public function deletarParticipacao($dados): void
    {
        $this->acesso(1, false, "app.participacoes");
        $dados = filter_var_array($dados, FILTER_DEFAULT);
        
        $model = new Participacao();
        $model = $model->findById(intval($dados['id']));
        
        if(!$model->destroy()){
            flash("danger", "Erro ao remover Participação");
            $this->router->redirect("app.participacoes");
            return;
        }
        flash("success", "Participação removida com Sucesso!");
        $this->router->redirect("app.participacoes");
        return;
        
    }
    
    public function resetParticipacao($dados): void
    {
        $this->acesso(2);        
        $model = new Participacao();
        $lista = $model->find($this->paramBusca())->fetch(true);
        foreach($lista as $participacao){
            if(!$participacao->destroy()){
                flash("danger", "Erro no Processo");
                $this->router->redirect("app.participacoes");
                return;
            }
        }
        
        
        flash("success", "Processo Concluído!");
        $this->router->redirect("app.participacoes");
        return;
        
    }
    
    
    /**
     * ================== PROGRAMACOES ========================
     */
    
    /**
     * 
     * @return void
     */
    public function programacoes(): void
    {
        $this->acesso(1,true);
        $model = new Programacao();
        $model->changeEntity($this->entity("programacoes",intval($_SESSION['usuario']['restricao'])));
        $lista = $model->find($this->paramBusca())->fetch(true);
        echo $this->view->render("sisump/programacoes", ['title'=>'Programações', 'lista'=>$lista]);
        
        return;
    }
    
    public function novaProgramacao($dados): void
    {
        $this->acesso(1,true);
        
        $dados = filter_var_array($dados, FILTER_DEFAULT);
                
        $model = new Programacao();
        $model->changeEntity($this->entity("programacoes", intval($_SESSION['usuario']['restricao'])));
        
        $model->nome = $dados['nome'];
        $model->date = date('Y-m-d',  strtotime(str_replace("/", "-", $dados['date'])));
        $model->local = $dados['local'];
        $model->id_sinodal = $_SESSION['usuario']['sinodal'];
        if(intval($_SESSION['usuario']['restricao'])==2){
            $model->id_federacao = $_SESSION['usuario']['federacao'];
        }
        
        if(!$model->save()){
            flash("danger", "Erro ao Cadastrar Programação");
            $this->router->redirect("app.programacoes");
            return;
        }
        flash("success", "Programação Cadastrada com Sucesso!");
        $this->router->redirect("app.programacoes");
        return;
        
    }
    
    public function atualizarProgramacao($dados): void
    {
        $this->acesso(1,true);
        
        $dados = filter_var_array($dados, FILTER_DEFAULT);
                
        $model = new Programacao();
        $model->changeEntity($this->entity("programacoes", intval($_SESSION['usuario']['restricao'])));
        
       
        $programacao = $model->findById(intval($dados['id']));
        $programacao->changeEntity($this->entity("programacoes", intval($_SESSION['usuario']['restricao'])));
        $programacao->nome = $dados['nome'];
        $programacao->date = date('Y-m-d',  strtotime(str_replace("/", "-", $dados['date'])));
        $programacao->local = $dados['local'];
        $programacao->id_sinodal = $_SESSION['usuario']['sinodal'];
        if(intval($_SESSION['usuario']['restricao'])==2){
            $programacao->id_federacao = $_SESSION['usuario']['federacao'];
        }
        
        if(!$programacao->save()){
            flash("danger", "Erro ao Editar Programação");
            $this->router->redirect("app.programacoes");
            return;
        }
        flash("success", "Programação Editada com Sucesso!");
        $this->router->redirect("app.programacoes");
        return;
        
    }
    
    public function deletarProgramacao($dados): void
    {
        $this->acesso(1,true);
        
        $dados = filter_var_array($dados, FILTER_DEFAULT);
                
        $model = new Programacao();
        $model->changeEntity($this->entity("programacoes", intval($_SESSION['usuario']['restricao'])));
        $model = $model->findById(intval($dados['id']));
        $model->changeEntity($this->entity("programacoes", intval($_SESSION['usuario']['restricao'])));
        
        if(!$model->destroy()){
            flash("danger", "Erro ao remover Programação");
            $this->router->redirect("app.programacoes");
            return;
        }
        flash("success", "Programação removida com Sucesso!");
        $this->router->redirect("app.programacoes");
        return;
        
    }
    
    /**
     * ================== CALENDARIO FEDERACOES ========================
     */
    
    public function calendarioFederacoes(?array $dado):void
    {
        $this->acesso(3);
        
        $restricao = intval($_SESSION['usuario']['restricao'])-1;
        
        $model = new Programacao();
        $model->changeEntity($this->entity("programacoes", $restricao));
        if($dado){
            $lista = $model->find($this->paramBusca()." AND date>=CURDATE()")->order("date ASC")->fetch(true);
            $botao = "";
            $texto = "Não Filtrar";
        }else{
            $lista = $model->find($this->paramBusca())->order("date ASC")->fetch(true);
            $botao = "/1";
            $texto = "Filtrar";
        }
        
        echo $this->view->render("sisump/calendario-federacoes",["title"=>"Calendário das Federações", "lista"=>$lista, "botao"=>$botao, "texto"=>$texto]);
        return;
    }
    
    public function calendarioFederacoesFiltro():void
    {
        $this->acesso(3);
        
        $restricao = intval($_SESSION['usuario']['restricao'])-1;
        
        $model = new Programacao();
        $model->changeEntity($this->entity("programacoes", $restricao));
        $lista = $model->find($this->paramBusca()."AND date=>CURDATE()")->order("date ASC")->fetch(true);
        echo $this->view->render("sisump/calendario-federacoes",["title"=>"Calendário das Federações", "lista"=>$lista, "botao"=>""]);
        return;
    }
    
    /**
     * ================== UMPS ========================
     */
    /**
     * 
     * @return void
     */
    
    public function umps(): void
    {
        $this->acesso(2);
        
        $modelUMP = new UMP();
        $listaUMP = $modelUMP->find($this->paramBusca())->fetch(true);
        
        $modelUsuario = new Usuario();
        $listaUsuario = $modelUsuario->find($this->paramBusca()." AND restricao=1")->fetch(true);
        
        $modelIgreja = new Igreja();
        $listaIgreja = $modelIgreja->find($this->paramBusca(). " AND NOT EXISTS (SELECT * FROM umps u WHERE igrejas.id = u.id_igreja)")->fetch(true);
        
        echo $this->view->render("sisump/umps", ['title'=>'UMPs', 'listaUMP'=>$listaUMP, "listaUsuarios"=>$listaUsuario, "listaIgrejas"=>$listaIgreja]);
        
        return;
    }
    /**
     * 
     * @param type $dados
     * @return void
     */
    public function novaUMP($dados):void
    {
        $this->acesso(2);
        
        $model = new UMP();
        $model->nome = $dados['nome'];
        $model->n_socios = 0;
        $model->id_igreja = $dados['igreja'];
        $model->id_federacao = $_SESSION['usuario']['federacao'];
        $model->id_sinodal = $_SESSION['usuario']['sinodal'];
        
        if(!$model->save()){
            flash("danger", "Erro ao Cadastrar UMP");
            $this->router->redirect("app.umps");
            return;
        }
        
        $modelIgreja = new Igreja();
        $igreja = $modelIgreja->findById(intval($dados['igreja']));
        $igreja->id_ump = $model->id;
        
        $igreja->save();

        $modelDiretoria = new Diretoria();
        $modelDiretoria->id_ump = $model->id;
        $modelDiretoria->id_federacao = $_SESSION['usuario']['federacao'];
        $modelDiretoria->id_sinodal = $_SESSION['usuario']['sinodal'];
        
        $modelDiretoria->changeEntity($this->entity("diretoria",intval($_SESSION['usuario']['restricao'])-1));
        $modelDiretoria->save();
        
        
        flash("success", "UMP Cadastrada com Sucesso!");
        $this->router->redirect("app.umps");
        return;
    }
    /**
     * 
     * @param type $dados
     * @return void
     */
    public function atualizarUMP($dados):void
    {
        $this->acesso(2);
        
        $model = new UMP();
        
        $ump = $model->findById(intval($dados['id']));
        $ump->nome = $dados['nome'];
        $ump->id_federacao = $_SESSION['usuario']['federacao'];
        $ump->id_sinodal = $_SESSION['usuario']['sinodal'];
        
        if(!$ump->save()){
            flash("danger", "Erro ao Atualizar UMP");
            $this->router->redirect("app.umps");
            return;
        }
        flash("success", "UMP Atualizada com Sucesso!");
        $this->router->redirect("app.umps");
        return;
    }
    /**
     * 
     * @param type $dados
     * @return void
     */
    public function deletarUMP($dados): void
    {
        $this->acesso(2);
        
        $dados = filter_var_array($dados, FILTER_DEFAULT);
                
        $model = new UMP();
        $model = $model->findById(intval($dados['id']));
        $id_igreja = $model->id_igreja;
        
        if(!$model->apagar($model->id)){
            flash("danger", "Erro ao remover UMP");
            $this->router->redirect("app.umps");
            return;
        }
        
        $modelIgreja = new Igreja();
        $igreja = $modelIgreja->findById($id_igreja);
        $igreja->id_ump = null;
        
        $igreja->save();
        
        
        flash("success", "UMP removida com Sucesso!");
        $this->router->redirect("app.umps");
        return;
        
    }
    
    
    /**
     * ================== USUARIOS ========================
     */
    /**
     * 
     * @param type $dados
     * @return void
     */
    public function novoUsuario($dados):void
    {
        $this->acesso(1,true);
        $dados = filter_var_array($dados, FILTER_SANITIZE_STRIPPED);
        
        
        $model = new Usuario();
        $model->usuario=$dados['usuario'];
        $model->senha = $dados['senha'];
        $model->restricao = intval($_SESSION['usuario']['restricao'])-1;
        $model->id_sinodal = $_SESSION['usuario']['sinodal'];
        
        if($_SESSION['usuario']['restricao']==2){
            $model->id_ump = $dados['ump'];
            $model->id_federacao = $_SESSION['usuario']['federacao'];
            $rota = "app.umps";
        }else{
            $model->id_ump = null;
            $model->id_federacao = $dados['ump'];
            $rota = "app.federacoes";
        }
        

        if(!$model->save()){
            flash("danger", "Erro ao Cadastrar Usuário");
            $this->router->redirect($rota);
            return;
        }
        flash("success", "Usuário Cadastrado com Sucesso!");
        $this->router->redirect($rota);
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
        
         $rota = "app.federacoes";
        
        if($_SESSION['usuario']['restricao']==2){
            $rota = "app.umps";
        }
        
        if(!$usuario->save()){
            flash("danger", "Erro ao Atualizar Usuário");
            $this->router->redirect($rota);
            return;
        }
        flash("success", "Usuário Atualizado com Sucesso!");
        $this->router->redirect($rota);
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
        $rota = "app.federacoes";
        
        if($_SESSION['usuario']['restricao']==2){
            $rota = "app.umps";
        }
        
        if(!$usuario->destroy()){
            flash("danger", "Erro ao Remover Usuário");
            $this->router->redirect($rota);
            return;
        }
        flash("success", "Usuário Removido com Sucesso!");
        $this->router->redirect($rota);
        return;
        
    }
    
    
    /**
     * ================== IGREJAS ========================
     */
    
    /**
     * 
     * @return void
     */
    
    public function igrejas(): void
    {
        $this->acesso(2);
        $model = new Igreja();
        $lista = $model->find($this->paramBusca())->fetch(true);
        echo $this->view->render("sisump/igrejas", ["title"=>"Igrejas", "lista"=>$lista]);
        
        return;
    }
    /**
     * 
     * @param type $dados
     * @return void
     */
    
    public function novaIgreja($dados):void
     {
        
        $this->acesso(2);
        
        $dados = filter_var_array($dados, FILTER_DEFAULT);

        $model= new Igreja();
        $model->nome = $dados['nome'];
        $model->ump = $dados['ump'];
        $model->endereco = $dados['endereco'];
        $model->pastor = $dados['pastor'];
        $model->telefone = $dados['telefone'];        
        $model->id_federacao = $_SESSION['usuario']['federacao'];
        $model->id_sinodal = $_SESSION['usuario']['sinodal'];
        
        if(!$model->save()){
            flash("danger", "Erro ao Cadastrar Igreja");
            $this->router->redirect("app.igrejas");
            return;
        }
        flash("success", "Igreja Cadastrada com Sucesso!");
        $this->router->redirect("app.igrejas");
        return;
        
        
    }
    /**
     * 
     * @param type $dados
     * @return void
     */
    public function atualizarIgreja($dados):void
    {
        
        $this->acesso(2);
        
        $dados = filter_var_array($dados, FILTER_DEFAULT);
        
        $model= new Igreja();        
        $igreja = $model->findById(intval($dados['id']));
        
        $igreja->nome = $dados['nome'];
        $igreja->ump = $dados['ump'];
        $igreja->endereco = $dados['endereco'];
        $igreja->pastor = $dados['pastor'];
        $igreja->telefone = $dados['telefone'];
        
        $igreja->id_federacao = $_SESSION['usuario']['federacao'];
        $igreja->id_sinodal = $_SESSION['usuario']['sinodal'];
        
        if(!$igreja->save()){
            flash("danger", "Erro ao Editar Igreja");
            $this->router->redirect("app.igrejas");
            return;
        }
        flash("success", "Igreja Editada com Sucesso!");
        $this->router->redirect("app.igrejas");
        return;
        
        
    }
    /**
     * 
     * @param type $dados
     * @return type
     */
    public function deletarIgreja($dados) {
        $this->acesso(2);
        
        $dados = filter_var_array($dados, FILTER_DEFAULT);
        
        $model= new Igreja();        
        $igreja = $model->findById(intval($dados['id']));
        
        if($igreja->id_ump == null){
            if(!$igreja->destroy()){
                flash("danger", "Erro ao Remover Igreja");
                $this->router->redirect("app.igrejas");
                return;
            }
            flash("success", "Igreja Removida com Sucesso!");
            $this->router->redirect("app.igrejas");
            return;
        }
        
        if(!$igreja->apagar($igreja->id_ump, $igreja->id)){
            flash("danger", "Erro ao Excluir Igreja");
            $this->router->redirect("app.igrejas");
            return;
        }
        flash("success", "Igreja Excluída com Sucesso!");
        $this->router->redirect("app.igrejas");
        return;
    }
    
    
    /**
     * ================== FEDERACOES ========================
     */
    
    
    public function federacoes(): void
    {
        $this->acesso(3);
        $modelFederacao = new Federacao();
        $listaFederacoes = $modelFederacao->dadosFederacoes($this->paramBusca());
        
        $modelUsuario = new Usuario();
        $restricao = intval($_SESSION['usuario']['restricao'])-1;
        $listaUsuarios = $modelUsuario->find($this->paramBusca()." AND restricao={$restricao}")->fetch(true);
        
        $modelPresbiterio= new Presbiterio();
        $listaPresbiterios = $modelPresbiterio->find($this->paramBusca(). " AND NOT EXISTS (SELECT * FROM federacoes f WHERE presbiterios.id = f.id_presbiterio)")->fetch(true);
        
        echo $this->view->render("sisump/federacoes",["title"=>"Federações", "listaFederacoes"=>$listaFederacoes, "listaUsuarios"=>$listaUsuarios, "listaPresbiterios"=>$listaPresbiterios]);
        return;
    }
    
    public function novaFederacao($dados):void
    {
        $this->acesso(3);
        
        $dados = filter_var_array($dados, FILTER_DEFAULT);
        
        $model = new Federacao();
        $model->nome = $dados['nome'];
        $model->sigla = $dados['sigla'];
        $model->n_umps = 0;
        $model->id_presbiterio = $dados['presbiterio'];
        $model->id_sinodal = $_SESSION['usuario']['sinodal'];
        
        if(!$model->save()){
            flash("danger", "Erro ao Cadastrar Federação");
            $this->router->redirect("app.federacoes");
            return;
        }
        
        $modelPresbiterio= new Presbiterio();
        $presbiterio = $modelPresbiterio->findById(intval($dados['presbiterio']));
        $presbiterio->id_federacao = $model->id;
        
        $presbiterio->save();

        $modelDiretoria = new Diretoria();
        $modelDiretoria->id_federacao = $model->id;
        $modelDiretoria->id_sinodal = $_SESSION['usuario']['sinodal'];
        
        $modelDiretoria->changeEntity($this->entity("diretoria",intval($_SESSION['usuario']['restricao'])-1));
        $modelDiretoria->save();
        
        
        flash("success", "Federação Cadastrada com Sucesso!");
        $this->router->redirect("app.federacoes");
        return;
    }
    
    
    public function atualizarFederacao($dados):void
    {
        $this->acesso(3);
        
        $model = new Federacao();
        
        $federacao = $model->findById(intval($dados['id']));
        $federacao->nome = $dados['nome'];
        $federacao->sigla = $dados['sigla'];
        $federacao->id_sinodal = $_SESSION['usuario']['sinodal'];
        
        if(!$federacao->save()){
            flash("danger", "Erro ao Atualizar Federação");
            $this->router->redirect("app.federacoes");
            return;
        }
        flash("success", "Federação Atualizada com Sucesso!");
        $this->router->redirect("app.federacoes");
        return;
    }
    /**
     * 
     * @param type $dados
     * @return void
     */
    public function deletarFederacao($dados): void
    {
        $this->acesso(3);
        
        $dados = filter_var_array($dados, FILTER_DEFAULT);
                
        $model = new Federacao();
        $federacao = $model->findById(intval($dados['id']));
        $id_presbiterio = $federacao->id_presbiterio;
        
        if(!$federacao->apagar($federacao->id)){
            flash("danger", "Erro ao remover Federação");
            $this->router->redirect("app.federacoes");
            return;
        }
        
        $modelPresbiterio= new Presbiterio();
        $presbiterio = $modelPresbiterio->findById($id_presbiterio);
        $presbiterio->id_federacao = null;
        
        $presbiterio->save();
        
        
        flash("success", "Federação removida com Sucesso!");
        $this->router->redirect("app.federacoes");
        return;
        
    }
    
    
    /**
     * ================== PRESBITERIOS ========================
     */
    public function presbiterios(): void
    {
        $this->acesso(3);
        $model = new Presbiterio();
        $lista = $model->find($this->paramBusca())->fetch(true);
        
        echo $this->view->render("sisump/presbiterios", ["title"=>"Presbitérios", "lista"=>$lista]);
        return;
        
    }
    
    
    
    public function novoPresbiterio($dados):void
     {
        
        $this->acesso(3);
        
        $dados = filter_var_array($dados, FILTER_DEFAULT);

        $model= new Presbiterio();
        $model->nome = $dados['nome'];
        $model->federacao = $dados['federacao'];
        $model->sigla = $dados['sigla'];
        $model->id_sinodal = $_SESSION['usuario']['sinodal'];
        
        if(!$model->save()){
            flash("danger", "Erro ao Cadastrar Presbitério");
            $this->router->redirect("app.presbiterios");
            return;
        }
        flash("success", "Presbitério Cadastrado com Sucesso!");
        $this->router->redirect("app.presbiterios");
        return;
        
        
    }
    /**
     * 
     * @param type $dados
     * @return void
     */
    public function atualizarPresbiterio($dados):void
    {
        
        $this->acesso(3);
        
        $dados = filter_var_array($dados, FILTER_DEFAULT);
        
        $model= new Presbiterio();
        $presbiterio = $model->findById(intval($dados['id']));
        
        $presbiterio->nome = $dados['nome'];
        $presbiterio->sigla = $dados['sigla'];
        $presbiterio->federacao = $dados['federacao'];
        $presbiterio->id_sinodal = $_SESSION['usuario']['sinodal'];
        
        if(!$presbiterio->save()){
            flash("danger", "Erro ao Atualizar Presbitério");
            $this->router->redirect("app.presbiterios");
            return;
        }
        flash("success", "Presbitério Atualizado com Sucesso!");
        $this->router->redirect("app.presbiterios");
        return;
        
        
    }
    /**
     * 
     * @param type $dados
     * @return type
     */
    public function deletarPresbiterio($dados) {
        $this->acesso(3);
        
        $dados = filter_var_array($dados, FILTER_DEFAULT);
        
        $model= new Presbiterio();        
        $presbiterio = $model->findById(intval($dados['id']));
        
        if($presbiterio->id_federacao == null){
            if(!$presbiterio->destroy()){
                flash("danger", "Erro ao Remover Presbitério");
                $this->router->redirect("app.presbiterios");
                return;
            }
            flash("success", "Presbitério Removido com Sucesso!");
            $this->router->redirect("app.presbiterios");
            return;
        }
        
        if(!$presbiterio->apagar($presbiterio->id_federacao, $presbiterio->id)){
            flash("danger", "Erro ao Excluir Presbitério");
            $this->router->redirect("app.presbiterios");
            return;
        }
        flash("success", "Presbitério Excluído com Sucesso!");
        $this->router->redirect("app.presbiterios");
        return;
    }
    
    
    /**
     * ================== SECRETARIOS ========================
     */
    
    
    public function secretarios(): void
    {
        $this->acesso(1,true);
        $model = new Secretario();
        $lista = $model->find($this->paramBusca())->fetch(true);
        echo $this->view->render("sisump/secretarios", ["title"=>"Secretários", "lista"=>$lista]);
        return;
        
    }
    
    public function novoSecretario($dados): void
    {
        $this->acesso(2);
        $dados = filter_var_array($dados, FILTER_DEFAULT);
        
        $model = new Secretario();
        $model->nome = $dados['nome'];
        $model->telefone = $dados['telefone'];
        $model->secretaria = $dados['secretaria'];
        $model->id_federacao = $_SESSION['usuario']['federacao'];
        $model->id_sinodal = $_SESSION['usuario']['sinodal'];
        
        if(!$model->save()){
            flash("danger", "Erro ao Cadastrar Secretário");
            $this->router->redirect("app.secretarios");
            return;
        }
        flash("success", "Secretário Cadastrado com Sucesso!");
        $this->router->redirect("app.secretarios");
        return;
    }
    
    public function atualizarSecretario($dados): void
    {
        $this->acesso(2);
        $dados = filter_var_array($dados, FILTER_DEFAULT);
        
        $model = new Secretario();
        $secretario = $model->findById(intval($dados['id']));
        
        $secretario->nome = $dados['nome'];
        $secretario->telefone = $dados['telefone'];
        $secretario->secretaria = $dados['secretaria'];
        $secretario->id_federacao = $_SESSION['usuario']['federacao'];
        $secretario->id_sinodal = $_SESSION['usuario']['sinodal'];
        
        if(!$secretario->save()){
            flash("danger", "Erro ao Atualizar o Secretário");
            $this->router->redirect("app.secretarios");
            return;
        }
        flash("success", "Secretário Atualizar com Sucesso!");
        $this->router->redirect("app.secretarios");
        return;
    }
    
    public function deletarSecretario($dados):void
    {
        $dados = filter_var_array($dados, FILTER_DEFAULT);
        
        $model = new Secretario();
        $secretario = $model->findById(intval($dados['id']));
        
        if(!$secretario->destroy()){
            flash("danger", "Erro ao Remover Secretário");
            $this->router->redirect("app.secretarios");
            return;
        }
        flash("success", "Secretário Removido com Sucesso!");
        $this->router->redirect("app.secretarios");
        return;
        
    }
    
    
    public function alterarSenha(): void
    {
        echo $this->view->render("sisump/alterar-senha", ["title"=>"Alterar Senha"]);
        return;
        
    }
    public function atualizarSenha($dados): void
    {
        
        $dados = filter_var_array($dados, FILTER_SANITIZE_STRIPPED);
        
        $model = new Usuario();
        
        $usuario = $model->findById(intval($_SESSION['usuario']['id']));
        
        
        if($usuario->senha != $dados['antiga']){
            flash("danger", "Antiga Senha incorreta");
            $this->router->redirect("app.alterarsenha");
            return;
        }
        
        $usuario->senha = $dados['nova'];
        
        if(!$usuario->save()){
            flash("danger", "Erro ao Atualizar Senha");
            $this->router->redirect("app.alterarsenha");
            return;
        }
        
        flash("success", "Senha Atualizada!");
        $this->router->redirect("app.alterarsenha");
        return;
        
        
    }
    
    
    public function relatorio($param):void
    {
        
        
       
        
        $retorno = $this->dadosRelatorios($_SESSION['usuario']['restricao']);
        
        echo $this->view->render("sisump/relatorio/".$this->paginaRelatorio($_SESSION['usuario']['restricao']), $retorno);
        return;
        
    }
    
    private function paginaRelatorio($restricao): string
    {
        
        $restricao= intval($restricao);
        
        switch($restricao){
            case 1:
                return "_local";
                break;
            case 2:
                return "_federacao";
                break;
            case 3:
                return "_sinodal";
                break;
                
        }
        
    }
    
    private function dadosRelatorios($restricao): array
    {
        $this->acesso();
        $restricao= intval($restricao);
        
        
        $modelDiretoria = new Diretoria();
        $modelDiretoria->changeEntity($this->entity("diretoria", $restricao));
        $diretoria = $modelDiretoria->find($this->paramBusca())->fetch();
        
        $modelRelatorio = new Relatorio();
        
        
        $perfil = $modelRelatorio->dadosPerfil($this->paramBusca())->fetch();
        $participacao = $modelRelatorio->dadosParticipacao($this->paramBusca())->fetch();
        $doacao = $modelRelatorio->dadosDoacao($this->paramBusca())->fetch();
        $dadosIgrejas = $modelRelatorio->dadosIgrejas($this->paramBusca())->fetch(true);
        
        $totalSocios = $modelRelatorio->totalSocios($this->paramBusca())->fetch();
        $dadosUmps = $modelRelatorio->dadosUmps($this->paramBusca())->fetch(true);
        $dadosFederacoes = $modelRelatorio->dadosFederacoes($this->paramBusca())->fetch(true);
        $dadosPresbiterios = $modelRelatorio->dadosPresbiterios($this->paramBusca())->fetch(true);
        $cabecalhoFederacao = (new Presbiterio())->find($this->paramBusca(), null,"nome, sigla")->fetch();
        $cabecalhoLocal= (new Igreja())->find($this->paramBusca(), null,"nome")->fetch();
        $cabecalhoSinodal= (new Sinodal())->findById(intval($_SESSION['usuario']['id']), "nome, sigla");
        
         switch($restricao){
            case 1:
                $retorno =  [
                    "diretoria"=>$diretoria,
                    "perfil"=>$perfil, 
                    "participacao"=>$participacao, 
                    "doacao"=>$doacao,
                    "cabecalhoLocal"=>$cabecalhoLocal
                ];
                return $retorno;
                break;
            case 2:
                $retorno =  [
                    "diretoria"=>$diretoria,
                    "perfil"=>$perfil, 
                    "participacao"=>$participacao, 
                    "doacao"=>$doacao, 
                    "dadosIgrejas"=>$dadosIgrejas, 
                    "totalSocios"=>$totalSocios,
                    "dadosUmps"=>$dadosUmps,
                    "cabecalhoFederacao"=>$cabecalhoFederacao
                ];
                return $retorno;
                break;
            case 3:
                $retorno =  [
                    "diretoria"=>$diretoria,
                    "perfil"=>$perfil, 
                    "participacao"=>$participacao, 
                    "doacao"=>$doacao,
                    "totalSocios"=>$totalSocios,
                    "cabecalhoSinodal"=>$cabecalhoSinodal,
                    "dadosFederacoes"=>$dadosFederacoes,
                    "dadosPresbiterios"=>$dadosPresbiterios
                ];
                return $retorno;
                break;
                
        }
        
    }
    
    
}

