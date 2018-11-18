<?php

class TransaccionModelo {
    
    private $id_trans;     ////int
    private $fecha;     ///date
    private $hora;      ///time
    private $tipo;      ///carchar
    private $cuenta_origen;     //int
    private $cuenta_destino;    //int
    private $monto;     //float
    private $id_caja;   //int
    private $id_cajero;     //int
    private $id_sucursal;   //int
    
    ////////SETS AND GETS
    public function __construct(){
            $this->id_trans=0;
            $this->hora="";
            $this->fecha="";
            $this->tipo="";
            $this->cuenta_origen=0;
            $this->cuenta_destino=0;
            $this->monto=0;
            $this->id_caja=0;
            $this->id_cajero=0;
            $this->id_sucursal=0;
    }
            
    public function __destruct(){}
    
    public function id_trans($x=""){
        if( $x!="" ){
            $this->id_trans=$x;
            
        }else {
            return $this->id_trans;
        }   
    }
    
    public function hora($x=""){
        if( $x!="" ){
            $this->hora=$x;
            
        }else {
            return $this->hora;
        }   
    }
    
    public function fecha($x=""){
        if( $x!="" ){
            $this->fecha=$x;
            
        }else {
            return $this->fecha;
        }   
    }
    
    public function tipo($x=""){
        if( $x!="" ){
            $this->tipo=$x;
            
        }else {
            return $this->tipo;
        }   
    }
    public function cuenta_origen($x=""){
        if( $x!="" ){
            $this->cuenta_origen=$x;
            
        }else {
            return $this->cuenta_origen;
        }   
    }
    
    public function cuenta_destino($x=""){
        if( $x!="" ){
            $this->cuenta_destino=$x;
            
        }else {
            return $this->cuenta_destino;
        }   
    }
    public function monto($x=""){
        if( $x!="" ){
            $this->monto=$x;
            
        }else {
            return $this->monto;
        }   
    }
    public function id_caja($x=""){
        if( $x!="" ){
            $this->id_caja=$x;
            
        }else {
            return $this->id_caja;
        }   
    }
    public function id_cajero($x=""){
        if( $x!="" ){
            $this->id_cajero=$x;
            
        }else {
            return $this->id_cajero;
        }   
    }
    public function id_sucursal($x=""){
        if( $x!="" ){
            $this->id_sucursal=$x;
            
        }else {
            return $this->id_sucursal;
        }   
    }
}
