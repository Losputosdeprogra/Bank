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
    
    public function verificarCajero() {                         // Esta funcion revisa si el usuario existe en la tabla
    $sql = "SELECT nombre,contrasena,id_cajero FROM cajeros;";
        $rows= ConectarBD::send("bd_usuario",$sql);
        
        while ( $fila = $rows->fetch_row()){
            if ($fila[0] == $this->getNombre() && $fila[1] == $this->getContrasena()){
                
                $this->setIdCliente($fila[2]);
                return TRUE;
            }
        }
        return FALSE;}        //Utiliza la vatiable TablaCorrespondiente para realizar
                                                            //la consulta en la tabla correcta.
    public function RealizarExtracto($nombreDelCliente) {
        parent::Extracto($nombreDelCliente);
    }

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
    public function RegistrarNuevoCliente($Cliente, $TipoCuenta,$moneda) {

        $nombre     = $Cliente->getNombre();
        $telefono   = $Cliente->getTelefono();
        $email      = $Cliente->getEmail();
        $direccion  = $Cliente->getDireccion();
        $contrasena = $Cliente->getContrasena();
        $nit        = $Cliente->getNit();
                
        $sql = "SELECT count(nit_ci) from clientes WHERE nit_ci = $nit";
        
        if( ConectarBD::send("bd_usuario", $sql)->fetch_row()[0] == 0){   //Verificamos que no exista otro usuario con el mismo C.I
        
            $sql1 = "INSERT INTO clientes( nombre, telefono, email, direccion, contrasena, nit_ci) "
            . "VALUES ('$nombre', $telefono , '$email', '$direccion' ,'$contrasena' , $nit)";

            if(ConectarBD::send("bd_usuario", $sql1)){

                $sql2 = "SELECT MAX(id_cliente) from clientes ";
                $idCliente = ConectarBD::send("bd_usuario", $sql2)->fetch_row()[0];  //Obtenemos el id del cliente que acabamos crear

                $sql3 = "INSERT INTO cuentas(monto, tipo, moneda, id_cliente) VALUES ( 0 , '$TipoCuenta','$moneda',$idCliente )";
                return ConectarBD::send("bd_finanzas", $sql3);
            } else {
                return false;
            }
        }else{
            echo "<br><br><br><br><center> Ya existe un cliente registrado con ese C.I, no se puede completar el registro";
            return false;
        }
    }
    
    public function ObtenerCuenta($idcuenta) {
        $sql  = "SELECT * FROM cuentas WHERE id_cuenta='$idcuenta';";
        $rows = ConectarBD::send("bd_finanzas",$sql);
        
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
        
        
        $stmt->bind_param('issii',$a0,$a1,$a2,$a3,$a4 );
          
        
        if ($stmt->execute()) {
                $conexion->close();
                return(true);
            } else {
                $conexion->close();
                return(false);
            } 
     }
     
    public function CrearCuenta($cuenta) {
        $monto      = $cuenta->getMonto();
        $tipo       = $cuenta->getTipo();
        $moneda     = $cuenta->getMoneda();
        $id_cliente = $cuenta->getId_cliente();
        
        
        $sql = "INSERT INTO cuentas(monto, tipo, moneda, id_cliente) VALUES ($monto,'$tipo','$moneda',$id_cliente)";
        return ConectarBD::send("bd_finanzas", $sql);
    }
     
     //////////CUANTOS PARAMETROS ?
     ///////////IDEA, DE "1PARAM" A "2PARAM"
     ////////USAR LA CONVERSION EN ESTA MISMA FUNCION
     ////Usar conversion de Compra o Venta para la Conversion
    public function VerificarMoneda($de,$a,$monto){
         ////Dolares a Bolivianos
         if($de=="Dolares" and $a=="Bolivianos"){
            return $this->Conversion($monto, $a);
         }
         ////Bolivianos a Dolares
         if($de=="Bolivianos" and $a=="Dolares"){
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
         if($moneda=="Bolivianos"){
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
            $origen = $this->ObtenerCuenta($transaccion->cuenta_origen());   //Construye unobjeto cuenta
            
            
            $monto  =   $transaccion->monto();
            $monto  =   $this->VerificarMoneda( $moneda,$origen->getMoneda(), $monto);
            
            $transaccion->monto($monto);
            
            if( $monto <= $origen->getMonto() ){
                
                $monto=$origen->getMonto()-$monto;
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

            $origen= $this->ObtenerCuenta($transaccion->cuenta_destino());
            
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
             
            $origen  = $this->ObtenerCuenta($transaccion->cuenta_origen());
            $destino = $this->ObtenerCuenta($transaccion->cuenta_destino());
            
            $monto  =   $transaccion->monto();
            $monto  =   $this->VerificarMoneda( $moneda,$origen->getMoneda(), $monto);
            $transaccion->monto($monto);
            $moneda=$origen->getMoneda();
            if($monto <= $origen->getMonto()){
                
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
}
