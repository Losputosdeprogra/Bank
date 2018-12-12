<?php

require_once __DIR__ . '/UsuarioModelo.php';

class ClienteModelo extends UsuarioModelo{

    private $direccion;
    private $nit;
    private $TablaCorrespondiente = "clientes";
    
    public function setNit($nit=0) {
        $this->nit = $nit;
    }
    public function getNit(){
        return $this->nit;
    }
    public function setDireccion($direc = "") {
        $this->direccion = $direc;
    }
    public function getDireccion(){
        return $this->direccion;
    }
    
    public function verificarUsuario() {                          // Esta funcion revisa si el usuario existe en la tabla
        return parent::verificar($this->TablaCorrespondiente);    //y sabe su contraseña.
    }                                                             //Utiliza la vatiable TablaCorrespondiente para realizar
                                                                  //la consulta en la tabla correcta.
    public function ObtenerIDconNit($nit) {
        $sql = "SELECT id_cliente from clientes WHERE nit_ci = $nit " ;
        return ConectarBD::send("bd_usuario", $sql)->fetch_row()[0];
    }
    
    public function VerificarCi_Nit($nit){
        if($nit > 0){
            
            $sql = "SELECT if(1 in (SELECT nit_ci FROM clientes), TRUE , FALSE) FROM clientes WHERE nit_ci = 1";
            return ConectarBD::send('bd_usuario', $sql)->fetch_row();
           
        }else{
            return FALSE;
        }
    }

    public function RealizarExtracto($fi,$ff,$id) {
        return parent::Extracto($fi,$ff,$id);
    }
    public function RealizarExtractoGeneral($id) {
        return parent::Extracto("0-0-0","3000-0-0",$id);
    }
    public function ObtenerCuentas() {
        
        $id_cliente = $this->getIdCliente();
        $nit        = $this->getNit();
        
        if($id_cliente == ""){
            $sql = "SELECT id_cliente from clientes WHERE nit_ci = $nit";
            $id_cliente = ConectarBD::send('bd_usuario', $sql)->fetch_row()[0];
        }
        
        $sql = "SELECT * from cuentas WHERE id_cliente = $id_cliente";
    
        return ConectarBD::send("bd_finanzas", $sql);
    }
}                                                                                    