<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;
use Source\Models\Socio;

/**
 * Description of Participacao
 *
 * @author Yuri
 */
class Participacao extends DataLayer 
{
    
    public function __construct() {
        parent::__construct("participacoes", ["nome", "instancia","ano"], "id", false);
    }
    
    
    public function dadosParticipaco(string $param): array {
        $retorno = array();
        if($_SESSION['usuario']['restricao'] == 1){
            $lista = $this->simpleJoin("socios",["id_socio", "id"],"participacoes.".$param, null, "socios.nome AS socio, participacoes.*")->order("participacoes.ano, participacoes.nome")->fetch(true);

            $modelSocio = new Socio();
            $socio= $modelSocio->find($param)->fetch(true);
            $retorno = ['title'=>'Participações - Local',"socios"=>$socio, "participacoes"=>$lista];
        }
        if($_SESSION['usuario']['restricao'] == 2){
            $lista = $this->find($param, null, "nome, count(*) AS qtd, instancia, ano")->group("nome, instancia")->order("instancia")->fetch(true);
            $retorno = ['title'=>'Participações - Federação', "participacoes"=>$lista];
        }
        if($_SESSION['usuario']['restricao'] == 3){
            $lista = $this->find($param, null, "nome, count(*) AS qtd, instancia, ano")->group("nome, instancia")->order("instancia")->fetch(true);
            $retorno = ['title'=>'Participações - Sinodal', "participacoes"=>$lista];
        }
        return $retorno;
        
        
    }
}
