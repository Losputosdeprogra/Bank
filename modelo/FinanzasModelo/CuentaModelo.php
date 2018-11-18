<?php


class CuentaModelo {
    private $id_cuenta;
    private $Tipo;
    private $Moneda;  ////0=bolivianos    1=dolares
    private $Monto;
    private  $id_clinete;
    
    public function set($monto=0,$tipo="",$moneda=0, $id_cliente=0){
        $this->Tipo       = $tipo;
        $this->Moneda     = $moneda;
        $this->Monto      = $monto;
        $this->id_clinete = $id_cliente;
    }
    
    public function Moneda($x=0){
        $this->Moneda=$x;
    }
    public function Monto($x=0){
        $this->Monto=$x;
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
    
    public function id_cuenta($idcuenta=0) {
        
        if( $idcuenta!=0 ){
           $this->id_cuenta=$idcuenta;
            
        }else {
            return $this->id_cuenta;
        }
    }
    
    
    
    
}
