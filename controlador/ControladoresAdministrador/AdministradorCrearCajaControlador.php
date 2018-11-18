<?php


require_once __DIR__ . '/../../modelo/UsuariosModelo/AdministradorModelo.php';
session_start();

$numero=$_POST['numero'];
$id_sucursal=$_POST['id_sucursal'];
$admin=new AdministradorModelo();
if(isset($_POST['btn_Crear_Caja']))
{
if($admin->crear_caja($numero,$id_sucursal)){
echo"LO CREASTE PENDEJO";}
else{    echo "maso";}

}