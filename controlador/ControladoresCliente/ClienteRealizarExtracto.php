<?php
 echo "<html lang='es'>" ;
 require_once __DIR__ . '/../../modelo/UsuariosModelo/ClienteModelo.php';
 require_once __DIR__ . '/../../modelo/Mostrar.php';
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
        $_SESSION['id_cuenta']=$id_cuenta;
        $Extracto = $Cliente->RealizarExtracto($FechaInicio,$FechaFinal,$id_cuenta);
        Mostrar::Extracto($Extracto);
        
    }else{
        echo "<br><br><br><br>";
        echo "<center>Dede introducir al menos la fecha de inicio</center>";
    }
}

if (isset($_POST['btn_Solicitar_extracto_general'])){
    $_SESSION['id_cuenta']=$id_cuenta;
    $Extracto = $Cliente->RealizarExtractoGeneral($id_cuenta);
    Mostrar::Extracto($Extracto);
}
