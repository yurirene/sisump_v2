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
 * Description of Igreja
 *
 * @author Yuri
 */
class Igreja extends DataLayer {
    
    public function __construct() {
        parent::__construct('igrejas', ["nome", "ump", "endereco", "pastor", "telefone"], 'id', false);
    }
    
    public function apagar($id_ump, $id):bool
    {

        if (empty($id)||empty($id_ump)) {
            return false;
        }
        
        try {
            $query = "BEGIN;
                        DELETE FROM socios WHERE id_ump = :id;
                        DELETE FROM diretoria_local WHERE id_ump = :id;
                        DELETE FROM participacoes WHERE id_ump = :id;
                        DELETE FROM usuarios WHERE id_ump = :id;
                        DELETE FROM umps WHERE id = :id;
                        DELETE FROM igrejas WHERE id = :id_igreja;
                    COMMIT;";
            $stmt = Connect::getInstance()->prepare($query);
            $stmt->bindValue(":id", $id_ump);
            $stmt->bindValue(":id_igreja", $id);

            $stmt->execute();
            return true;
        } catch (PDOException $exception) {
            $this->fail = $exception;
            return false;
        }
    }
    
}
