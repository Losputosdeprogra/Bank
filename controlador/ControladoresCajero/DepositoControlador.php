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

echo "<br>";
echo "MONTO  ";
 echo $monto=$_POST['monto'];                    ///MONTO
echo "<br>";
echo "TIPO  ";
 echo $tipo="Deposito";                            ///TIPO DE TRANSACCION
echo "<br>";
echo "MONEDA  "; 
 echo $moneda=$_POST['moneda'];                  ///TIPO DE MONEDA
echo "<br>";
echo "  CUENTA   "; 

 echo $cuenta=$_POST['cuentas'];                 ////CUENTA DEL CLIENTE
 echo "<br>";
echo "FECHA  ";
 echo $fecha=date("Y-m-d");                      ///FECHA ACTUAL
 echo "<br>";
echo "HORA  ";
echo $hora=date("H:i:s");                        ///HORA ACTUAL
echo "<br>";
echo "CAJERO  "; 
echo $idcajero=$cajero->getIdCliente();         ///ID DEL CAJERO
  ///FFFFAAAAAAALLLLLTAAAAAA///////////////                                /////FALTA ID SUCURSAL
 
 ////////////SQL/////////////////////
$tabla= $cajero->Tabla();                   ////TABLA PARA LA BASE DE DATOS

$sql = "SELECT id_cliente FROM cuentas WHERE id_cuenta='$cuenta';";
$row= ConectarBD::send("bd_finanzas", $sql);
echo "<br>";
echo "ID CLIENTE";
echo $cliente=$row->fetch_row()[0];              ///////ID CLIENTE


$sql = "SELECT id_caja FROM $tabla WHERE id_cajero='$idcajero';";
$row= ConectarBD::send("bd_usuario",$sql);
/////////////////////////////////////
echo "<br>";
echo "CAJA  ";
echo $idcaja=$row->fetch_row()[0];               ////ID DE LA CAJA 


///////////CONSTRUCCION DEL OBJETO TRANSACCION///////////
$transaccion=new TransaccionModelo();

$transaccion->cuenta_destino($cuenta);
$transaccion->cuenta_origen(0);
$transaccion->fecha($fecha);
$transaccion->hora($hora);
$transaccion->id_caja($idcaja);
$transaccion->id_cajero($idcajero);
$transaccion->id_sucursal(1);
$transaccion->monto($monto);
$transaccion->tipo($tipo);
//////////////////////////////////////////////////////////

$actor=new CajeroModelo();
if($actor->Deposito($transaccion, $moneda)){
    echo "Si se pudo Realizar";
}else {echo"No se pudo realizar";}






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