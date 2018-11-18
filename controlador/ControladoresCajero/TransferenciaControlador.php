<?php



require_once __DIR__ . '/../../modelo/FinanzasModelo/TransaccionModelo.php';
require_once __DIR__ . '/../../modelo/FinanzasModelo/CuentaModelo.php';
require_once __DIR__ . '/../../modelo/UsuariosModelo/CajeroModelo.php';
require_once __DIR__ . '/../../modelo/UsuariosModelo/ClienteModelo.php';
/////////DEFINE LA ZONA HORARIA
date_default_timezone_set("America/La_Paz");

session_start();
$cajero=$_SESSION['Cajero'];


////VARIABLES NECESARIAS PARA CONSTRUIR UNA TRANSACCION (ESTABA PROBANDO POR SEPARADO)


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

$idcaja=$row->fetch_row()[0];               ////ID DE LA CAJA 

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


$actor=new CajeroModelo();
if($actor->Transferencia($transaccion, $moneda)){
    $cliente = new ClienteModelo();
    $cliente->setIdCliente($_SESSION["id_cliente"]);
    MostrarCuentas($cliente->ObtenerCuentas());
}else {
    echo"<center><br><br><br>No se pudo realizar</center>";
}


function MostrarCuentas($cuentas="") {
    echo "<table width='75%' border='5' align='center' cellspacing='5' bordercolor='#000000' bgcolor='#FFCC99'>";
    echo "<caption><h1>Lista de tus cuentas</caption>";
    echo "<tr>";
    echo "<th>Id_cuentas</th>";
    echo "<th>Monto</th>";
    echo "<th>Tipo</th>";
    echo "<th>Moneda</th>";
    echo "</tr>";
    while ($fila = $cuentas->fetch_row()) {
        echo "<tr>";
        echo "<td> <center>".$fila[0]."</center></td>"; 
        echo "<td> <center>".$fila[1]."</td>";
        echo "<td> <center>".$fila[2]."</td>";
        echo "<td> <center>".$fila[3]."</td>";
        
        echo "</tr>";
    }
    echo " </table>";
    }