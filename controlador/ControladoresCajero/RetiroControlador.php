<?php

require_once __DIR__ . '/../../modelo/FinanzasModelo/TransaccionModelo.php';
require_once __DIR__ . '/../../modelo/FinanzasModelo/CuentaModelo.php';
require_once __DIR__ . '/../../modelo/UsuariosModelo/CajeroModelo.php';
date_default_timezone_set("America/La_Paz");
session_start();
$cajero=$_SESSION['Cajero'];

ECHO "FRONT VARIABLES";
echo "<br>";
echo "IDCLiente   ";
echo $cliente=$_SESSION['id_cliente'];
echo "<br>";
echo "monto  ";
echo $monto=$_POST['monto'];
echo "<br>";
echo "Tipo  ";
echo $tipo="retiro";
echo "<br>";
echo "moneda  ";
echo $moneda=$_POST['moneda'];
echo "<br>";
echo "cuentas  ";
echo $cuenta=$_POST['cuentas'];

echo "<br>";

echo "BACK VARIABLES";
echo "<br>";
echo "FECHA  ";
echo $fecha=date("Y-m-d");
echo "<br>";
echo "HORA  ";
echo$hora=date("H:i:s");
echo "<br>";
echo "IDCAJERO  ";
echo $idcajero=$cajero->getIdCliente();
$tabla= $cajero->Tabla();
echo "<br>";
$sql = "SELECT id_caja FROM $tabla WHERE id_cajero='$idcajero';";
$row= ConectarBD::send("bd_usuario",$sql);

$idcaja=$row->fetch_row()[0];

echo "IDCAJA  ";
echo $idcaja;
echo "<br>";



/*Back
 * Fecha+++
 * Hora +++
 * idcaja +++
 * idcajero ++++
 * 
 * 
echo "Today is " . date("Y-m-d") . "<br>";
 * 
date_default_timezone_set("America/La_Paz");
echo "The time is " . date("H:i:s a");
 * 
 * 
 * 
 * Front
 * Cuenta  +++++
 * Monto    ++++
 * tipoi   +++++
 * idcliente +++
 * Moneda ++++
 * 
 * 
 * 
 */