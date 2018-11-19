<?php

    require_once __DIR__ . '/../../modelo/UsuariosModelo/AdministradorModelo.php';
    require_once __DIR__ . '/../../modelo/Mostrar.php';
    session_start();

    $nombre=$_POST['nombre'];
    $telefono=$_POST['telefono'];
    $email=$_POST['email'];
    $contrasena=$_POST['contrasena'];
    $id_caja=0;
    
    $admin=new AdministradorModelo();
    if(isset($_POST['btn_Registrar_Cajero'])){
        
        if($admin->registrar_cajero($nombre,$telefono,$email,$contrasena,$id_caja)){
            
            
            $cajeros = $admin->ListarCajerosInacitivos();
            Mostrar::Cajeros($cajeros,"Cajeros inactivos");
        }else{    
            echo "<br><br><br><br><center> Ha ocurrido un error";
            
        }

    }