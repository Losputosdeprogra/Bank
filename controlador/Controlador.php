<?php


require_once __DIR__ . '/../vista/MainnVista.php';

class Controlador {    
    private $vista;
    private $render;
    
    public function __construct() {
        $this->vista = new MainnVista();
    }
    
    public function load(){
       
        $html = $this->vista->getView();
        $this->render = str_replace("", "", $html);
    }
    
    public function render(){
        echo $this->render;
    }    
}