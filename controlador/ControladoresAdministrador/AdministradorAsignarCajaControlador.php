<?php

    require_once __DIR__ . '/../../modelo/UsuariosModelo/AdministradorModelo.php';
    require_once __DIR__ . '/../../modelo/Mostrar.php';
    session_start();

    $nombre   = $_POST['nombre'];
    $id_caja  = $_POST['id_caja'];
    $admin = new AdministradorModelo();
    
    
    
    
    if(isset($_POST['btn_Asignar_Caja'])){
        
        if($admin->asignar_caja($nombre,$id_caja)){
            
            if($id_caja != 0){
                $sql = "SELECT id_sucursal FROM cajas WHERE id_caja = $id_caja";
                $id_sucrusal = ConectarBD::send("bd_banco", $sql)->fetch_row()[0];


                $sql1 = "SELECT nombre from sucursales WHERE id_sucursal = $id_sucrusal";      //Listamos a loscajeros por su sucrusal poniendo
                $NombreSucursal = ConectarBD::send('bd_banco', $sql1)->fetch_row()[0];         // El titulo de lasucursal en cada tabla

                Mostrar::CajerosPorSucursal($admin->ListarCajeros($id_sucrusal),$NombreSucursal);
            }else{
                Mostrar::Cajeros($admin->ListarCajerosInacitivos(),"Inactivos");
            }
        }else{   
            echo "<br><br><br><br><center>Hubo un error";

        }
    }