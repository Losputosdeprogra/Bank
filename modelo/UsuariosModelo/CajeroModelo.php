<?php

require_once __DIR__ . '/../FinanzasModelo/TransaccionModelo.php';
require_once __DIR__ . '/UsuarioModelo.php';
require_once __DIR__ . '/../FinanzasModelo/CuentaModelo.php';

class CajeroModelo  extends UsuarioModelo{
   
    private $TablaCorrespondeinte = "cajeros";
    private $id_caja;
    
    public function idcaja($x=""){
        if( $x!="" ){
            $this->idcaja=$x;
            
        }else {
            return $this->id_caja;
        } 
    }
    
    
    
    public function Tabla (){
       return "cajeros";
    }    
    
    
    
    public function verificarUsuario() {                         // Esta funcion revisa si el usuario existe en la tabla
        return parent::verificar($this->TablaCorrespondeinte); //y sabe su contraseña.
    }                                                                           //Utiliza la vatiable TablaCorrespondiente para realizar
                                                                                //la consulta en la tabla correcta.
    public function RealizarExtracto($nombreDelCliente) {
        parent::Extracto($nombreDelCliente);
    }
    
    
    
    ///////////////////////////////////////////////////////////////////////////////////////////////
    public function RealizarTransaccion($transaccion){
        $conexion=ConectarBD::conectar("bd_finanzas");
        
        $sql = "INSERT INTO `transacciones`( `fecha`, `hora`, `tipo`, `cuenta_origen`, `cuenta_destino`, `monto`, `id_caja`, `id_cajero`, `id_sucursal`) VALUES(?,?,?,?,?,?,?,?,?);";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param('sssiiiiii', $transaccion->fecha(), $transaccion->hora(),$transaccion->tipo(), $transaccion->cuenta_origen(),$transaccion->cuenta_destino() ,$transaccion->monto(),$transaccion->id_caja(),$transaccion->id_cajero(),$transaccion->id_sucursal());
            if ($stmt->execute()) {
                $conexion->close();
                return(true);
            } else {
                $conexion->close();
                return(false);
            } 
        
    }
    
    
    public function ObtenerCuenta($idcuenta) {
        $sql = "SELECT * FROM cuentas WHERE id_cuenta='$idcuenta';";
        $rows= ConectarBD::send("bd_finanzas",$sql);
        
        $fila = $rows->fetch_row();
        $cuenta=new CuentaModelo();
        
        $cuenta->set($fila[1],$fila[2],$fila[3],$fila[4]);
        $cuenta->id_cuenta($idcuenta);
        return $cuenta;
    }
    
     public function update_cuenta($cuenta){
        $conexion=ConectarBD::conectar("bd_finanzas");
        $sql="UPDATE `cuentas` SET `monto`=?,`tipo`=?,`moneda`=?,`id_cliente`=? WHERE `id_cuenta`=?;";
        $stmt = $conexion->prepare($sql);
                $a0=$cuenta->getMonto();
                $a1=$cuenta->getTipo();
                $a2=$cuenta->getMoneda();
                $a3=$cuenta->getId_cliente();
                $a4=$cuenta->id_cuenta(); 
        
        
        $stmt->bind_param('isiii',$a0,$a1,$a2,$a3,$a4 );
          
        
        if ($stmt->execute()) {
                $conexion->close();
                return(true);
            } else {
                $conexion->close();
                return(false);
            } 
     }
     
     
     
     //////////CUANTOS PARAMETROS ?
     ///////////IDEA, DE "1PARAM" A "2PARAM"
     ////////USAR LA CONVERSION EN ESTA MISMA FUNCION
     ////Usar conversion de Compra o Venta para la Conversion
     public function VerificarMoneda($de,$a,$monto){
         ////Dolares a Bolivianos
         if($de==1 and $a==0){
            return $this->Conversion($monto, $a);
         }
         ////Bolivianos a Dolares
         if($de==0 and $a==1){
            return $this->Conversion($monto, $a);
             
         }
         if($de==$a){
             return $monto;
         }
         
     }
     
     
     
     
     ///////////HACER DOS TIPOS DE CONVERSIONES?
     /////////o una con dos parametros
     /////////El parametro de moneda indica que se tiene q convertir a ese tipo de moneda
     ///// Se sobre entiende que si uso esta funcion entonces el monto es distinta a lo q se tiene q convertir
     ////////Ejemplo los parametros monto esta en DOLARES y MONEDA en BOLIVIANOS
     public function Conversion($monto,$moneda){
         ////////Bolivianos es 0 
         //////////DOLARES es 1
         
         /////moneda igual a Bolivianos
         /// Conversion de DOLARES a BOLIVIANOS
         if($moneda==0){
             $monto=$monto*7;
             return $monto;
             
             
         //moneda igual a dolares
         ///Conversion de Bolivianos a Dolares;
         }else{
             $monto=$monto*(1/7);
             return $monto;
         }
         ///////
         //////////NOTA IMPORTANE
         ///    no ESTOY APLICANDO COMPRA Y VENTA 
         //     PUEDE QUE IMPLEMENTE DOS FUNCIONES CONVERSIONES DISTINTAS EN ESE CASO
         //     UNO PARA COMPRA Y OTRA PARA VENTA
         /////////
         /////////////
         
         
     }
     
