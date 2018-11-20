<?php
    echo "<html lang='es'>" ;
    require_once __DIR__ . '/../../modelo/UsuariosModelo/ClienteModelo.php';
    require_once __DIR__ . '/../../modelo/Mostrar.php';
    session_start();       


    $Cliente = new ClienteModelo;
    $nombre = $_SESSION["nombre"];
    $_SESSION["nombre"]=$nombre;
    $sql = "SELECT id_cliente from clientes WHERE nombre = '$nombre'";
    $Cliente->setIdCliente(ConectarBD::send("bd_usuario", $sql)->fetch_row()[0]);
    

    if (isset($_POST['btn_Solicitar_extracto'])) {

       require_once __DIR__ . '/../../vista/VistasCliente/ClienteRealizarExtracto.php';
    }

    if (isset($_POST['btn_Ver_cuentas'])){

       $cuentas = $Cliente->ObtenerCuentas();
       Mostrar::Cuentas($cuentas);
    }