<?php


require_once __DIR__ . '/../../modelo/FinanzasModelo/TransaccionModelo.php';
require_once __DIR__ . '/../../modelo/FinanzasModelo/CuentaModelo.php';
require_once __DIR__ . '/../../modelo/UsuariosModelo/CajeroModelo.php';
require_once __DIR__ . '/../../modelo/UsuariosModelo/ClienteModelo.php';
require_once __DIR__ . '/../../modelo/Mostrar.php';
date_default_timezone_set("America/La_Paz");

session_start();
$cajero = $_SESSION['Cajero'];

$tipo   = "Deposito";                         //TIPO DE TRANSACCION
$monto  = $_POST['monto'];                    //MONTO
$moneda = $_POST['moneda'];                   //TIPO DE MONEDA 
$cuenta = $_POST['cuentas'];                  //CUENTA DEL CLIENTE
$fecha  = date("Y-m-d");                      //FECHA ACTUAL
$hora   = date("H:i:s");                      //HORA ACTUAL

$idcajero=$cajero->getIdCliente();         ///ID DEL CAJERO
  ///FFFFAAAAAAALLLLLTAAAAAA///////////////                                /////FALTA ID SUCURSAL
 
 ////////////SQL/////////////////////


$sql = "SELECT id_cliente FROM cuentas WHERE id_cuenta='$cuenta';";
$row= ConectarBD::send("bd_finanzas", $sql);

$cliente=$row->fetch_row()[0];              ///////ID CLIENTE

$tabla= $cajero->Tabla();                   ////TABLA PARA LA BASE DE DATOS
$sql = "SELECT id_caja FROM $tabla WHERE id_cajero='$idcajero';";
$row= ConectarBD::send("bd_usuario",$sql);

$idcaja=$row->fetch_row()[0];               ////ID DE LA CAJA 

$transaccion=new TransaccionModelo();

$transaccion->cuenta_destino($cuenta);
$transaccion->cuenta_origen(0);
$transaccion->fecha($fecha);
$transaccion->hora($hora);
$transaccion->monto($monto);
$transaccion->tipo($tipo);
$transaccion->id_caja($idcaja);
$transaccion->id_cajero($idcajero);
$transaccion->id_sucursal(1);

if($cajero->Deposito($transaccion, $moneda)){
    $cliente = new ClienteModelo();
    $cliente->setIdCliente($_SESSION["id_cliente"]);
    Mostrar::Cuentas($cliente->ObtenerCuentas());
}else {
    echo"<center><br><br><br>No se pudo realizar</center>";
}