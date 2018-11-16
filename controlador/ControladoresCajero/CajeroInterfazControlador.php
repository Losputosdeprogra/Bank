<?php
require_once __DIR__ . '/../../modelo/UsuariosModelo/CajeroModelo.php';
echo "<html lang='es'>" ;
session_start();

$code  = $_POST['nit_ci'];
$name  = $_POST['nombre_cliente'];
if (isset($_POST['btn_Realizar_extracto'])) {
    require_once __DIR__ . '/../../vista/VistasCajero/RealizarExtracto.php';
    $_SESSION["code"] = $code;
$sql = "SELECT id_cliente from clientes WHERE nit_ci = '$code' " ;
$_SESSION["id_cliente"] = ConectarBD::send("bd_usuario", $sql)->fetch_row()[0];
}

if (isset($_POST['btn_deposito'])) {
    require_once __DIR__ . '/../../vista/VistasCajero/Deposito.php';
}

if (isset($_POST['btn_retiro'])) {
       $_SESSION["code"] = $code;
$sql = "SELECT id_cliente from clientes WHERE nit_ci = '$code' " ;
$_SESSION['id_cliente'] = ConectarBD::send("bd_usuario", $sql)->fetch_row()[0];

    require_once __DIR__ . '/../../vista/VistasCajero/Retiro.php';
    
}

if (isset($_POST['btn_transferencia'])) {
    require_once __DIR__ . '/../../vista/VistasCajero/Transferencia.php';
}

if (isset($_POST['btn_Crear_cuenta'])) {
    require_once __DIR__ . '/../../vista/VistasCajero/CrearCuenta.php';
}
if (isset($_POST['btn_Registrar_cliente'])) {
    require_once __DIR__ . '/../../vista/VistasCajero/RegistrarCliente.php';
}

