<?php

echo "<html lang='es'>" ;
require_once __DIR__ . '/../../modelo/UsuariosModelo/AdministradorModelo.php';
session_start();   

$nombre      = $_POST['nombre'];
$contrasena  = $_POST['contrasena'];

$_SESSION["nombre"]=$nombre;

$Administrador = new AdministradorModelo();
$Administrador->setNombre($nombre);
$Administrador->setContrasena($contrasena);

if (isset($_POST['btn_ingresar'])) {
    
    if($Administrador->verificarUsuario()){
        
      require_once __DIR__ . '/../../vista/VistasAdministrador/AdministradorInterfaz.php';
    }else{
        echo "<br>Usuario o contrasena incorrecto";
    }
}

