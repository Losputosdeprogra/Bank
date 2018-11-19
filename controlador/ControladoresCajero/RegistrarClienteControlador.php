<?php

    require_once __DIR__ . '/../../modelo/UsuariosModelo/CajeroModelo.php';
    require_once __DIR__ . '/../../modelo/UsuariosModelo/ClienteModelo.php';
    require_once __DIR__ . '/../../modelo/FinanzasModelo/CuentaModelo.php';
    require_once __DIR__ . '/../../modelo/Mostrar.php';
    
    $nombre     = $_POST['nombre'];
    $telefono   = $_POST['telefono'];
    $email      = $_POST['email'];
    $direccion  = $_POST['direccion'];
    $nit        = $_POST['id_nit'];
    $contrasena = $_POST['contrasena'];
    $TipoCuenta = $_POST['tipo_cuenta'];
    $moneda     = $_POST['moneda'];

    $Cajero  = new CajeroModelo();
    $Cliente = new ClienteModelo($nombre,$telefono,$email,$contrasena);
    $Cliente->setDireccion($direccion);
    $Cliente->setNit($nit);
    
    if($nombre != "" && $contrasena != "" && $nit!= 0){

        if($Cajero->RegistrarNuevoCliente($Cliente,$TipoCuenta,$moneda)){
            $cuentas = $Cliente->ObtenerCuentas();
            Mostrar::Cuentas($cuentas);
            echo "<br><br><br><br><center> Se registro correctamente al cliente";
        }else{
            echo "<br><br><br><br><center> Algo salio mal";
        }
    }else{
        echo "<br><br><br><br><center> Como minimo debe ingresar un nombre,contaseña y C.I para el nuevo cliente";
    }
    