<?php

namespace Source\Models;

use CoffeeCode\DataLayer\Connect;
use CoffeeCode\DataLayer\DataLayer;
use PDOException;

class UMP extends DataLayer
{

    public function __construct()
    {
        parent::__construct("umps", ["nome"], "id", false);
    }

    public function apagar($id):bool
    {

        if (empty($id)) {
            return false;
        }
        
        try {
            $query = "BEGIN;
                        DELETE FROM socios WHERE id_ump = :id;
                        DELETE FROM diretoria_local WHERE id_ump = :id;
                        DELETE FROM participacoes WHERE id_ump = :id;
                        DELETE FROM usuarios WHERE id_ump = :id;
                        DELETE FROM umps WHERE id = :id;
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