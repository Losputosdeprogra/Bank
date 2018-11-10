<?php

class MainnVista {
    
    private $view;
    
    public function __construct() {
        $this->view = file_get_contents(__DIR__ . "/PantallaPrincipal.html");
    }
    
    function getView() {
        return $this->view;
    }
}
