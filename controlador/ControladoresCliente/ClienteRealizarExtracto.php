<?php
 echo "<html lang='es'>" ;
 require_once __DIR__ . '/../../modelo/UsuariosModelo/ClienteModelo.php';
 session_start();       

$FechaInicio      = $_POST['FechaInicio'];
$FechaFinal       = $_POST['FechaFinal'];
$id_cuenta        = $_POST['combobox'];

$Cliente = new ClienteModelo;
$Cliente->setNombre($_SESSION["nombre"]);      //Se recibe el nombre del usuario que se logueo en la pagina anterior


if (isset($_POST['btn_Solicitar_extracto'])) {
    
    if($FechaFinal == ""){
        $FechaFinal = $FechaInicio;
    }
    
    if($FechaInicio != ""){
    
        $Extracto = $Cliente->RealizarExtracto($FechaInicio,$FechaFinal,$id_cuenta);
        MostrarExtracto($Extracto);
        
    }else{
        echo "<br><br><br><br>";
        echo "<center>Dede introducir al menos la fecha de inicio</center>";
    }
}

if (isset($_POST['btn_Solicitar_extracto_general'])){
    
    $Extracto = $Cliente->RealizarExtractoGeneral($id_cuenta);
    MostrarExtracto($Extracto);
}

function MostrarExtracto($Transacciones="") {
    echo "<table width='75%' border='5' align='center' cellspacing='5' bordercolor='#000000' bgcolor='#FFCC99'>";
    echo "<caption><h1>Lista de transacciones</caption>";
    echo "<tr>";
    echo "<th>Fecha</th>";
    echo "<th>Hora</th>";
    echo "<th>Tipo</th>";
    echo "<th>Cuenta origen</th>";
    echo "<th>Cuenta destino</th>";
    echo "<th>Monto</th>";
    echo "</tr>";
    while ($fila = $Transacciones->fetch_row()) {
        echo "<tr>";
        echo "<td> <center>".$fila[0]."</center></td>"; 
        echo "<td> <center>".$fila[1]."</td>";
        echo "<td> <center>".$fila[2]."</td>";
        echo "<td> <center>".$fila[3]."</td>";
        echo "<td> <center>".$fila[4]."</td>";
        echo "<td> <center>".$fila[5]."</td>";
        echo "</tr>";
    }
    echo " </table>";
}