     public function registrartransaccion($transaccion){
        $conexion=ConectarBD::conectar("bd_finanzas");
        $sql="INSERT INTO `transacciones`( `fecha`, `hora`, `tipo`, `cuenta_origen`, `cuenta_destino`, `monto`, `id_caja`, `id_cajero`, `id_sucursal`) VALUES (?,?,?,?,?,?,?,?,?);";
        $stmt = $conexion->prepare($sql);
        
            $a0=$transaccion->fecha();
                
                $a1=$transaccion->hora();
                $a2=$transaccion->tipo();
                $a3=$transaccion->cuenta_origen();
                $a4=$transaccion->cuenta_destino();
                $a5=$transaccion->monto();
                $a6=$transaccion->id_caja();
                $a7=$transaccion->id_cajero();
                $a8=$transaccion->id_sucursal();
        $stmt->bind_param('sssiiiiii',$a0,$a1,$a2,$a3,$a4,$a5,$a6,$a7,$a8);
          
        /////////////
        if ($stmt->execute()) {
                $conexion->close();
                return(true);
            } else {
                $conexion->close();
                return(false);
            }
         
     }


     ///////////////////////////IDEA SEPARAR LOS 3 TIPOS DE TRANSACCION
     //////TIPO DE MONEDA DE LA TRANSACCION
     // EJEMPLO, QUIERO RETIRAR EN DOLARES
     // QUIERO RETIRAR EN BOLIVIANOS
     //////
     public function Retiro($transaccion,$moneda){
         
         if($transaccion->monto()>0){
            //////Construccion de las cuentas
            $origen= $this->ObtenerCuenta($transaccion->cuenta_origen());
            
            
             $origen->getId_cliente();
            
             $origen->getMoneda();
           
             $origen->getMonto();

             $origen->getTipo();
            ////////////////////////////////
            $monto=$transaccion->monto();
            
            
            
            $monto=$this->VerificarMoneda( $moneda,$origen->getMoneda(), $monto);
            
                       $transaccion->monto($monto);
            
            if($monto<=$origen->getMonto()){
                       $monto=$origen->getMonto()-$monto;
                         $monto;
                        
                        
                       $origen->Monto($monto);
                       
                       $this->update_cuenta($origen);
                       $this->registrartransaccion($transaccion);
                       return true;
            }else {
                return false;
                
            }           
        }else{
            return false;
            
        }
         
     }
     
     
      public function Deposito($transaccion,$moneda){
         
         if($transaccion->monto()>0){
            //////Construccion de las cuentas
            $origen= $this->ObtenerCuenta($transaccion->cuenta_destino());
            
            
             $origen->getId_cliente();
            
             $origen->getMoneda();
            
             $origen->getMonto();
            
             $origen->getTipo();
            ////////////////////////////////
            $monto=$transaccion->monto();
            
            
            $monto=$this->VerificarMoneda( $moneda,$origen->getMoneda(), $monto);
            
                       $transaccion->monto($monto);
            
            if($monto>0){
                       $monto=$origen->getMonto()+$monto;
                       
                       $origen->Monto($monto);
                       
                       $this->update_cuenta($origen);
                       $this->registrartransaccion($transaccion);
                       return true;
            }else {
                return false;
                
            }           
        }else{
            return false;
            
        }
         
     }
     
     
     
      public function Transferencia($transaccion,$moneda){
         
         if($transaccion->monto()>0){
            //////Construccion de las cuentas
            $origen= $this->ObtenerCuenta($transaccion->cuenta_origen());
            $destino= $this->ObtenerCuenta($transaccion->cuenta_destino());
          
            
             $origen->getId_cliente();
            
             $origen->getMoneda();
           
             $origen->getMonto();
           
             $origen->getTipo();
            
            
             $destino->getId_cliente();
            
             $destino->getMoneda();
            
             $destino->getMonto();
            
             $destino->getTipo();
            ////////////////////////////////
            $monto=$transaccion->monto();
            
           
            ///////////////////////////
            
            
            $monto=$this->VerificarMoneda( $moneda,$origen->getMoneda(), $monto);
            
                       $transaccion->monto($monto);
            
            if($monto<=$origen->getMonto()){
                        $nuevoorigen=$origen->getMonto()-$monto;
                      
                       
                       $origen->Monto($nuevoorigen);
                       
                       
                       
            }else {
                return false;
                
            }
            $monto=$this->VerificarMoneda( $moneda,$destino->getMoneda(), $monto);
            
            if($monto>0){
                       $monto=$destino->getMonto()+$monto;
                       
                       $destino->Monto($monto);
                       
                       
                       
                       
            }else {
                return false;
                
            }
            $this->update_cuenta($origen);
            $this->update_cuenta($destino);       
            $this->registrartransaccion($transaccion);
            return true;
        }else{
            return false;
            
        }
         
     }
    

    
    public function CrearCuenta($cuenta) {
        $monto      = $cuenta->getMonto();
        $tipo       = $cuenta->getTipo();
        $moneda     = $cuenta->getMoneda();
        $id_cliente = $cuenta->getId_cliente();
        
        $mon;
        if($moneda=="Dolares"){
            $mon=1;
        }else $mon=0;
        
        $sql = "INSERT INTO cuentas(monto, tipo, moneda, id_cliente) VALUES ($monto,'$tipo',$mon,$id_cliente)";
        return ConectarBD::send("bd_finanzas", $sql);
    }
    
    
}
