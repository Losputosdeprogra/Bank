<?php

require_once __DIR__ . '/UsuarioModelo.php';

class CajeroModelo  extends UsuarioModelo{
   
    private $TablaCorrespondeinte = "cajeros";
    
    public function verificarUsuario() {                         // Esta funcion revisa si el usuario existe en la tabla
        return parent::verificar($this->TablaCorrespondeinte); //y sabe su contraseña.
    }                                                                           //Utiliza la vatiable TablaCorrespondiente para realizar
                                                                                //la consulta en la tabla correcta.
    public function RealizarExtracto($nombreDelCliente) {
        parent::Extracto($nombreDelCliente);
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
        
        $sql = "INSERT INTO cuentas(monto, tipo, moneda, id_cliente) VALUES ($monto,'$tipo','$mon',$id_cliente)";
        return ConectarBD::send("bd_finanzas", $sql);
    }
    
    
}
