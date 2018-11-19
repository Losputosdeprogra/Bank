<?php


    require_once __DIR__ . '/../../modelo/UsuariosModelo/AdministradorModelo.php';
    require_once __DIR__ . '/../../modelo/Mostrar.php';
    session_start();

    $numero=$_POST['numero'];
    $id_sucursal=$_POST['id_sucursal'];

    $admin=new AdministradorModelo();
    
    if(isset($_POST['btn_Crear_Caja'])){

        if($admin->crear_caja($numero,$id_sucursal)){
            
            $sql = "SELECT nombre from sucursales WHERE id_sucursal = $id_sucursal";          
            $NombreSucursal = ConectarBD::send('bd_banco', $sql)->fetch_row()[0];

            $cajas = $admin->ListarCajas($id_sucursal);
            Mostrar::CajasPorSucursal($cajas,$NombreSucursal);

        }else{   
            echo "<br><br><br><br><center>Hubo un error";

        }
    }