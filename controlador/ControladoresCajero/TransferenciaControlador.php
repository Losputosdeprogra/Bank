<?php



require_once __DIR__ . '/../../modelo/FinanzasModelo/TransaccionModelo.php';
require_once __DIR__ . '/../../modelo/FinanzasModelo/CuentaModelo.php';
require_once __DIR__ . '/../../modelo/UsuariosModelo/CajeroModelo.php';
/////////DEFINE LA ZONA HORARIA
date_default_timezone_set("America/La_Paz");

////////////////
session_start();
$cajero=$_SESSION['Cajero'];


////////////////VARIABLES NECESARIAS PARA CONSTRUIR UNA TRANSACCION (ESTABA PROBANDO POR SEPARADO)


  $monto=$_POST['monto'];     
  $tipo="Transferencia";                            ///TIPO DE TRANSACCION

  $moneda=$_POST['moneda'];                  ///TIPO DE MONEDA
 
 $origen=$_POST['origen'];

  $destino=$_POST['destino'];                 ////CUENTA DEL CLIENTE
 
  $fecha=date("Y-m-d");                      ///FECHA ACTUAL

 $hora=date("H:i:s");                        ///HORA ACTUAL

 $idcajero=$cajero->getIdCliente();         ///ID DEL CAJERO
  ///FFFFAAAAAAALLLLLTAAAAAA///////////////                                /////FALTA ID SUCURSAL
 
 ////////////SQL/////////////////////
$tabla= $cajero->Tabla();                   ////TABLA PARA LA BASE DE DATOS



$sql = "SELECT id_caja FROM $tabla WHERE id_cajero='$idcajero';";
$row= ConectarBD::send("bd_usuario",$sql);
/////////////////////////////////////

 $idcaja=$row->fetch_row()[0];               ////ID DE LA CAJA 


///////////CONSTRUCCION DEL OBJETO TRANSACCION///////////
$transaccion=new TransaccionModelo();

$transaccion->cuenta_destino($destino);
$transaccion->cuenta_origen($origen);
$transaccion->fecha($fecha);
$transaccion->hora($hora);
$transaccion->id_caja($idcaja);
$transaccion->id_cajero($idcajero);
$transaccion->id_sucursal(1);
$transaccion->monto($monto);
$transaccion->tipo($tipo);
//////////////////////////////////////////////////////////

$actor=new CajeroModelo();
if($actor->Transferencia($transaccion, $moneda)){
    echo "Si se pudo Realizar";
}else {echo"No se pudo realizar";}


