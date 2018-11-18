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

if(isset($_POST['btn_Crear_Caja']))
{
    require_once __DIR__.'/../../vista/VistasAdministrador/CrearCaja.php';
}

if(isset($_POST['btn_Registrar_Cajero']))
{
    require_once __DIR__.'/../../vista/VistasAdministrador/RegistrarCajero.php';
}

if(isset($_POST['btn_Asignar_Cajero']))
{
    require_once __DIR__.'/../../vista/VistasAdministrador/AsignarCajero.php';
}


$administrador=new AdministradorModelo();

if(isset($_POST['btn_Reporte']))
{
    require_once __DIR__.'/../../vista/VistasAdministrador/Reporte.php';
    
}

