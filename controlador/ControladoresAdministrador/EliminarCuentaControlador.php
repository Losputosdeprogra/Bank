<?php

require_once __DIR__.'/../../modelo/UsuariosModelo/AdministradorModelo.php';
require_once __DIR__.'/../../modelo/FinanzasModelo/CuentaModelo.php';
require_once __DIR__.'/../../modelo/UsuariosModelo/ClienteModelo.php';

$nombre = $_POST['nombre'];


$cliente = new ClienteModelo();
$cuenta= new CuentaModelo();
$adm= new AdministradorModelo;
$c= $_POST['cuenta'];
$sql="SELECT * From cuentas WHERE id_cuenta=$c";
 $c=ConectarBD::send("bd_finanzas", $sql)->fetch_row();
$cuenta->id_cuenta($c[0]);
 $cuenta->set($c[1],$c[2],$c[3],$c[4]);

$cliente->setNit($_POST['nit_ci']);
$sql2  = "select id_cliente from clientes where nombre = '$nombre'";
$cliente->setIdCliente( ConectarBD::send("bd_usuario", $sql2)->fetch_row()[0]);
 
$adm->EliminarCuenta($cuenta, $cliente);
/*if(isset($_POST['btn_Eliminar_Cuenta'])){
 
 $adm->EliminarCuenta($cuenta, $cliente);
}*/