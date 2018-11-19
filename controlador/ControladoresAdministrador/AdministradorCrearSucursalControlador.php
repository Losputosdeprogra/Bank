<?php

    require_once __DIR__ . '/../../modelo/UsuariosModelo/AdministradorModelo.php';
    require_once __DIR__ . '/../../modelo/Mostrar.php';
    session_start();

    $nombre  =$_POST['nombre'];
    $nombre_dpto =$_POST['id_dpto'];
    $numeroCaja = $_POST['NumeroCaja'];


    $admin = new AdministradorModelo();
    $sql = "SELECT id_dpto from departamentos WHERE nombre = '$nombre_dpto'";
    $id_departamento = ConectarBD::send("bd_banco", $sql)->fetch_row()[0];

    if(isset($_POST['btn_Crear_Sucursal'])){
        
        if($admin->crear_sucursal($nombre,$id_departamento)){
            
            $sql1 = "SELECT MAX(id_sucursal) FROM sucursales";
            $id_sucursal = ConectarBD::send("bd_banco", $sql1)->fetch_row()[0];
            
            $sql2 = "INSERT INTO cajas( `numero`, `id_sucursal`) VALUES ($numeroCaja,$id_sucursal);"; 
            if(ConectarBD::send('bd_banco', $sql2)){
                echo "Se creo la caja";
            }else{
                echo "No se creo la caja";
            }
            
            $sucursales = $admin->ListarSucursales($id_departamento);
            Mostrar::Sucursales($sucursales,$nombre_dpto);
        }else{    
            echo "<br><br><br><br><center>Algo salio mal";
        }
    }