<?php

require_once __DIR__ . '/UsuarioModelo.php';

class AdministradorModelo extends UsuarioModelo{
 
    private $TablaCorrespondiente = "administradores";
    
    public function verificarUsuario() {                         // Esta funcion revisa si el usuario existe en la tabla
        return parent::verificar($this->TablaCorrespondiente); // y sabe su contraseña.
    }                                                                           //Utiliza la vatiable TablaCorrespondeointe para realizar
                                                                              //la consulta en la tabla correcta

public function crear_sucursal($nombre,$id_dpto)
    {
       $sql  =  "INSERT INTO sucursales( nombre , id_dpto) VALUES ('$nombre',$id_dpto)";
       return ConectarBD::send("bd_banco", $sql);     
    }
    
    public function crear_caja($caja){
       $numero     = $caja->getNumero();
       $id_sucursal   = $caja->getIdsucursal(); 
       $sql  =  "INSERT INTO caja( numero , id_sucursal) VALUES ($numero,$id_sucursal)";
       return ConectarBD::send("bd_banco", $sql);     
    }
    
    public function registrar_cagero($cajero){
         $nombre     = $cajero->getNombre();       
         $telefono   = $cajero->getTelefono();
         $email      = $cajero->getEmail();
         $contraseña = $cajero->getContraseña();
         $id_caja    = $cajero->getIdcaja();
         $sql  =  "INSERT INTO cajero( nombre, telefono, email, contraseña, id_caja) VALUES ($nombre,$telefono,$email,$contraseña,$id_caja)";
       return ConectarBD::send("bd_usuario", $sql);     
    }
    
    public function asignar_cajero($id_cajero, $id_caja){
        $sql = "UPDATE cajero SET id_caja = $id_caja  WHERE id_cajero = $id_cajero";
        return ConectarBD::send("bd_usuario", $sql);     
    }
}    