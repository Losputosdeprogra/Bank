<?php

require_once __DIR__.'/../../modelo/UsuariosModelo/AdministradorModelo.php';
session_start();

$admin=new AdministradorModelo();
$nombre=$_SESSION["nombre"];

$sql = "SELECT id_cliente from administradores WHERE nombre = '$nombre'";
$admin->setIdCliente(ConectarBD::send("bd_usuario", $sql));

if (isset($_POST['btn_Crear_Sucursal']))
{
    
      require_once __DIR__ . '/../../vista/VistasAdministrador/CrearSucursal.php';
}