<?php

echo "<html lang='es'>" ;
require_once __DIR__ . '/../../modelo/UsuariosModelo/CajeroModelo.php';
session_start();   

$nombre      = $_POST['nombre'];
$contrasena  = $_POST['contrasena'];

$_SESSION["nombre"]=$nombre;

$Cajero = new CajeroModelo();
$Cajero->setNombre($nombre);
$Cajero->setContrasena($contrasena);

if (isset($_POST['btn_ingresar'])) {
    
    if($Cajero->verificarUsuario()){
        
      require_once __DIR__ . '/../../vista/VistasCajero/CajeroInterfaz.php';
    }else{
        echo "<br>Usuario o contrasena incorrecto";
    }
}

