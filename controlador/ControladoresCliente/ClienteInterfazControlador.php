<?php
    echo "<html lang='es'>" ;
    require_once __DIR__ . '/../../modelo/UsuariosModelo/ClienteModelo.php';
    session_start();       


    $Cliente = new ClienteModelo;
    $nombre = $_SESSION["nombre"];

    $sql = "SELECT id_cliente from clientes WHERE nombre = '$nombre'";
    $Cliente->setIdCliente(ConectarBD::send("bd_usuario", $sql)->fetch_row()[0]);
    

    if (isset($_POST['btn_Solicitar_extracto'])) {

       require_once __DIR__ . '/../../vista/VistasCliente/ClienteRealizarExtracto.php';
    }

    if (isset($_POST['btn_Ver_cuentas'])){

       $cuentas = $Cliente->ObtenerCuentas();
       MostrarCuentas($cuentas);
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