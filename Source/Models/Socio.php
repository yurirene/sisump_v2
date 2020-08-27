<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class Socio extends DataLayer
{
    
    public function __construct()
    {
        parent::__construct("socios", ["nome", "idade", "sexo", "estadoCivil", "escolaridade", "filho", "deficiencia", "tipo"], "id", false);
    }
    
}
