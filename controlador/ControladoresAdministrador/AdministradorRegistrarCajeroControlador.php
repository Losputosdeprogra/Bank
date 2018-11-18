<?php

require_once __DIR__ . '/../../modelo/UsuariosModelo/AdministradorModelo.php';
session_start();

$nombre=$_POST['nombre'];
$telefono=$_POST['telefono'];
$email=$_POST['email'];
$contrasena=$_POST['contrasena'];
$id_caja=$_POST['id_caja'];
$admin=new AdministradorModelo();
if(isset($_POST['btn_Registrar_Cajero']))
{
if($admin->registrar_cajero($nombre,$telefono,$email,$contrasena,$id_caja)){
echo"LO CREASTE PENDEJO";}
else{    echo "maso";}

}