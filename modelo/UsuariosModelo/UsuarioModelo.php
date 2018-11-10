<?php
require_once __DIR__ . '/../ConectarBD.php';

class UsuarioModelo {
    
    private $id_cliente;
    private $nombre;
    private $telefono;
    private $email;
    private $contrasena;
    
    private $BD = "bd_usuario";

    public function __construct($nom="",$tel="",$em="",$cont="") {
        $this->id_cliente    = 0;
        $this->nombre       = $nom;
        $this->telefono     = $tel;
        $this->email        = $em;
        $this->contrasena   = $cont;
    }       
    public function setIdCliente($idCli) {
        $this->id_cliente = $idCli;
    }
    public function getIdCliente() {
        return $this->id_cliente;
    }
    public function setNombre($nom) {
        $this->nombre = $nom;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function setTelefono($tel) {
        $this->telefono = $tel;
    }
    public function getTelefono() {
        return $this->telefono;
    }
    public function setEmail($email) {
        $this->email = $email;
    }
    public function getEmail() {
        return $this->email;
    }
    public function setContrasena($cont) {
        $this->contrasena = $cont;
    }
    public function getContrasena() {
        return $this->contrasena;
    }

    public function verificar($TablaCorrespondiente) {
        $sql = "SELECT nombre,contrasena FROM $TablaCorrespondiente;";
        $rows= ConectarBD::send($this->BD,$sql);
        
        while ( $fila = $rows->fetch_row()){
            if ($fila[0] == $this->nombre && $fila[1] == $this->contrasena){
                return TRUE;
            }
        }
        return FALSE;
    }
    
    protected function Extracto($fi,$ff,$idCuenta) {
        
        $sql = "SELECT fecha,hora,tipo,cuenta_origen,cuenta_destino,monto FROM transacciones "
                . "WHERE (cuenta_origen = $idCuenta OR cuenta_destino = $idCuenta) AND (fecha >='$fi' AND fecha<='$ff');";
        return ConectarBD::send("bd_finanzas",$sql);
    }
}