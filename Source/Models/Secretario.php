<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

/**
 * Description of Secretario
 *
 * @author Yuri
 */
class Secretario extends DataLayer {

    public function __construct() {
        parent::__construct("secretarios", ["nome", "telefone", "secretaria"], "id", false);
    }    
    
}
