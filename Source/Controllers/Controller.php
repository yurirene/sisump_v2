<?php

namespace Source\Controllers;

use CoffeeCode\Router\Router;
use League\Plates\Engine;

abstract class Controller
{
    /** @var Engine */
    protected $view;
    
    /** @var Router */
    protected $router;
    
    public function __construct($router)
    {
        
        $this->router = $router;
        $this->view = new Engine(dirname(__DIR__,2)."/views/templates", "php");
        $this->view->addData(["router"=>$this->router]);
    }
    
}
    
?>