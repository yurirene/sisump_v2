<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Source\Models;

use CoffeeCode\DataLayer\Connect;
use CoffeeCode\DataLayer\DataLayer;
use PDOException;

/**
 * Description of Federacao
 *
 * @author Yuri
 */
class Federacao extends DataLayer 
{
    public function __construct() {
        parent::__construct("federacoes", ["nome", "sigla"], "id", false);
    }
    
    public function dadosFederacoes($param): array
    {
        
        return $this->simpleJoin("presbiterios",["id_presbiterio", "id"],"federacoes.".$param, null, "presbiterios.sigla AS presbiterio, federacoes.*")->fetch(true);
        
    }
    
    public function apagar($id):bool
    {

        if (empty($id)) {
            return false;
        }
        try {
            $query = "BEGIN;
                        DELETE FROM socios WHERE id_federacao = :id;
                        DELETE FROM diretoria_federacao WHERE id_federacao = :id;
                        DELETE FROM diretoria_local WHERE id_federacao = :id;
                        DELETE FROM programacoes_federacao WHERE id_federacao = :id;
                        DELETE FROM participacoes WHERE id_federacao = :id;
                        DELETE FROM usuarios WHERE id_federacao = :id;
                        DELETE FROM igrejas WHERE id_federacao = :id;
                        DELETE FROM umps WHERE id_federacao = :id;
                        DELETE FROM secretarios WHERE id_federacao = :id;
                        DELETE FROM federacoes WHERE id = :id;
                    COMMIT;";
            $stmt = Connect::getInstance()->prepare($query);
            $stmt->bindValue(":id", $id);
            $stmt->execute();
            return true;
        } catch (PDOException $exception) {
            $this->fail = $exception;
            return false;
        }
    }
    
}
