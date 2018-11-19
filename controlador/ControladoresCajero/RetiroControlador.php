<?php

require_once __DIR__ . '/../../modelo/FinanzasModelo/TransaccionModelo.php';
require_once __DIR__ . '/../../modelo/FinanzasModelo/CuentaModelo.php';
require_once __DIR__ . '/../../modelo/UsuariosModelo/CajeroModelo.php';
require_once __DIR__ . '/../../modelo/UsuariosModelo/ClienteModelo.php';
require_once __DIR__ . '/../../modelo/Mostrar.php';
/////////DEFINE LA ZONA HORARIA
date_default_timezone_set("America/La_Paz");

////////////////
session_start();
$cajero=$_SESSION['Cajero'];


////////////////VARIABLES NECESARIAS PARA CONSTRUIR UNA TRANSACCION (ESTABA PROBANDO POR SEPARADO)

$cliente=$_SESSION['id_cliente'];          ////ID DEL CLIENTE
$monto=$_POST['monto'];                    ///MONTO 
$tipo="Retiro";                            ///TIPO DE TRANSACCION
$moneda=$_POST['moneda'];                  ///TIPO DE MONEDA
$cuenta=$_POST['cuentas'];                 ////CUENTA DEL CLIENTE
$fecha=date("Y-m-d");                      ///FECHA ACTUAL
$hora=date("H:i:s");                        ///HORA ACTUAL
 $idcajero=$cajero->getIdCliente();         ///ID DEL CAJERO
 
 ////////////SQL/////////////////////
$tabla= $cajero->Tabla();                   ////TABLA PARA LA BASE DE DATOS

$sql = "SELECT id_caja FROM $tabla WHERE id_cajero='$idcajero';";
$row= ConectarBD::send("bd_usuario",$sql);
/////////////////////////////////////

$idcaja=$row->fetch_row()[0];               ////ID DE LA CAJA 


$sql = "SELECT id_sucursal FROM cajas WHERE id_caja='$idcaja';";
$row= ConectarBD::send("bd_banco", $sql);
$id_sucursal=$row->fetch_row()[0];



///////////CONSTRUCCION DEL OBJETO TRANSACCION///////////
$transaccion=new TransaccionModelo();

$transaccion->cuenta_destino(0);
$transaccion->cuenta_origen($cuenta);
$transaccion->fecha($fecha);
$transaccion->hora($hora);
$transaccion->id_caja($idcaja);
$transaccion->id_cajero($idcajero);
$transaccion->id_sucursal($id_sucursal);
$transaccion->monto($monto);
$transaccion->tipo($tipo);
$transaccion->moneda($moneda);
//////////////////////////////////////////////////////////

if($cajero->Retiro($transaccion, $moneda)){
    
    $cliente = new ClienteModelo();
    $cliente->setIdCliente($_SESSION["id_cliente"]);
    Mostrar::Cuentas($cliente->ObtenerCuentas());
}else {
    echo"<center><br><br><br>No se pudo realizar</center>";
}