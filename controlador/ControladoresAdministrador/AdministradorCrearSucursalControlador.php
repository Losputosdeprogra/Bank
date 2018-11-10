<?php

require_once __DIR__ . '/../../modelo/UsuariosModelo/AdministradorModelo.php';
session_start();

$nombre=$_POST['nombre'];
$id_dpto=$_POST['id_dpto'];
$admin=new AdministradorModelo();
echo"PNED";
if(isset($_POST['btn_Crear_Sucursal']))
{
if($admin->crear_sucursal($nombre,$id_dpto)){
echo"LO CREASTE PENDEJO";}
else{    echo "maso";}

}