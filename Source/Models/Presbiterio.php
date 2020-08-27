<?php


namespace Source\Models;

use CoffeeCode\DataLayer\Connect;
use CoffeeCode\DataLayer\DataLayer;
use PDOException;

/**
 * Description of Presbiterio
 *
 * @author Yuri
 */
class Presbiterio  extends DataLayer
{
    
    public function __construct() {
        parent::__construct("presbiterios", ["nome", "sigla", "federacao"], "id", false);
    }
    
    public function apagar($id_federacao, $id):bool
    {

        if (empty($id)||empty($id_federacao)) {
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
                        DELETE FROM presbiterios WHERE id = :id_presbiterio;
                    COMMIT;";
            $stmt = Connect::getInstance()->prepare($query);
            $stmt->bindValue(":id", $id_federacao);
            $stmt->bindValue(":id_presbiterio", $id);

            $stmt->execute();
            return true;
        } catch (PDOException $exception) {
            $this->fail = $exception;
            return false;
        }
    }
    
}
