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
    public function __construct($x=""){
            $this->id_trans=$x;
            $this->hora=$x;
            $this->fecha=$x;
            $this->tipo=$x;
            $this->cuenta_origen=$x;
            $this->cuenta_destino=$x;
            $this->monto=$x;
            $this->id_caja=$x;
            $this->id_cajero=$x;
            $this->id_sucursal=$x;
    }
            
    public function __destruct(){}
    
    public function id_trans($x,$bool){
        if( $bool==0 ){
            $this->id_trans=$x;
            
        }else {
            return $this->id_trans;
        }   
    }
    
    public function hora($x,$bool){
        if( $bool==0 ){
            $this->hora=$x;
            
        }else {
            return $this->hora;
        }   
    }
    
    public function fecha($x,$bool){
        if( $bool==0 ){
            $this->fecha=$x;
            
        }else {
            return $this->fecha;
        }   
    }
    
    public function tipo($x,$bool){
        if( $bool==0 ){
            $this->tipo=$x;
            
        }else {
            return $this->tipo;
        }   
    }
    public function cuenta_origen($x,$bool){
        if( $bool==0 ){
            $this->cuenta_origen=$x;
            
        }else {
            return $this->cuenta_origen;
        }   
    }
    
    public function cuenta_destino($x,$bool){
        if( $bool==0 ){
            $this->cuenta_destino=$x;
            
        }else {
            return $this->cuenta_destino;
        }   
    }
    public function monto($x,$bool){
        if( $bool==0 ){
            $this->monto=$x;
            
        }else {
            return $this->monto;
        }   
    }
    public function id_caja($x,$bool){
        if( $bool==0 ){
            $this->id_caja=$x;
            
        }else {
            return $this->id_caja;
        }   
    }
    public function id_cajero($x,$bool){
        if( $bool==0 ){
            $this->id_cajero=$x;
            
        }else {
            return $this->id_cajero;
        }   
    }
    public function id_sucursal($x,$bool){
        if( $bool==0 ){
            $this->id_sucursal=$x;
            
        }else {
            return $this->id_sucursal;
        }   
    }
    ///////////////////
    
    
    
    
    
}
