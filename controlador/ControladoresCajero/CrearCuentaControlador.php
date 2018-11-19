<?php
session_start();
require_once __DIR__ . '/../../modelo/UsuariosModelo/CajeroModelo.php';
require_once __DIR__ . '/../../modelo/UsuariosModelo/ClienteModelo.php';
require_once __DIR__ . '/../../modelo/FinanzasModelo/CuentaModelo.php';
require_once __DIR__ . '/../../modelo/Mostrar.php';

$id_cliente    = $_SESSION["id_cliente"];
$Tipo_cuenta   = $_POST['tipo_cuenta'];
$Moneda        = $_POST['moneda'];

$cuenta = new CuentaModelo();
$Cajero = new CajeroModelo();

$cuenta->set(0,$Tipo_cuenta,$Moneda,$id_cliente);

if (isset($_POST['btn_Crear_cuenta'])) {
    if($id_cliente!=0){
        if ($Cajero->CrearCuenta($cuenta)){
            $Cliente = new ClienteModelo();
            $Cliente->setIdCliente($id_cliente);
            Mostrar::Cuentas($Cliente->ObtenerCuentas());
        }else{
            echo "Algo salio mal, no se creo la cuenta";
        }
    } else {
        echo "Dede introducir un id";
    }
}


 