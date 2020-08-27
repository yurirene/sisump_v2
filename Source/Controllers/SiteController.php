<?php


namespace Source\Controllers;

class SiteController extends Controller
{
    public function __construct($router)
    {
        parent::__construct($router);
    }
    
    public function erro($dados): void
    {
        $erro = filter_var_array($dados, FILTER_VALIDATE_INT);
        echo $this->view->render("site/erro", ["erro"=>$erro["errcode"], "title"=>"Ooops!"]);
        return;
        
    }
    
    public function index(): void
    {
        echo $this->view->render("site/index");
    }


}


