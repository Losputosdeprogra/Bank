<?php


class CuentaModelo {
    private $id_cuenta;
    private $Tipo;
    private $Moneda;
    private $Monto;
    private  $id_clinete;
    
    public function set($tipo="",$moneda="",$monto=0, $id_cliente=0){
        $this->Tipo       = $tipo;
        $this->Moneda     = $moneda;
        $this->Monto      = $monto;
        $this->id_clinete = $id_cliente;
    }
    public function getTipo(){
        return $this->Tipo;
    }
    public function getMoneda(){
        return $this->Moneda;
    }
    public function getMonto(){
        return $this->Monto;
    }
    public function getId_cliente(){
        return $this->id_clinete;
    }
    
}
