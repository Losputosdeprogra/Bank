<?php

require_once __DIR__ . '/UsuarioModelo.php';

class ClienteModelo extends UsuarioModelo{

    private $direccion;
    private $TablaCorrespondiente = "clientes";
    
    public function setDireccion($direc) {
        $this->direccion = $direc;
    }
    public function getDireccion(){
        return $this->direccion;
    }
    
    public function verificarUsuario() {                          // Esta funcion revisa si el usuario existe en la tabla
        return parent::verificar($this->TablaCorrespondiente);    //y sabe su contraseña.
    }                                                             //Utiliza la vatiable TablaCorrespondiente para realizar
                                                                  //la consulta en la tabla correcta.
    public function RealizarExtracto($fi,$ff,$id) {
        return parent::Extracto($fi,$ff,$id);
    }
    public function RealizarExtractoGeneral($id) {
        return parent::Extracto("0-0-0","3000-0-0",$id);
    }
    public function ObtenerCuentas() {
        $id_cliente = $this->getIdCliente();
        $sql ="SELECT * from cuentas WHERE id_cliente = $id_cliente;";
        $cuentas = ConectarBD::send("bd_finanzas", $sql);
        
        return $cuentas;
    }
}                                                                                    