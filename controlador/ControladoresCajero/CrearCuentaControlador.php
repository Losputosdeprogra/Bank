<?php

require_once __DIR__ . '/../../modelo/UsuariosModelo/CajeroModelo.php';
require_once __DIR__ . '/../../modelo/UsuariosModelo/ClienteModelo.php';
require_once __DIR__ . '/../../modelo/FinanzasModelo/CuentaModelo.php';
$id_cliente    = $_POST['id_cliente'];
$Tipo_cuenta   = $_POST['tipo_cuenta'];
$Moneda        = $_POST['moneda'];

$cuenta = new CuentaModelo();
$Cajero = new CajeroModelo();

$cuenta->set($Tipo_cuenta,$Moneda,0,$id_cliente);

if (isset($_POST['btn_Crear_cuenta'])) {
    if($id_cliente!=0){
        if ($Cajero->CrearCuenta($cuenta)){
            $Cliente = new ClienteModelo();
            $Cliente->setIdCliente($id_cliente);
            MostrarCunetas($Cliente->ObtenerCuentas());
        }else{
            echo "Algo salio mal, no se creo la cuenta";
        }
    } else {
        echo "Dede introducir un id";
    }
}

function MostrarCunetas($cuentas){
    echo "<table width='75%' border='5' align='center' cellspacing='5' bordercolor='#000000' bgcolor='#FFCC99'>";
    echo "<caption><h1>Lista de cuentas del cliente</caption>";
    echo "<tr>";
    echo "<th>Id de la cuenta</th>";
    echo "<th>Tipo de cuenta</th>";
    echo "<th>Moneda</th>";
    echo "<th>Monto de la ceunta</th>";
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