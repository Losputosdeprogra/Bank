<?php

require_once __DIR__ . '/../../modelo/UsuariosModelo/AdministradorModelo.php';
session_start();

$nombre=$_POST['nombre'];
$id_caja=$_POST['id_caja'];
$admin=new AdministradorModelo();
if(isset($_POST['btn_Asignar_Caja']))
{
if($admin->asignar_caja($nombre,$id_caja)){
echo"LO CREASTE PENDEJO";}
else{    echo "maso";}

}