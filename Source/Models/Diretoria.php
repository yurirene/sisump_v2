<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

/**
 * Description of Diretoria
 *
 * @author Yuri
 */
class Diretoria extends DataLayer 
{
    public function __construct() {
        
        parent::__construct('tabela', [], 'id', false);
    }
    
    public function dadosDiretoria(string $terms):?DataLayer
    {
        if($_SESSION['usuario']['restricao']==2){
            $this->entity = "diretoria_local";
            $tabela = "umps";
            $comparacoes = ["id_ump", "id"];
        }else{
            
            $this->entity = "diretoria_federacao";
            $tabela = "federacoes";
            $comparacoes = ["id_federacao", "id"];
        }
        if($_SESSION['usuario']['restricao']==10){
            $this->entity = "diretoria_sinodal";
            $tabela = "sinodais";
            $comparacoes = ["id_sinodal", "id"];
        }
        return $this->simpleJoin($tabela, $comparacoes, $this->entity.".".$terms, null, "{$this->entity}.*, {$tabela}.sigla");
        
    }
    public function dadosSinodais():?DataLayer
    {
        $this->entity = "diretoria_sinodal";
        $tabela = "sinodais";
        $comparacoes = ["id_sinodal", "id"];
        return $this->simpleJoin($tabela, $comparacoes, 1, null, "{$this->entity}.*, {$tabela}.sigla");
        
    }
    
}
