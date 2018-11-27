<?php

require_once __DIR__.'/../../modelo/UsuariosModelo/AdministradorModelo';
require_once __DIR__.'/../../modelo/FinanzasModelo/CuentasModelo';
require_once __DIR__.'/../../modelo/UsuariosModelo/ClienteModelo';

$cliente = new ClienteModelo();
$cuenta= new CuentaModelo();
$adm= new AdministradorModelo;
$c= $_POST['cuenta'];
$sql="SELECT * From cuentas WHERE id_cuenta=$c";
 $c=ConectarBD::send("bd_finanzas", $sql)->fetch_row();
$cuenta->id_cuenta($c[0]);
 $cuenta->set($c[1],$c[2],$c[3],$c[4]);

$cliente->setNit($_POST['nit_ci']);
$cliente->setIdCliente($_POST['nombre']);
 
 
 $adm->EliminarCuenta($cuenta, $cliente);
