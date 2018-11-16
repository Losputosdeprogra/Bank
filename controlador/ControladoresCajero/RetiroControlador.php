<?php

require_once __DIR__ . '/../../modelo/FinanzasModelo/TransaccionModelo.php';
require_once __DIR__ . '/../../modelo/FinanzasModelo/CuentaModelo.php';
require_once __DIR__ . '/../../modelo/UsuariosModelo/CajeroModelo.php';
/////////DEFINE LA ZONA HORARIA
date_default_timezone_set("America/La_Paz");

////////////////
session_start();
$cajero=$_SESSION['Cajero'];

///////////NO CREO NECESARIO CREAR EL OBTEJO TRANSACCION EN ESTA PAGINA
////////////////VARIABLES NECESARIAS PARA CONSTRUIR UNA TRANSACCION (ESTABA PROBANDO POR SEPARADO)

 $cliente=$_SESSION['id_cliente'];          ////ID DEL CLIENTE
 $monto=$_POST['monto'];                    ///MONTO
 $tipo="retiro";                            ///TIPO DE TRANSACCION
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

///////////CONSTRUCCION DEL OBJETO TRANSACCION///////////
$transaccion=new TransaccionModelo;

//$transaccion->cuenta_destino();
$transaccion->cuenta_origen($cuenta);
$transaccion->fecha($fecha);
$transaccion->hora($hora);
$transaccion->id_caja($idcaja);
$transaccion->id_cajero($idcajero);
//$transaccion->id_sucursal();
$transaccion->monto($monto);
//////////////////////////////////////////////////////////







/////////////////////////////////////////////////RESOLVER ESTE ASUNTO QUE NO SIRVE CON EL CONECTARBD DE DIEGO
/*
$sql="INSERT INTO `transacciones`(`id_trans`, `fecha`, `hora`, `tipo`, `cuenta_origen`, `cuenta_destino`, `monto`, `id_caja`, `id_cajero`, `id_sucursal`) VALUES (?,'$fecha','$hora', $tipo,'$cuenta','----','$monto','$idcaja','$idcajero','0')";
ConectarBD::send("bd_finanzas",$sql);

    ////////////////////ASI ES COMO SE DEBERIA SEGUIR///////////
 * //////////////////IDEA AUMENTAR EL METODO "CLASICO" DEL PROFESOR//////////////////

            $sql = "INSERT INTO cliente(nombre, nit, telefono, email, edad) VALUES(?,?,?,?,?);";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param('ssssi', $this->nombre, $this->nit, $this->telefono, $this->email, $this->edad);

            
            */
//////////////////////////////////
/*Back
 * Fecha+++
 * Hora +++
 * idcaja +++
 * idcajero ++++
 * idsucursal +++
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