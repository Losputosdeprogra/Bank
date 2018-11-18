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



if (isset($_POST['btn_retiro']) ) {
    if($code){
     $sql = "SELECT id_cliente from clientes WHERE nit_ci = '$code' " ;
$_SESSION["id_cliente"] = ConectarBD::send("bd_usuario", $sql)->fetch_row()[0];
    require_once __DIR__ . '/../../vista/VistasCajero/Retiro.php';
    }else {echo "No ingreso CI/NIT del Cliente";}
}

if (isset($_POST['btn_transferencia']) ) {
    if($code){
    $sql = "SELECT id_cliente from clientes WHERE nit_ci = '$code' " ;
    $_SESSION["id_cliente"] = ConectarBD::send("bd_usuario", $sql)->fetch_row()[0];
    require_once __DIR__ . '/../../vista/VistasCajero/Transferencia.php';
    }else {echo "No ingreso CI/NIT del Cliente";}
}

if (isset($_POST['btn_Crear_cuenta'])) {
    require_once __DIR__ . '/../../vista/VistasCajero/CrearCuenta.php';
}
if (isset($_POST['btn_Registrar_cliente'])) {
    require_once __DIR__ . '/../../vista/VistasCajero/RegistrarCliente.php';
}

if (isset($_POST['btn_deposito']) ) {
    if($code!=0){
        $sql = "SELECT id_cliente from clientes WHERE nit_ci = '$code' " ;
        $_SESSION["id_cliente"] = ConectarBD::send("bd_usuario", $sql)->fetch_row()[0];
    require_once __DIR__ . '/../../vista/VistasCajero/DepositoC.php';
    }else{
        require_once __DIR__ . '/../../vista/VistasCajero/Deposito.php';
    }

}